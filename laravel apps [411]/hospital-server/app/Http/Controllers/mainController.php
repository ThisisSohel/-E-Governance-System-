<?php

namespace App\Http\Controllers;

use App\Models\biller;
use App\Models\doctor;
use App\Models\patient;
use App\Models\test_token;
use App\Models\lab_officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\doctors_has_patient;
use Illuminate\Support\Facades\Http;
use App\Models\test_token_has_test_list;






class mainController extends Controller
{


    public function test(){

        $r = doctor::addSelect(['last_flight' => biller::select('name')
        ->whereColumn('destination_id', 'doctors.id')
    ])->toSql();

        return $r;
    }












    public function login_check (Request $req){

        $id = $req->personal_id;
        $pass = $req->password;


        $exist = DB::table('doctors')
                    ->join('departments', 'doctors.departments_id', 'departments.id')
                    ->where('pid', $id)
                    ->where('password', $pass)
                    ->first();

        if($exist){
            Session()->put('auth_pid', $exist->pid);
            return redirect('/dashboard');
        }
        $exist = lab_officer::where('pid', $id)
                            ->where('password', $pass)
                            ->first();
        if($exist){
            Session()->put('auth_pid', $exist->pid);
            return redirect('/dashboard');
        }


        $exist = biller::where('pid', $id)
                        ->where('password', $pass)
                        ->first();

        if($exist){
            Session()->put('auth_pid', $exist->pid);
            return redirect('/dashboard');
        }

        return redirect()->back()->with('fail', 'Invalid PID or Password');
    }
































    public function dashboard (){

        $exist = lab_officer::where('pid', session('auth_pid'))->first();
        if($exist){
            return view('lab_dashboard', ['var'=>$exist]);
        }

        $exist = DB::table('doctors')
        ->join('departments', 'doctors.departments_id', 'departments.id')
        ->where('pid', session('auth_pid'))
        ->first();
        if($exist){
            return view('doc_dashboard', ['var'=>$exist]);
        }

        $exist = biller::where('pid', session('auth_pid'))->first();
        if($exist){
            return view('biller_dashboard', ['var'=>$exist]);
        }
    }



    public function apptokenchk(Request $req){
        
        $appointment_token = doctors_has_patient::where('appointment_token', $req->appointment_token)
                                                ->where('doctors_pid', Session('auth_pid'))->first();

        if($appointment_token){
            session(['apptoken'=>$appointment_token->appointment_token,
                    'pid'=> $appointment_token->patients_pid]);

            return redirect('/dashboard/interface');
        }
        else{
            return '<h1 style="color:red">No Appointment were Found!</h1>';
        }
    }









    
    public function dashboardInterface(){
            $patient_info = patient::where('pid', Session('pid'))->first();

            $doctor_info = DB::table('doctors')
                        ->join('departments', 'doctors.departments_id', 'departments.id')
                        ->where('pid', Session('auth_pid'))->first();

            $test = DB::table('test_list')->get();
            $medicine = DB::table('drug_list')->get();

            $response = Http::get('http://127.0.0.1:8000/getrecordsdefault/'.$patient_info->pid.'/'.$doctor_info->dept_name);
                            // return $response->body();
                            // DB::table('doctors_has_patients')->where('appointment_token', $req->appointment_token)->delete();
            return view('doc_dashboard_patient_logged_in', ['patient'=> $patient_info,
                                                            'var'=> $doctor_info,
                                                            'drugs'=>$medicine,
                                                            'tests'=>$test,
                                                            'response'=> $response->object()]);
    }










    public function patientExit() {
        session()->forget('pid');
        session()->forget('apptoken');

        return redirect('/dashboard');
    }




















    public function billeraccess(Request $req){
        $patient_info = patient::where('pid', $req->citizen_PID)
                        ->where('dob', $req->date_of_birth)->first();
        $biller_info = biller::where('pid', session('auth_pid'))->first();
        $test = DB::table('test_list')->get();
        $medicine = DB::table('drug_list')->get();



        $response = Http::get('http://127.0.0.1:8000/gettestdefault/'.$patient_info->pid.'/'.'Apollo Super-Specialized Hospital');

        if($patient_info){
            session(['pid'=>$patient_info->pid]);
            return view('biller_dashboard_patient_logged_in', ['patient'=>$patient_info,
                                                                'biller'=>$biller_info,
                                                                'tests'=>$test,
                                                                'drugs'=>$medicine,
                                                                'response'=>$response->object()]);
        }
        else{
            return '<h1 style="color: red">Patient Not found in DB</h1>';
        }
    }

    public function testreg(Request $req){
        $new_test_token = new test_token;
        $new_test_token->patients_pid = session('pid');
        $new_test_token->save();
        

        for ($x = 0; $x < count($req->test); $x++) {
            $test_token_has = new test_token_has_test_list;
            $test_token_has->test_token = $new_test_token->test_token;
            $test_token_has->test_name = $req->test[$x];
            $test_token_has->reference_num = $req->reference[$x];
            $test_token_has->save();
        }


        return '<h1 style="color: green">Successflly Registered!</h1>';
    }

    public function labtokenvalidate(Request $req){
        $data = DB::table('test_token_has_test_list')
                    ->join('test_token', 'test_token_has_test_list.test_token', 'test_token.test_token')
                    ->where('test_token.test_token', $req->token)
                    ->get();
        $lab_officer = lab_officer::where('pid',session('auth_pid'))->first();

        if(count($data)){
            $patient = DB::table('test_token')
                        ->join('patients', 'patients.pid', 'test_token.patients_pid')
                        ->where('test_token',$req->token)->first();
            $test = DB::table('test_list')->get();
            
            return view('lab_dashboard_patient_logged_in', ['test_array'=> $data,
                                                            'patient'=>$patient,
                                                            'lab_officer'=>$lab_officer,
                                                            'test'=>$test]);
        }
        else if(!count($data)){
            return '<h1 style="color: red">NO tests were found!</h1>';
        }
    }

    public function overridedoc(Request $req){
            $patient_info = patient::where('pid', session('pid'))->first();
            $doctor_info = DB::table('doctors')
                        ->join('departments', 'doctors.departments_id', 'departments.id')
                        ->where('pid', Session('auth_pid'))->first();
            
            $test = DB::table('test_list')->get();
            $medicine = DB::table('drug_list')->get();


            $response = Http::get('http://127.0.0.1:8000/getrecordsdefault/'.$patient_info->pid .'/'.$doctor_info->dept_name);
            $override = Http::get('http://127.0.0.1:8000/getrecordsoverride/'.$patient_info->pid .'/'. $req->override_key);

            
            // DB::table('doctors_has_patients')->where('appointment_token', $req->appointment_token)->delete();
            return view("withoverride", ['patient'=> $patient_info,
                                                            'var'=> $doctor_info,
                                                            'drugs'=>$medicine,
                                                            'tests'=>$test,
                                                            'response'=> $response->object(),
                                                            'override'=> $override->object()]);
    }

    public function overridetest(Request $req){
        $patient_info = patient::where('pid', session('pid'))
                        ->first();
        $biller_info = biller::where('pid', session('auth_pid'))->first();
        $test = DB::table('test_list')->get();
        $medicine = DB::table('drug_list')->get();

        $response = Http::get('http://127.0.0.1:8000/gettestdefault/'.session('pid').'/'.'Apollo Super-Specialized Hospital');
        $override = Http::get('http://127.0.0.1:8000/gettestdefaultoverride/'.session('pid').'/'.$req->override_key);

        if($patient_info){
            session(['pid'=>$patient_info->pid]);
            return view('withoverridetest', ['patient'=>$patient_info,
                                                                'biller'=>$biller_info,
                                                                'tests'=>$test,
                                                                'drugs'=>$medicine,
                                                                'response'=>$response->object(),
                                                                'override'=>$override->object()]);
        }
        else{
            return '<h1 style="color: red">Patient Not found in DB</h1>';
        }
    }



    public function logout(){
        Session()->forget('auth_pid');

        if(session('apptoken')){
            session()->forget('apptoken');
            session()->forget('pid');
        }

        return redirect('/')->with('fail','Logged out'); 
    }
}

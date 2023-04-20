<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\test;
use App\Models\record;
use App\Models\medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\elementType;

class RecordController extends Controller
{
    public function post_prescription(Request $req){


        $payload = json_decode($req->getContent(), true);

        $reference = Carbon::now()->timestamp;

        $record = new record;
        $record->citizen_id = $payload['citizen_PID'];
        $record->reference = $reference;
        $record->doctor_id = $payload['doctor_PID'];
        $record->hospital_name = $payload['hospital_name'];
        $record->hospital_address = $payload['hospital_address'];
        $record->doctor_name = $payload['doctor_name'];
        $record->doctor_designation = $payload['doctor_designation'];
        $record->doctor_gender = $payload['doctor_gender'];
        $record->doctor_department = $payload['doctor_department'];
        $record->doctor_degree = $payload['doctor_degree'];
        $record->doctor_institution = $payload['doctor_institution'];
        $record->hotline = $payload['doctor_hotline'];
        $record->symptoms = $payload['symptoms'];
        $record->advice = $payload['advice'];
        $record->follow_up_date = $payload['follow_up_date'];
        $record->override_key = '';
        $record->save();

        $medicine = new medicine;
        $test = new test;
        foreach ($payload['medicine'] as $value) {
            $medicine = new medicine;
            $medicine->medicine_name = $value['medicine'];
            $medicine->dosage = $value['dosage'];
            $medicine->comment = $value['comment'];
            $medicine->citizen_id = $payload['citizen_PID'];
            $medicine->reference = $reference;
            $medicine->save();
        }
        foreach ($payload['test'] as $value) {
            $test = new test;
            $test->test_name = $value['test_name'];
            $test->test_report_file = '';
            $test->test_override = 0;
            $test->citizen_id = $payload['citizen_PID'];
            $test->reference = $reference;
            $test->save();
        }


        return response(['Success'], 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST,PATCH,OPTIONS');
    }

    public function get_prescription_default(Request $req){
        

        $medicine = DB::table('medicines')
                            ->get();

        $tests = DB::table('tests')
                            ->get();

        $record = DB::table('records')
                            ->where('doctor_department',$req->department)
                            ->where('citizen_id',$req->pid)
                            ->get();

        foreach($record as $rec){
            $rec->medicine = [];
            $rec->test = [];
        }

        foreach($medicine as $med){
            foreach($record as $rec){
                if($med->citizen_id == $rec->citizen_id && $med->reference == $rec->reference){
                    array_push($rec->medicine,  ['medicine' => $med->medicine_name, 'dosage' => $med->dosage, 'comment' => $med->comment] );                
                }
            }
        } 
        foreach($tests as $test){
            foreach($record as $rec){
                if($test->citizen_id == $rec->citizen_id && $test->reference == $rec->reference){
                    array_push($rec->test,  ['test' => $test->test_name, 'report' => $test->test_report_file]);                
                }
            }
        } 

        foreach($record as $rec){
            unset($rec->reference);
            unset($rec->updated_at);
        }



        return response($record, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST,PATCH,OPTIONS');
    }

    public function get_prescription_override(Request $req){


        $medicine = DB::table('medicines')
                            ->get();

        $tests = DB::table('tests')
                            ->get();

        $record = DB::table('records')
                            ->where('citizen_id', $req->pid)
                            ->where('override_key', $req->override_key)
                            ->get();

        

        foreach($record as $rec){
            $rec->medicine = [];
            $rec->test = [];
        }

        foreach($medicine as $med){
            foreach($record as $rec){
                if($med->citizen_id == $rec->citizen_id && $med->reference == $rec->reference){
                    array_push($rec->medicine,  ['medicine' => $med->medicine_name, 'dosage' => $med->dosage, 'comment' => $med->comment] );                
                }
            }
        } 
        foreach($tests as $test){
            foreach($record as $rec){
                if($test->citizen_id == $rec->citizen_id && $test->reference == $rec->reference){
                    array_push($rec->test,  ['test' => $test->test_name, 'report' => $test->test_report_file]);                
                }
            }
        } 

        foreach($record as $rec){
            unset($rec->reference);
            unset($rec->updated_at);
        }

        return response($record, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST,PATCH,OPTIONS');
    }

    public function gettestdefault(Request $req){


        $tests = DB::table('tests')
                            ->get();

        $record = DB::table('records')
                            ->where('hospital_name',$req->hospital_name)
                            ->where('citizen_id', $req->pid)
                            ->select('citizen_id','reference')->latest()->first();
        
        $record->test = [];

        foreach($tests as $test){
                if($test->citizen_id == $record->citizen_id && $test->reference == $record->reference){
                    array_push($record->test,  ['test' => $test->test_name, 'report' => $test->test_report_file]);                
                }
        }

        return response()->json($record)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST,PATCH,OPTIONS');
    }

    public function gettestdefault_override(Request $req){
        
        $tests = DB::table('tests')
                            ->where('citizen_id', $req->pid)
                            ->where('test_override', $req->override_key)
                            ->select('test_name', 'reference')
                            ->get();

        return response($tests, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST,PATCH,OPTIONS');
    }
}

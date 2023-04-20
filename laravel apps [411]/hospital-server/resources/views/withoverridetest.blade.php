<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/biller_dashboard_patient_logged_in.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <header class="head"> 



        <div class="patient-info-container">
            <div class="patient-avatar">
               <img src="/img/pngegg.png" alt="">
            </div>

            <div class="patient-profile-info">
                <h1>Patient Profile</h1><br>
                <b>Name:</b><span>{{ $patient->name }}</span><br>
                <b>P_ID:</b><span>{{ $patient->pid }}</span><br>
                <b>Phone:</b><span>{{ $patient->phone }}</span><br>
                <b>Age:</b><span>{{$patient->age}}</span>

                <form action="/auth" class="patient-exit">
                    <input type="submit" value="Exit">
                </form>
            </div>
        </div>

        


        <div class="biller-info-container">
            <div class="biller-avatar">
               <img src="/img/reception_pngwing.com.png" alt="">
            </div>

            <div class="biller-profile-info">
                <h1>Reception Desk</h1><br>
                <b>Name:</b><span>{{$biller->name}}</span><br>
                <b>P_ID:</b><span>{{$biller->pid}}</span>

                <form action="/logout" class="biller-logout">
                    <input type="submit" value="Logout">
                </form>
            </div>
        </div>


    </header>









    <main class="main">

        <div class="patient-history-container">
            
            <div class="button-container">
                <button onclick="show('default-medical-history')">Default Test History</button>
                <button onclick="show('request-override')">Request Override</button>
            </div>

            <div id="default-medical-history" style="text-align: center">
                @foreach ($response->test as $test)
                ------------------------------------ <br>
                <span style="color:rgb(0, 110, 255)">Test:</span>{{$test->test}}
                <span style="color:rgb(0, 110, 255)">Reference:</span>{{$response->reference}} <br>
                
                @endforeach
            </div>

            <div id="request-override" style="display: none;">
                <form action="/overridetest" method="POST" id="override_form" style="">
                    <input type="text" id="override_key" name="override_key" placeholder="Override Key">
                    <input type="submit" value="Get Info">
                </form>
                <div>
                    @if ($override)
                    @foreach ($override as $test)
                    ------------------------------------ <br>
                    <span style="color:rgb(0, 110, 255)">Test:</span>{{$test->test_name}}
                    <span style="color:rgb(0, 110, 255)">Reference:</span>{{$test->reference}} <br>
                    
                    @endforeach
                    @else
                    <span style="color:rgb(153, 39, 39)">No Records here!</span>
                    @endif


                </div>
            </div>

        </div>









        <div class="test-registration-container">
            <h2>Test Registration Module</h2>

            <form id="form" method='post' action="/testreg" onsubmit="return validate()">
                @csrf
                <div id="test-container">

                    <datalist id="test_list">
                        @foreach ($tests as $test)
                        <option value = "{{ $test->test_name }}">
                        @endforeach
                    </datalist>

                    <div>
                        <label for="test">Test</label>
                        <input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test[]" id="test">

                        
                        <label for="reference">Reference Number</label>
                        <input type="text" autocomplete="off" name="reference[]" id="reference" required>
                    </div>
                </div>
                <button type="button" onclick="addTest()">Add Another Test</button>
                <button type="button" onclick="removeTest()">Remove Test</button>

                <br>
                <br>

                <input type="submit" value="Submit">
            </form>






        </div>

    </main>

</body>
<script>
    
function addTest(){
    if(document.getElementById("test-container").innerHTML.trim().length){
        var node = document.getElementById('test-container');
        node.insertAdjacentHTML('beforeend', '<div id="test-container"><div><label for="test">Test</label><input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test[]" id="test"><label for="reference">Reference Number</label><input type="text" autocomplete="off" name="reference[]" id="reference" required></div>');
    }
    else{
        var node = document.getElementById('test-container');
        node.insertAdjacentHTML('beforeend', '<div id="test-container"><div><label for="test">Test</label><input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test[]" id="test"><datalist id="test_list"><option value="test1"><option value="test2"><option value="test3"></datalist><label for="reference">Reference Number</label><input type="text" autocomplete="off" name="reference[]" id="reference" required></div>');
    }
}

function removeTest(){
   if(document.getElementById("test-container").innerHTML.trim().length)
   {
       document.getElementById("test-container").lastElementChild.remove();
   }

   var b = document.getElementsByName("test");
    for(var i=0; i<b.length; i++){
        for(var j=0; j<b.length; j++){
            if(b[i].value == b[j].value && i!=j && b[i].value && b[j].value){
                
                break
            }else if(b[i].value != b[j].value && i!=j && b[i].value && b[j].value){
                b[i].parentNode.style.border = ''
                b[i].parentNode.style.borderColor = ''
            }
        }
    }

    var a = document.getElementsByName("test");
    for(var i=0; i<a.length; i++){
        for(var j=0; j<a.length; j++){
            if(a[i].value == a[j].value && i!=j && a[i].value && a[j].value)
            {
                a[i].parentNode.style.border = 'solid 2px'
                a[i].parentNode.style.borderColor = 'red'
            }
        }
    }

}




function test_validation(a){
    var val = a.value;
    var obj = $("#test_list").find("option[value='" + val + "']");

    if(obj != null && obj.length > 0){
        a.style.backgroundColor = 'green';
    }
    else if(!val && obj.length == 0){
        a.style.backgroundColor = '';
    }
    else{
        a.style.backgroundColor = 'red'; 
        alert("Invalid"); 
    }


    var b = document.getElementsByName("test");
    for(var i=0; i<b.length; i++){
        for(var j=0; j<b.length; j++){
            if(b[i].value == b[j].value && i!=j && b[i].value && b[j].value){
                break
            }else if(b[i].value != b[j].value && i!=j && b[i].value && b[j].value){
                b[i].parentNode.style.border = ''
                b[i].parentNode.style.borderColor = ''
            }
        }
    }



    var a = document.getElementsByName("test");
    for(var i=0; i<a.length; i++){
        for(var j=0; j<a.length; j++){
            if(a[i].value == a[j].value && i!=j && a[i].value && a[j].value)
            {
                a[i].parentNode.style.border = 'solid 2px'
                a[i].parentNode.style.borderColor = 'red'
            }
        }
    }

    
}

























function validate(){

    var testArray = document.getElementsByName("test")
    var drugArray = document.getElementsByName("medicine")
    var testBool = true
    var drugBool = true

    testArray.forEach(element => {
        if(!element.value){
            testBool = false
        }
    });                                         //chk for test null field

    drugArray.forEach(element => {
        if(!element.value){
            drugBool = false
        }
    });                                         //chk for medicine null field

    if(!testBool || !drugBool){
        alert("Test field or Medicine field could not be left empty")
        return false
    }                                           //print message for test/medicine null field



    testArray.forEach(element => {
        if(element.style.backgroundColor == 'red' || element.parentNode.style.border){
            testBool = false
        }
    });                                         //restrict submission with invalid/duplicate test field

    drugArray.forEach(element => {
        if(element.style.backgroundColor == 'red' || element.parentNode.style.border){
            drugBool = false
        }
    });                                         //restrict submission with invalid/duplicate medicine field

    if(!testBool || !drugBool){
        return false
    }                                           









    var citizen_PID = document.getElementById("doctor_PID").innerHTML
    var hospital_name = "Apollo Super-Specialized Hospital"
    var hospital_address = '89 Winh Street, Dallas TX'
    var doctor_PID = document.getElementById("doctor_PID").innerHTML
    var doctor_name = document.getElementById("doctor_PID").innerHTML
    var doctor_designation = document.getElementById("doctor_designation").innerHTML
    var doctor_gender = document.getElementById("doctor_gender").innerHTML
    var doctor_department = document.getElementById("doctor_department").innerHTML
    var doctor_degree = document.getElementById("doctor_degree").innerHTML
    var doctor_institution = document.getElementById("doctor_institution").innerHTML
    var doctor_hotline = document.getElementById("doctor_hotline").innerHTML
    //date-time will be pushed into constructor
    //reference will be created in the server side


    var symptoms
    var test = []
    var medicine = []
    var advice
    var follow_up_date
    var medicineTemp
    var dosageTemp

    
    var a = new FormData(document.getElementById("form"))
    for (var pair of a.entries()) {

        if(pair[0] == 'symptoms'){
            symptoms = pair[1]
        }
        if(pair[0] == 'test'){
            test.push({test_name: pair[1]})
        }
        if(pair[0] == 'medicine'){
            medicineTemp = pair[1]
        }
        if(pair[0] == 'dosage'){
            dosageTemp = pair[1]
        }
        if(pair[0] == 'comment'){
            medicine.push({medicine: medicineTemp, dosage: dosageTemp, comment: pair[1]})
            medicineTemp = null 
            dosageTemp = null
        }
        if(pair[0] == 'advice'){
            advice = pair[1]
        } 
        if(pair[0] == 'follow-up-date'){
            follow_up_date = pair[1]
        }
    }

    function record_constructor(hospital_name, hospital_address, doctor_name, doctor_designation, doctor_PID, doctor_gender, doctor_department, doctor_degree, doctor_institution, doctor_hotline, symptoms, test, medicine, advice, follow_up_date) {
        this.hospital_name = hospital_name
        this.hospital_address = hospital_address
        this.doctor_name = doctor_name
        this.doctor_designation = doctor_designation
        this.doctor_PID = doctor_PID
        this.doctor_gender = doctor_gender
        this.doctor_department = doctor_department
        this.doctor_degree = doctor_degree
        this.doctor_institution = doctor_institution
        this.doctor_hotline = doctor_hotline
        
        //prescription follows
        this.symptoms = symptoms
        this.test = test
        this.medicine = medicine
        this.advice = advice
        this.follow_up_date = follow_up_date
    }

    var record = new record_constructor(hospital_name, hospital_address, doctor_name, doctor_designation, doctor_PID, doctor_gender, doctor_department, doctor_degree, doctor_institution, doctor_hotline, symptoms, test, medicine, advice, follow_up_date)

    console.log(record)



    return false
}
























// history_js_start
var divs = ["default-medical-history", "request-override", "reference-override"];
var visibleId = null;

function show(id) {
    if(visibleId !== id) {
        visibleId = id;
    } 
    hide();
    }

function hide() {
    var div, i, id;
    
    for(i = 0; i < divs.length; i++) {
        id = divs[i];
        div = document.getElementById(id);
        if(visibleId === id) {
            div.style.display = "block";
        }else{
            div.style.display = "none";
        }
    }
}



</script>
</html>
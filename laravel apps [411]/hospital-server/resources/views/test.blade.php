<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


    <header class="head"> 

        <div class="patient-profile-container">

            <div class="patient-avatar">
                <img src="pngegg.png" alt="">
             </div>
 
             <div class="patient-profile-info">
                 <h1>Patient Profile</h1><br>
                 <b>P_ID:</b><span id="citizen_PID">11111</span><br>
                 <b>Name:</b><span>placeholder</span><br>
                 <b>Gender:</b><span>placeholder</span><br>
                 <b>Age:</b><span>placeholder</span><br>
                 <b>Blood Group:</b><span>placeholder</span><br>

                
                <form action="" class="patient-logout">
                    <input type="submit" value="Exit">
                </form>
                

            </div>

                
                
        </div>

        <div class="doctor-info-container">

            <div class="doc-avatar">
               <img src="813844_people_512x512.png" alt="">
            </div>

            <div class="doctor-profile-info">
                <h1>Doctor Profile</h1><br>
                <b>Name:</b><span id="doctor_name">doctor_name</span><br>
                <b>P_ID:</b><span id="doctor_PID">doctor_PID</span><br>
                <b>Designation:</b><span id="doctor_designation">doctor_designation</span><br>
                <b>Department:</b><span id="doctor_department">doctor_department</span><br>
                <b>Degree:</b><span id="doctor_degree">doctor_degree</span><br>
                <b>Gender:</b><span id="doctor_gender">doctor_gender</span><br>
                <b>Institution:</b><span id="doctor_institution">doctor_institution</span><br>
                <b>Chamber Time:</b><span >placeholder</span><br>
                <b>Room:</b><span>placeholder</span><br>
                <b>Hotline:</b><span id="doctor_hotline">doctor_hotline</span>

                <form action="" class="doctor-logout">
                    <input type="submit" value="Logout">
                </form>

            </div>

        </div>

    </header>


    <main class="main">

        <div class="patient-history-container">
            
            <div class="button-container">
                <button onclick="show('default-medical-history')">Default Medical History</button>
                <button onclick="show('request-override')">Request Override</button>
            </div>

            <div id="default-medical-history">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. A ex minima delectus itaque quia nemo, excepturi nisi eligendi reiciendis? Eos iusto porro laudantium tempore reiciendis sint minima voluptates est dolorum nihil odio molestias consequuntur itaque amet, velit harum ex quam soluta veritatis similique. Eius ex voluptates dolorum debitis aperiam placeat dolor quia consequuntur quae eos quidem tempora quasi repellat iste autem, ipsum aut mollitia officia impedit, nesciunt distinctio. Perferendis modi consequatur unde eius, tempore fugiat nisi voluptas asperiores debitis magnam repellendus quos hic sit maiores velit, sunt earum! Iste quasi dignissimos sapiente eos perferendis id, qui ratione accusantium vero ullam!
            </div>

            <div id="request-override" style="display: none; background-color:blueviolet;">
                <form action="" id="override_form">
                    <input type="text" id="override_key" name="override_key" placeholder="Override Key">
                    <input type="submit" value="Get Info">
                </form>
            </div>

        </div>


        <div class="prescription-container">

            <h2>Prescripton Module</h2>

            <form id="form" onsubmit="return validate()">
                
                <div id="symptoms-container">
                    <label for="symptoms">Symptoms</label>
                    <textarea name="symptoms" id="symptoms" cols="98" rows="3"></textarea>
                </div>

                <div id="test-container">
                    <div>
                        <label for="test">Test</label>
                        <input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test" id="test"> 
                        <datalist id="test_list">
                        <option value="test1">
                        <option value="test2">
                        <option value="test3">
                        </datalist>
                    </div>
                </div>
                <button type="button" onclick="addTest()">Add Test</button>
                <button type="button" onclick="removeTest()">Remove Test</button>


                <div id="medicine-container">
                    <div>
                        <label for="medicine">Medicine</label>
                        <input onchange="drug_validation(this)" autocomplete="off" type="text" list="drug_list" name="medicine" id="medicine">
    
                        <datalist id="drug_list">
                            <option value="drug1">
                            <option value="drug2">
                            <option value="drug3">
                        </datalist>
                        
                        <label for="dosage">Dosage</label>
                        <select name="dosage" id="dosage">
                            <option disabled selected hidden>Set Dosage</option>
                            <option value="1-1-1">1-1-1</option>
                            <option value="1-1-0">1-1-0</option>
                            <option value="1-0-1">1-0-1</option>
                            <option value="0-1-1">0-1-1</option>
                            <option value="1-0-0">1-0-0</option>
                            <option value="0-0-1">0-0-1</option>
                            <option value="0-1-0">0-1-0</option>
                        </select>
                        
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment"></textarea>
                    </div>
                </div>
                <button type="button" onclick="addMed()">Add Medicine</button>
                <button type="button" onclick="removeMed()">Remove Medicine</button>



                <div id="advice-container">
                    <label for="advice">Advice</label>
                    <textarea id="advice" name="advice" cols="103" rows="4"></textarea>
                </div>

                
                
                <label for="follow-up-date">Follow Up Date</label>
                <input type="date" name="follow-up-date">

                <br>
                <br>
                <br>
                
                <input type="submit" value="Submit">

            </form>






        </div>

    </main>







</body>
<script>
    
function addMed(){
    if(document.getElementById("medicine-container").innerHTML.trim().length){
        var node = document.getElementById('medicine-container');
        node.insertAdjacentHTML('beforeend', '<div><label for="medicine">Medicine </label><input onchange="drug_validation(this)" autocomplete="off" type="text" list="drug_list" name="medicine" id="medicine"><label for="dosage"> Dosage </label><select name="dosage" id="dosage"><option disabled selected hidden>Set Dosage</option><option value="1-1-1">1-1-1</option><option value="1-1-0">1-1-0</option><option value="1-0-1">1-0-1</option><option value="0-1-1">0-1-1</option><option value="1-0-0">1-0-0</option><option value="0-0-1">0-0-1</option><option value="0-1-0">0-1-0</option></select><label for="comment"> Comment </label><textarea name="comment" id="comment"></textarea></div>');
    }
    else{
        var node = document.getElementById('medicine-container');
        node.insertAdjacentHTML('beforeend', '<div><label for="medicine">Medicine </label><input onchange="drug_validation(this)" autocomplete="off" type="text" list="drug_list" name="medicine" id="medicine"><datalist id="drug_list"><option value="drug1"><option value="drug2"><option value="drug3"></datalist><label for="dosage"> Dosage </label><select name="dosage" id="dosage"><option disabled selected hidden>Set Dosage</option><option value="1-1-1">1-1-1</option><option value="1-1-0">1-1-0</option><option value="1-0-1">1-0-1</option><option value="0-1-1">0-1-1</option><option value="1-0-0">1-0-0</option><option value="0-0-1">0-0-1</option><option value="0-1-0">0-1-0</option></select><label for="comment"> Comment </label><textarea name="comment" id="comment"></textarea></div>');
    }
}

function removeMed(){
   if(document.getElementById("medicine-container").innerHTML.trim().length)
   {
       document.getElementById("medicine-container").lastElementChild.remove();
   }

   var b = document.getElementsByName("medicine");
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

    var a = document.getElementsByName("medicine");
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

function addTest(){
    if(document.getElementById("test-container").innerHTML.trim().length){
        var node = document.getElementById('test-container');
        node.insertAdjacentHTML('beforeend', '<div><label for="test">Test</label><input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test" id="test"></div>');
    }
    else{
        var node = document.getElementById('test-container');
        node.insertAdjacentHTML('beforeend', '<div><label for="test">Test</label><input onchange="test_validation(this)" autocomplete="off" type="text" list="test_list" name="test" id="test"><datalist id="test_list"><option value="test1"><option value="test2"><option value="test3"></datalist></div>');
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




function drug_validation(a){
    var val = a.value;
    var obj = $("#drug_list").find("option[value='" + val + "']");
    
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


    var b = document.getElementsByName("medicine");
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



    var a = document.getElementsByName("medicine");
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












    var citizen_PID = document.getElementById("citizen_PID").innerHTML
    var hospital_name = "Apollo Super-Specialized Hospital"
    var hospital_address = '89 Winh Street, Dallas TX'
    var doctor_PID = document.getElementById("doctor_PID").innerHTML
    var doctor_name = document.getElementById("doctor_name").innerHTML
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

    function record_constructor(citizen_PID,hospital_name, hospital_address, doctor_name, doctor_designation, doctor_PID, doctor_gender, doctor_department, doctor_degree, doctor_institution, doctor_hotline, symptoms, test, medicine, advice, follow_up_date) {
        this.citizen_PID = citizen_PID
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

    var record = new record_constructor(citizen_PID ,hospital_name, hospital_address, doctor_name, doctor_designation, doctor_PID, doctor_gender, doctor_department, doctor_degree, doctor_institution, doctor_hotline, symptoms, test, medicine, advice, follow_up_date)




    fetch('http://127.0.0.1:8000/postPrescription', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(record)
    })
    .then(response => response.json())
    .then(data => {
    console.log('Success:', data);
    })
    .catch((error) => {
    console.error('Error:', error);
    });

    return false
}
























// history_js_start
var divs = ["default-medical-history", "request-override"];
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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@100;500&display=swap');


*{
    margin: 0px;
    padding: 0px;
    outline: 0px;
    border: 0px;
    font-family: 'Rokkitt', serif;
}

body{
    background-image: linear-gradient(to left bottom, #041e23, #08323e, #16475c, #2d5c7c, #4b709d);
}

.head{
    width: 100vw;
    margin-top: 50px;
    background-color: darkgrey;
}








.patient-profile-container{
    background-color:#83886c;
    height: 300px;
    width: 650px;
    display: inline-block;
    margin: 0 70 0 100px;
}

.patient-avatar{
    height: 300px;
    width: 200px;
    margin-right: 15px;
    display: inline-block;
}

.patient-avatar>img{
    height: 200px;
    margin-top: 45px;
}

.patient-profile-info{
    display: inline-block;
    vertical-align: top;
    height: 300px;
    width: 430px;
    position: relative;
}

.patient-profile-info>b{
    display: inline-block;
    width: 120px;
}

.patient-logout{
    position: absolute;
    right: 50;
    bottom: 50;
}

.patient-logout>input{
    height: 30px;
    font-size: 17px;
    width: 55px;
    border-radius: 3px;
}

.patient-logout>input:hover{
    background-color: firebrick;
    cursor: pointer;
}











.doctor-info-container{
    height: 300px;
    width: 650px;
    border-radius: 10px;
    display: inline-block;
    margin: 0 0 0 0;
    vertical-align: top;
}

.doc-avatar{
    height: 300px;
    width: 200px;
    margin-right: 15px;
    display: inline-block;
}

.doc-avatar>img{
    height: 200px;
    margin-top: 45px;
}

.doctor-profile-info{
    display: inline-block;
    position: relative;
    vertical-align: top;
    height: 300px;
    width: 430px;
}

.doctor-profile-info>b{
    display: inline-block;
    width: 120px;
}

.doctor-logout{
    position: absolute;
    right: 50;
    bottom: 50;
}

.doctor-logout>input{
    height: 30px;
    font-size: 17px;
    width: 55px;
    border-radius: 3px;
}

.doctor-logout>input:hover{
    background-color: firebrick;
    cursor: pointer;
}











.doctor-info-container{
    height: 300px;
    width: 650px;
    border-radius: 10px;
    display: inline-block;
    margin: 0 0 0 0;
    vertical-align: top;
}

.doc-avatar{
    height: 300px;
    width: 200px;
    margin-right: 15px;
    display: inline-block;
}

.doc-avatar>img{
    height: 200px;
    margin-top: 45px;
}

.profile-info{
    display: inline-block;
    vertical-align: top;
    background-color: rgb(73, 73, 112);
    height: 300px;
    width: 430px;
}

.profile-info>b{
    display: inline-block;
    width: 120px;
}










.main{
    width: 100vw;
    background-color: #67cfd6;
    margin-top: 50px;
}

.patient-history-container{
    height: 500px;
    width: 600px;
    background-color: rgb(26, 146, 80);
    display: inline-block;
    vertical-align: top;
    margin: 0 40 0 60px;
}

.prescription-container{
    width: 800px;
    display: inline-block;
    vertical-align: top;
}

.prescription-container *{
    vertical-align: top;
}

.button-container{
    text-align: center;
    letter-spacing: 80px;
}


.button-container *{
    height: 50px;
    width: 150px;
    vertical-align: top;
    border-radius: 5px;
    cursor: pointer;
}


textarea {
    resize: vertical;
}





#symptoms-container{
    margin: 15 0 15 0px;
    display:flex;
}
#symptoms-container label{
    width: 95px;
    margin:auto 0;
}


#medicine-container div{
    margin: 15 0 15 0px;
    display: inline-flex;
}
#medicine-container div label{
    margin:auto 0;
}
#medicine-container div input,
#medicine-container div select,
#medicine-container div textarea{
    margin: 0 0 0 10px;
}


#test-container div{
    margin: 15 0 15 0px;
    display: flex;
}
#test-container div label{
    width: 45px;
    margin:auto 0;
}
#test-container div input{
    width: 200px;
    height: 30px;
}


#advice-container{
    margin: 15 0 15 0px;
    display:flex;
}
#advice-container label{
    width: 60px;
    margin:auto 0;
}


</style>
</html>
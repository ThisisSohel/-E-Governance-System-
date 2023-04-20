<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/doc_dashboard.css">
</head>
<body>

    <header class="head"> 

        <div class="appointment-container">
                <form action="/apptoken" method="POST" class="appointment-form">
                    @csrf
                    <label for="appointment_token">Appointment Token</label><br>
                    <input type="text" id="appointment_token" name="appointment_token"><br>
                    <input type="submit" value="Initiate">
                </form>
        </div>

        
        <div class="doctor-info-container">

            <div class="doc-avatar">
               <img src="/img/813844_people_512x512.png" alt="">
            </div>

            <div class="profile-info">
                <h1>Doctor Profile</h1><br>
                <b>Name:</b><span>{{ $var->name }}</span><br>
                <b>P_ID:</b><span>{{ $var->pid }}</span><br>
                <b>Gender:</b><span>{{ $var->gender }}</span><br>
                <b>Designation:</b><span>{{ $var->designation }}</span><br>
                <b>Department:</b><span>{{$var->dept_name}}</span><br>
                <b>Degree:</b><span>{{$var->degree}}</span><br>
                <b>Institution:</b><span>{{$var->institution}}</span><br>
                <b>Chamber Time:</b><span>{{$var->chamber_time}}</span><br>
                <b>Room:</b><span>{{$var->room}}</span><br>
                <b>Hotline:</b><span>{{$var->hotline}}</span>


                <form action="/logout" class="doctor-logout">
                    <input type="submit" value="Logout">
                </form>

            </div>

        </div>
    </header>

    <main>


    

        
    </main>

</body>
<script src=""></script>
</html>
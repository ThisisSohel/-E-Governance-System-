<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/biller_dashboard.css">
</head>
<body>

    <header class="head"> 

        <div class="patient-access-form-container">
                <form action="/billeraccess" method="post" id="form">
                    @csrf
                    <input type="text" id="citizen_PID" name="citizen_PID" placeholder="Citizen ID" required autocomplete="off" ><br>
                    <input placeholder="Date of Birth" type="text" onfocus="(this.type='date')" id="date" required name="date_of_birth"><br>
                    <input type="submit" value="Access">
                </form>
        </div>

        
        <div class="biller-info-container">

            <div class="biller-avatar">
               <img src="/img/reception_pngwing.com.png" alt="">
            </div>



            <div class="profile-info">
                <h1>Reception Desk</h1><br>
                <b>Name:</b><span>{{ $var->name }}</span><br>
                <b>P_ID:</b><span>{{ $var->pid }}</span>

                <form action="/logout" class="biller-logout">
                    <input type="submit" value="Logout">
                </form>

            </div>

        </div>
    </header>

    <main>


    

        
    </main>

</body>
<script src="biller_dashboard.js"></script>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/lab_dashboard.css">
</head>
<body>

    <header class="head"> 

        <div class="patient-access-form-container">
                <form action="/labtokenvalidate" method="POST" onsubmit="return validate()" id="form">
                    @csrf
                    <input type="text" id="token" name="token" placeholder="Token Number" autocomplete="off" ><br>
                    <input type="submit" value="Access">
                </form>
        </div>

        
        <div class="biller-info-container">

            <div class="biller-avatar">
               <img src="/img/reception_pngwing.com (2).png" alt="">
            </div>



            <div class="profile-info">
                <h1>Lab Profile</h1><br>
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
<script src="lab_dashboard.js"></script>
</html>
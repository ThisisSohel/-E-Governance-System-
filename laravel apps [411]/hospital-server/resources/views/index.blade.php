<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Hospital Portal</title>
</head>
<body>


    <main class="body">

        <img class="image" src="/img/pngwing.com.png" height="500" alt="">

        <div class="login-div">
            <div class="form-heading">
                Hospital Portal
            </div>

            <div class="input-div">

                <form action="/auth" method="post">
                    @csrf
                    <input class="input-tag" type="text" name="personal_id" id="personal-id" placeholder="Personal ID" required>
                    
                    <input class="input-tag" type="text" name="password" id="password" placeholder="Password" required><br>

                    @if(Session::get('fail'))
                    <div style="color: rgb(158, 39, 39)">
                        {{Session::get('fail')}}
                    </div>
                    @endif


                    <input type="submit" value="Login">
                </form>

                <a href="#" >Forget Password?</a>
                
            </div>

        </div>

    </main>

</body>
</html>
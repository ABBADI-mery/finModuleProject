<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/styleLogin.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free-6.1.2-web/css/all.css') }}">
<link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">


</head>
<body> 
    <div class="container ">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="UserName">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password">

                    </div>
                    <input type="submit" value="Login" class="btn solid">

                    <h1>
                        <a href="{{ route('home') }}" class="logo"> <-BACL TO HOME<span class="span">.</span></a>
                      </h1>
                 
                </form>


                <form action="" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="UserName">
                    </div>


                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email   ">

                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password">
                    </div>
                    <input type="submit" value="Sign up" class="btn solid">

                    <h1>
                        <a href="{{ route('home') }}" class="logo"> <-BACL TO HOME<span class="span">.</span></a>
                      </h1>

                    
                </form>


            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>If you have not registered before, click</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                <img src="img/undraw_education_f8ru.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us</h3>
                    <p>If you have already registered, click</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="img/register.svg" class="image" alt="">
            </div>
        </div>
    </div>




    <script src="{{ asset('assets/js/mainLogin.js') }}"></script>
    
</body>
</html>
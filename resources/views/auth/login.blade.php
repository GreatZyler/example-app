<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/auth.css'])
</head>
<body>
<!-- Form-->
<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel one">
        <div class="form-header">
            <h1>Account Login</h1>
        </div>
        <div class="form-content">
            <form method="POST" action="{{route('login')}}">
            @error("email")
                    <p class="error">{{$message}}</p>
                    @enderror
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="username" name="email" required="required" />
                   
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required="required" />
                   

                </div>
               
                <div class="form-group">
                    <button type="submit">Log In</button>
                </div>
                <p class="dot">Don't Have An Account? <a href="{{route('register_show')}}">SignUp</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
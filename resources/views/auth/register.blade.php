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
            <form method="POST" action="{{route('register')}}">
            @csrf
                <div class="form-group">
                    <label for="username">First name</label>
                    <input type="text" id="username" name="f_name"  value="{{old('f_name')}}">
                    @error("f_name")
                    <p class="error">This Field Is Requied</p>
                    @enderror
              
                </div>
                <div class="form-group">
                    <label for="username">Second name</label>
                    <input type="text" id="username" name="s_name"  value="{{old('s_name')}}">
                    @error("s_name")
                    <p class="error">This Field Is Requied</p>
                    @enderror
                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"  value="{{old('email')}}">
                    @error("email")
                    <p class="error">{{$message}}</p>
                    @enderror
            
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"  />
                    @error("password")
                    <p class="error">{{$message}}</p>
                    @enderror
             
                   

                </div>
               
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
                <p class="dot">Don't Have An Account? <a href="{{route('login_show')}}">LogIn</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
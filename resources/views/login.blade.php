<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="YOUR-INTEGRITY-VALUE" crossorigin="anonymous">
    
    <title>LOGIN || Sagarmatha Investments Inc.</title>
    
    <style>
        body {
            background-color: #e9f0fd;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .form-container {
            width: 400px;
        }

        .btn-primary:hover {
            background-color: green;
        }

        h2 {
            text-align: center;
            font-family: 'Creepster', cursive;
            font-size: 35px;
            color: #060508;
            margin-top: 0;
            margin-bottom: 20px;
        }
        
        .fa-eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }
    </style>
    
</head>
<body>
    @if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
@endif

    <div class="container">
        <div class="form-container">
            <h2>Log In</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/welcome" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Or Username"/>       
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"/> 
                        <i class="fa-solid fa-eye" id="show-password"></i>
                    </div>     
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Login"/>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const showPassword = document.querySelector('#show-password');
        const passwordField = document.querySelector('#password');

         showPassword.addEventListener("click",function(){
            this.classList.toggle("fa-eye-slash");
            const type=passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type",type);
         })
    
    </script>
</body>
</html>

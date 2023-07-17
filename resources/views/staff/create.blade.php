<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="YOUR-INTEGRITY-VALUE" crossorigin="anonymous">
    <title>Staff</title>
    <style>
        .container {
           
        }

        .password-container {
            position: relative;
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
    <div>
        @if(session()->has('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
         @endif
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
  @endif
    <div class="container">
        <form action="{{route('home')}}" method="GET">
            @csrf
            <div class="text-end mb-3">
                <a href="{{route('home')}}" class="btn btn-primary">Home</a>
            </div>
        </form>
        <h1> Create Staff</h1>
        <form action="{{route('staffStore')}}" method="POST">
          @csrf
          @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror       
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror       
            </div>
          
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" placeholder=""/>
                @error('dob')
                    <span class="text-danger">{{ $message }}</span>
                @enderror       
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address"/>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror       
            </div>


            <div class="mb-3 password-container">
                <label for="password" class="form-label">Password</label>
                <div class="password-container">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                  <i class="fa-solid fa-eye" id="show-password"></i>  
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror     
            </div>
            
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <div class="password-container">
                    <input type="password" class="form-control" name="confirmpassword" id="confirm password" placeholder="Confirm password"/>
                    <i class="fa-solid fa-eye" id="show-confirm-password"></i>
                </div>
                @error('confirmpassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror  
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>  
                  
            </div>

            <div class="form-group">
                <label for="dept_id">Department:</label>
                <select class="form-control" id="dept_id" name="dept_id" required>
                    @foreach($department as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Create"/>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript (optional) -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const showPassword = document.querySelector('#show-password');
    const showConfirmPassword = document.querySelector('#show-confirm-password');
    const passwordField = document.querySelector('#password');
    const confirmPasswordField = document.querySelector('#confirmpassword');

    showPassword.addEventListener("click", function() {
        this.classList.toggle("fa-eye-slash");
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
    });

    showConfirmPassword.addEventListener("click", function() {
        this.classList.toggle("fa-eye-slash");
        const type = confirmPasswordField.getAttribute("type") === "password" ? "text" : "password";
        confirmPasswordField.setAttribute("type", type);
    });
  </script>
 
</body>
</html>

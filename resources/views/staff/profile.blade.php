<!DOCTYPE html>
<html>
<head>
    <title>Staff Edit Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f7f6;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
            color: #336699;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #336699;
            border-color: #336699;
        }

        .btn-primary:hover {
            background-color: #3ebd70;
            border-color: #3ebd70;
        }
        .changepassword{
            position: absolute;
            background-color: #336699;
            border-color: #336699;
            bottom: 45px;
            right: 15px;
            color: white;
            border-radius:5px;

        }
        .btn-changepassword:hover {
            background-color: #3ebd70;
            border-color: #3ebd70;
            border-radius:5px;
            
        }
        .btn-changepassword{
            color: white;
            border-radius:5px;

        }
        
    </style>
</head>
<body>
    <div class="container">
        <div>
            @if(session()->has('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
             @endif
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('staffhome')}}" class="btn btn-primary">Back</a>
        </div>
        <h2>My Profile</h2>
        <form method="post" action="{{ route('staff.updateProfile') }}">
            @csrf
            @method('put')
            
            {{-- @dd({{ session('staff') }}) --}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value=" {{ Auth::user()->name }}" required>

            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"  readonly>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" value="{{ Auth::user()->dob }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
            </div>
            
            <div class="form-group">
                <label for="department_id">Department Name:</label>
                <input type="text" class="form-control" id="dept_id" name="dept_id" value="{{ $departmentName }}" readonly>
            </div>
             
            
            <div class="center-btn">
                 <input type="submit" class="btn btn-primary" value="Update"/>
            </div>
            {{-- <button type="submit" class="btn btn-primary"> Edit</button> --}}
        </form>
         <br>
        
    
    </div>
</body>
</html>
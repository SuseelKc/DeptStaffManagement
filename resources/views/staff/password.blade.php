<!DOCTYPE html>
<html>
<head>
    <title>Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f7f6;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
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

        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input[type="password"]:focus {
            border-color: #336699;
        }

        .btn-primary {
            background-color: #336699;
            border-color: #336699;
        }

        .btn-primary:hover {
            background-color: #3ebd70;
            border-color: #3ebd70;
        }

        .savepassword {
            position: absolute;
            background-color: #336699;
            border-color: #336699;
            bottom: 10px;
            right: 36%;
            color: white;
            border-radius: 5px;
        }

        .btn-savepassword:hover {
            background-color: #3ebd70;
            border-color: #3ebd70;
            border-radius: 5px;
        }

        .btn-savepassword {
            color: white;
            border-radius: 5px;
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
        <h2>Change Password</h2>
        <form method="post" action="{{route('ChangePassword')}}">
            @csrf
            @method('put')
           
            <div class="form-group">
                <label for="CurrentPassword">Current Password:</label>
                <input type="password" name="CurrentPassword" required>
            </div>

            <div class="form-group">
                <label for="NewPassword">New Password:</label>
                <input type="password" name="NewPassword" required>
            </div>

            <div class="form-group">
                <label for="ConfirmPassword">Confirm New Password:</label>
                <input type="password" name="ConfirmPassword" required>
            </div>
            
            <br> 
            <div class="savepassword">
                <input type="submit" class="btn btn-savepassword"value="Save Password"/>
            </div>

        </form>
           

    </div>
</body>
</html>

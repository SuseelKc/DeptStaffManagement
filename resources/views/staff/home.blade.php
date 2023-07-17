<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      background-color: #c4d7d3;
      font-family: 'Arial', sans-serif;
    }

    .heading {
      position: absolute;
      top: 20px;
      left: 20px;
      margin: 0;
    }

    .logout-btn {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .logout-btn button {
      background-color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      color: #555555;
      text-transform: uppercase;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .logout-btn button:hover {
      background-color: #3ebd70;
      color: #ffffff;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    h1 {
      font-family: 'Pacifico', cursive;
      font-size: 36px;
      color: #336699;
      margin-bottom: 30px;
      text-align: center;
    }
    
    .btn-creepy {
      background-color: #ffffff;
      border: none;
      padding: 15px 30px;
      font-size: 18px;
      font-weight: bold;
      color: #555555;
      text-transform: uppercase;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
      margin-bottom: 10px;
      width: 100%;
    }
    
    .btn-creepy:hover {
      background-color: #3ebd70;
      color: #ffffff;
    }
    
    .btn-container {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
    }
    
    .btn-container form {
      width: 200px;
    }
    .logout-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      
    }
    
    .contact-btn {
      position: absolute;
      top: 20px;
      right: 150px;
    }

    .contact-btn button {
      background-color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      color: #3ebd70;
      text-transform: uppercase;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .contact-btn button:hover {
      background-color: #3ebd70;
      color: #ffffff;

    }
    .profile-btn {
      position: absolute;
      top: 20px;
      right: 290px;
    }

    .profile-btn button {
      background-color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      color: #555555;
      text-transform: uppercase;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .profile-btn button:hover {
      background-color: #3ebd70;
      color: #ffffff;
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
  <h1 class="heading">Hey {{ Auth::user()->name }}! Welcome</h1>
  <div class="profile-btn">
    <div class="btn-group">
      <button type="button" class="btn btn-danger">{{ Auth::user()->name }}</button>
      <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('profile')}}" class="btn btn-success dropdown-toggle dropdown-toggle-split">Update Profile</a>
        <a class="dropdown-item" href="{{route('password')}}" class="btn btn-success dropdown-toggle dropdown-toggle-split">Change Password</a>
        
      </div>
    </div>

   </div>

  {{-- Contact btn --}}
  <div class="contact-btn">
    <button href="{{route('contactpage')}}">
      <a href="{{route('contactpage')}}" >Contact</a>
    </button> 
   </div>
 
  {{-- logout  btn--}}
  <div class="logout-btn">
   <button href="/logout">
     <a href="/logout" >Log Out</a>
   </button> 
  </div>

  <div class="container">
    <h1>Welcome to our company.</h1>

    <div class="btn-container">

      <form action="{{route('viewdep')}}" method="GET">
        @csrf
        <button class="btn-creepy">View Department</button>
      </form>
    </div>

    <div class="btn-container">
     
      <form action="{{route('viewstaff')}}" method="GET">
        @csrf
        <button class="btn-creepy">View Staff</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS (optional, if you need any JavaScript functionality) -->
  {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

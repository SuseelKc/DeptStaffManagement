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
  </style>
</head>
<body>
  <h1 class="heading">Hey Admin! Welcome</h1>
  <div class="logout-btn">
    <form action="/logout" method="GET">
      @csrf
      <button class="btn btn-danger">Log Out</button>
    </form>
  </div>

  <div class="container">
    <h1>Welcome to our company.</h1>

    <div class="btn-container">
      <form action="/create/department" method="GET">
        @csrf
        <button class="btn-creepy">Create Department</button>
      </form>

      <form action="{{route('details')}}" method="GET">
        @csrf
        <button class="btn-creepy">View Department</button>
      </form>
    </div>

    <div class="btn-container">
      <form action="/create/staff" method="GET">
        @csrf
        <button class="btn-creepy">Create Staff</button>
      </form>

      <form action="/staff/details" method="GET">
        @csrf
        <button class="btn-creepy">View Staff</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS (optional, if you need any JavaScript functionality) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

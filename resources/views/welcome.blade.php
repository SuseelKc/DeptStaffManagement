<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sagarmatha Investments Inc.- Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Custom styles */
    body {
      background-color: #28478080;
      font-family: 'Arial', sans-serif;
    }
    
    .jumbotron {
      background-color: #1d90be;
      text-align: center;
      margin-top: 200px;
      padding: 30px;
      border-radius: 20px;
    }
    
    .jumbotron h1 {
      font-family: 'Pacifico', cursive;
      font-size: 48px;
      color: #f0f7f6;
    }
    
    .jumbotron p {
      font-size: 24px;
      color: #f0f7f6;
    }
    
    /* Center align the button */
    .center-btn {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    
    /* Dark green button on hover */
    .btn-primary:hover {
      background-color: #1b6f4f;
      border-color: #37ac7f;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="/login" method="GET">
      @csrf
    <div class="jumbotron">
      <h1 class="display-4">Welcome to Sagarmatha Investments Inc.</h1>
      <p class="lead">Agressive Investment! Agressive Returns!</p>
      
      <div class="center-btn">
        <input type="submit" class="btn btn-primary" value="Login"/>
      </div>
      
    </div>
    </form>
  </div>

  <!-- Bootstrap JS (optional, if you need any JavaScript functionality) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Profile Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    
    h1 {
      color: #333;
    }
    
    form {
      display: inline-block;
      text-align: left;
      padding: 40px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin: 0 auto;
      width: 80%;
      max-width: 600px;
    }
    
    form label {
      display: block;
      margin-bottom: 15px;
      font-weight: bold;
      font-size: 18px;
    }
    
    form input,
    form select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      font-size: 16px;
    }
    
    form input[type="submit"],
    button {
      background-color: #fff;
      color: #333;
      cursor: pointer;
      transition: background-color 0.3s;
      border: 1px solid #ccc; /* Add border */
      padding: 10px 20px;
      border-radius: 5px;
    }
    
    form input[type="submit"]:hover,
    button:hover {
      background-color: green;
      color: #fff;
    }
    
    button {
      margin-top: 10px; /* Add margin between the buttons */
    }
  </style>
</head>
<body>
  <h1>Profile Information</h1>
  
  <form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob">

    <label for="address">Address:</label>
    <input type="text" id="address" name="address">

    <label for="department">Department:</label>
    <select id="department" name="department">
      <option value="IT">IT</option>
      <option value="Sales">Sales</option>
      <option value="Marketing">Marketing</option>
      <option value="Finance">Finance</option>
    </select>

    <input type="submit" value="Save Changes">
  </form>

  <br>

  <button onclick="changePassword()">Change Password</button>

  <script>
    function changePassword() {
      // Add your logic here to handle password change functionality
      alert("Change password button clicked!");
    }
  </script>
</body>
</html>

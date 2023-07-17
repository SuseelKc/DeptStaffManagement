<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Department||Edit</title>
</head>
<body>
    <h1> Edit a Department</h1>
    <form method="post" action="{{route('updatedepartment',['department'=>$department])}}" >
    @csrf 
    @method('put')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{$department->name}}"/>       
    </div>

    <div class="form-group">
        <label for="short_code">Short Code</label>
        <input type="text" class="form-control" name="short_code" id="short_code" placeholder="short_code" value="{{$department->short_code}}"/>       
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="Update"/>
    </div>
    </form>

    <!-- Add Bootstrap JavaScript (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

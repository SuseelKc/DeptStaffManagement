<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
    <title>Department</title>
</head>
<body>
    <form method="GET" action="{{route('home')}}" enctype="multipart/form-data">
            <div class="text-end mb-3">
                <a href="{{route('home')}}" class="btn btn-primary">Home</a>
            </div>
    </form>
    <div class="container">
        <h1> Create Department</h1>
        <form action="/create/department/store" method="POST">
          @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name"/>       
            </div>

            <div class="mb-3">
                <label for="short_code" class="form-label">ShortCode</label>
                <input type="text" class="form-control" name="short_code" id="short_code" placeholder="short_code"/>       
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Create"/>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

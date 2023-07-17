<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
    <title>Departments||Lists</title>
</head>
<body>
    <form method="GET" action="{{route('home')}}" enctype="multipart/form-data">
        <div class="text-end mb-3">
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
</form>
    <div class="container">
        <h1>Department</h1>
        <div>
            @if(session()->has('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
             @endif
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Edit</th>
                        <th>Delete</th>
                         
                    </tr>
                </thead>
                <tbody>
                    @foreach($department as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->short_code }}</td>
                        <td>
                            <a href="{{ route('department.edit', ['department' => $department]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('destroy', ['department' => $department]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger" />
                            </form>
                        </td>
               
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

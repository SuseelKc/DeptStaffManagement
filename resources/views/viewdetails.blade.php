<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
    <title>Staff||Lists</title>
</head>
<body>
    <form method="GET" action="{{route('home')}}" enctype="multipart/form-data">
        <div class="text-end mb-3">
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
</form>
    <div class="container">
        <h1>Staff</h1>
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
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Address</th>
                        {{-- <th>Password</th> --}}
                        <th>Status</th>
                        <th>Department Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($staff as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->short_code }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->dob }}</td>
                        <td>{{ $staff->address }}</td>
                        {{-- <td>
                            <span title="{{ $staff->password }}">{{ Str::limit($staff->password, 10) }}</span>
                        </td> --}}
                        {{-- <td>{{ $staff->password }}</td> --}}
                        <td>{{ $staff->status }}</td>
                        <td>{{ $staff->department->name }}</td>
                        <td>
                            <a href="{{ route('staff.edit', ['staff' => $staff]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        
                        
                        <td>
                            <form method="post" action="{{ route('deleteStaff', ['staff' => $staff]) }}">
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Staff||Edit</title>
</head>
<body>
    <h1> Edit a Staff</h1>
    <form method="post" action="{{route('updatestaff',['staff'=>$staff])}}" >
    @csrf 
    @method('put')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{$staff->name}}"/>       
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{$staff->email}}" readonly/>       
    </div>

    <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="date" class="form-control" name="dob" id="dob" placeholder="D.O.B" value="{{$staff->dob}}"/>       
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{$staff->address}}"/>       
    </div>


    <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status">
            <option value="active" {{ $staff->status === 'active' ? 'selected' : ''}}>Active</option>
            <option value="inactive" {{ $staff->status === 'active' ? 'selected' : ''}}>Inactive</option>
          </select> 
    
    </div>

    <div class="form-group">
        <label for="dept_id">Department:</label>
        <select class="form-control" id="dept_id" name="dept_id" required>
            @foreach($department as $department)
                <option value="{{$department->id}}" {{ $staff->dept_id == $department->id ? 'selected' : ''}}>
                {{$department->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="Update"/>
    </div>
    </form>

    <!-- Add Bootstrap JavaScript (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



{{-- 
<label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active" {{ $department->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $department->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select> --}}
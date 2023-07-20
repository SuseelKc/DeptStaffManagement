<?php

namespace App\Http\Controllers;


use session;
use App\Models\Staff;
use App\Mail\SendEmail;
use App\Jobs\EmailQueue;
use App\Jobs\SendEmailJob;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {

        return view('login');
    }

   

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if ($credentials['email'] === 'admin' && $credentials['password'] === 'admin') {
            // Admin authentication successful
            return view('home');
        } else {
            if (Auth::attempt($credentials)) {

                $user = Auth::user();
                //change
                // session()->regenerate();
                session(['generated' => true]);

                $user->last_session = session()->getId();
                 
 

                // Check if the user is an instance of the Staff model
                if ($user instanceof Staff) {
                    // Generate a new session token and store it in the session
                    $sessionToken = Str::random(60);
                    $request->session()->put('session_token', $sessionToken);
    
                    // Update the session_token column in the staff table
                    $user->update(['session_token' => $sessionToken]);
                }
    
                // Redirect to the staff member's dashboard or homepage
                return view('staff.home');
            } else {
                // Invalid email or password
                return back()->withInput()->withErrors('Invalid email or password');
            }
        }
    }


    public function createPage()
    {
        return view('home');
    }

    public function createDepartment()
    {
        // $department = Department::all();
        return view('department.create');
        //['department' => $department]);
    }

    public function createStaff(Department $department)
    {
        $department = Department::all();
        return view(
            'staff.create',
            compact('department')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'short_code' => 'required'
        ]);

        $newdepartment = Department::create($data);

        return redirect(route('details'))->with(
            'success',
            "Added new department"
        );
    }
    public function showDep()
    {
        $department = Department::all();

        return view('details', ['department' => $department]);
    }

    //creating delete function
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect(route('details'))->with('success', 'Depatment Deleted!');
    }

    public function goinghomepage()
    {

        return view('home');
    }


    public function staffStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required',
            'status' => 'required',
            'dept_id' => 'required',
        ]);

        if ($data['password'] === $data['confirmpassword']) {
            // Hashing the password
            $hashPassword = Hash::make($data['password']);
            // Replace the plain password with hashed password
            $data['password'] = $hashPassword;

            // -------------------------------
            // Adding shortcodes to the staff from the shortcode of department 
            $department = Department::findOrFail($data['dept_id']); // Retrieve the department
            $staffCount = Staff::where('dept_id', $department->id)->count(); // Count the number of staff in the department

            $shortCode = $department->short_code . sprintf('%02d', $staffCount + 1);
            $data['short_code'] = $shortCode;
            // -------------------------------

            $newstaff = Staff::create($data);

            // Dispatch the email sending job to the queue
            SendEmailJob::dispatch($request->email, $request->name);

            return redirect(route('viewdetails'))->with(
                'success',
                "Added new Staff"
            );
        } else {
            return redirect(route('staff.create'))->with(
                'success',
                "Password and Confirm Password do not match!"
            );
        }
    }
    public function showStaff()
    {
        $staff = Staff::all();
        return view('viewdetails', ['staff' => $staff]);
    }

    public function deleteStaff(Staff $staff)
    {
        $staff->delete();

        return redirect(route('viewdetails'))->with('success', 'Staff Deleted!');
    }
    public function viewstaff()
    {
        if (Auth::check()) {
        $DepId = Auth::user()->dept_id;
        $staff = Staff::where('dept_id', $DepId)->get();
        return view('staff.viewdetails', ['staff' => $staff]);
        }
        else {
            return redirect()->route('login')->with('message', 'Please log in session expired!');
        }
    }
    public function viewdep()
    {
        if (Auth::check()) {
        $department = Department::all();

        return view('department.details', ['department' => $department]);
       }
       else {
        return redirect()->route('login')->with('message', 'Please log in session expired!');
    }


    }
    public function staffhome()
    {
        return view('staff.home');
    }
    public function editdepartment(Department $department)
    {
        return view('department.editdepartment', ['department' => $department]);
    }
    public function updatedepartment(Department $department, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'short_code' => 'required'
        ]);
        $department->update($data);
        return redirect(route('updateddep'))->with(
            'success',
            'Department Updated! '

        );
    }
    public function updateddep()
    {
        $department = Department::all();
        return view('details', ['department' => $department]);
    }


    public function editstaff(Staff $staff, Department $department)
    {
        $department = Department::all();
        return view('staff.editstaff', ['staff' => $staff], compact('department'));
    }
    public function updatestaff(Staff $staff, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'status' => 'required',
            'dept_id' => 'required',
        ]);
        $staff->update($data);

        return redirect(route('updatedstaff'))->with(
            'success',
            'Staff Updated! '
        );
    }

    public function updatedstaff()
    {
        $staff = Staff::all();
        // return view('viewdetails');
        return view('viewdetails', ['staff' => $staff]);
    }
    
    public function showProfile()
    {

        if (Auth::check()) {
            $username = Auth::user();
            $departmentName = Department::where('id', $username->dept_id)->value('name');
            return view('staff.profile', compact('username', 'departmentName'));
        } else {
            return redirect()->route('login')->with('message', 'Please log in session expired!');
        }
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'address' => 'required',
        ]);

        $staff = Staff::find(Auth::id()); // Retrieve the authenticated user using their ID

        $staff->update([
            'name' => $validatedData['name'],
            'dob' => $validatedData['dob'],
            'address' => $validatedData['address'],
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    public function password()
    {

        return view('staff.password');
    }
}

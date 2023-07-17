<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\TextUI\Help;
use App\Models\Staff;


class PasswordController extends Controller
{

    public function ChangePassword(Request $request)
    {

        $credentials = $request->only('CurrentPassword', 'NewPassword', 'ConfirmPassword');

        if (($credentials['CurrentPassword'] === $credentials['NewPassword'])) {
            if (($credentials['CurrentPassword'] === $credentials['NewPassword']) && ($credentials['CurrentPassword'] === $credentials['ConfirmPassword'])) {

                return redirect(route('password'))->with('success', 'Current and new password are same!');
            } else {

                return redirect(route('password'))->with('success', 'New and Confirm do not match!');
            }
        } else {

            if (($credentials['CurrentPassword'] !== $credentials['NewPassword'])) {
                if ($credentials['NewPassword'] !== $credentials['ConfirmPassword']) {
                    return redirect(route('password'))->with('success', 'New and confirm do not match!');
                } else {
                    $staffid = staff::find(Auth::id());

                    if (
                        Hash::check($credentials['CurrentPassword'], Auth::user()->password)
                        && $credentials['NewPassword'] === $credentials['ConfirmPassword']
                    ) {
                        // Perform the password change below//

                        $hashedPassword = Hash::make($credentials['ConfirmPassword']); //hash performed
                        $credentials['ConfirmPassword'] = $hashedPassword; //hash password stored in variable 
                        $staffid->update(['password' => $credentials['ConfirmPassword']]); //updated the table password by using id
                        return redirect(route('logout'))->with('success', 'Password Updated!');
                    } else {
                        return redirect()->route('password')->with(
                            'success',
                            'Current password Invalid!'
                        );
                    }
                }
            }
        }
    }
}

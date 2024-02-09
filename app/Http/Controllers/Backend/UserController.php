<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function ViewUser()
    {
       
        $users = User::with('role')->get();
        return view('admin.backend.users.view_user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateUser()
    {
        return view('admin.backend.users.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StoreUser(Request $request)
    {
         
        
        $user_id = User::insertGetId([

        'name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id,
        'password' => Hash::make($request->password), // Encrypt the password
        'gender' => $request->gender,
        'created_by' => auth()->user()->name,
        

        'created_at' => Carbon::now(),   

            ]);

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view-user')->with($notification);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditUser($id)
    {
        $user = User::find($id);
        return view('admin.backend.users.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id), // Ignore the current user's email
            ],
            'role_id' => 'required|numeric|in:1,2,3,4', // Validate the role_id
            'password' => 'nullable|string|min:8', // Password is optional during update
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->gender = $request->gender;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $notification = [
            'message' => 'User updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('view-user')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteUser($id)
    {
       if(auth()->user()->id == $id){
            abort(401);
       }
       $user = User::find($id);
       $user->delete();
       
        return redirect()->route('view-user')->with('message','User Deleted Successfully');

    }

    public function UserChangePassword()
    {
        return view('admin.backend.users.change_password');
    }

    public function UserUpdatePassword(Request $request)
{
    $request->validate([
        'password' => 'nullable|string|min:8',
    ]);

    // Retrieve the authenticated user
    $user = auth()->user();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Update the password if provided in the request
    if ($request->has('password')) {
        $user->password = bcrypt($request->password);
        $user->save();
    }
    $notification = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    
}


    
}

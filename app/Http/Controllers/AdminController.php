<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    }// End Method


    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id; //collect user data from database
        $profileData = User::find($id); //Laravel Eloquent
        return view('admin.admin_profile_view',compact('profileData'));
    } //End Method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id; //collect user data from database
        $data = User::find($id); //Laravel Eloquent
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){

        $id = Auth::user()->id; //collect user data from database
        $profileData = User::find($id); //Laravel Eloquent
        return view('admin.admin_change_password',compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request){

        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Match The old password
        if(!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        };

        //update the password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Passord change successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function AllAgent(){
        $allagent = User::where('role','agent')->get();
        return view('backend.agentuser.all_agent',compact('allagent'));
    }

    public function AddAgent(){
        return view('backend.agentuser.add_agent');
    }

    public function StoreAgent(Request $request){

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'status' => 'active',
            'role' => 'agent',
            ]);

            $notification = array(
                'message' => 'Agent Successfully Created',
                'alert-type' => 'success'
            );

            return redirect()->route('all.agent')->with($notification);
    }

    public function EditAgent($id){
        $allagent = User::findOrFail($id);
        return view('backend.agentuser.edit_agent',compact('allagent'));
    }

    public function UpdateAgent(Request $request){

        $user_id = $request->id;

        User::findOrFail($user_id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ]);

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);
    }


    public function DeleteAgent(Request $request){
        $user_id = $request->id;
        User::findOrFail($user_id)->delete();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function changeStatus(Request $request){

        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status Change Successfully']);

      }// End Method


}

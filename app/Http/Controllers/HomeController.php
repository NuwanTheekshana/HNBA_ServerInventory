<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function registration(Request $request)
    {
        return view('auth.register');
    }

    public function user_registration(Request $request)
    {
        $epf = $request->epf;
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $premission = $request->premission;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

         $errors = [
         'epf.max' => 'EPF No may not be greater than 6 characters.',
         'epf.min' => 'EPF No must be at least 2 characters.',
         'epf.required' => 'EPF No is Required.',
         'fname.required' => 'Name is Required.',
         'fname.max' => 'Description may not be greater than 30 characters.',
         'lname.required' => 'Name is Required.',
         'lname.max' => 'Description may not be greater than 30 characters.',
         'email.required' => 'Email is Required.',
         'premission.required' => 'Email is Required.',
         'password.required' => 'Password is Required.',
         'password_confirmation.required' => 'Password Confirmation is Required.',
         'password.min' => 'Password must be at least 8 characters.',

         'epf.unique' => 'EPF No has already been taken.',
         'email.unique' => 'Email address has already been taken.',
         ];


         $this->validate($request, [
         'epf' => 'required|max:6:min:2|unique:users',
         'fname' => 'required|max:30',
         'lname' => 'required|max:30',
         'email' => 'required',
         'premission' => 'required',
         'password' => 'required|min:8|confirmed',
         ],$errors);

         

         $name = $fname." ".$lname;
         $username = $fname.".".$lname;
         $password = Hash::make($password);

         $new_user = new User();
         $new_user->epf = $epf;
         $new_user->fname = $fname;
         $new_user->lname = $lname;
         $new_user->name = $name;
         $new_user->username = $username;
         $new_user->email = $email;
         $new_user->password = $password;
         $new_user->premission = $premission;
         $new_user->save();

         return redirect()->back()->with('success', 'User Registration Successfully..!');

    }

    public function all_users()
    {
        $allusers = User::where('Status', '1')->get();
        return view('alluser')->with('allusers', $allusers);
    }

    public function update_user_details(Request $request)
    {
        $id = $request->update_user_id;
        $epf = trim($request->epf);
        $update_fname = trim($request->update_fname);
        $update_lname = trim($request->update_lname);
        $update_premission = trim($request->update_premission);
        $email = trim($request->email);



        $errors = [
        'epf.max' => 'EPF No may not be greater than 6 characters.',
        'epf.min' => 'EPF No must be at least 2 characters.',
        'epf.required' => 'EPF No is Required.',
        'update_fname.required' => 'Name is Required.',
        'update_fname.max' => 'Description may not be greater than 30 characters.',
        'update_lname.required' => 'Name is Required.',
        'update_lname.max' => 'Description may not be greater than 30 characters.',
        'update_premission.required' => 'Company is Required.',
        'email.required' => 'Email is Required.',

        'epf.unique' => 'EPF No has already been taken.',
        'email.unique' => 'Email address has already been taken.',
        ];


        $this->validate($request, [
        'epf' => 'required|max:6:min:2',
        'update_fname' => 'required|max:30',
        'update_lname' => 'required|max:30',
        'email' => 'required',
        'update_premission' => 'required',
        ],$errors);

        $userfind = User::find($id);
        $epfmatch = $userfind->epf;
        $emailmatch = $userfind->email;


        if ($epf != $epfmatch) {

        $this->validate($request, [
        'epf' => 'unique:users',
        ],$errors);
        }

        if ($email != $emailmatch) {
        $this->validate($request, [
        'email' => 'unique:users',
        ],$errors);
        }

        $name = $update_fname." ".$update_lname;
        $username = $update_fname.".".$update_lname;

        $userfind->epf = $epf;
        $userfind->fname = $update_fname;
        $userfind->lname = $update_lname;
        $userfind->name = $name;
        $userfind->username = $username;
        $userfind->email = $email;
        $userfind->premission = $update_premission;
        $userfind->update();


        return redirect('all_users')->with('success','User Details update successfully..!');

    }

    public function update_user_pass(Request $request)
    {
        $id = $request->id;
        $password = $request->update_password;
        $cpassword = $request->update_cpassword;

        $password = Hash::make($password);

        $change_password = User::find($id);
        $change_password->password = $password;
        $change_password->update();

        return response()->json(['success'=>'Password Change Successfully..!', 'pass' => $id]);

    }

    public function remove_user(Request $request)
    {
        $id = $request->id;

        $remove_user = User::find($id);
        $remove_user->Status = "0";
        $remove_user->update();

        return response()->json(['success'=>'User Account Removed..!']);
    }
}

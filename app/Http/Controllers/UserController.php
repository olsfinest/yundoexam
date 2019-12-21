<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use DB;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Create A User
   
    public function storeUser(Request $req) {

        $req->validate([

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['numeric', 'string', 'max:9999'],
            'contact_phone_number' => ['required', 'regex:/^(09|\+639)\d{9}$/'],            
            'username' => ['required', 'string', 'max:255' , 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:password_confirm'],
            'password_confirm' => ['required', 'string', 'min:8', 'same:password'],
           

        ]);
 

        $data = new User();
        
        $data->first_name = $req->first_name;

        $data->last_name = $req->last_name;

        $data->address = $req->address;

        $data->postcode = $req->postcode;

        $data->contact_phone_number = $req->contact_phone_number;

        $data->username = $req->username;

        $data->email = $req->email;

        $data->password = Hash::make($req->password);

        $data->save();

        return $data;
    
    }

    // Update A User

    public function updateUser(Request $req , $id) {

        $req->validate([

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['numeric', 'string', 'max:9999'],
            'contact_phone_number' => ['required', 'regex:/^(09|\+639)\d{9}$/'],            
            'username' => ['required', 'string', 'max:255' , Rule::unique('users')->ignore($id)  ],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id) ],
            'password' => ['required', 'string', 'min:8', 'same:password_confirm'],
            'password_confirm' => ['required', 'string', 'min:8', 'same:password'],
           
        ]);

        $user = User::where ('id', $id)->first();

        $user->first_name = $req->first_name;

        $user->last_name = $req->last_name;

        $user->address = $req->address;

        $user->postcode = $req->postcode;

        $user->contact_phone_number = $req->contact_phone_number;

        $user->username = $req->username;

        $user->email = $req->email;
       

        if( strlen($req->password) < 60 || strlen($req->password_confirm) < 60) {

            $user->password = Hash::make($req->password);

        } 

        $user->save();

        return $user;

    }
    
    // Get All User Except Admin
    
    public function getUser(Request $req) {

        $users = DB::table('users')->where('is_admin', 0)->get();
     
        return response()->json([

            'users'=> $users,           
            'message'=> 'User has been created!'

        ]);


    }

    // Get Single User Data for adding on Edit User


    public function getSingleUser(Request $req , $id) {


        $user = DB::table('users')->where('id', $id)->limit(1)->get();
       
        return response()->json([

            'user'=> $user,           
            'message'=> 'good'

        ]);


    }

    // A Database to delete a many users in all checked checkbox on vue


    public function deleteManyUsers($ids)  {

        $deleteall = (explode(",",$ids));

        if (is_array($deleteall))   {

          User::destroy($deleteall);

        }

        else {

           User::findOrFail($ids)->delete();

        }

    }


}

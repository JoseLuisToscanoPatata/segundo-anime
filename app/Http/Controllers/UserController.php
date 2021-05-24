<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class UserController extends Controller
{


        /**
         * Register a new user in the database
         *  @param  \Illuminate\Http\Request  $request New user info
         * 
         * @return \Illuminate\Http\Response
         */

     public function register(Request $request) {
        
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "email"  =>  "required|email",
            "password"  =>  "required|confirmed"
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $inputs["password"] = Hash::make($request->password);

        $user   =   User::create($inputs);
        $user->role = "user"; //Cada usuario será por defecto un no-admin
        $user->save();

        if(!is_null($user)) {
            return response()->json(["status" => "success", "message" => "Success! registration completed", "data" => $user]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Registration failed! :("]);
        }       
    }

    /**
     * Undocumented function
     *
     * @param Request $request Email and password of the user you want to log in
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["status" => "failed", "message" => "Failed! No user found with this email :("]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json(["status" => "success", "login" => true, "token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! invalid password"]);
        }
    }

    /**
     * Get the user info of the authenticated user you call the method from
     *
    * @return \Illuminate\Http\Response
     */
    public function user() {
        $user = Auth::user();

        if(!is_null($user)) { 
            return response()->json(["status" => "success", "data" => $user]);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Whoops! no user found"]);
        }    
         
    }
    
    /**
     * Obtains a list of all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role=="admin") {

            $users = User::get();

            if(count($users) > 0) {
                return response()->json(["status"=>"success","data"=>$users],200);
            } else {
                return response()->json(["status"=>"failed","message"=>"No users found :("],404);
            } 
        
        }else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
        }
    }

    /**
     * Obtains the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

         if(!is_null($user)) {
            return response()->json(["status"=>"success","data"=>$user],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }


    /**
     * Update the user role from user to admin or viceversa.
     *
     * @param  int  $id Database ip of the user you want to update
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user = User::find($id);

        if(!is_null($user)) {

            if($id != Auth::user()->id) {

                if(Auth::user()->role == "admin") {

                    if($user->role == "admin") {
                        $user->role = "user";
                
                    } else {
                        $user->role = "admin";
                    }
                } else {
                    return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
                }
                
                $user->save();
                return response()->json(["status"=>"success","message"=>"User role changed successfully :)"],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant change your own permissions :("],403);
            }
        
        }  else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id Database ip of the user you want to destroy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if(Auth::user()->role=="admin" && Auth::user()->id != $id) {

            if(!is_null($user)) {
                $user->delete();

                $user->delete();
                return response()->json(["status"=>"success","message"=>"User deleted successfully"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"No user found :("],404);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
        }       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

/**
 * @group User
 * 
 * API Endpoints for working with users, as well as registering and login
 */

class UserController extends Controller
{


        /**
         * Register
         * 
         *  @unauthenticated
         * 
         * Register a new user in the database
        * @bodyParam   email  string  required  The email of the  user. Example: jl.toscano4@hotmail.es
        * @bodyParam   password    string  required    The password of the  user.   Example: patata12
        * @bodyParam   password_confirmation    string  required    The password of the  user.   Example: patata12
        * @bodyParam   name string  required The password of the  user. Example: asdasd
        *
        * @responseFile status=200   storage/responses/user/register/200.json 
        * @responseFile status=404  storage/responses/user/register/404.json
         */

     public function register(Request $request) {
        
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "email"  =>  "required|email",
            "password"  =>  "required|confirmed"
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()],400);
        }

        $inputs = $request->all();
        $inputs["password"] = Hash::make($request->password);

        $user   =   User::create($inputs);
        $user->role = "user"; //Cada usuario será por defecto un no-admin
        $user->save();

        if(!is_null($user)) {
            return response()->json(["status" => "success", "message" => "Success! registration completed", "data" => $user],200);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Registration failed! :("],404);
        }       
    }

    /**
     * Log in
     * 
     *  @unauthenticated
     *
     * @bodyParam   email    string  required    The email of the  user.      Example: jl.toscano@hotmail.com
     * @bodyParam   password    string  required    The password of the  user.   Example: patata12
     *
     * @responseFile status=200  storage/responses/user/login/200.json 
     * @responseFile status=401  storage/responses/user/login/401.json 
     * @responseFile status=404  storage/responses/user/login/404.json
     */ 
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()],400);
        }

        $user = User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["status" => "failed", "message" => "Failed! No user found with this email :("],404);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json(["status" => "success", "login" => true, "token" => $token, "data" => $user],200);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! invalid password"],401);
        }
    }

    /**
     * Auth User
     * 
     * Get the user info of the current logged user who called for it
     *
     * @responseFile status=200 storage/responses/user/auth/200.json 
     * @responseFile status=404 storage/responses/user/auth/404.json
     */ 
    public function user() {
        $user = Auth::user();

        if(!is_null($user)) { 
            return response()->json(["status" => "success", "data" => $user],200);
        }

        else {
            return response()->json(["status" => "failed", "message" => "Whoops! no user found"],404);
        }    
         
    }
    
    /**
     * Index
     * 
     * Get info of every user on the database
     *
     * @responseFile status=200  storage/responses/user/index/200.json
     * @responseFile status=401  storage/responses/401-admin.json 
     * @responseFile status=404  storage/responses/user/index/404.json
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
     * Show
     * 
     * Get info about the specified user
     *
     * @urlParam user integer required The ID of the user. Example: 1
     * 
     * @responseFile status=200  storage/responses/user/show/200.json
     * @responseFile status=404  storage/responses/user/show/404.json
     */ 
    public function show($user)
    {
        $userFound = User::find($user);

         if(!is_null($userFound)) {
            return response()->json(["status"=>"success","data"=>$userFound],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }


    /**
     * Update
     * 
     * Change the role of the given user
     *
     * @urlParam user integer required The ID of the user. Example: 1
     * 
     * @responseFile status=200  storage/responses/user/update/200.json
     * @responseFile status=401  storage/responses/401-admin.json
     * @responseFile status=403  storage/responses/user/update/403.json
     * @responseFile status=404  storage/responses/user/update/404.json
     */ 
    public function update($user)
    {
        $userFound = User::find($user);

        if(!is_null($userFound)) {

            if($user != Auth::user()->user) {

                if(Auth::user()->role == "admin") {

                    if($userFound->role == "admin") {
                        $userFound->role = "user";
                
                    } else {
                        $userFound->role = "admin";
                    }
                } else {
                    return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
                }
                
                $userFound->save();
                return response()->json(["status"=>"success","message"=>"User role changed successfully :)"],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant change your own permissions :("],403);
            }
        
        }  else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }


    /**
     * Destroy
     * 
     * Delete the given user from the database
     *
     * @urlParam user integer required The ID of the user. Example: 1
     * 
     * @responseFile status=200  storage/responses/user/destroy/200.json
     * @responseFile status=401  storage/responses/401-admin.json
     * @responseFile status=404  storage/responses/user/destroy/404.json
     */ 
    public function destroy($user)
    {

        $userFound = User::find($user);

        if(Auth::user()->role=="admin" && Auth::user()->user != $user) {

            if(!is_null($userFound)) {
                $userFound->delete();

                $userFound->delete();
                return response()->json(["status"=>"success","message"=>"User deleted successfully"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"No user found :("],404);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
        }       
    }
}

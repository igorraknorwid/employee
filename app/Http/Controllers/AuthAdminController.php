<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\AdminToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class AuthAdminController extends Controller
{
    public function user()
    {      
        return Auth::guard('admin')->user(); 
    }

    public function register(Request $request)
    {
        // Retrieve JSON payload from the request
        $json = $request->json()->all();  
        // Validation (you can adjust the validation rules as needed)
       
        $validatedData = validator($json, [
            'name' => 'required|string',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|min:4',
            'role' => 'required|integer',
        ])->validate();

        // Create a new AdminUser
        $adminUser = AdminUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' =>$validatedData['password'], // Hash the password
            'role' => $validatedData['role'],
        ]);

        // You can customize the response based on the outcome of the creation
        if ($adminUser) {
            return response()->json(['message' => 'Admin user registered successfully'], 201);
        } else {
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }

    public function login(Request $request)
    {

          // Retrieve JSON payload from the request
          $json = $request->json()->all();  

          // Validation (you can adjust the validation rules as needed)         
          $validatedData = validator($json, [          
              'email' => 'required|email',
              'password' => 'required|min:4',             
          ])->validate();

          $credential = ['email' => $validatedData['email'], 'password' => $validatedData['password']];
           
          if(Auth::guard('admin')->attempt($credential)){
            $user = Auth::guard('admin')->user();
            if($user){
                $crypted_email=Crypt::encryptString($user['email']);
                $uniqueValue = 'prefix_' . time() . '_' . Str::random(6);            
                $token =Crypt::encryptString($uniqueValue); 
                $admin_token=AdminToken::create(
                    ['token'=>$uniqueValue,'crypted_email'=>$crypted_email]
                );
                if($admin_token){
                    $cookie = cookie('token', $token, 60 * 24); 
                return response()->json(['token' => $token], 200)->withCookie($cookie);     
                };     
            }
          
          }         

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        $cookie = Cookie::forget('token');
        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}

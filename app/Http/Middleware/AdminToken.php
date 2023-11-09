<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminToken as AdminTokenModel;
use App\Models\AdminUser;

class AdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');  
        if($token){
            try {                     
                    $decryptedToken  = Crypt::decryptString($request->cookie('token'));
                    $adminToken = AdminTokenModel::where('token', $decryptedToken )->first();
            
                    if($adminToken){
                        $email = Crypt::decryptString($adminToken['crypted_email']);

                        $employee = AdminUser::where('email', $email)->first();
                    
                        Auth::guard('admin')->login($employee);                   
            
                        return $next($request);
                    }
                    
                    return response()->json(['message' => 'Authorisation failed'], 500);               
            
                } catch (DecryptException $e) {
                return response()->json(['message' => $e], 500);           
            }
        }
        return $next($request);
    }
}

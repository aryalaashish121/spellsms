<?php

namespace App\Http\Controllers\Auth;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    use ResponseHelpers;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //status check ==> your account is deactivated

        //check expire password session 
try{
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

        if($user->parent_id){
            $parentUser = User::where('id',$user->parent_id)->first();        
            if($parentUser && !$parentUser->status){
                return $this->respondWithError("Your parent company is deactivated! Please contact your company");
            }
        }
        
    if($user->status){
        $token=$user->createToken($request->email)->plainTextToken;
        return $this->respondOk($token);
    }else{
        return $this->respondWithError("You are currently deactivated! Please Contact your Upline company");
    }

}catch(Exception $err){
    return $this->respondWithError($err->getMessage());
}
      

    }

    public function logout(Request $request)
    {
        //delete all my access tokens
        // $request->user()->tokens()->delete();
        //delete curently used access token
        $request->user()->currentAccessToken()->delete();
        return $this->respondSuccess("Logged out successfully");
    }
}

<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Menus;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        $whway = false;
        $ith = false;
        $ca = false;
        $pc = false;

        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->with('user_menus')->firstOrFail();

        $userMenus = $user->user_menus;

        foreach ($userMenus as $um) {
            $menu = Menus::find($um->menu_id);
            switch ($menu->name) {
                case "whway":
                    $whway = true;
                break;
                case "ith":
                    $ith = true;
                break;
                case "ca":
                    $ca = true;
                break;
                case "pc":
                    $ca = true;
                break;
            }
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'whway' => $whway,
                'ith' => $ith,
                'ca' => $ca,
                'pc' => $pc
            ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}

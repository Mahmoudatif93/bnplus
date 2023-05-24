<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('jwt.auth', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {


        $client = Client::where('id', request('id'))->first();

        if (empty($client)) {
            $create = Client::create([
                'id' => request('id'),
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'password' => Hash::make(request('password')),

            ]);

$clients = Client::where('id', request('id'))->first();

            $credentials = request(['phone', 'password']);
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token,$clients);
        } else {
            
            
            
               $create = Client::where('id', request('id'))->update([
                'id' => request('id'),
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'password' => Hash::make(request('password')),

            ]);
            
            
    $clients = Client::where('id', request('id'))->first();
            

            $credentials = request(['phone', 'password']);
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token,$clients);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
    public function payload()
    {
        return $this->respondWithToken(auth('api')->payload());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$data)
    {
        return response()->json([
            'access_token' => $token,
            'data'=>$data,
            'token_type' => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60



        ]);
    }
    
  public function sendresetcode(Request $request){
      
      $title=$request->title;
      $desc=$request->body;
      $email=$request->email;
      $this->sendResetEmail($email, $desc, $title);
      return response()->json(['message' => 'Message sent Successfully']);
  }
    
    
    public function sendResetEmail($user, $content, $subject)
    {

        $send =   Mail::send(
            'dashboard.Contacts.content',
            ['user' => $user, 'content' => $content, 'subject' => $subject],
            function ($message) use ($user, $subject) {
                $message->to($user);
                $message->subject("$subject");
            }
        );
    }
    
    
}

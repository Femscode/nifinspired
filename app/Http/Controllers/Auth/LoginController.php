<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails() || $request->password !== $request->confirmpassword) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $data = $request->all();
            if ($data['country'] == 'Nigeria') {
                $data['currency'] = '₦';
                $data['amount'] = 5000;
            } elseif ($data['country'] == 'United Kingdom' || $data['country'] == 'United States') {
                $data['currency'] = '$';
                $data['amount'] = 3;
            } else {
                $data['currency'] = '€';
                $data['amount'] = 3;
            }
            $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678";
            $random = Str::random(5);
            // $ref_link = trim(substr($data['name'], 0, 5) . '-' . $random);
            $ref_link = str_replace(' ', '', trim(substr($data['name'], 0, 5) . '-' . $random));

            $user = User::create([
                'uid' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country' => $data['country'],
                'currency' => $data['currency'],
                'amount' => $data['amount'],
                'referral_code' => $ref_link,
                'password' => Hash::make($request->password)
            ]);

            event(new Registered($user));
            // $user->sendEmailVerificationNotification();
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }


            if (!($request->email === 'fasanyafemi@gmail.com' || $request->email === 'support@making-organic-cool.co.uk')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Permission Denied.',
                ], 419);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            // $token = $user->createToken("API TOKEN")->plainTextToken;
            $token = $user->createToken('API Token', ['server:access', 'server:refresh'])->plainTextToken;


            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' =>  $token,
                'user' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

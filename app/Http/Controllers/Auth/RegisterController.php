<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\Alert;
use App\Models\Category;
use App\Models\Subscribe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
     

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:5', 'confirmed'],
            'password' => ['required', 'string', 'min:5', 'confirmed','regex:/^[a-zA-Z0-9 ]+$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678";
        $random = Str::random(5);
        $ref_link = trim(substr($data['first_name'], 0, 5) . '-' . $random);
       
            $user =  User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'uid' => Str::uuid(),
                'email' => $data['email'],
                'referred_by' => $data['referred_by'],
                'referral_id' => $ref_link,
                'password' => Hash::make($data['password']),
            ]);
       
        $subscribe = Subscribe::where('email',$data['email'])->first();
        $subscribe->status = 1;
        $subscribe->save();
        if($data['referred_by'] !== null) {
            $user = User::where('referral_id',$data['referred_by'])->first();
            $user->referral_count += 1;
            $user->save();
        }
        return $user;
        return 'successfully verified';
        return $user;
    }
    protected function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:5', 'confirmed'],
            'password' => ['required', 'string', 'min:5', 'confirmed','regex:/^[a-zA-Z0-9 ]+$/'],
      
        ]);
        
       
            $user =  User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,          
               
                'password' => Hash::make($request->password),
            ]);
       
       
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'user' => $user
            ], 200);

            $data = array('name' => $request->name, 'slug' => ucwords(str_replace(' ', '', $request->name)));
            $email = $request->email;
            Mail::send('mail.welcome', $data, function ($message) use ($email) {
                $message->to($email, '')->subject('Welcome to Nifinspired');
                $message->from('support@connectinskillz.com', 'Nifinspired');
            });
           
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Bootstrap;

class ApiController extends Controller
{
    public function alluser(Request $request)
    {
        if ($request->bearerToken() == '77B2e5c39ac8640f13cd888f161385b12f7e5e92') {
            $user = User::get(['id', 'first_name', 'last_name', 'referral_id', 'referred_by', 'email', 'phone', 'referral_count', 'created_at', 'updated_at']);
            return response($user, 202);
        } else {
            return response("Invalid token:unauthenticated", 401);
        }
    }
    public function getuser(Request $request)
    {
        if ($request->bearerToken() == env("APP_BEARER_TOKEN")) {
            $user = User::where('email', $request->email)->get(['id', 'first_name', 'last_name', 'referral_id', 'referred_by', 'email', 'phone', 'referral_count', 'created_at', 'updated_at']);
            return response($user, 202);
        } else {
            return response("Invalid token:unauthenticated", 401);
        }
    }
    public function get_referred_users(Request $request)
    {
        if ($request->bearerToken() == env("APP_BEARER_TOKEN")) {
            $ref = User::where('email', $request->email)->first();
            if ($ref == null) {
                return response("Email does not exist", 400);
            } else {
                $ref_id = $ref->referral_id;
                $user = User::where('referred_by', $ref_id)->get(['id', 'first_name', 'last_name', 'referral_id', 'referred_by', 'email', 'phone', 'referral_count', 'created_at', 'updated_at']);
                return response($user, 202);
            }
        } else {
            return response("Invalid token:unauthenticated", 401);
        }
    }
    public function get_total_referred_users(Request $request)
    {
        if ($request->bearerToken() == env("APP_BEARER_TOKEN")) {
            $ref = User::where('email', $request->email)->first();
            if ($ref == null) {
                return response("Email does not exist", 400);
            } else {
                $ref_id = $ref->referral_id;
                $user = User::where('referred_by', $ref_id)->get(['id', 'first_name', 'last_name', 'referral_id', 'referred_by', 'email', 'phone', 'referral_count', 'created_at', 'updated_at']);
                return response(count($user), 202);
            }
        } else {
            return response("Invalid token:unauthenticated", 401);
        }
    }
    public function bootcamp_registration(Request $request)
    {

        try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => ['required', 'unique:bootcamp'],
                'phone_number' => 'required',
            ]);

            $data = $request->all();
            $bootcamp = Bootcamp::create($data);


            return response()->json([
                'status' => true,
                'message' => 'Registration Successfully',
                'data' => $bootcamp
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function fetch_bootcamp_registration(Request $request)
    {
        if ($request->bearerToken() == "eyJhbGciOiPOCzI1NiIsInR5cCI6IkpXVBT2") {

            try {

                $bootcamp = Bootcamp::latest()->get();



                return response()->json([
                    'status' => true,
                    'message' => 'Registered Users Fetched',
                    'data' => $bootcamp
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Auth(Bearer) Token',
                'details' => 'Kindly supply the token and please note that the token for this endpoint is different from the normal token other APIs are using, contact the Admin to get the Token.'
            ], 419);
        }
    }
}

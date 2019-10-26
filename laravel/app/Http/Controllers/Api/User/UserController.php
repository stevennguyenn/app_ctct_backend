<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\BaseControllerPlus;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Http\Resources\User\User as UserResponse;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseControllerPlus
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)){
            return $this->sendError("Email hoặc mật khẩu không đúng", [],401);
        } else {
            $http = new Client();
            try {
                $response = $http->request("POST", "http://localhost/projects/app_ctct_backend/laravel/oauth/token", [
                    "form_params" => [
                        'grant_type' => 'password',
                        'client_id' => '1',
                        'client_secret' => 'Z7tlPBv9Nu3Ksz08gYrrarWojd6H4cIH8kdxZnDy',
                        'username' => $request->json("email"),
                        'password' => $request->json("password"),
                        'scope' => '*',
                    ]
                ]);
                $user = $request->user();
                $jsonObject = json_decode($response->getBody()->getContents());
                $user->access_token = $jsonObject->access_token;
                $user->refresh_token = $jsonObject->refresh_token;
                $user->save();
                return $this->sendResponse(new UserResponse($user), "Login Successed");
            } catch (GuzzleException $e) {

            }
        }
    }

    public function register(UserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->save();
        return $this->sendResponse(null, "Successfully created user!");
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return UserResponse
     */
    public function store(UserRequest $request)
    {
//        if ($request->messages() != null) {
//            return $this -> sendError($request->messages(),[],200);
//        } else {
//            $user = new User();
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->password = Hash::make($request->password);
//            $user->save();
//            return $this -> sendResponse(new UserResponse($user), "Created Successed");
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

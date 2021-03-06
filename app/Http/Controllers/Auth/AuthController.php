<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignUpRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Presenters\UserLoginPresenter;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    public function index()
    {
        return "TEST";
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password does\'t exist'], 401);
        }

        $presenter = new UserLoginPresenter(auth()->user());
        $presenter->additional(['access_token' => $token]);

        return $presenter;
    }

    public function signup(SignUpRequest $request)
    {
        User::create($request->all());

        $user = User::where('email', '=', $request->email)->first();

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => $user->id,
            'user_type' => 'Modules\User\Model\User'
        ]);

        return $this->login($request);
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
        return $this->respondWithToken(auth()->refresh());
    }
}
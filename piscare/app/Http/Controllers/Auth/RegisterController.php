<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * ユーザー登録
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home.index');
    }

    public function indexProviderUserRegistrationForm(Request $request, $provider)
    {
        $token = $request->token;

        $providerUser = Socialite::driver($provider)->userFromToken($token);

        $email = $providerUser->getEmail();

        return view('auth.social_register', compact('provider', 'email', 'token'));
    }

    public function registerProviderUser(ProviderUserRequest $request, $provider)
    {
        $token = $request->token;
        $providerUser = Socialite::driver($provider)->userFromToken($token);
        $user = User::create([
            'name' => $request->name,
            'email' => $providerUser->getEmail(),
            'password' => null,
        ]);

        $this->guard()->login($user, true);

        return $this->registered($request, $user)
            ?:redirect($this->redirectPath());
    }

}

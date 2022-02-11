<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        $socialiteUser = Socialite::driver($provider)->user();

        $existingUser = User::where('provider_id', $socialiteUser->getId() )->first();
        $existingMail = User::where('email', $socialiteUser->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser, TRUE);

            return redirect('/');

        } elseif ($existingMail) {

            $request->session()->flash('ErrorLogin', 'Your email is already in use. Try another login provider or create a new account');

            return redirect(route('login'));

        } else {

            if (! $socialiteUser->getEmail()) {
                return redirect()->route('social-register', ['token' => $user->token]);
            }

            if ($provider == 'facebook') {
                $nickname = str_replace(' ', '_', $socialiteUser->getName());

                $user = User::firstOrCreate(
                    [
                        'provider' => $provider,
                        'provider_id' => $socialiteUser->getId(),
                    ],
                    [
                        'username' => $nickname,
                        'email' => $socialiteUser->getEmail(),
                        'avatar' => $socialiteUser->getAvatar(),
                    ]
                );
            }

            $user = User::firstOrCreate(
                [
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId(),
                ],

                [
                    'username' => $socialiteUser->getNickname(),
                    'email' => $socialiteUser->getEmail(),
                    'avatar' => $socialiteUser->getAvatar()
                ]
            );

//            $role = Role::select('id')->where('name', 'user')->first();

//            $user->roles()->attach($role);
            // Log the user in
            Auth::login($user, true);

            // Redirect to dashboard
            return redirect('/');
        }
    }
}

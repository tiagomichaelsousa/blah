<?php

namespace App\Http\Controllers;

use App\Enums\OAuthProviderEnum;
use App\Models\OAuthProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OAuthProviderEnum $provider)
    {
        return Socialite::driver($provider->value)->redirect();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Enums\OAuthProviderEnum  $provider
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(OAuthProviderEnum $provider)
    {
        $socialite = Socialite::driver($provider->value)->user();

        $user = User::firstOrCreate([
            'email' => $socialite->getEmail(),
        ], [
            'name' => $socialite->getName()
        ]);

        $user->providers()->updateOrCreate([
            'provider' => $provider,
            'provider_id' => $socialite->getId(),
        ]);

        Auth::login($user);

        return redirect(config('app.frontend_url'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OAuthProvider  $oAuthProvider
     * @return \Illuminate\Http\Response
     */
    public function show(OAuthProvider $oAuthProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OAuthProvider  $oAuthProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OAuthProvider $oAuthProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OAuthProvider  $oAuthProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(OAuthProvider $oAuthProvider)
    {
        //
    }
}

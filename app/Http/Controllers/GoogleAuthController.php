<?php

namespace App\Http\Controllers;
use Socialite;
use App\Service\GoogleAuthService;

class GoogleAuthController extends Controller
{
    public $google;

    public function __construct(GoogleAuthService $google){
        $this->google = $google;
    }

    /**
     * Redirect the user to the Google authenti
     * cation page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $gmail_user = Socialite::driver('google')->user();
        $this->google->addUser($gmail_user);
        $this->google->setGoogleId($gmail_user);

        return redirect('start');
    }
}
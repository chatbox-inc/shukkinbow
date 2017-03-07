<?php
namespace App\Service;
use Illuminate\Http\Request;
use App\User;
use Socialite;

class GoogleAuthService
{
    public $user;

    function __construct(User $user){
        $this->user = $user;
    }

    public function addUser($gmail_user){
        $arleady = $this->user
            ->where('google_id', $gmail_user->getId())
            ->first();

        //shukkinbowにユーザ情報を追加
        if (empty($arleady)) {
            $this->user->torken = $gmail_user->token;
            $this->user->refreshtoken = $gmail_user->refreshToken;
            $this->user->expiresin = $gmail_user->expiresIn;
            $this->user->google_id = $gmail_user->getId();
            $this->user->nickname = $gmail_user->getNickname();
            $this->user->name = $gmail_user->getName();
            $this->user->email = $gmail_user->getEmail();
            $this->user->avatar = $gmail_user->getAvatar();
            $this->user->company_id = 1;
            $this->user->save();
        }
    }

    //他の場所でdbからユーザ情報を取り出すためにid保存
    public function setGoogleId($gmail_user){

        session()->forget('google_id');
        $google_id = session()->get('google_id', []);
        $google_id[] = $gmail_user->getId();
        session()->put('google_id', $google_id);
    }
}
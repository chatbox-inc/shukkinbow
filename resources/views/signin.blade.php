@extends('blade_template')

@section('title','ログイン')
@section('css','social_sign_in.css')
@section('middle')
    <div class="sign-in-wrapper">
        <div class="google_sign_in">
            <a href="/auth/google">Sign in with Google</a>
        </div>
    </div>
@endsection


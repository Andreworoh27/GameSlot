@extends('navbar')

@section('title', 'Sign In')

@section('content')
<link rel="stylesheet" href="/css/signUp.css">
    <div class="sign-container mt-5">
        <h2 style="color: black">Game<span style="color: red">Slot</span></h2>
        <h5 class="mt-2">Sign Up Your Account</h5>
        <div class="d-flex justify-content-center align-content-center" style="margin-top: 50px">
            <form action="/signIn" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                @if ($errors->any())
                    <div style="color:red">{{ $errors->first() }}</div>
                @endif
            </form>
        </div>
@endsection

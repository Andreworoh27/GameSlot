@extends('navbar')

@section('title', 'Sign Up')

@section('content')
    <link rel="stylesheet" href="/css/signUp.css">
    <div class="sign-container mt-5">
        <h2 style="color: black">Game<span style="color: red">Slot</span></h2>
        <h5 class="mt-2">Sign Up Your Account</h5>
        <div class="d-flex justify-content-center align-content-center" style="margin-top: 50px">
            <form action="/signUp" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="Gender" class="form-check-label mb-1" style="display: block">Gender</label>
                    <input type="radio" class="form-check-input" id="gender" name="gender" value="Male"> Male
                    <input type="radio" class="form-check-input" id="gender" name="gender" value="Female"> Female
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
                @if ($errors->any())
                    {{-- <div style="color:red">{{ $errors->first() }}</div> --}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>
@endsection

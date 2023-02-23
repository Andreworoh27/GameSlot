@extends('navbar')

@section('title', 'Edit Profile')

@section('content')
    <link rel="stylesheet" href="/css/editProfileStyle.css">
    <p class="title">Profile</p>
    <form enctype="multipart/form-data" action="/profile" method="POST">
        @method('PATCH')
        @csrf
        <div class="container">
            <div class="inputtext">
                <h5>Name</h5>
                <hr class="solid">
            </div>
            <input class="updateinput" name="name" type="text" value="{{ auth()->user()->name }}">
            <div class="inputtext">
                <h5>Photo</h5>
                <hr class="solid">
            </div>
            <img class="userpic" src="{{ Storage::url('Profile Image/' . Auth::user()->image) }}">
            <input type="file" name="userpic" class="newuserpic" accept="image/png, image/jpeg, image/jfif">
            <div class="inputtext">
                <h5>Email</h5>
                <hr class="solid">
            </div>
            <input class="updateinput" name="email" type="text" value="{{ auth()->user()->email }}">
            <div class="inputtext">
                <h5>Gender</h5>
                <hr class="solid">
            </div>
            <h5 class="updateinput">{{ auth()->user()->gender }}</h5>
            <div class="inputtext">
                <h5>Date of Birth</h5>
                <hr class="solid">
            </div>
            <h5 class="updateinput">{{ auth()->user()->dob }}</h5>
            <div class="inputtext">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red;margin-left:15%" class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button class="button" type="submit">Update</button>
        </div>
    </form>

    <p class="title2">Account</p>
    <form enctype="multipart/form-data" action="{{ route('updateaccount') }}" method="POST">
        @csrf
        <div class="container">
            <div class="inputtext">
                <h5>Old Password</h5>
                <hr class="solid">
            </div>
            <input class="updateinput" name="oldpassword" type="password">
            <div class="inputtext">
                <h5>New Password</h5>
                <hr class="solid">
            </div>
            <input class="updateinput" name="newpassword" type="password">
            <div class="inputtext">
                <h5>Confirm New Password</h5>
                <hr class="solid">
            </div>
            <input class="updateinput" name="password_confirmation" type="password">
            <div class="inputtext">
                @isset($errorPosition)
                    {{dd($errorPosition)}}
                @endisset
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red;margin-left:15%" class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button class="button" type="submit">Update</button>
        </div>
    </form>
@endsection

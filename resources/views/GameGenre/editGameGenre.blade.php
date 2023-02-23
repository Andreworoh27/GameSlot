@extends('navbar')

@section('title', 'Edit Game Genre')

@section('content')
    <link rel="stylesheet" href="/css/editGameStyle.css" />
    <div class="update-container">
        <h1 class="title">Update Game Genre</h1>
        <form action="{{ url('gamegenre/' . $genre->id) }}" method="post" class="form-update">
            @csrf
            @method('PATCH')
            <div class="form-content">
                <label class="form-label" for="GameTitle">Genre </label>
                <input type="text" name="genre" value="{{ $genre->genre }}" class="form-input" />
            </div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="submit" value="update">
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" required>

        <label>Password (Leave blank if not changing):</label>
        <input type="password" name="password">

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation">

        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection

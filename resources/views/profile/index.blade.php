@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

    <form action="{{ route('profile.destroy') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection

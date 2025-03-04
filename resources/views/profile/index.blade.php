@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6 dark:bg-gray-800">
        
        <!-- Profile Image (Optional) -->
        <div class="flex justify-center">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/100' }}" 
                 alt="Profile Image" class="w-24 h-24 rounded-full shadow-md">
        </div>

        <!-- User Info -->
        <div class="text-center mt-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex justify-center space-x-4">
            <a href="{{ route('profile.edit') }}" 
               class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
               Edit Profile
            </a>

            <form action="{{ route('profile.destroy') }}" method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete your account?');">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

<?php
namespace App\Http\Controllers; // define the namespace

use Illuminate\Http\Request; // import the Request class
use Illuminate\Support\Facades\Auth; // import the Auth facade
use Illuminate\Support\Facades\Hash; // import the Hash facade
use App\Http\Controllers\Controller; // import the Controller class
use App\Models\User; // import the model

class AuthController extends Controller // define the class
{
    // Show registration form for
    public function showRegisterForm() //define the method
    {
        return view('auth.register'); // return the view
    }

    // Handle user registration ksk
    public function register(Request $request) // register fuction 
{
    $request->validate([ // validate the request
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
    ]);

    // Handle image upload  image uploading
    $imagePath = null; // set the image path to null
    if ($request->hasFile('image')) { // check if the request has an image
        $imagePath = $request->file('image')->store('profile_images', 'public'); // store the image
    }

    User::create([ // create the user 
        'name' => $request->name, // save the name
        'email' => $request->email, // save the email
        'password' => Hash::make($request->password), // save the password hash 
        'image' => $imagePath, // Save the image path
    ]);

    return redirect()->route('login')->with('success', 'Registration successful. Please login.'); // redirect to login page with success message 
}
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // return the login view 
    }

    // Handle login
    public function login(Request $request) //   login funciton wit request varibale as parametrized
    {
        $request->validate([   // validate the request
            'email' => 'required|email', // email is required
            'password' => 'required|min:6', // password is required
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { // check if the user is authenticated 
            return redirect('/')->with('success', 'Login successful.'); // redirect to home page with success message
        }

        return back()->withErrors(['email' => 'Invalid credentials.']); // return back with error message 
    }

    // Handle logout
    public function logout() // logout function 
    {
        Auth::logout(); // logout the user
        return redirect('/login')->with('success', 'Logged out successfully.'); // redirect to login page with success message
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __invoke(){
        echo "Called with argument: ";
}

    public function profile(Request $request){
    if ($request->session()->has('user')){
        $user = $request->session()->get('user');
        return view('profile', ['user' => $user]);
    } 
    else{
        return redirect('/login');
    }
}

    function register(Request $request){
        $user = new User;
        $user->timestamps = false;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->user_image = $request->user_image;
        $user->save();
        return redirect('/login');
}

    function login(Request $request) {
        $user = User::where(['email'=>$request->email])->first();
        if (! $user || $request->password != $user->password){
            return "Wrong email or password";
        }
        else{
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }

}

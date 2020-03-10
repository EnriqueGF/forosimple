<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function loginView(Request $request)
    {
        if (Auth::check()) {
            return (redirect(route('inicio')));
        }

        return view('login');
    }

    public function loginPost(Request $request)
    {
        if (Auth::check()) {
            return (redirect(route('inicio')));
        }

        $request->validate(['email' => 'required|email|max:255',
            'password' => 'required|max:255']);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            //$request->session()->put('admin', 'yes');
            return (redirect(route('inicio')));

        }
        return ($this->invalidCredentials());
    }

    public function registerView(Request $request)
    {
        if (Auth::check()) {
            return (redirect(route('inicio')));
        }

        return view('register');
    }

    public function registerPost(Request $request)
    {
        if (Auth::check()) {
            return (redirect(route('inicio')));
        }

        $validator = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|max:255',
            'password'  => 'required|max:255',
            'avatar'    => 'required|image'
        ]);


        if ($user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
        ]))
        {
            Storage::disk('local')->put('/public/'.$user->id.'/avatar.jpg', file_get_contents($request->avatar));

            Auth::attempt(['email'     => $request->email,
            'password'  => $request->password]);

            return (redirect(route('inicio')));

        } else {

            $errors = new MessageBag();
            $errors->add('invalid', 'Ha ocurrido un error en el registro.');
            return (redirect(route('inicio'))->withErrors($errors));

        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('inicio'));
    }

    private function invalidCredentials()
    {
        $errors = new MessageBag();
        $errors->add('invalid', 'Los datos introducidos no son válidos.');
        return view('login')->withErrors($errors);
    }
}

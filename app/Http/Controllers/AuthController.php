<?php

namespace App\Http\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Authenticatable;
use App\Core\Http\Controller;

class AuthController extends Controller
{
    use Authenticatable;

    public function login()
    {
        $succes = Session::get('succes');

        return view('auth.login', compact('succes'));
    }

    public function verify()
    {
        $inputs = inputs();

        $errors = [];
        if (! Validator::email($inputs['email'])) {
            $errors['email'] = 'Please provide a valid email address.';
        }

        if (! empty($errors)) {
            return view('auth.login', compact('errors'));
        }

        if ($this->attemp($inputs['email'], $inputs['password'])) {
            return redirect('/admin'); // Bug: to many redirects

        } else {
            return redirect('/login', 'error', 'Invalid email or password.');
        }
    }

    public function signup()
    {
        $error = Session::get('error');

        return view('auth.signup', compact('error'));
    }

    public function register()
    {
        $inputs = inputs();

        $errors = [];
        if (! Validator::email($inputs['email'])) {
            $errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($inputs['password'], 7, 20)) {
            $errors['password'] = 'Please provide a password of at least seven characters.';
        }

        if (! empty($errors)) {
            return view('auth.signup', compact('errors'));
        }

        $user = $this->db()->query("SELECT * FROM `users` WHERE `email` = :email", [
            'email' => Validator::email($inputs['email']),
        ])->find();

        if ($user) {
            return redirect('/signup', 'error', 'User already exists.');
        }

        $this->db()->query("INSERT INTO `users`(`email`, `password`, `created_at`) VALUES (:email, :password, :created_at)", [
            'email' => Validator::email($inputs['email']),
            'password' => password_hash($inputs['password'], PASSWORD_BCRYPT),
            'created_at' => now(),
        ]);

        return redirect('/login', 'succes', 'User registered successfully.');
    }
}
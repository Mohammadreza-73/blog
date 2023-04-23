<?php

namespace App\Http\Controllers;

use App\Core\App;
use App\Core\Session;
use App\Core\Authenticator;

class AuthController
{
    private $auth;
    private $db;

    public function __construct()
    {
        $this->auth = new Authenticator;  // Can declare as trait
        $this->db = App::resolve('Core\Database');
    }

    public function login()
    {
        $msg = Session::get('msg');
        return view('auth.login', compact('msg'));
    }

    public function verify()
    {
        # 1. get trimed user inputs
        $inputs = inputs();

        // TODO: validation

        #2. attemp user verify
        dd($this->auth->attemp($inputs['email'], $inputs['password']));

        #3. if verify redirect to admin
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function register()
    {
        $inputs = inputs();

        // TODO: validation

        $user = $this->db->query("SELECT * FROM `users` WHERE `email` = :email", [
            'email' => $inputs['email'],
        ])->find();

        if ($user) {
            return redirect('/');  // pass message to view: 'user alerady exists.'
        }

        $this->db->query("INSERT INTO `users`(`email`, `password`, `created_at`) VALUES (:email, :password, :created_at)", [
            'email' => $inputs['email'],
            'password' => password_hash($inputs['password'], PASSWORD_BCRYPT),
            'created_at' => now(),
        ]);


        return redirect('/login', 'msg', 'User registered successfully.');
    }
}
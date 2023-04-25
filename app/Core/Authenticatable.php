<?php

namespace App\Core;

trait Authenticatable
{
    public function attemp(string $email, string $password)
    {
        $user = $this->db()->query("SELECT * FROM `users` WHERE `email` = :email", [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->login([
                    'email' => $email,
                ]);

                return true;
            }

            return false;
        }
    }

    public function login(array|object $user)
    {
        $user = is_object($user) ? $user : (object) $user;

        Session::flash('email', $user->email);

        // Prevent Session Hijacking
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
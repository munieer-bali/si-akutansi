<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authentikasi()
    {
        $session = session();
        $userModel = new UsersModel();

        $email = $this->request->getvar('email');
        $password = $this->request->getvar('password');

        $user = $userModel->where('email', $email)->first();



        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $ses_data = [
            'id_user' => $user['id_user'],
            'email' => $user['email'],
            'isLoggedIn' => TRUE
        ];
        var_dump($user);

        $session->set($ses_data);
        return redirect()->to('/dashboard');
    }
    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}

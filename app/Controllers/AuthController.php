<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 05.10.19
 * Time: 23:17
 */

namespace App\Controllers;


use App\Components\Controller;
use App\Models\User\UserRepository;


class AuthController extends Controller
{
    protected $layout = 'auth';

    public function login()
    {
        $error = '';
        if ($this->request->isMethod('post')) {
            if ($this->auth->login($this->request->get('email'), $this->request->get('password'))) {
                $this->redirect('/');
            } else {
                $error = 'Неправильный логин или пароль';
            }
        }

        return $this->view('auth/login', ['error' => $error]);
    }

    public function register()
    {
        $error = '';
        if ($this->request->isMethod('post')) {
            $userRepo = new UserRepository();

            $result = $userRepo->registerUser(
                $this->request->get('email'),
                $this->request->get('name'),
                $this->request->get('second_name'),
                $this->request->get('age'),
                $this->request->get('interests'),
                $this->request->get('city'),
                $this->request->get('gender'),
                $this->request->get('password')
            );

            if ($result['success']) {
                $this->redirect('/login');
            } else {
                $error = $result['errorMsg'];
            }
        }

        return $this->view('auth/register', ['error' => $error, 'request' => $this->request]);
    }

    public function logout()
    {
        $this->session->clear();
        $this->redirect('/login');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 05.10.19
 * Time: 22:47
 */

namespace App\Controllers;


use App\Components\Controller;

class TestController extends Controller
{

    public function test()
    {
        $this->redirectIfGuest();
//        var_dump($this->session->get('auth_user'));
//        var_dump($this->request->getPathInfo());
        echo 'ho';
    }
}
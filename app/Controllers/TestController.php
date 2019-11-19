<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 05.10.19
 * Time: 22:47
 */

namespace App\Controllers;


use App\Components\Controller;
use App\Models\TestTableRepository;

class TestController extends Controller
{

    public function test()
    {
        $this->redirectIfGuest();
//        var_dump($this->session->get('auth_user'));
//        var_dump($this->request->getPathInfo());
        echo 'ho';
    }

    public function insert()
    {
        $number = $this->request->get('number');

        $testRepo = new TestTableRepository();
        $testRepo->insertNumber($number);

        echo 'ok'; die;
    }
}
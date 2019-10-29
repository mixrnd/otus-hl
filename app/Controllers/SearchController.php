<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 22.10.19
 * Time: 23:16
 */

namespace App\Controllers;


use App\Components\Controller;
use App\Models\User\UserRepository;

class SearchController extends Controller
{
    public function index()
    {
        $firstNamePart = $this->request->get('firstName');
        $lastNamePart = $this->request->get('lastName');

        $repo = new UserRepository();

        return $this->view('search/index', ['users' => $repo->search($firstNamePart, $lastNamePart)]);

    }
}
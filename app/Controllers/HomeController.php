<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 09.10.19
 * Time: 21:55
 */

namespace App\Controllers;


use App\Components\Auth;
use App\Components\Controller;
use App\Models\User\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{

    protected $layout = 'main';
    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, Session $session, Auth $auth)
    {
        parent::__construct($request, $session, $auth);
        $this->redirectIfGuest();
    }

    public function index()
    {
        $user = $this->auth->getUser();

        return $this->view('home/index', ['error' => '', 'user' => $user]);
    }

    public function list()
    {
        $userRepo = new UserRepository();
        return $this->view('home/list', ['error' => '', 'users' => $userRepo->findAll()]);
    }

    public function user()
    {
        $userId = $this->request->get('id');
        $userRepo = new UserRepository();
        $user = $userRepo->findById($userId);
        if (!$user) {
            throw new \Exception('Пользователь не найден');
        }

        return $this->view('home/user', ['error' => '', 'user' => $user]);
    }
}
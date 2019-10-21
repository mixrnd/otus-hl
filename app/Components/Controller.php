<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 06.10.19
 * Time: 8:22
 */

namespace App\Components;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class Controller
{
    /** @var Request */
    protected $request;
    /** @var Session */
    protected $session;
    /**
     * @var Auth
     */
    protected $auth;

    protected $layout;

    /**
     * Controller constructor.
     * @param $request
     * @param $session
     * @param Auth $auth
     */
    public function __construct(Request $request, Session $session, Auth $auth)
    {
        $this->request = $request;
        $this->session = $session;
        $this->auth = $auth;
    }


    protected function view($template, array $params = [])
    {
        $view = new View($template, $params);
        if ($this->layout) {
            $view->setLayout($this->layout);
        }
        return $view;
    }

    protected function redirectIfGuest()
    {
        if ($this->request->getPathInfo() == '/login') {
            return;
        }

        if ($this->auth->isGuest()) {
            $this->redirect('/login');
        }
    }

    protected function redirect($url)
    {
        header("Location: " . $url);
        die;
    }
}
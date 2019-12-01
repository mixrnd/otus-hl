<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 09.10.19
 * Time: 21:38
 */

namespace App\Components;


use App\Models\User\User;
use App\Models\User\UserRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class Auth
{
    /**
     * @var Session
     */
    private $session;

    /**
     * Auth constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function login($email, $password) : bool
    {
        $userRepo = new UserRepository();

        $user = $userRepo->findByEmail($email);

        if ($r = password_verify($password, $user->password)) {
            $this->session->set('auth_user', $user);
            return true;
        } else {
            return false;
        }
    }

    public function getUser() : ?User
    {
        return $this->session->get('auth_user');
    }

    public function isGuest()
    {
        return !(bool)$this->session->get('auth_user');
    }
}
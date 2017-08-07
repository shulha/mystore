<?php

namespace Mystore\Controller;

use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Security\UserContract;
use Shulha\Framework\Session\Session;
use Shulha\Framework\Validation\Validator;

/**
 * Class UserController
 * @package Mystore\Controller
 */
class UserController extends Controller
{

    /**
     * Show user dashboard
     *
     * @return mixed
     */
    public function index()
    {
        return view('user');
    }

    /**
     * Show registration form
     *
     * @return mixed
     */
    public function create()
    {
        return view('system.registration');
    }

    /**
     * Save user
     *
     * @param Request $request
     * @param UserContract $user
     * @param Session $session
     * @return \Shulha\Framework\Response\RedirectResponse
     */
    public function store(Request $request, UserContract $user, Session $session)
    {
        $validator = new Validator($request, [
            "login" => ["required", "email"],
            "password" => ["required", "length_between:1,50"],
//            "phone" => ["numeric", "length_between:1,20"],
        ]);
        if (!$validator->validate())
        {
            $session->flashErrorList($validator->getErrorList());
            return $this->redirect('registration');
        }

        $user->insert(['login', 'password'], [$request->login, md5($request->password)]);

        return $this->redirect('login');
    }
}

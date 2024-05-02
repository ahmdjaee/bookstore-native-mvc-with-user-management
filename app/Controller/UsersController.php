<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Service\UserService;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersLoginRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersRegisterRequest;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class UsersController
{
    public function __construct(
        protected UserService $service,
        protected SessionService $sessionService
    ) {
    }
    public function register()
    {
        $model = [
            'title' => 'Register',
        ];
        View::render('Users/register', model: $model, navbar: false);
    }

    public function postRegister()
    {

        $model = [
            'title' => 'Register',
        ];

        try {
            $request = new UsersRegisterRequest(
                username: $_POST['username'],
                name: $_POST['name'],
                password: $_POST['password'],
            );
            $register = $this->service->register($request);
            if ($register != null) {
                View::redirect("login");
            }
        } catch (ValidationException $exception) {
            $model['error'] = $exception->getMessage();
            View::render('Users/register', model: $model, navbar: false);
        }
    }

    public function login()
    {
        $model = [
            'title' => 'Login',
        ];
        View::render('Users/login', model: $model, navbar: false);
    }

    public function postLogin()
    {
        $request = new UsersLoginRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];

        try {
            $response = $this->service->login($request);
            $this->sessionService->create($response->users->username);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('Users/login', [
                'title' => 'Login user',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect('/users/login');
    }
}

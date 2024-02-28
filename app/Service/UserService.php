<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use RootNameSpace\Belajar\PHP\MVC\Domain\Users;
use RootNameSpace\Belajar\PHP\MVC\Repository\UserRepository;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersLoginRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersRegisterRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\UsersResponse;

class UserService
{

    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function register(UsersRegisterRequest $request): UsersResponse
    {
        $this->validateUserRegisterRequest($request);

        try {
            $findUser = $this->repository->findUsername($request->username);

            if ($findUser != null) {
                throw new ValidationException("Username already exists");
            }

            $users = new Users(
                username: $request->username,
                name: $request->name,
                password: password_hash($request->password, PASSWORD_BCRYPT),
                createdAt: date("Y/m/d"),
            );

            $this->repository->save($users);

            $response = new UsersResponse();

            $response->users = $users;

            return $response;
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function login(UsersLoginRequest $request): UsersResponse
    {
        $this->validateUserLoginRequest($request);

        $users = $this->repository->findUsername($request->username);

        if ($users == null) {
            throw new ValidationException("Wrong Username and Password");
        }

        if (!password_verify($request->password, $users->password)) {
            $response = new UsersResponse();
            $response->users = $users;
            return $response;
        } else {
            throw new ValidationException("Wrong Username and Password");
        }
    }

    public function validateUserRegisterRequest(UsersRegisterRequest $request)
    {
        if (empty($request->username) || empty($request->password)  || empty($request->name) || trim($request->username) == "" || trim($request->name) == "" || trim($request->password) == "") {
            throw new ValidationException("Username and password are required");
        }
    }

    public function validateUserLoginRequest(UsersLoginRequest $request)
    {
        if (empty($request->username) || empty($request->password) || trim($request->username) == "" || trim($request->password) == "") {
            throw new ValidationException("Username and password are required");
        }
    }
}

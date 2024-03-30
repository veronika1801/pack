<?php

namespace middlewares;

interface AuthInterface
{
    public function check();
}

class Auth implements AuthInterface
{
    public function check()
    {
        // Возвращаем результат проверки авторизации
    }
}

class AuthMiddleware
{
    private $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request)
    {
        // Если пользователь не авторизован, то редирект на страницу входа
        if (!$this->auth->check()) {
            app()->route->redirect('/login');
        }
    }
}
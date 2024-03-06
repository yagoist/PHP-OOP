<?php

namespace App\Controllers;


use App\Auth;
use App\Exceptions\AuthException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct(
        private readonly Auth $auth,
        private readonly Request $request
    ) {
    }

    const REDIRECT_URL = '/';

    public function login(): Response
    {
        $this->onlyNotAuth(static::REDIRECT_URL);

        if ($this->auth->isAuthorized()) {
            return new RedirectResponse(static::REDIRECT_URL);
        }

        $oldValues = flash()->storage()->get('old', []);
        return $this->view('pages/login.php', ['fields' => $oldValues]);
    }

    public function authorize(): Response
    {
        $this->onlyNotAuth(static::REDIRECT_URL);

        if ($this->auth->isAuthorized()) {
            return new RedirectResponse(static::REDIRECT_URL);
        }

        $redirectUrl = static::REDIRECT_URL;
        $fields = $this->request->request;

        try {
            $user = $this->auth->attempt($fields->get('email', ''), $fields->get('password', ''));
            $this->auth->login($user);

            flash()->success(['Вечер в хату!']);
        } catch (AuthException $exception) {
            flash()->storage()->set('old', $fields->all());
            flash()->error(['Врешь, не зайдешь!']);
            $redirectUrl = '/login/';
        }
        return new RedirectResponse($redirectUrl);
    }

    public function logout(): Response
    {
        $this->onlyAuth(static::REDIRECT_URL);

        $this->auth->logout();
        flash()->success(['На свободу с чистой совестью!']);
        return new RedirectResponse(static::REDIRECT_URL);
    }
}

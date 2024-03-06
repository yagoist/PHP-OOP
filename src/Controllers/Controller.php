<?php

namespace App\Controllers;

use App\Exceptions\RedirectException;
use App\View;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected function view(string $template, array $data = []): Response
    {
        $view = new View($template);

        return new Response($view->render($data));
    }

    /**
     * @throws RedirectException
     */
    protected function onlyAuth(string $url): void
    {
        if (! auth()->isAuthorized()) {
            throw new RedirectException($url);
        }
    }

    /**
     * @throws RedirectException
     */
    protected function onlyNotAuth(string $url): void
    {
        if (auth()->isAuthorized()) {
            throw new RedirectException($url);
        }
    }

    protected function onlyIsAdmin(string $url): void
    {
        if (!auth()->isAdmin()) {
            throw new RedirectException($url);
        }
    }
}

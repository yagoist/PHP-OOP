<?php

namespace App;

use App\Exceptions\PageNotFoundException;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{
    /**
     * @var array|Route[]
     */
    private array $routers = [];

    public function register(string $url, string $method, array $callback): void
    {
        $this->routers[] = new Route($url, $method, $callback);
    }

    /**
     * @throws PageNotFoundException
     */
    public function run(Request $request): Response
    {
        foreach ($this->routers as $route) {
            if ($route->match($request)) {
                return $route->run($request);
            }
        }

        throw new PageNotFoundException();
    }

    public function get(string $url, array $callback): void
    {
        $this->register($url, 'GET', $callback);
    }

    public function post(string $url, array $callback): void
    {
        $this->register($url, 'POST', $callback);
    }
}
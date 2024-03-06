<?php

namespace App;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Route
{
    public readonly string $url;
    public readonly string $method;

    public function __construct(string $url, string $method, private array $callback)
    {
        $this->url = $this->normalizeUrl($url);
        $this->method = strtoupper($method);
    }

    public function match(Request $request): bool
    {
        return preg_match('/^' . str_replace(['*', '/'], ['[\w\-_]+', '\/'], $this->url) . '$/',  $this->normalizeUrl($request->getPathInfo()))
            && $this->method === $request->getMethod()
        ;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function run(Request $request): Response
    {
        $urlParts = explode('/', $request->getPathInfo());
        $routeParts = explode('/', $this->url);

        $params = [];

        foreach ($routeParts as $key => $part) {
            if ($part === '*') {
                $params[] = $urlParts[$key];
            }
        }

        [$class, $method] = $this->callback;

        $controller = container()->get($class);

        return call_user_func_array([$controller, $method], $params);
    }

    public function normalizeUrl(string $url): string
    {
        return '/' . trim($url, '/');
    }
}
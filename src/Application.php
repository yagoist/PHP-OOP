<?php

namespace App;

use App\Exceptions\HttpException;
use App\Exceptions\PageNotFoundException;
use App\Exceptions\RedirectException;
use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    public function __construct(
        private readonly Router $router,
        private readonly Capsule $database
    ) {
    }

    public function run(Request $request): Response
    {
        try {

            container()->instance(Request::class, $request);

            $this->database->addConnection(config()->get('database'));

            $this->database->setAsGlobal();
            $this->database->bootEloquent();

            return $this->router->run($request);
        } catch (RedirectException $exception) {
            return new RedirectResponse($exception->url);
        } catch (PageNotFoundException $exception) {
            return new Response(
                (new View('errors/404.php'))->render(),
                404
            );
        } catch (HttpException $exception) {
            return new Response(
                (new View('errors/error.php'))->render([
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode()
                ]),
                $exception->getCode()
            );
        } catch (Exception $exception) {
            return new Response(
                (new View('errors/error.php'))->render([
                'message' => $exception->getMessage(),
            ]),
                500
            );
        }
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException)
        {
            abort(404);
        }

        if ($e instanceof \Illuminate\Session\TokenMismatchException) {

            if ($request->is('apanel/*')||$request->is('login'))
            {
                if ($request->wantsJson()) {
                    return response()->json(['mess' => 'Нужно авторизоваться'], 401);
                }
                return redirect('/login')->withInput();
            }
            if ($request->wantsJson()) {
                return response()->json(['mess' => 'Форма устарела, обновите страницу'], 408);
            }

        }

        return parent::render($request, $e);
    }

    protected function renderHttpException($e)
    {
        $statusCode = $e->getStatusCode();
        if ($statusCode == 404) {
            $container = app();
            $request = $container->make(Request::class);
            $request->merge(['e' => $e]);
            return $container->call('\\App\\Http\\Controllers\\NotFoundController@index');
        }

        return parent::renderHttpException($e);
    }
}

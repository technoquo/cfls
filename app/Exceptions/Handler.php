<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Manejo de error 404
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.403', [], 403);
        }

        // Manejo de error 500
        if ($exception instanceof \Exception) {
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // En local → mostrar errores reales
        if (app()->environment('local')) {
            return parent::render($request, $exception);
        }

        // En producción → páginas personalizadas
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404);
        }

        if ($exception instanceof AuthorizationException ||
            ($exception instanceof HttpException && $exception->getStatusCode() === 403)) {
            return response()->view('errors.403', [], 403);
        }

        // Cualquier otro error → 500
        return response()->view('errors.500', [], 500);
    }
}

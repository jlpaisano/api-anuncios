<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\AuthenticationException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException){
            return response()->json([
                'res' => false,
                'error' => 'Error, modelo no existe'], 400);            
        }

        if($exception instanceof QueryException){
            return response()->json([
                'res' => false,
                'message' => 'Error de consulta BDD', $exception->getMessage()], 500);            
        }

        if($exception instanceof HttpException){
            return response()->json([
                'res' => false,
                'message' => 'Error de ruta'], 404);            
        }

        if($exception instanceof AuthenticationException){
            return response()->json([
                'res' => false,
                'message' => 'Error de autenticacion'], 401);            
        }
        return parent::render($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Exception;
use App\Http\Traits\GetResponse;
use App\Http\Responses\Errors\Errors;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use GetResponse;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson())
        {
            if($exception instanceof ModelNotFoundException)
                return $this->error_response(Errors::TESTING);
            else if($exception instanceof AuthorizationException)
                return $this->error_response(Errors::UNAUTHORIZED);
            else if($exception instanceof ValidationException)
                return $this->error_response($this->print_validation_errors($exception->validator->errors()->all()));
        }
        return parent::render($request, $exception);
    }


    private function print_validation_errors($errors)
    {
        $errors_txt = "";
        foreach($errors as $message)
            $errors_txt .= $message."\n";
        return $errors_txt;
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return $this->error_response(Errors::UNAUTHENTICATED);
        }

        return redirect()->guest(route('login'));
    }
}

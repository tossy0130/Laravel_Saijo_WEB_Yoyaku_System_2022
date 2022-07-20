<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Session\TokenMismatchException; // 追加


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    //================ セッション
    /*
    public function render($request, \Throwable $e)
    {
        if ($e instanceof TokenMismatchException) {
            return redirect()
                ->back();
        }
        return parent::render($request, $e);
    }*/

    public function render($request, Throwable $exception)
    {
        // Tokenエラーの時、ログイン画面にリダイレクトする。
        if ($exception instanceof TokenMismatchException) {
            /*
            return redirect()->route('yoyaku.index')->with(
                'session_del',
                'タイムエラーです。予約をされる場合はもう一度ログインし直してください。'
            );
            */

            return redirect()->route('yoyaku.index', ['session_err' => 'non']);
        }

        return parent::render($request, $exception);
    }
}

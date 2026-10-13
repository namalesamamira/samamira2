<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

 $app = Application::configure(basePath: dirname(__DIR__))
    // ->usePublicPath(dirname(__DIR__) . '/public_html') // changed public folder
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

$app->usePublicPath($app->basePath('public_html'));

if ($storagePath = getenv('LARAVEL_STORAGE_PATH')) {
    $app->useStoragePath($storagePath);
}

return $app;
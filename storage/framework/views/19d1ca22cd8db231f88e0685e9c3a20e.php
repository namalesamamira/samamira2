<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/assets/style.less', 'resources/js/app.js']); ?>
    </head>
    <body>
        <header>
            <?php if(Route::has('login')): ?>
                <nav>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>">
                            Dashboard
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">
                            Log in
                        </a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">
                                Register
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
        </header>
        <main>
            <!-- Auth Debug Info -->
            <div style="background-color: #f0f0f0; padding: 10px; margin: 10px 0; border: 1px solid #ccc;">
                <?php if(auth()->guard()->check()): ?>
                    <strong style="color: green;">✓ LOGGED IN</strong> - User: <?php echo e(Auth::user()->name); ?> (<?php echo e(Auth::user()->email); ?>)
                <?php else: ?>
                    <strong style="color: red;">✗ NOT LOGGED IN</strong> - Guest access
                <?php endif; ?>
            </div>
            <div class="wrapper">
                <h1><?php echo e(config('app.name', 'Laravel')); ?></h1>
            </div>
        </main>
        <footer>

            <a href="<?php echo e(route('google.redirect')); ?>">Login with Google</a>
            <?php if(Route::has('login')): ?>
                <div class="h-14.5 hidden lg:block"></div>
            <?php endif; ?>
        </footer>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>
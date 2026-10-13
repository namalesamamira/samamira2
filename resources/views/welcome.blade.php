<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/assets/style.less', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <main>
            <!-- Auth Debug Info -->
            <div style="background-color: #f0f0f0; padding: 10px; margin: 10px 0; border: 1px solid #ccc;">
                @auth
                    <strong style="color: green;">✓ LOGGED IN</strong> - User: {{ Auth::user()->name }} ({{ Auth::user()->email }})
                @else
                    <strong style="color: red;">✗ NOT LOGGED IN</strong> - Guest access
                @endauth
            </div>
            <div class="wrapper">
                <h1>{{ config('app.name', 'Laravel') }}</h1>
            </div>
        </main>
        <footer>

            <a href="{{ route('google.redirect') }}">Login with Google</a>
            @if (Route::has('login'))
                <div class="h-14.5 hidden lg:block"></div>
            @endif
        </footer>
    </body>
</html>

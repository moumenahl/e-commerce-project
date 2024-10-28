<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body { font-family: Figtree, sans-serif; background: #f5f7fa; }
        .main-container { min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #e2e8f0; }
        .header { position: absolute; top: 1.5rem; right: 1.5rem; }
        .header a { margin-left: 1rem; color: #1f2937; text-decoration: none; font-weight: 600; transition: color 0.3s; }
        .header a:hover { color: #3b82f6; }
        .content-box { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); padding: 2rem; text-align: center; max-width: 450px; width: 100%; }
        .logo { width: 70px; height: 70px; margin: 0 auto; }
        .title { font-size: 1.875rem; font-weight: 600; color: #1f2937; margin-top: 1rem; }
        .description { color: #6b7280; margin: 0.5rem 0 1.5rem; font-size: 1rem; line-height: 1.5; }
        .btn { display: inline-block; padding: 0.75rem 1.5rem; border-radius: 8px; color: #fff; font-weight: 600; text-decoration: none; transition: background 0.3s; }
        .btn-login { background: #3b82f6; }
        .btn-register { background: #10b981; margin-left: 1rem; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="main-container">

        <!-- Content Box -->
        <div class="content-box">
            <h1 class="title">Welcome to E-Commerce Management</h1>
            <p class="description">Manage your products, track orders, and gain insights all in one place. Get started by logging in or registering a new account.</p>
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            @endif
        </div>
    </div>
</body>
</html>

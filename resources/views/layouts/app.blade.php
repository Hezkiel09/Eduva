<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduva Assessment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }
        .nav-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            flex: 1;
            width: 100%;
        }
        .footer {
            background-color: #1a1a2e;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div style="font-weight: bold; font-size: 20px; color: #2563EB;">EDUVA</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="{{ route('assessment.index') }}" style="color: #2563EB; font-weight: bold;">Assessment</a>
            <a href="#">Career Match</a>
            <a href="#">Learning Path</a>
        </div>
        <div>
            @auth
                {{ Auth::user()->username }}
            @endauth
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        &copy; 2026 Eduva.com. All rights reserved.
    </div>

</body>
</html>

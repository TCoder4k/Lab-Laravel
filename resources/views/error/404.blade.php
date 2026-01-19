<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .error-container {
            text-align: center;
            max-width: 500px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            line-height: 1;
        }

        .error-title {
            font-size: 28px;
            margin-top: 10px;
        }

        .error-message {
            margin: 15px 0 30px;
            font-size: 16px;
            opacity: 0.9;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 25px;
            background: #fff;
            color: #764ba2;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-title">Page Not Found</div>
        <p class="error-message">
            Sorry, the page you are looking for does not exist or has been moved.
        </p>
        <a href="{{ route('index') }}" class="btn-home">Back to Home</a>
    </div>

</body>
</html>

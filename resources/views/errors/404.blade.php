<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #dc3545;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-home {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h2 class="error-message">Oops! Page not found</h2>
        <p>The page you're looking for doesn’t exist or has been moved.</p>
        <a href="{{ route('admin.dashboard.index') }}" class="btn btn-danger btn-home">Go Home</a>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
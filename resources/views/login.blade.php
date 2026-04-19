<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Lab - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { margin-top: 100px; }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Login Lab</h3>
                        <div class="alert alert-warning small">
                            <strong>Note:</strong> Form ini mengarah ke logic yang <b>Vulnerable</b>.
                        </div>
                        <form action="{{ route('login.insecure') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="admin@test.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Misteri..." required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100 shadow-sm">
                                Login (Attack Target)
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Login</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #d32f2f;       /* Deep red */
            --secondary-color: #1976d2;     /* Vivid blue */
            --background-color: #f5f5f5;    /* Light gray */
            --text-color: #333333;          /* Dark gray */
            --accent-color: #ff6b6b;        /* Soft red */
        }

        * {
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, var(--background-color), #e0e0e0);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: var(--text-color);
            overflow: hidden;
            padding: 20px;
        }

        .login-container {
            display: flex;
            background: white;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            height: 650px;
            position: relative;
            perspective: 1000px;
        }

        .login-image {
            flex: 0 0 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 15s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        .login-image-content {
            text-align: center;
            color: white;
            z-index: 1;
            padding: 30px;
        }

        .login-image-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .login-image-content p {
            font-size: 1.1rem;
            opacity: 0.8;
            line-height: 1.6;
        }

        .login-form-section {
            flex: 0 0 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            height: 55px;
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding: 0 15px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom-color: var(--accent-color);
        }

        .btn-login {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            height: 55px;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .social-login a {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f4f4f4;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .social-login a:hover {
            transform: scale(1.1);
            background-color: var(--accent-color);
            color: white;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
            }

            .login-image, .login-form-section {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <div class="login-image-content">
                <h1>Delicious Moments</h1>
                <p>Discover a world of culinary excellence. Log in to explore exclusive menus, make reservations, and savor every bite.</p>
            </div>
        </div>
        <div class="login-form-section">
            <div class="login-form">
                <h2 class="text-center mb-4">Welcome Back</h2>
                <form action="signin_action.php" method="POST">
                    <div class="mb-4">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Email Address">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                    </div>
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="forgot_pws.php" class="text-decoration-none" style="color: var(--primary-color);">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-login w-100 mb-3">Sign In</button>
                    
                    <div class="text-center">
                        <p class="text-muted mt-3">Or sign in with</p>
                        <div class="social-login">
                            <a href="oauth/google.php" class="google"><i class="fab fa-google"></i></a>
                            <a href="oauth/facebook.php" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="oauth/twitter.php" class="twitter"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="mb-0">Don't have an account? <a href="sign_up.php" class="text-decoration-none" style="color: var(--primary-color);">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
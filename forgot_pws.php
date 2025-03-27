<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .forgot-password-container {
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

        .forgot-password-image {
            flex: 0 0 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .forgot-password-image::before {
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

        .forgot-password-image-content {
            text-align: center;
            color: white;
            z-index: 1;
            padding: 30px;
        }

        .forgot-password-image-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .forgot-password-image-content p {
            font-size: 1.1rem;
            opacity: 0.8;
            line-height: 1.6;
        }

        .forgot-password-form-section {
            flex: 0 0 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        .forgot-password-form {
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

        .btn-reset {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            height: 55px;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-reset:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .back-to-login {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-to-login:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .forgot-password-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
            }

            .forgot-password-image, .forgot-password-form-section {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="forgot-password-image">
            <div class="forgot-password-image-content">
                <h1>Reset Password</h1>
                <p>Don't worry! Enter the email associated with your account, and we'll send you a link to reset your password.</p>
            </div>
        </div>
        <div class="forgot-password-form-section">
            <div class="forgot-password-form">
                <h2 class="text-center mb-4">Forgot Your Password?</h2>
                <form action="forgot_password_action.php" method="POST">
                    <div class="mb-4">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                        <small class="form-text text-muted mt-2">We'll send a password reset link to this email.</small>
                    </div>
                    <button type="submit" class="btn btn-reset w-100 mb-3">Reset Password</button>
                    
                    <div class="text-center mt-4">
                        <p class="mb-0">
                            <a href="signin.php" class="back-to-login">
                                <i class="fas fa-arrow-left me-2"></i>Back to Login
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
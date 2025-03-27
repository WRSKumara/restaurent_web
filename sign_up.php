<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff4d4d;
            --secondary-color: #1e88e5;
            --gradient-primary: linear-gradient(135deg, #ff4d4d, #f9a825);
            --gradient-secondary: linear-gradient(135deg, #1e88e5, #43a047);
            --background-color: #f0f4f8;
            --text-color: #2c3e50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            perspective: 1000px;
        }

        .signup-wrapper {
            display: flex;
            width: 900px;
            height: 600px;
            background: white;
            box-shadow: 0 30px 50px rgba(0,0,0,0.2);
            border-radius: 20px;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: all 0.8s ease;
        }

        .signup-image {
            flex: 1;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ff4d4d" fill-opacity="0.5" d="M0,160L48,176C96,192,192,224,288,240C384,256,480,256,576,229.3C672,203,768,149,864,149.3C960,149,1056,203,1152,218.7C1248,235,1344,213,1392,202.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>') no-repeat center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .signup-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
        }

        .signup-image h1 {
            position: relative;
            z-index: 1;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .signup-image p {
            position: relative;
            z-index: 1;
            max-width: 300px;
            line-height: 1.6;
        }

        .signup-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .signup-form h2 {
            color: var(--text-color);
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding: 12px 0;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom-color: var(--primary-color);
        }

        .btn-signup {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .btn-signup:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255,77,77,0.3);
        }

        .password-strength {
            height: 5px;
            background-color: #e0e0e0;
            margin-top: 5px;
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .signup-links {
            text-align: center;
            margin-top: 20px;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating-icon {
            animation: float 3s ease-in-out infinite;
            position: absolute;
            opacity: 0.5;
        }

        .floating-icon-1 {
            top: 50px;
            left: 50px;
            font-size: 2rem;
            color: rgba(255,255,255,0.3);
        }

        .floating-icon-2 {
            bottom: 50px;
            right: 50px;
            font-size: 3rem;
            color: rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>
    <div class="signup-wrapper">
        <div class="signup-image">
            <i class="fas fa-utensils floating-icon floating-icon-1"></i>
            <i class="fas fa-wine-glass floating-icon floating-icon-2"></i>
            <h1>Welcome to Culinary World</h1>
            <p>Join our community and discover a world of gastronomic delights. Create your account and start your culinary journey today!</p>
        </div>
        <div class="signup-form">
            <h2>Create Your Account</h2>
            <form id="signupForm" action="register.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="password-strength">
                        <div id="passwordStrengthMeter" class="password-strength-meter"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
                <button type="submit" class="btn btn-signup w-100">Sign Up</button>
                <div class="signup-links">
                    <a href="signin.php" class="text-decoration-none" style="color: var(--secondary-color);">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordStrengthMeter = document.getElementById('passwordStrengthMeter');
        const signupForm = document.getElementById('signupForm');
        const showPasswordCheckbox = document.getElementById('showPassword');

        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length > 7) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[$@#&!]+/)) strength++;

            return strength;
        }

        function updatePasswordStrength() {
            const password = passwordInput.value;
            const strength = checkPasswordStrength(password);
            
            passwordStrengthMeter.style.width = `${strength * 20}%`;
            
            if (strength < 2) {
                passwordStrengthMeter.style.backgroundColor = '#ff6b6b';
            } else if (strength < 4) {
                passwordStrengthMeter.style.backgroundColor = '#feca57';
            } else {
                passwordStrengthMeter.style.backgroundColor = '#10ac84';
            }
        }

        passwordInput.addEventListener('input', updatePasswordStrength);

        signupForm.addEventListener('submit', function(e) {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                e.preventDefault();
            }
        });

        showPasswordCheckbox.addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            passwordInput.type = type;
            confirmPasswordInput.type = type;
        });
    </script>
</body>
</html>
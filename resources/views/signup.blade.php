<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Sistem Absensi Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #E6EEF8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .signup-container {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            min-height: 650px;
        }

        .left-section {
            flex: 1;
            padding: 60px 40px;
            background: #E6EEF8;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .desk {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 80px;
            background: #4CAF50;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .desk::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 10px;
            width: 180px;
            height: 10px;
            background: #388E3C;
            border-radius: 5px;
        }

        .monitor {
            position: absolute;
            top: -120px;
            left: 20px;
            width: 120px;
            height: 80px;
            background: #333;
            border-radius: 8px;
            border: 3px solid #222;
        }

        .monitor::before {
            content: '';
            position: absolute;
            top: 5px;
            left: 5px;
            width: 110px;
            height: 70px;
            background: #4285f4;
            border-radius: 4px;
        }

        .monitor::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 8px;
            background: #333;
            border-radius: 4px;
        }

        .person {
            position: absolute;
            top: -180px;
            right: 30px;
            width: 60px;
            height: 120px;
        }

        .person-head {
            width: 40px;
            height: 40px;
            background: #FFE0B2;
            border-radius: 50%;
            margin: 0 auto 10px;
            position: relative;
        }

        .person-head::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 10px;
            width: 4px;
            height: 4px;
            background: #333;
            border-radius: 50%;
            box-shadow: 12px 0 0 #333;
        }

        .person-head::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 15px;
            width: 10px;
            height: 2px;
            background: #333;
            border-radius: 1px;
        }

        .person-body {
            width: 50px;
            height: 70px;
            background: #546E7A;
            border-radius: 25px 25px 0 0;
            margin: 0 auto;
            position: relative;
        }

        .person-arm {
            position: absolute;
            top: 15px;
            right: -15px;
            width: 30px;
            height: 8px;
            background: #FFE0B2;
            border-radius: 4px;
            transform: rotate(-20deg);
        }

        .person-arm::after {
            content: '';
            position: absolute;
            right: -8px;
            top: -4px;
            width: 16px;
            height: 16px;
            background: #FF5722;
            border-radius: 50%;
        }

        .cat {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 40px;
            height: 25px;
            background: #8D6E63;
            border-radius: 20px;
        }

        .cat::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 8px;
            width: 8px;
            height: 8px;
            background: #8D6E63;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            box-shadow: 16px 0 0 #8D6E63;
        }

        .cat::after {
            content: '';
            position: absolute;
            right: -15px;
            top: 8px;
            width: 20px;
            height: 3px;
            background: #8D6E63;
            border-radius: 2px;
        }

        .left-text {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            max-width: 350px;
        }

        .right-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fafafa;
        }

        .signup-form {
            max-width: 400px;
            width: 100%;
        }

        .signup-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #4285f4;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.1);
        }

        .form-input.error {
            border-color: #f44336;
        }

        .form-input.valid {
            border-color: #4CAF50;
        }

        .error-message {
            color: #f44336;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .password-strength {
            margin-top: 5px;
            font-size: 12px;
        }

        .strength-weak { color: #f44336; }
        .strength-medium { color: #ff9800; }
        .strength-strong { color: #4CAF50; }

        .signup-button {
            width: 100%;
            padding: 15px;
            background: #4285f4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .signup-button:hover {
            background: #3367d6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.3);
        }

        .signup-button:active {
            transform: translateY(0);
        }

        .signup-button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #4285f4;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
                max-width: 500px;
                margin: 20px;
            }

            .left-section {
                padding: 40px 20px;
            }

            .right-section {
                padding: 40px 30px;
            }

            .signup-title {
                font-size: 2rem;
            }

            .left-text {
                font-size: 16px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .left-section {
            animation: fadeInLeft 0.8s ease-out;
        }

        .right-section {
            animation: fadeInUp 0.8s ease-out;
        }

        .person-arm {
            animation: wave 2s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: rotate(-20deg); }
            50% { transform: rotate(-5deg); }
        }

        .cat {
            animation: sleep 3s ease-in-out infinite;
        }

        @keyframes sleep {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="left-section">
            <img src="{{ asset('images/login.svg') }}" alt="Ilustrasi Login" style="max-width: 100%; height: auto; margin-bottom: 30px;">
            <p class="left-text">
                Dengan sistem absensi online, kamu bisa catat kehadiran kapan aja dan dari mana aja. Praktis, cepat, dan aman.
            </p>
        </div>

        <div class="right-section">
            <form class="signup-form" id="signupForm">
                <h1 class="signup-title">Sign Up</h1>
                
                <div class="form-group">
                    <label class="form-label" for="username">Create Username:</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-input"
                        placeholder="Masukkan username"
                        required
                    >
                    <div class="error-message" id="usernameError">Username minimal 3 karakter</div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email or Telp:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email" 
                        class="form-input"
                        placeholder="Masukkan email atau nomor telepon"
                        required
                    >
                    <div class="error-message" id="emailError">Format email atau nomor telepon tidak valid</div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Create Password:</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input"
                        placeholder="Masukkan password"
                        required
                    >
                    <div class="password-strength" id="passwordStrength"></div>
                    <div class="error-message" id="passwordError">Password minimal 6 karakter</div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirmPassword">Confirm Password:</label>
                    <input 
                        type="password" 
                        id="confirmPassword" 
                        name="confirmPassword" 
                        class="form-input"
                        placeholder="Konfirmasi password"
                        required
                    >
                    <div class="error-message" id="confirmPasswordError">Password tidak cocok</div>
                </div>

                <button type="submit" class="signup-button">Sign Up</button>

                <div class="login-link">
                    Sudah memiliki akun? <a href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form validation
        const form = document.getElementById('signupForm');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const signupButton = document.querySelector('.signup-button');

        // Validation functions
        function validateUsername() {
            const usernameValue = username.value.trim();
            const errorElement = document.getElementById('usernameError');
            
            if (usernameValue.length < 3) {
                username.classList.add('error');
                username.classList.remove('valid');
                errorElement.style.display = 'block';
                return false;
            } else {
                username.classList.remove('error');
                username.classList.add('valid');
                errorElement.style.display = 'none';
                return true;
            }
        }

        function validateEmail() {
            const emailValue = email.value.trim();
            const errorElement = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRegex = /^[0-9]{10,13}$/;
            
            if (!emailRegex.test(emailValue) && !phoneRegex.test(emailValue)) {
                email.classList.add('error');
                email.classList.remove('valid');
                errorElement.style.display = 'block';
                return false;
            } else {
                email.classList.remove('error');
                email.classList.add('valid');
                errorElement.style.display = 'none';
                return true;
            }
        }

        function validatePassword() {
            const passwordValue = password.value;
            const errorElement = document.getElementById('passwordError');
            const strengthElement = document.getElementById('passwordStrength');
            
            if (passwordValue.length < 6) {
                password.classList.add('error');
                password.classList.remove('valid');
                errorElement.style.display = 'block';
                strengthElement.textContent = '';
                return false;
            } else {
                password.classList.remove('error');
                password.classList.add('valid');
                errorElement.style.display = 'none';
                
                // Password strength indicator
                let strength = 0;
                if (passwordValue.length >= 8) strength++;
                if (/[A-Z]/.test(passwordValue)) strength++;
                if (/[0-9]/.test(passwordValue)) strength++;
                if (/[^A-Za-z0-9]/.test(passwordValue)) strength++;
                
                if (strength <= 1) {
                    strengthElement.textContent = 'Lemah';
                    strengthElement.className = 'password-strength strength-weak';
                } else if (strength <= 2) {
                    strengthElement.textContent = 'Sedang';
                    strengthElement.className = 'password-strength strength-medium';
                } else {
                    strengthElement.textContent = 'Kuat';
                    strengthElement.className = 'password-strength strength-strong';
                }
                
                return true;
            }
        }

        function validateConfirmPassword() {
            const confirmPasswordValue = confirmPassword.value;
            const errorElement = document.getElementById('confirmPasswordError');
            
            if (confirmPasswordValue !== password.value) {
                confirmPassword.classList.add('error');
                confirmPassword.classList.remove('valid');
                errorElement.style.display = 'block';
                return false;
            } else {
                confirmPassword.classList.remove('error');
                confirmPassword.classList.add('valid');
                errorElement.style.display = 'none';
                return true;
            }
        }

        // Real-time validation
        username.addEventListener('input', validateUsername);
        email.addEventListener('input', validateEmail);
        password.addEventListener('input', () => {
            validatePassword();
            if (confirmPassword.value) validateConfirmPassword();
        });
        confirmPassword.addEventListener('input', validateConfirmPassword);

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const isUsernameValid = validateUsername();
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();
            const isConfirmPasswordValid = validateConfirmPassword();
            
            if (isUsernameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                // Simulasi loading
                signupButton.textContent = 'Creating Account...';
                signupButton.disabled = true;
                
                // Simulasi proses registrasi
                setTimeout(() => {
                    alert('Akun berhasil dibuat! Silakan login dengan akun baru Anda.');
                    // Redirect ke halaman login
                    // window.location.href = '/login';
                    
                    signupButton.textContent = 'Sign Up';
                    signupButton.disabled = false;
                }, 2000);
            }
        });

        // Add focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
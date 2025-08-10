<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Absensi Online</title>
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

        .login-container {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            min-height: 600px;
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

        .login-form {
            max-width: 400px;
            width: 100%;
        }

        .login-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
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
            padding: 15px 20px;
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

        .login-button {
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
            margin-bottom: 20px;
        }

        .login-button:hover {
            background: #3367d6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.3);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .signup-link a {
            color: #4285f4;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
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

            .login-title {
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
    <div class="login-container">
        <div class="left-section">
            <img src="{{ asset('images/login.svg') }}" alt="Ilustrasi Login" style="max-width: 100%; height: auto; margin-bottom: 30px;">
            <p class="left-text">
                Dengan sistem absensi online, kamu bisa catat kehadiran kapan aja dan dari mana aja. Praktis, cepat, dan aman.
            </p>
        </div>

        <div class="right-section">
            <form class="login-form" id="loginForm">
                <h1 class="login-title">Login</h1>

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
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password:</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">Login</button>

                <div class="signup-link">
                    Belum memiliki akun? <a href="{{ route('signup') }}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simulasi loading
            const button = document.querySelector('.login-button');
            const originalText = button.textContent;
            button.textContent = 'Logging in...';
            button.disabled = true;

            // Simulasi proses login
            setTimeout(() => {
                // Hapus alert bawaan untuk validasi email/telp karena kita fokus pada redirect role
                // Validasi sederhana untuk password
                if (!password) {
                    alert('Password wajib diisi.');
                    button.textContent = originalText;
                    button.disabled = false;
                    return; // Hentikan eksekusi jika password kosong
                }

                // --- LOGIKA REDIRECT BERDASARKAN EMAIL ---
                if (email === 'admin@gmail.com') {
                    // Jika email adalah admin@gmail.com, redirect ke dashboard_admin
                    window.location.href = '/admin.dashboard_admin'; // Perhatikan, ini harus sesuai dengan nama route GET kamu
                }  else if (email === 'peserta@gmail.com') {
                    // Jika email adalah peserta@gmail.com, redirect ke dashboard_peserta
                    window.location.href = '/peserta.dashboard_peserta'; // Perhatikan, ini harus sesuai dengan nama route GET kamu
                } else {
                    // Jika email tidak cocok dengan yang terdaftar (admin, pembimbing, peserta)
                    alert('Email atau password salah. Silakan coba lagi.');
                }
                // --- AKHIR LOGIKA REDIRECT ---

                button.textContent = originalText;
                button.disabled = false;
            }, 1500); // Penundaan simulasi login 1.5 detik
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

        // Add typing animation effect
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#4285f4';
                } else {
                    this.style.borderColor = '#e0e0e0';
                }
            });
        });
    </script>
</body>
</html>
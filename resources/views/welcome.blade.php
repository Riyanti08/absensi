<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi Magang DPRD Kota Bogor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            background: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .logo img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .get-started-btn {
            background: #4285f4;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .get-started-btn:hover {
            background: #3367d6;
        }

        /* Hero Section */
        .hero {
            background: url('/images/gedung_dprd.svg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 60px;
            position: relative;
        }

        .hero::before {
            display: none;
        }

        .hero-content {
            max-width: 800px;
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        /* About Section */
        .about {
            padding: 80px 0;
            background: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image {
            position: relative;
        }

        .about-image::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 200px;
            background: #4285f4;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .device-mockup {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
        }

        .phone, .tablet {
            background: #333;
            border-radius: 20px;
            padding: 10px;
            margin: 0 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .phone {
            width: 120px;
            height: 200px;
        }

        .tablet {
            width: 160px;
            height: 120px;
        }

        .screen {
            background: #4285f4;
            border-radius: 10px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .about-text h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #333;
        }

        .about-text p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #666;
        }

        .features {
            list-style: none;
            margin-bottom: 30px;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1rem;
            color: #555;
        }

        .features li::before {
            content: '';
            width: 20px;
            height: 20px;
            background: #4285f4;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .features li:nth-child(1)::before { content: '⏰'; }
        .features li:nth-child(2)::before { content: '📊'; }
        .features li:nth-child(3)::before { content: '🔒'; }

        .cta-button {
            background: #4285f4;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #3367d6;
        }

        /* --- NEW FOOTER STYLES --- */
        .main-footer {
            background: #0356B5;
            color: white; /* Adjusted text color for readability on light blue */
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            margin-top: 60px; /* Space between about section and footer */
            display: flex;
            justify-content: space-between;
            align-items: stretch; /* Stretch items to fill height if needed */
            gap: 30px;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
        }

        .main-footer .footer-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 0 0 auto; /* Don't grow, take content width */
            max-width: 300px; /* Limit width */
        }

        .main-footer .footer-left img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .main-footer .footer-text-box {
            font-size: 18px;
            font-weight: 600;
            line-height: 1.3;
        }

        .main-footer .footer-middle {
            flex: 1; /* Allows the map container to take remaining space */
            min-width: 280px; /* Minimum width for the map */
            display: flex; /* To center map container if it doesn't take full flex-grow */
            justify-content: center;
            align-items: center;
        }

        .map-container {
            width: 100%;
            height: 200px; /* Fixed height for the map */
            border-radius: 15px;
            overflow: hidden; /* Ensures map content respects border-radius */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: #e0e9f5; /* Placeholder background */
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none; /* Remove default iframe border */
        }

        .main-footer .footer-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            flex: 0 0 auto; /* Don't grow, take content width */
            min-width: 250px; /* Minimum width for contact info */
        }

        .main-footer .footer-right h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
            color: white;
        }

        .main-footer .contact-item {
            display: flex;
            align-items: flex-start; /* Align icons to top of text */
            gap: 12px;
            padding: 5px 0; /* Some vertical spacing */
            font-size: 14px;
            color: white;
            font-weight: 500;
        }

        .main-footer .contact-item img {
            width: 20px;
            height: 20px;
            object-fit: contain;
            flex-shrink: 0; /* Prevent icon from shrinking */
            filter: brightness(0.6); /* Slightly darken icons to match image */
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-text {
                order: 1;
            }

            .about-image {
                order: 2;
            }

            .contact-info {
                flex-direction: column;
                align-items: flex-start;
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

        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        .about-content > div {
            animation: fadeInUp 1s ease-out;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor" width="30" height="30">
                DailyIntern
            </div>
            <a href="{{ route('login') }}" class="get-started-btn">Get Started</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Sistem Absensi Magang<br>DPRD Kota Bogor</h1>
            <p>Sistem absensi digital untuk meningkatkan transparansi dan produktivitas</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="{{ asset('images/about_us.svg') }}" alt="Tentang Kami" style="width: 100%; max-width: 400px; z-index: 2; position: relative;">
                </div>

                <div class="about-text">
                    <h2>About us</h2>
                    <p>Sistem ini dirancang khusus untuk mencatat kehadiran peserta magang secara cepat, akurat, dan real-time.</p>
                    <ul class="features">
                        <li>Absen tinggal klik, gak pake ribet</li>
                        <li>Bisa liat riwayat kehadiran sendiri, kapan aja</li>
                        <li>Data aman dan langsung ke sistem, no tipu-tipu</li>
                    </ul>
                    <a href="{{ route('login') }}" class="cta-button">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
    <div class="footer-left">
        <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor">
        <div class="footer-text-box">
            Sistem Absensi Magang<br>DPRD Kota Bogor
        </div>
    </div>

    <div class="footer-middle">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.78453488258!2d106.79061097486899!3d-6.551717993437976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e3d9f7a77b%3A0xc3f1d8f5d0b4b2c1!2sDPRD%20Kota%20Bogor!5e0!3m2!1sen!2sid!4v1701768800000!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <div class="footer-right">
        <h3>Kontak</h3>
        <div class="contact-item">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z'/%3E%3C/svg%3E" alt="Location Icon">
            <span>Jl. Pemuda No.25, Tanah Sareal, Kota Bogor.</span>
        </div>
        <div class="contact-item">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z'/%3E%3C/svg%3E" alt="Phone Icon">
            <span>(0251) 8323472</span>
        </div>
        <div class="contact-item">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z'/%3E%3C/svg%3E" alt="Email Icon">
            <span>dprdbgr@gmail.com</span>
        </div>
    </div>
</footer>

    <script>
        // Smooth scrolling for buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.textContent === 'Get Started') {
                    e.preventDefault();
                    document.querySelector('.about').scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = '#fff';
                header.style.backdropFilter = 'none';
            }
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.about-content > div').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>
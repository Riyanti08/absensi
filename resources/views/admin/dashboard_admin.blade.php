<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyIntern</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #e8eef5;
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            padding: 10px 20px;
            border-radius: 16px;
            width: fit-content;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-box img {
            width: 60px;
            height: 60px;
        }

        .logo-text {
            color: black;
            font-size: 20px;
            font-weight: 500;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-text {
            color: #333;
            font-size: 14px;
        }

        .profile-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        .profile-icon:active {
            transform: scale(0.95);
        }
        .header-right .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }
        .notification-icon:hover, .settings-icon:hover {
            color: #007bff;
        }
        .notification-icon:active, .settings-icon:active {
            transform: scale(0.95);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-items: center;
            padding: 0 10px;
            margin-bottom: 40px;
        }

        .menu-item {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-width: 180px;
            max-width: 100%;
            height: 150px;
            position: relative;
            overflow: hidden;
        }

        .menu-item img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .menu-text {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            position: relative;
            z-index: 2;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 1);
        }

        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
            z-index: 1;
        }

        .menu-item:hover::before {
            left: 100%;
        }

        .menu-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .stats-section {
            margin: 40px 0;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            max-width: 800px;
            margin: 0 auto;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 160px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            border-radius: 0 6px 6px 0;
        }

        .stat-card.total-peserta::before {
            background: #4A90E2;
        }

        .stat-card.aktif-hari-ini::before {
            background: #7ED321;
        }

        .stat-card.laporan-bulan::before {
            background: #F5A623;
        }

        .stat-card.tingkat-kehadiran::before {
            background: #BD10E0;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .stat-card.total-peserta .stat-number {
            color: #4A90E2;
        }

        .stat-card.aktif-hari-ini .stat-number {
            color: #7ED321;
        }

        .stat-card.laporan-bulan .stat-number {
            color: #F5A623;
        }

        .stat-card.tingkat-kehadiran .stat-number {
            color: #BD10E0;
        }

        .stat-label {
            font-size: 16px;
            color: #666;
            font-weight: 500;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            .menu-grid {
                grid-template-columns: 1fr;
                padding: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .header-right {
                width: 100%;
                justify-content: flex-end;
            }

            .footer {
                flex-direction: column;
                align-items: center;
                gap: 20px;
                padding: 30px;
                border-radius: 30px 30px 0 0;
                text-align: center;
            }

            .footer-left,
            .footer-right {
                flex: none;
                width: 100%;
                max-width: 300px;
            }
            .footer-left {
                justify-content: center;
            }
            .footer-text-box {
                text-align: center;
            }

            .contact-item {
                justify-content: center;
            }

            .map-container {
                height: 200px;
                width: 100%;
            }
        }

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

        .menu-item {
            animation: fadeInUp 0.6s ease forwards;
        }

        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.2s; }
        .menu-item:nth-child(3) { animation-delay: 0.3s; }
        .menu-item:nth-child(4) { animation-delay: 0.4s; }
        .menu-item:nth-child(5) { animation-delay: 0.5s; }
        .menu-item:nth-child(6) { animation-delay: 0.6s; }
        .menu-item:nth-child(7) { animation-delay: 0.7s; }
        .menu-item:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-box">
                <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor">
                <span class="logo-text">DailyIntern</span>
            </div>
            <div class="header-right">
                <span class="admin-text">Admin</span>
                <div class="profile-icon" onclick="navigateTo('profile_admin')">
                    <img src="{{ asset('images/profile.svg') }}" alt="Profil Pengguna">
                </div>
                <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_admin')">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
                <svg class="settings-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('settings')">
                    <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                </svg>
            </div>
        </div>
        <div class="menu-grid">
            <div class="menu-item" onclick="navigateTo('home_admin')">
                <img src="{{ asset('images/icon_home.svg') }}">
                <div class="menu-text">Home</div>
            </div>

            <div class="menu-item" onclick="navigateTo('menu_peserta')">
                <img src="{{ asset('images/icon_peserta.svg') }}">
                <div class="menu-text">Peserta</div>
            </div>

            <div class="menu-item" onclick="navigateTo('absensi_admin')">
                <img src="{{ asset('images/icon_absensi.svg') }}">
                <div class="menu-text">Absensi</div>
            </div>

            <div class="menu-item" onclick="navigateTo('laporan_admin')">
                <img src="{{ asset('images/icon_laporan.svg') }}">
                <div class="menu-text">Laporan</div>
            </div>

            <div class="menu-item" onclick="navigateTo('dokumen_admin')">
                <img src="{{ asset('images/icon_document.svg') }}">
                <div class="menu-text">Dokumen</div>
            </div>

            <div class="menu-item" onclick="navigateTo('statistik_admin')">
                <img src="{{ asset('images/icon_statistik.svg') }}">
                <div class="menu-text">Statistik</div>
            </div>
        </div>

        <!-- Statistik Section -->
        <div class="stats-section">
            <div class="section-title">📈 Ringkasan Statistik</div>
            <div class="stats-grid">
                <div class="stat-card total-peserta">
                    <div class="stat-number">149</div>
                    <div class="stat-label">Total Peserta</div>
                </div>
                <div class="stat-card aktif-hari-ini">
                    <div class="stat-number">142</div>
                    <div class="stat-label">Aktif Hari Ini</div>
                </div>
                <div class="stat-card laporan-bulan">
                    <div class="stat-number">90</div>
                    <div class="stat-label">Laporan Bulan Ini</div>
                </div>
                <div class="stat-card tingkat-kehadiran">
                    <div class="stat-number">91.8%</div>
                    <div class="stat-label">Tingkat Kehadiran</div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Fungsionalitas navigateTo
    function navigateTo(page, event = null) {
        if (event && event.currentTarget) {
            const targetElement = event.currentTarget;
            targetElement.style.transform = 'scale(0.95)';
            setTimeout(() => {
                targetElement.style.transform = '';
                performNavigation(page);
            }, 150);
        } else {
            performNavigation(page);
        }
    }

    function performNavigation(page) {
    const routes = {
        home_admin: '/admin.home_admin',
        // Ubah 'peserta' menjadi 'menu_peserta'
        menu_peserta: '/admin.menu_peserta', 
        absensi_admin: '/admin.absensi_admin',
        laporan_admin: '/admin.laporan_admin',
        dokumen_admin: '/admin.dokumen_admin',
        statistik_admin: '/admin.statistik_admin',
        profile_admin: '/admin.profile_admin',
        notifikasi_admin: '/admin.notifikasi_admin',
        settings: 'settings' 
    };
    window.location.href = routes[page] || '/';
}

    // Animasi klik untuk menu-item (sudah ada)
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const page = item.getAttribute('onclick').match(/'([^']+)'/)[1];
            navigateTo(page, e);
        });
    });

    // Efek parallax ringan
    document.addEventListener('mousemove', (e) => {
        const items = document.querySelectorAll('.menu-item');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        items.forEach((item, index) => {
            const speed = (index + 1) * 0.5;
            const rotateX = (y - 0.5) * speed;
            const rotateY = (x - 0.5) * speed;

            item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
    });

    document.addEventListener('mouseleave', () => {
        const items = document.querySelectorAll('.menu-item');
        items.forEach(item => {
            item.style.transform = '';
        });
    });

    // Tambahkan event listener untuk ikon di header
    document.addEventListener('DOMContentLoaded', () => {
        const profileIcon = document.querySelector('.profile-icon');
        const notificationIcon = document.querySelector('.notification-icon');
        const settingsIcon = document.querySelector('.settings-icon');

        // Pastikan event listener tidak duplikat dengan onclick di HTML
        if (profileIcon) {
            profileIcon.addEventListener('click', function(e) {
                // Gunakan nama rute yang benar
                navigateTo('profile_admin', e);
            });
        }
        if (notificationIcon) {
            notificationIcon.addEventListener('click', function(e) {
                navigateTo('notifikasi_admin', e);
            });
        }
        if (settingsIcon) {
            settingsIcon.addEventListener('click', function(e) {
                navigateTo('settings', e);
            });
        }
    });
    </script>
</body>
</html>
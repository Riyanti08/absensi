<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kehadiran - Universitas Pakuan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #E6EEF8;
            min-height: 100vh;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 20px;
            margin-right: 15px;
            cursor: pointer;
            color: #333;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        /* --- Fixed Header Right Styles --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-text {
            color: #333;
            font-size: 14px;
            font-weight: 500;
        }

        .profile-icon {
            width: 36px; /* Define the size of the circular container */
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden; /* Ensures image stays within the circle */
            border: 2px solid #e2e8f0; /* Optional: adds a slight border */
            transition: border-color 0.2s ease;
        }

        .profile-icon:hover {
            border-color: #4A90E2; /* Optional: hover effect on border */
        }

        .profile-icon img {
            width: 100%; /* Make the image fill the container */
            height: 100%;
            object-fit: cover; /* Ensures the image covers the area without distortion */
            border-radius: 50%; /* Ensures the image itself is also circular */
        }

        /* Fallback if no image */
        .profile-icon-fallback {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            font-size: 14px;
            font-weight: 600;
        }

        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #4A90E2;
        }
        /* --- End Fixed Header Right Styles --- */

        .container {
            padding: 70px 30px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .main-content {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .welcome {
            margin-bottom: 10px;
        }

        .welcome h1 {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 5px;
        }

        .university {
            color: #718096;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .stats-section h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .trend-icon {
            color: #48bb78;
            font-size: 24px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            padding: 25px;
            border-radius: 15px;
            color: white;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .stat-card.hadir {
            background: linear-gradient(135deg, #48bb78, #38a169);
        }

        .stat-card.izin {
            background: linear-gradient(135deg, #4299e1, #3182ce);
        }

        .stat-card.terlambat {
            background: linear-gradient(135deg, #ed8936, #dd6b20);
        }

        .stat-card.alpa {
            background: linear-gradient(135deg, #e53e3e, #c53030);
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            margin: 10px 0;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
        }

        .activity-section h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .activity-icon {
            color: #4299e1;
            font-size: 24px;
        }

        .activity-log {
            background: #f7fafc;
            border-radius: 15px;
            padding: 20px;
            border: 1px solid #e2e8f0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s ease;
        }

        .activity-item:hover {
            background-color: rgba(66, 153, 225, 0.05);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon-small {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .activity-icon-small.success {
            background: #48bb78;
        }

        .activity-icon-small.warning {
            background: #ed8936;
        }

        .activity-icon-small.info {
            background: #4299e1;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 3px;
        }

        .activity-desc {
            font-size: 14px;
            color: #718096;
        }

        .activity-time {
            font-size: 12px;
            color: #a0aec0;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px 15px;
            }

            .header {
                padding: 12px 20px;
            }

            .header-right {
                gap: 10px;
            }

            .admin-text {
                font-size: 12px;
            }

            .profile-icon {
                width: 32px;
                height: 32px;
            }

            .main-content {
                padding: 20px;
                margin-top: 20px;
            }

            .welcome h1 {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-btn" onclick="window.history.back()">←</span>
            <h1 class="page-title">Home</h1>
        </div>
        <div class="header-right">
            <span class="admin-text">Peserta</span>
            <div class="profile-icon" onclick="navigateTo('profile_peserta')">
                <img src="images/profile_peserta.svg" alt="Profil Pengguna"> 
            </div>
            <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_peserta')">
                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
            </svg>
        </div>
    </div>
    
    <div class="container">
        <div class="main-content">
            <div class="welcome">
                <h1>Selamat Datang, Jennie! 👋</h1>
                <p class="university">Universitas Pakuan - Hukum</p>
            </div>

            <div class="stats-section">
                <h2>
                    <span class="trend-icon">📈</span>
                    Statistik Bulanan Kehadiran
                </h2>
                <div class="stats-grid">
                    <div class="stat-card hadir">
                        <div class="stat-number">20</div>
                        <div class="stat-label">dari 22 hari kerja</div>
                        <div style="margin-top: 10px; font-weight: 600;">Hadir</div>
                    </div>
                    <div class="stat-card izin">
                        <div class="stat-number">2</div>
                        <div class="stat-label">hari izin</div>
                        <div style="margin-top: 10px; font-weight: 600;">Izin</div>
                    </div>
                    <div class="stat-card terlambat">
                        <div class="stat-number">0</div>
                        <div class="stat-label">keterlambatan</div>
                        <div style="margin-top: 10px; font-weight: 600;">Terlambat</div>
                    </div>
                    <div class="stat-card alpa">
                        <div class="stat-number">0</div>
                        <div class="stat-label">tanpa keterangan</div>
                        <div style="margin-top: 10px; font-weight: 600;">Alpa</div>
                    </div>
                </div>
            </div>

            <div class="activity-section">
                <h2>
                    <span class="activity-icon">📊</span>
                    Aktivitas Log Personal
                </h2>
                <div class="activity-log">
                    <div class="activity-item">
                        <div class="activity-icon-small success">✓</div>
                        <div class="activity-content">
                            <div class="activity-title">Absen Masuk</div>
                            <div class="activity-desc">Berhasil absen masuk dengan tepat waktu</div>
                        </div>
                        <div class="activity-time">06:30 | 22/07/2025</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon-small success">✓</div>
                        <div class="activity-content">
                            <div class="activity-title">Absen Keluar</div>
                            <div class="activity-desc">Berhasil absen keluar dengan tepat waktu</div>
                        </div>
                        <div class="activity-time">15:30 | 22/07/2025</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon-small warning">📄</div>
                        <div class="activity-content">
                            <div class="activity-title">Upload Laporan Kegiatan</div>
                            <div class="activity-desc">Laporan kegiatan harian berhasil diunggah</div>
                        </div>
                        <div class="activity-time">16:00 | 20/07/2025</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon-small success">✓</div>
                        <div class="activity-content">
                            <div class="activity-title">Absen Masuk</div>
                            <div class="activity-desc">Masuk terlambat 15 menit</div>
                        </div>
                        <div class="activity-time">09:15 | 21/07/2025</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon-small info">ℹ️</div>
                        <div class="activity-content">
                            <div class="activity-title">Pengajuan Izin</div>
                            <div class="activity-desc">Izin karena sedang sakit - Disetujui</div>
                        </div>
                        <div class="activity-time">09:00 | 20/07/2025</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function navigateTo(page, event = null) {
            const routes = {
                notifikasi_peserta: '/peserta.notifikasi_peserta',
                profile_peserta: '/peserta.profile_peserta'
            };
            window.location.href = routes[page] || '/';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('click', function() {
                    const cardType = this.classList[1];
                    console.log(`Clicked on ${cardType} card`);
                });
            });

            const activityItems = document.querySelectorAll('.activity-item');
            activityItems.forEach(item => {
                item.addEventListener('click', function() {
                    console.log('Activity item clicked');
                });
            });

            const notificationIcon = document.querySelector('.notification-icon');
            const settingsIcon = document.querySelector('.settings-icon');

            if (notificationIcon) {
                notificationIcon.addEventListener('click', function() {
                    navigateTo('notifikasi_peserta');
                });
            }

            document.querySelectorAll('.back-btn, .profile-icon, .notification-icon, .settings-icon').forEach(el => {
                el.addEventListener('mousedown', function() {
                    this.style.transform = 'scale(0.95)';
                });
                el.addEventListener('mouseup', function() {
                    this.style.transform = '';
                });
                el.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });
        });
    </script>
</body>
</html>
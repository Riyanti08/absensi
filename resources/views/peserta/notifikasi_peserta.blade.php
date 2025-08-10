<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <style>
        /* CSS Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #E6EEF8;
            min-height: 100vh;
            padding-top: 100px;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: white;
            height: 80px;
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
            transition: transform 0.2s ease-in-out;
        }

        .back-btn:active {
            transform: scale(0.95);
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
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            transition: border-color 0.2s ease, transform 0.2s ease-in-out;
            text-decoration: none;
        }

        .profile-icon:hover {
            border-color: #4A90E2;
        }

        .profile-icon:active {
            transform: scale(0.95);
        }

        .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Fallback if no image */
        .profile-icon-fallback {
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: white;
            font-size: 14px;
            font-weight: 600;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #4A90E2;
        }

        .notification-icon:active, .settings-icon:active {
            transform: scale(0.95);
        }
        /* --- End Fixed Header Right Styles --- */

        .main-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .notification-card {
            background: white;
            border-radius: 15px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            position: relative;
            width: 100%;
            max-width: 800px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: slideUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
            cursor: pointer;
        }

        .notification-border {
            width: 5px;
            flex-shrink: 0;
        }

        .notification-border.red {
            background: #ff6b6b;
        }

        .notification-border.yellow {
            background: #ffd93d;
        }

        .notification-border.green {
            background: #6bcf7f;
        }

        .notification-border.blue {
            background: #4dabf7;
        }

        .notification-content {
            padding: 20px;
            flex: 1;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 32px;
        }

        .notification-icon.clock {
            background: #fff2e6;
        }

        .notification-icon.chart {
            background: #e6f3ff;
        }

        .notification-icon.megaphone {
            background: #e6f7ff;
        }

        .notification-text {
            flex: 1;
        }

        .notification-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .notification-subtitle {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.4;
        }

        /* Animation for cards */
        .notification-card:nth-child(1) {
            animation-delay: 0.1s;
        }
        .notification-card:nth-child(2) {
            animation-delay: 0.2s;
        }
        .notification-card:nth-child(3) {
            animation-delay: 0.3s;
        }
        .notification-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        @media (min-width: 768px) {
            .main-content {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
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
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <span class="back-btn" onclick="window.history.back()">←</span>
                <h1 class="page-title">Notifikasi</h1>
            </div>
            <div class="header-right">
                <span class="admin-text">Peserta</span>
                <a href="/profile_peserta" class="profile-icon">
                    <img src="images/profile_peserta.svg" alt="Profil Pengguna"> 
                </a>
            </div>
        </div>

        <div class="main-content">
            <div class="notification-card">
                <div class="notification-border red"></div>
                <div class="notification-content">
                    <div class="notification-icon clock">
                        ⏰
                    </div>
                    <div class="notification-text">
                        <div class="notification-title">Reminder Absen Masuk</div>
                        <div class="notification-subtitle">Jangan lupa untuk absen masuk sebelum di tutup pada pukul 10.00 WIB</div>
                    </div>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-border yellow"></div>
                <div class="notification-content">
                    <div class="notification-icon chart">
                        📊
                    </div>
                    <div class="notification-text">
                        <div class="notification-title">Permohonan Izin Disetujui</div>
                        <div class="notification-subtitle">Permohan Izin sakit dari tanggal 23 - 24 Juli 2025 disetujui</div>
                    </div>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-border green"></div>
                <div class="notification-content">
                    <div class="notification-icon clock">
                        ⏰
                    </div>
                    <div class="notification-text">
                        <div class="notification-title">Reminder Absen Keluar</div>
                        <div class="notification-subtitle">Jangan lupa untuk absen keluar sebelum di tutup pada pukul 16.00 WIB</div>
                    </div>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-border blue"></div>
                <div class="notification-content">
                    <div class="notification-icon megaphone">
                        📢
                    </div>
                    <div class="notification-text">
                        <div class="notification-title">Pengumuman Rapat Peserta Magang</div>
                        <div class="notification-subtitle">Jangan lupa untuk menghadiri rapat pada pukul 13.00 WIB</div>
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
        
        // Add click functionality to notification cards
        document.querySelectorAll('.notification-card').forEach(card => {
            card.addEventListener('click', function() {
                const title = this.querySelector('.notification-title').textContent;
                alert(`Membuka notifikasi: ${title}`);
                // In a real application, you would add an event handler to show a detailed view
            });
        });

        // Add smooth loading animation and interaction effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add interaction effects to header elements
            document.querySelectorAll('.back-btn, .profile-icon').forEach(el => {
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
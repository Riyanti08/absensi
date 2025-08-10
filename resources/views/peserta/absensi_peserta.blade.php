<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
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

        .time-card {
            background: linear-gradient(135deg, #94C2DA 37%, #0356B5 100%);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .time-display {
            font-size: 4rem;
            font-weight: 300;
            margin-bottom: 10px;
            letter-spacing: -2px;
        }

        .date-display {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .work-hours {
            font-size: 1rem;
            opacity: 0.8;
        }

        .status-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .status-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .status-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .status-icon {
            width: 60px;
            height: 60px;
            background: #f0f0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: #999;
        }

        .status-text {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .attendance-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-checkin {
            background: #4CAF50;
            color: white;
        }

        .btn-checkin:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        .btn-checkout {
            background: #f5f5f5;
            color: #999;
            border: 2px solid #e0e0e0;
        }

        .btn-note {
            font-size: 0.8rem;
            color: #999;
            text-align: center;
            margin-top: 5px;
        }

        .history-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .history-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #666;
            font-size: 0.9rem;
            border-bottom: 1px solid #eee;
        }

        .history-table td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.9rem;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-hadir {
            background: #e8f5e8;
            color: #4CAF50;
        }

        .status-terlambat {
            background: #fff3cd;
            color: #856404;
        }

        .check-icon {
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .time-display {
                font-size: 3rem;
            }
            
            .status-section {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 10px;
            }

            body {
                padding: 10px;
                padding-top: 100px; /* Sesuaikan padding-top untuk mobile */
            }

            .header {
                padding: 15px 20px;
            }
            .page-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-btn" onclick="window.history.back()">←</span>
            <h1 class="page-title">Absensi</h1>
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
        <div class="time-card">
            <div class="time-display" id="current-time">11.18.53</div>
            <div class="date-display">Rabu, 23 Juli 2025</div>
            <div class="work-hours">Jam kerja: 09.00 - 15.00</div>
        </div>

        <div class="status-section">
            <div class="status-card">
                <div class="status-title">Status Hari Ini</div>
                <div class="status-icon">🕐</div>
                <div class="status-text">Belum melakukan absensi hari ini</div>
            </div>

            <div class="status-card">
                <div class="status-title">Absensi Hari Ini</div>
                <div class="attendance-buttons">
                    <button class="btn btn-checkin">
                        <span class="check-icon">✓</span>
                        Absen Masuk
                    </button>
                    <div class="btn-note">Tekan untuk Absen Masuk</div>
                    
                    <button class="btn btn-checkout">
                        <span class="check-icon">↗</span>
                        Absen Keluar
                    </button>
                    <div class="btn-note">Absen Masuk terlebih dahulu</div>
                </div>
            </div>
        </div>

        <div class="history-section">
            <div class="history-title">Status Absensi Terbaru</div>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>22 Jul</td>
                        <td><span class="status-badge status-hadir">Hadir</span></td>
                        <td>08.30</td>
                        <td>15.00</td>
                    </tr>
                    <tr>
                        <td>21 Jul</td>
                        <td><span class="status-badge status-hadir">Hadir</span></td>
                        <td>08.30</td>
                        <td>14.45</td>
                    </tr>
                    <tr>
                        <td>20 Jul</td>
                        <td><span class="status-badge status-hadir">Hadir</span></td>
                        <td>09.00</td>
                        <td>15.25</td>
                    </tr>
                    <tr>
                        <td>19 Jul</td>
                        <td><span class="status-badge status-terlambat">Terlambat</span></td>
                        <td>09.10</td>
                        <td>15.25</td>
                    </tr>
                </tbody>
            </table>
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
        
        // Update waktu real-time
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            document.getElementById('current-time').textContent = `${hours}.${minutes}.${seconds}`;
        }

        // Update setiap detik
        setInterval(updateTime, 1000);
        updateTime(); // Panggil sekali saat halaman dimuat

        // Simulasi fungsi absensi
        document.querySelector('.btn-checkin').addEventListener('click', function() {
            alert('Absen masuk berhasil!');
            // Di sini bisa ditambahkan logika untuk mengirim data ke server
        });

        document.querySelector('.btn-checkout').addEventListener('click', function() {
            if (this.classList.contains('btn-checkout')) {
                alert('Silakan absen masuk terlebih dahulu!');
            } else {
                alert('Absen keluar berhasil!');
            }
        });

        // Simulasi toggle status tombol
        let isCheckedIn = false;
        
        document.querySelector('.btn-checkin').addEventListener('click', function() {
            if (!isCheckedIn) {
                isCheckedIn = true;
                this.style.background = '#f5f5f5';
                this.style.color = '#999';
                this.innerHTML = '<span class="check-icon">✓</span> Sudah Absen';
                
                const checkoutBtn = document.querySelector('.btn-checkout');
                checkoutBtn.style.background = '#ff5722';
                checkoutBtn.style.color = 'white';
                checkoutBtn.classList.remove('btn-checkout');
                
                document.querySelector('.status-text').textContent = 'Sudah absen masuk hari ini';
                document.querySelector('.status-icon').textContent = '✓';
                document.querySelector('.status-icon').style.background = '#e8f5e8';
                document.querySelector('.status-icon').style.color = '#4CAF50';
            }
        });
    </script>
</body>
</html>
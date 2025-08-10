<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyIntern - Home</title>
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

        /* --- Updated Header Right Styles --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px; /* Increased gap for better spacing */
        }

        .admin-text {
            color: #333;
            font-size: 14px; /* Smaller font size as per previous design */
        }

        .profile-icon {
            width: 32px; /* Consistent width */
            height: 32px; /* Consistent height */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            cursor: pointer; /* Indicate it's clickable */
        }

        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out; /* Smooth transition for hover */
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #4A90E2; /* Hover color for icons */
        }
 
        /* --- End Updated Header Right Styles --- */

        .container {
            padding: 100px 30px 30px;
            max-width: 1400px;
            margin: 0 auto;
        } 
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
            margin-bottom: 30px;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .stat-item {
            text-align: left;
            position: relative;
        }

        .stat-item::after {
            content: '';
            position: absolute;
            right: -10px;
            top: 0;
            bottom: 0;
            width: 1px;
            background: #E0E0E0;
        }

        .stat-item:last-child::after {
            display: none;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            color: white;
            font-size: 20px;
        }

        .stat-icon.blue {
            background: #4A90E2;
        }

        .stat-icon.green {
            background: #7ED321;
        }

        .stat-icon.orange {
            background: #F5A623;
        }

        .stat-icon.red {
            background: #D0021B;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            line-height: 1.3;
        }

        .notification-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
        }

        .notification-item::before {
            content: '●';
            color: #4A90E2;
            margin-right: 8px;
            margin-top: 2px;
        }

        .notification-item:last-child {
            margin-bottom: 20px;
        }

        .notification-btn {
            background: #4A90E2;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .notification-btn:hover {
            background: #357ABD;
        }

        .reports-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .report-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .report-table {
            width: 100%;
            margin-bottom: 15px;
        }

        .report-table th {
            text-align: left;
            padding: 12px 0;
            border-bottom: 1px solid #E0E0E0;
            font-size: 14px;
            font-weight: 600;
            color: #666;
        }

        .report-table td {
            padding: 15px 0;
            border-bottom: 1px solid #F0F0F0;
            font-size: 14px;
            color: #333;
        }

        .status-active {
            color: #666;
        }

        .status-inactive {
            color: #666;
        }

        .status-warning {
            color: #D0021B;
        }

        .view-all-btn {
            background: none;
            border: none;
            color: #4A90E2;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
        }

        .chart-container {
            height: 200px;
            margin-top: 20px;
            position: relative;
        }

        .chart {
            display: flex;
            align-items: end;
            justify-content: space-between;
            height: 150px;
            padding: 0 10px;
            border-bottom: 1px solid #E0E0E0;
        }

        .chart-bar {
            width: 40px;
            background: #5CB3CC;
            margin: 0 20px;
            position: relative;
        }

        .chart-bar.bar-0 { height: 80px; }
        .chart-bar.bar-1 { height: 5px; }
        .chart-bar.bar-2 { height: 85px; }
        .chart-bar.bar-3 { height: 150px; }
        .chart-bar.bar-4 { height: 120px; }

        .chart-labels {
            display: flex;
            justify-content: space-between;
            padding: 10px 30px 0;
            font-size: 12px;
            color: #666;
        }

        .chart-y-axis {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 30px;
            width: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-size: 10px;
            color: #666;
        }

        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .reports-section {
                grid-template-columns: 1fr;
            }
            
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .header {
                padding: 15px 20px;
            }
            
            .stats-row {
                grid-template-columns: 1fr;
            }
            
            .stat-item::after {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <button class="back-btn">←</button>
            <h1 class="page-title">Home</h1>
        </div>
        <div class="header-right">
            <span class="admin-text">Admin</span>
            <a href="#" onclick="event.preventDefault(); navigateTo('profile_admin')">
            <img src="{{ asset('images/profile.svg') }}" alt="Profil Pengguna">
            </a>
            <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_admin')">
                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
            </svg>
            <svg class="settings-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('settings')">
                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
            </svg>
        </div>
    </div>

    <div class="container">
        <div class="dashboard-grid">
            <div class="stats-card">
                <h2 class="card-title">Peserta Magang</h2>
                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-icon blue">👥</div>
                        <div class="stat-number">150</div>
                        <div class="stat-label">Total<br>Peserta Magang</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon green">✓</div>
                        <div class="stat-number">120</div>
                        <div class="stat-label">Kehadiran<br>Hari Ini</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon orange">📄</div>
                        <div class="stat-number">10</div>
                        <div class="stat-label">Laporan<br>Masuk</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon red">⚠️</div>
                        <div class="stat-number">5</div>
                        <div class="stat-label">Izin Tidak<br>Masuk</div>
                    </div>
                </div>
            </div>

            <div class="notification-card">
                <h2 class="card-title">Notifikasi Terbaru</h2>
                <div class="notification-item">Syifa - Izin sakit</div>
                <div class="notification-item">Jeni - Izin sakit</div>
                <button class="notification-btn">Klik untuk selengkapnya</button>
            </div>
        </div>

        <div class="reports-section">
            <div class="report-card">
                <h2 class="card-title">Laporan</h2>
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal mulai & berakhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jaya</td>
                            <td>14 juli - 14 agustus</td>
                            <td class="status-active">Sedang Magang</td>
                        </tr>
                        <tr>
                            <td>Yanti</td>
                            <td>23 Sempetember - 23 Oktober</td>
                            <td class="status-inactive">Belum Magang</td>
                        </tr>
                        <tr>
                            <td>Zahra</td>
                            <td>17 Mei - 17 Juli</td>
                            <td class="status-warning">Besok Berakhir!</td>
                        </tr>
                    </tbody>
                </table>
                <button class="view-all-btn">Lihat Semua</button>
            </div>

            <div class="report-card">
                <h2 class="card-title">Grafik Kehadiran</h2>
                <div class="chart-container">
                    <div class="chart-y-axis">
                        <span>100</span>
                        <span>75</span>
                        <span>50</span>
                        <span>25</span>
                        <span>0</span>
                    </div>
                    <div class="chart">
                        <div class="chart-bar bar-0"></div>
                        <div class="chart-bar bar-1"></div>
                        <div class="chart-bar bar-2"></div>
                        <div class="chart-bar bar-3"></div>
                        <div class="chart-bar bar-4"></div>
                    </div>
                    <div class="chart-labels">
                        <span>0</span>
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // A single navigateTo function to handle all navigation
        function navigateTo(page) {
            const routes = {
                profile_admin: '/admin.profile_admin',        
                notifikasi_admin: '/admin.notifikasi_admin', 
                settings: '/settings',      
            };
            const target = routes[page] || '/';
            window.location.href = target;
        }

        document.querySelector('.back-btn').addEventListener('click', function() {
            window.history.back();
        });

        document.querySelector('.notification-btn').addEventListener('click', function() {
            navigateTo('notifikasi_admin');
        });

        document.querySelector('.view-all-btn').addEventListener('click', function() {
            console.log('View all reports clicked');
            // Add view all reports logic here, or navigate:
            // navigateTo('laporan');
        });

        // Add hover effects for table rows
        document.querySelectorAll('.report-table tr').forEach(row => {
            if (row.querySelector('td')) { // Ensures it's a data row, not just the header
                row.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#F8F9FA';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            }
        });

        if (profileIcon) {
        profileIcon.addEventListener('click', function(e) {
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
    </script>
</body>
</html>
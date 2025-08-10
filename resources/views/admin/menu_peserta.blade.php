<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta Magang</title>
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

        /* Header */
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
            gap: 15px;
        }

        .back-arrow {
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }

        .header-title {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        /* --- Updated Header Right Styles (from previous dashboard) --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px; /* Increased gap for better spacing */
        }

        .admin-text {
            color: #333;
            font-size: 14px; /* Consistent font size */
        }

        .profile-icon {
            width: 32px; /* Consistent width */
            height: 32px; /* Consistent height */
            background-color: #dc3545; /* Red background from previous design */
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

        /* Main Content */
        .main-content {
            display: flex;
            gap: 20px;
            padding: 120px 30px 30px; /* tambahkan top padding biar gak ketiban header */
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Card Container */
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            flex: 1;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #333;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 500;
            font-size: 14px;
            color: #333;
        }

        td {
            font-size: 14px;
            color: #333;
            height: 35px;
        }

        /* Column widths */
        .nama-col {
            width: 100px;
        }

        .universitas-col {
            width: 150px;
        }

        .tanggal-col {
            width: 150px;
        }

        /* Empty rows styling */
        .empty-row {
            height: 35px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
                padding: 15px;
            }
            
            .header {
                padding: 10px 15px;
            }
            
            .header-title {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-arrow" onclick="window.history.back()">←</span>
            <span class="header-title">Peserta Magang</span>
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

    <div class="main-content">
        <div class="card">
            <h2 class="card-title">Peserta yang sedang magang</h2>
            <table>
                <thead>
                    <tr>
                        <th class="nama-col">Nama</th>
                        <th class="universitas-col">Universitas/Sekolah</th>
                        <th class="tanggal-col">Tanggal mulai & berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Anindya</td>
                        <td>Universitas Pakuan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Antina</td>
                        <td>Universitas Pakuan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Eva</td>
                        <td>Universitas Pakuan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sahda</td>
                        <td>Universitas Pakuan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Azelsi</td>
                        <td>Universitas Terbuka</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Eka</td>
                        <td>Universitas Kesatuan</td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <h2 class="card-title">Peserta yang belum magang</h2>
            <table>
                <thead>
                    <tr>
                        <th class="nama-col">Nama</th>
                        <th class="universitas-col">Universitas/Sekolah</th>
                        <th class="tanggal-col">Tanggal mulai & berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="empty-row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
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

        // Add hover effects for table rows
        document.querySelectorAll('table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f0f0f0'; // Light grey on hover
            });
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = ''; // Reset on mouse leave
            });
        });
    </script>
</body>
</html>
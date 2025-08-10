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

        /* --- Consistent Header Right Styles --- */
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
            background-color: #dc3545; /* Red background */
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
        /* --- End Consistent Header Right Styles --- */

        .status-select {
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: white;
            width: 180px;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg width='10' height='6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23666'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 10px 6px;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
            max-width: 1000px;
            padding: 120px 30px 30px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        /* Go Section */
        .go-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 30px;
            align-items: flex-end;
        }

        .go-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .go-label {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .date-input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            width: 130px;
            background-color: white;
        }

        .status-checkboxes {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }

        .checkbox-item label {
            font-size: 14px;
            color: #333;
            cursor: pointer;
        }

        .go-buttons {
            display: flex;
            gap: 10px;
        }

        .go-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out;
        }

        .go-btn.primary {
            background-color: #4285f4;
            color: white;
        }

        .go-btn.primary:hover {
            background-color: #357ae8;
        }

        .go-btn.secondary {
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
        }

        .go-btn.secondary:hover {
            background-color: #e2e6ea;
        }

        /* Table Section */
        .table-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-weight: 500;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #dee2e6;
        }

        td {
            padding: 12px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #f1f3f4;
        }

        /* Added hover effect for table rows */
        tbody tr:hover {
            background-color: #f0f0f0;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .status-hadir {
            background-color: #d4edda;
            color: #155724;
        }

        .status-sakit {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-belum {
            background-color: #4285f4;
            color: white;
        }

        .lihat-bukti-btn {
            background-color: #4285f4;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .lihat-bukti-btn:hover {
            background-color: #357ae8;
        }

        /* Export Section */
        .export-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .export-text {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .export-btn {
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s ease-in-out;
        }

        .export-pdf {
            background-color: #dc3545;
            color: white;
        }

        .export-pdf:hover {
            background-color: #c82333;
        }

        .export-excel {
            background-color: #28a745;
            color: white;
        }

        .export-excel:hover {
            background-color: #218838;
        }

        /* Column widths */
        .col-no {
            width: 60px;
        }

        .col-nama {
            width: 200px;
        }

        .col-tanggal {
            width: 150px;
        }

        .col-status {
            width: 120px;
        }

        .col-bukti {
            width: 120px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .go-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .header {
                padding: 10px 15px;
            }
            
            .header-title {
                font-size: 16px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-arrow" onclick="window.history.back()">←</span>
            <span class="header-title">Sistem Absensi Magang DPRD Kota Bogor</span>
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
        <h1 class="page-title">Kelola Absensi Peserta Magang</h1>

        <div class="go-section">
            <div class="go-group">
                <label class="go-label">Tanggal</label>
                <input type="date" class="date-input" value="2025-07-18">
            </div>
            
            <div class="go-group">
                <div class="go-group">
                    <label class="go-label">Status</label>
                    <select class="status-select">
                        <option value="">-----pilih status-----</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alpa">Alpa</option>
                    </select>
                </div>
            </div>

            <div class="go-buttons">
                <button class="go-btn primary">Go</button>
            </div>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th class="col-no">No</th>
                        <th class="col-nama">Nama</th>
                        <th class="col-tanggal">Tanggal</th>
                        <th class="col-status">Status</th>
                        <th class="col-bukti">Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Rika</td>
                        <td>18/7/2025</td>
                        <td><span class="status-badge status-hadir">Hadir</span></td>
                        <td>—</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Felix</td>
                        <td>18/7/2025</td>
                        <td><span class="status-badge status-sakit">Sakit</span></td>
                        <td><button class="lihat-bukti-btn">Lihat Bukti</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Syifa</td>
                        <td>18/7/2025</td>
                        <td><span class="status-badge status-belum">Belum absen</span></td>
                        <td>—</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="export-section">
            <span class="export-text">Unduh</span>
            <button class="export-btn export-pdf">
                <span>📄</span>
                Export to PDF
            </button>
            <button class="export-btn export-excel">
                <span>📊</span>
                Export to Excel
            </button>
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

        // Add hover effects for Go and Export buttons
        document.querySelectorAll('.go-btn, .export-btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.filter = 'brightness(90%)'; // Darken slightly on hover
            });
            button.addEventListener('mouseleave', function() {
                this.style.filter = 'brightness(100%)'; // Reset on mouse leave
            });
        });
    </script>
</body>
</html>
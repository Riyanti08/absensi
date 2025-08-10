<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Laporan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background-color: #e9f0fa;
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
            transition: all 0.2s ease-in-out; /* Added transition for hover effect */
        }

        .back-arrow:hover {
            color: #007bff; /* Example hover color */
        }

        .header-title {
            font-size: 18px;
            font-weight: 500;
            color: #333;
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
            background-color: #dc3545; /* Consistent red background */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out; /* Added transition for click effect */
        }

        .profile-icon:active {
            transform: scale(0.95); /* Simple click effect */
        }

        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out; /* Added transition */
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #007bff; /* Consistent hover color */
        }

        .notification-icon:active, .settings-icon:active {
            transform: scale(0.95); /* Simple click effect */
        }

        .container {
            padding: 100px 30px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        h2 {
            font-size: 24px;
            font-weight: 700;
        }

        .filter-box {
            background: white;
            padding: 16px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            width: fit-content;
            margin-top: 12px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); /* Added shadow for better appearance */
        }

        input[type="date"],
        select {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.25);
        }

        button {
            background-color: #3366cc;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        button:hover {
            background-color: #2a52a3;
        }

        button:active {
            transform: scale(0.98);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* Added shadow for better appearance */
        }

        th, td {
            text-align: left;
            padding: 12px 16px;
            font-size: 14px;
        }

        th {
            background: #e0e0e0; /* Changed for better contrast */
            color: #333;
            font-weight: 600;
        }

        tr:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            color: white;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize; /* Ensure consistency in text */
        }

        .belum {
            background-color: #2d5dcc; /* Blue for "belum" */
        }

        .sedang {
            background-color: #3cb371; /* Green for "sedang" */
        }

        .selesai {
            background-color: #cc3b3b; /* Red for "selesai" */
        }

        .lihat-link {
            color: #3366cc;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .lihat-link:hover {
            color: #2a52a3;
            text-decoration: underline;
        }

        .actions {
            margin-top: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .export-btn {
            padding: 10px 16px;
            font-size: 14px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        .export-btn:active {
            transform: scale(0.98);
        }

        .pdf {
            background: #ff4d4d;
            color: white;
        }

        .pdf:hover {
            background: #cc0000;
        }

        .excel {
            background: #4CAF50;
            color: white;
        }

        .excel:hover {
            background: #3c8d40;
        }

        .unduh-label {
            font-weight: bold;
            margin-right: 8px;
            color: #555;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .filter-box {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }

            .filter-box label {
                width: 100%;
            }

            .filter-box input, .filter-box select, .filter-box button {
                width: 100%;
                max-width: none;
            }

            .actions {
                flex-direction: column;
                align-items: flex-start;
            }

            .export-btn {
                width: 100%;
            }

            table, th, td {
                display: block; /* Make table elements stack on small screens */
            }

            thead {
                display: none; /* Hide header on small screens */
            }

            tr {
                margin-bottom: 10px;
                display: block;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
                color: #777;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-arrow" onclick="window.history.back()">←</span>
            <span class="header-title">Manajemen Laporan</span>
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
        <h2>Manajemen Laporan</h2>

        <div class="filter-box">
            <label>
                Tanggal<br>
                <input type="date" value="2025-07-18">
            </label>
            <label>
                Status<br>
                <select>
                    <option>---</option>
                    <option>Belum Mulai Magang</option>
                    <option>Sedang Magang</option>
                    <option>Selesai Magang</option>
                </select>
            </label>
            <button>Go</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Periode</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No">1</td>
                    <td data-label="Nama">Mahendra</td>
                    <td data-label="Tanggal">18/7/2025</td>
                    <td data-label="Laporan">Sudah Mengirim – <a href="#" class="lihat-link">Lihat</a></td>
                    <td data-label="Status"><span class="badge belum">Belum Mulai Magang</span></td>
                    <td data-label="Periode">10/09/2025 – 10/10/2025</td>
                </tr>
                <tr>
                    <td data-label="No">2</td>
                    <td data-label="Nama">Rika</td>
                    <td data-label="Tanggal">18/7/2025</td>
                    <td data-label="Laporan">Sudah Mengirim – <a href="#" class="lihat-link">Lihat</a></td>
                    <td data-label="Status"><span class="badge sedang">Sedang Magang</span></td>
                    <td data-label="Periode">14/07/2025 – 14/08/2025</td>
                </tr>
                <tr>
                    <td data-label="No">3</td>
                    <td data-label="Nama">Ahmad</td>
                    <td data-label="Tanggal">18/7/2025</td>
                    <td data-label="Laporan">Sudah Mengirim – <a href="#" class="lihat-link">Lihat</a></td>
                    <td data-label="Status"><span class="badge selesai">Selesai Magang</span></td>
                    <td data-label="Periode">05/04/2025 – 05/06/2025</td>
                </tr>
            </tbody>
        </table>

        <div class="actions">
            <span class="unduh-label">Unduh</span>
            <button class="export-btn pdf">📄 Export to PDF</button>
            <button class="export-btn excel">📊 Export to Excel</button>
        </div>
    </div>
    <script>
        // --- Consolidated navigateTo function for all pages ---
        function navigateTo(page) {
            const routes = {
                profile_admin: '/admin.profile_admin',        
                notifikasi_admin: '/admin.notifikasi_admin', 
                settings: '/settings',      
            };
            const target = routes[page] || '/';
            window.location.href = target;
        }
        // --- End Consolidated navigateTo function ---

        document.addEventListener('DOMContentLoaded', function() {
            // Add click effects to interactive elements
            const clickableElements = document.querySelectorAll(
                '.back-arrow, .profile-icon, .notification-icon, .settings-icon, button'
            );
            clickableElements.forEach(element => {
                element.addEventListener('click', function() {
                    if (this.tagName === 'BUTTON' || this.classList.contains('export-btn')) {
                        this.style.transform = 'scale(0.98)';
                    } else {
                        this.style.transform = 'scale(0.95)';
                    }
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>
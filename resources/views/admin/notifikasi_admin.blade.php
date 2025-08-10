<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi & Log Aktivitas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* Moved these to a more appropriate place or removed if redundant */
        }

        /* Moved general table/search styles here */
        .log-table th {
            font-size: 13px;
        }

        .log-table td {
            font-size: 12px;
            padding: 10px;
        }

        .search-box {
            font-size: 12px;
            padding: 12px 15px 12px 40px;
        }


        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #e8edf3;
            color: #333;
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
            background-color: #dc3545; /* Red background from previous design */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            cursor: pointer; /* Indicate it's clickable */
        }

        .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out; /* Smooth transition for hover */
        }

        .settings-icon:hover {
            color: #4A90E2; /* Hover color for icons */
        }

        .main-content {
            padding: 120px 30px 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tab-container {
            display: flex;
            gap: 0;
            margin-bottom: 30px;
        }

        .tab-button {
            background: #d1d9e6;
            border: none;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            color: #666;
            cursor: pointer;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .tab-button.active {
            background: #6b8bb3;
            color: white;
        }

        .tab-button:first-child {
            margin-right: 20px;
        }

        .content-area {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .day-section {
            margin-bottom: 20px;
        }

        .day-header {
            background: #b8c5d6;
            color: #333;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 500;
            margin-bottom: 15px;
            display: inline-block;
            font-size: 14px;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .notification-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 8px 0;
        }

        .time-stamp {
            font-size: 14px;
            color: #666;
            min-width: 50px;
            font-weight: 500;
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            flex-shrink: 0;
        }

        .icon-document {
            background-color: #4a90e2;
        }

        .icon-check {
            background-color: #7ed321;
        }

        .notification-text {
            color: #333;
            font-size: 15px;
            line-height: 1.4;
        }

        .log-tab-content {
            display: none;
        }

        .log-tab-content.active {
            display: block;
        }

        .search-container {
            margin-bottom: 30px;
        }

        .search-box {
            width: 100%;
            max-width: 500px;
            padding: 15px 20px 15px 50px;
            border: 2px solid #d1d9e6;
            border-radius: 25px;
            font-size: 14px;
            background-color: white;
            position: relative;
        }

        .search-box::placeholder {
            color: #999;
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
        }

        .log-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .log-table th {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 1px solid #e0e0e0;
        }

        .log-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #333;
        }

        .log-table tr:last-child td {
            border-bottom: none;
        }

        .log-table tr:hover {
            background-color: #f8f9fa;
        }

        .no-data {
            text-align: center;
            color: #666;
            padding: 40px;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 15px;
            }

            .tab-button {
                padding: 12px 25px;
                font-size: 14px;
            }

            .content-area {
                padding: 15px;
            }

            .notification-item {
                gap: 10px;
            }

            .time-stamp {
                min-width: 45px;
                font-size: 13px;
            }

            .notification-text {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <button class="back-btn">←</button>
            <h1 class="page-title">Notifikasi</h1>
        </div>
        <div class="header-right">
            <span class="admin-text">Admin</span>
            <a href="/profile_admin"> <img src="{{ asset('images/profile.svg') }}" alt="Profil Pengguna">
                </a>
            <svg class="settings-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('settings')">
                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
            </svg>
        </div>
    </div>

    <div class="main-content">
        <div class="tab-container">
            <button class="tab-button" onclick="showTab('notifikasi')">Notifikasi</button>
            <button class="tab-button active" onclick="showTab('log')">Log Aktivitas</button>
        </div>

        <div class="content-area">
            <div id="notifikasi-content" class="tab-content" style="display: none;">
                <div class="day-section">
                    <div class="day-header">Hari ini</div>
                    <div class="notification-list">
                        <div class="notification-item">
                            <div class="time-stamp">08.26</div>
                            <div class="notification-icon icon-document">📄</div>
                            <div class="notification-text">Mahendra mengajukan izin sakit</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">08.32</div>
                            <div class="notification-icon icon-check">✓</div>
                            <div class="notification-text">Admin berhasil login</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">09.01</div>
                            <div class="notification-icon icon-check">✓</div>
                            <div class="notification-text">Dinda sudah mengisi absen</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">09.05</div>
                            <div class="notification-icon icon-check">✓</div>
                            <div class="notification-text">Syifa sudah mengisi absen</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">09.05</div>
                            <div class="notification-icon icon-check">✓</div>
                            <div class="notification-text">Felix sudah mengisi absen</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">09.20</div>
                            <div class="notification-icon icon-document">📄</div>
                            <div class="notification-text">Tania mengajukan izin sakit</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">14.30</div>
                            <div class="notification-icon icon-document">📄</div>
                            <div class="notification-text">Dinda mengirim laporan kegiatan harian</div>
                        </div>
                        <div class="notification-item">
                            <div class="time-stamp">14.58</div>
                            <div class="notification-icon icon-document">📄</div>
                            <div class="notification-text">Rika mengirim laporan kegiatan harian</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="log-content" class="log-tab-content active" style="display: block;">
                <div class="search-container" style="position: relative;">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-box" placeholder="Keyword: [Aksi] [Tanggal & Waktu]" id="searchInput">
                </div>

                <table class="log-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal & Waktu</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="logTableBody">
                        <tr>
                            <td>1</td>
                            <td>22/07/2025 08.28</td>
                            <td>Anin (Admin)</td>
                            <td>Login ke sistem</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>22/07/2025 09.00</td>
                            <td>Karina</td>
                            <td>Ajukan Izin</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>22/07/2025 09.05</td>
                            <td>Ricky</td>
                            <td>Absen</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>22/07/2025 09.10</td>
                            <td>Dinda</td>
                            <td>Absen</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>22/07/2025 13.52</td>
                            <td>Alfi</td>
                            <td>Kirim laporan kegiatan</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>22/07/2025 15.35</td>
                            <td>Adit</td>
                            <td>Logout</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // --- START: Re-added Navigation Functions ---
        function navigateTo(page) {
            // Logika untuk elemen non-menu-item (seperti ikon profil, notifikasi, settings)
            if (event && event.currentTarget) { // Pastikan event dan currentTarget ada
                const targetElement = event.currentTarget;
                targetElement.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    targetElement.style.transform = '';
                    performNavigation(page);
                }, 150);
            } else {
                // Jika dipanggil tanpa event (misalnya dari script langsung)
                performNavigation(page);
            }
        }

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

        function showTab(tabName) {
            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => button.classList.remove('active'));

            if (event && event.target) {
                event.target.classList.add('active');
            }

            // Hide all tab contents
            const notifikasiContent = document.getElementById('notifikasi-content');
            const logContent = document.getElementById('log-content');

            if (tabName === 'notifikasi') {
                notifikasiContent.style.display = 'block';
                logContent.style.display = 'none';
            } else {
                notifikasiContent.style.display = 'none';
                logContent.style.display = 'block';
            }
        }

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tab display based on the 'active' class set in HTML
            // This ensures the correct tab is shown when the page loads
            const initialActiveTab = document.querySelector('.tab-button.active');
            if (initialActiveTab) {
                const initialTabName = initialActiveTab.textContent.trim().toLowerCase().replace(' ', ''); // Get 'notifikasi' or 'logaktivitas'
                const notifikasiContent = document.getElementById('notifikasi-content');
                const logContent = document.getElementById('log-content');

                if (initialTabName.includes('notifikasi')) { // Check if it includes 'notifikasi'
                    notifikasiContent.style.display = 'block';
                    logContent.style.display = 'none';
                } else if (initialTabName.includes('log')) { // Check if it includes 'log'
                    notifikasiContent.style.display = 'none';
                    logContent.style.display = 'block';
                }
            }


            const notificationItems = document.querySelectorAll('.notification-item');

            notificationItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f8f9fa';
                    this.style.borderRadius = '8px';
                    this.style.padding = '12px 8px';
                    this.style.margin = '0 -8px';
                    this.style.transition = 'all 0.2s ease';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = 'transparent';
                    this.style.padding = '8px 0';
                    this.style.margin = '0';
                });
            });

            // Search functionality for log table
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('logTableBody');

            if (searchInput && tableBody) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = tableBody.getElementsByTagName('tr');

                    Array.from(rows).forEach(row => {
                        const cells = row.getElementsByTagName('td');
                        let matchFound = false;

                        Array.from(cells).forEach(cell => {
                            if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                matchFound = true;
                            }
                        });
                        row.style.display = matchFound ? '' : 'none';
                    });
                });
            }
        });
    </script>
</body>
</html>
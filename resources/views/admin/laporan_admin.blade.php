<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - DailyIntern</title>
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

        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: 50%;
        }

        .back-btn:hover {
            background: #f0f0f0;
            color: #333;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        /* --- Consistent Header Right Styles --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-text { /* Changed from .admin-info span */
            color: #333;
            font-size: 14px;
        }

        .profile-icon { /* Changed from .admin-avatar */
            width: 32px;
            height: 32px;
            background-color: #dc3545; /* Red background, consistent */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            cursor: pointer; /* Indicate it's clickable */
        }

        .notification-icon, .settings-icon { /* Changed from .notification-btn, .settings-btn */
            width: 24px; /* Consistent size */
            height: 24px; /* Consistent size */
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out; /* Smooth transition for hover */
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #4A90E2; /* Hover color for icons */
        }
        /* --- End Consistent Header Right Styles --- */

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 120px 30px 30px;
        }

        .main-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            text-align: left;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 30px;
        }

        .search-box {
            width: 100%;
            max-width: 500px;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .search-box:focus {
            outline: none;
            border-color: #42a5f5;
            box-shadow: 0 4px 20px rgba(66, 165, 245, 0.2);
        }

        .search-box::placeholder {
            color: #999;
            font-style: italic;
        }

        /* Table */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: #0356B5;
        }

        .table th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 16px;
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table th:last-child {
            border-right: none;
        }

        .table tbody tr {
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(66, 165, 245, 0.05);
        }

        .table td {
            padding: 20px 15px;
            font-size: 14px;
            color: #555;
            border-right: 1px solid #f0f0f0;
            vertical-align: top;
        }

        .table td:last-child {
            border-right: none;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        /* Column Widths */
        .col-no {
            width: 80px;
            text-align: center;
        }

        .col-nama {
            width: 200px;
        }

        .col-tanggal {
            width: 150px;
        }

        .col-universitas {
            width: 220px;
        }

        .col-kegiatan {
            width: auto;
            min-width: 300px;
        }

        .col-paraf {
            width: 120px;
            text-align: center;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ddd;
        }

        .empty-state-text {
            font-size: 18px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 12px 15px;
            }

            .page-title {
                font-size: 18px;
            }

            .container {
                padding: 20px 10px;
            }

            .main-title {
                font-size: 22px;
                margin-bottom: 20px;
            }

            .search-box {
                padding: 12px 15px;
                font-size: 14px;
            }

            .table-container {
                overflow-x: auto;
            }

            .table {
                min-width: 700px;
            }

            .table th,
            .table td {
                padding: 12px 10px;
                font-size: 13px;
            }

            .admin-text { /* Consistent with other pages, not display: none */
                display: initial; /* Ensure it's visible, if intended */
                font-size: 12px; /* Smaller font for mobile */
            }
        }

        /* Loading Animation */
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

        .table-container {
            animation: fadeInUp 0.6s ease forwards;
        }

        .search-container {
            animation: fadeInUp 0.4s ease forwards;
        }

        .main-title {
            animation: fadeInUp 0.2s ease forwards;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-btn" onclick="window.history.back()">←</span>
            <h1 class="page-title">Laporan</h1>
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
        <h2 class="main-title">Laporan Kegiatan Harian Selama Magang</h2>
        
        <div class="search-container">
            <input type="text" 
                    class="search-box" 
                    placeholder="🔍 Keyword: [Nama] [Universitas]"
                    id="searchInput"
                    oninput="filterTable()">
        </div>

        <div class="table-container">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th class="col-no">No</th>
                        <th class="col-nama">Nama</th>
                        <th class="col-tanggal">Tanggal</th>
                        <th class="col-universitas">Universitas/Sekolah</th>
                        <th class="col-kegiatan">Kegiatan</th>
                        <th class="col-paraf">Paraf</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    </tbody>
            </table>
        </div>
    </div>

    <script>
        // Sample data - replace with actual data from your backend
        const sampleData = [
            {
                no: 1,
                nama: "Ahmad Rizky",
                tanggal: "2024-01-15",
                universitas: "Universitas Indonesia",
                kegiatan: "Mengikuti rapat koordinasi tim pengembangan aplikasi dan melakukan analisis sistem",
                paraf: "✓"
            },
            {
                no: 2,
                nama: "Sari Melati",
                tanggal: "2024-01-16",
                universitas: "Institut Teknologi Bandung",
                kegiatan: "Membuat dokumentasi API dan testing fitur login aplikasi",
                paraf: "✓"
            },
            {
                no: 3,
                nama: "Budi Santoso",
                tanggal: "2024-01-17",
                universitas: "Universitas Gadjah Mada",
                kegiatan: "Membantu dalam pengarsipan dokumen fisik dan digital",
                paraf: "✓"
            },
            {
                no: 4,
                nama: "Dewi Lestari",
                tanggal: "2024-01-18",
                universitas: "Universitas Padjadjaran",
                kegiatan: "Menyiapkan materi presentasi untuk pertemuan mingguan",
                paraf: "✓"
            },
            {
                no: 5,
                nama: "Cahyo Wicaksono",
                tanggal: "2024-01-19",
                universitas: "Universitas Diponegoro",
                kegiatan: "Melakukan riset data untuk laporan bulanan bagian keuangan",
                paraf: "✓"
            },
        ];

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

        function loadData() {
            const tableBody = document.getElementById('tableBody');
            
            if (sampleData.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="empty-state">
                            <div class="empty-state-icon">📋</div>
                            <div class="empty-state-text">Belum ada data laporan kegiatan</div>
                        </td>
                    </tr>
                `;
                return;
            }

            tableBody.innerHTML = sampleData.map(item => `
                <tr>
                    <td class="col-no">${item.no}</td>
                    <td class="col-nama">${item.nama}</td>
                    <td class="col-tanggal">${item.tanggal}</td>
                    <td class="col-universitas">${item.universitas}</td>
                    <td class="col-kegiatan">${item.kegiatan}</td>
                    <td class="col-paraf">${item.paraf}</td>
                </tr>
            `).join('');
        }

        function filterTable() {
            const searchInput = document.getElementById('searchInput');
            const filter = searchInput.value.toLowerCase();
            const tableBody = document.getElementById('tableBody');
            const rows = tableBody.getElementsByTagName('tr');

            let hasResults = false;
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                // Skip empty state row if it exists
                if (row.classList.contains('empty-state-row')) {
                    row.style.display = 'none'; // Hide empty state during filtering
                    continue;
                }
                const nama = row.cells[1]?.textContent.toLowerCase() || '';
                const universitas = row.cells[3]?.textContent.toLowerCase() || '';
                const kegiatan = row.cells[4]?.textContent.toLowerCase() || ''; // Also search in activity

                if (nama.includes(filter) || universitas.includes(filter) || kegiatan.includes(filter)) {
                    row.style.display = '';
                    hasResults = true;
                } else {
                    row.style.display = 'none';
                }
            }

            // Show empty state if no results after filtering
            if (!hasResults && sampleData.length > 0) { // Only show empty state if data exists but no match
                if (!document.getElementById('noResultsRow')) {
                    const noResultsRow = tableBody.insertRow();
                    noResultsRow.id = 'noResultsRow';
                    noResultsRow.classList.add('empty-state-row'); // Add a class to identify this row
                    const cell = noResultsRow.insertCell(0);
                    cell.colSpan = 6;
                    cell.classList.add('empty-state');
                    cell.innerHTML = `<div class="empty-state-icon">🔍</div><div class="empty-state-text">Tidak ada data yang cocok dengan pencarian Anda.</div>`;
                }
            } else if (hasResults && document.getElementById('noResultsRow')) {
                document.getElementById('noResultsRow').remove(); // Remove no results row if there are matches
            }
             // Handle initial empty state when no data is loaded
            if (sampleData.length === 0 && !document.getElementById('noResultsRow')) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="empty-state">
                            <div class="empty-state-icon">📋</div>
                            <div class="empty-state-text">Belum ada data laporan kegiatan</div>
                        </td>
                    </tr>
                `;
            }
        }


        // Load data when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadData(); // Load the sample data initially

            // Add click effects to buttons
            const buttons = document.querySelectorAll('button, .profile-icon, .notification-icon, .settings-icon');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Add focus effects to search input
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('focus', function() {
                this.style.borderColor = '#42a5f5'; // Directly apply focus style
                this.style.boxShadow = '0 4px 20px rgba(66, 165, 245, 0.2)';
            });

            searchInput.addEventListener('blur', function() {
                this.style.borderColor = '#e0e0e0'; // Reset on blur
                this.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            });
        });
    </script>
</body>
</html>
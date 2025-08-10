<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif; /* Consistent font */
            background-color: #e9f0fa; /* Consistent background color */
            color: #333;
        }

        /* Header (Consistent with other pages) */
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

        .back-btn { /* Changed from .back-arrow to .back-btn for this page */
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #666; /* Adjusted color for consistency */
            transition: all 0.2s ease-in-out;
        }

        .back-btn:hover {
            color: #007bff;
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

        .admin-text { /* Consistent class name */
            color: #333;
            font-size: 14px;
        }

        .profile-icon { /* Consistent class name and styles */
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

        .notification-icon, .settings-icon { /* Consistent class names and styles */
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


        .main-content {
            padding: 120px 30px 30px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto; /* Center the grid */
        }

        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex; /* Use flex for internal alignment */
            flex-direction: column;
        }

        .chart-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .chart-wrapper {
            position: relative;
            flex-grow: 1; /* Allow chart wrapper to take available space */
            min-height: 150px; /* Minimum height to prevent collapse */
        }

        .bar-chart-wrapper {
            height: 200px; /* Specific height for bar chart */
        }

        .area-chart-wrapper {
            height: 220px; /* Specific height for area chart */
        }

        .pie-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .top-row {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .bottom-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            grid-column: 1 / -1;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .top-row {
                grid-template-columns: 1fr;
            }
            
            .bottom-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <span class="back-btn" onclick="window.history.back()">←</span>
            <div class="header-title">Statistik</div>
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
        <h1 class="page-title">Grafik Kehadiran Harian</h1>
        
        <div class="dashboard-grid">
            <div class="top-row">
                <div class="chart-container">
                    <h3 class="chart-title">Grafik Kehadiran Harian</h3> <div class="chart-wrapper bar-chart-wrapper">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-container">
                    <h3 class="chart-title">Kehadiran Bulanan Peserta Magang (Sekolah)</h3>
                    <div class="chart-wrapper">
                        <canvas id="pieChart1"></canvas>
                    </div>
                    <div class="pie-legend">
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #4285f4;"></div>
                            <span>Hadir</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #ea4335;"></div>
                            <span>Sakit</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #fbbc05;"></div>
                            <span>Izin</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #34a853;"></div>
                            <span>Alpa</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bottom-row">
                <div class="chart-container">
                    <h3 class="chart-title">Kehadiran Bulanan Peserta Magang (Mahasiswa)</h3>
                    <div class="chart-wrapper">
                        <canvas id="pieChart2"></canvas>
                    </div>
                    <div class="pie-legend">
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #4285f4;"></div>
                            <span>Hadir</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #ea4335;"></div>
                            <span>Sakit</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #fbbc05;"></div>
                            <span>Izin</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #34a853;"></div>
                            <span>Alpa</span>
                        </div>
                    </div>
                </div>
                
                <div class="chart-container">
                    <h3 class="chart-title">Grafik Pertumbuhan Peserta</h3>
                    <div class="chart-wrapper area-chart-wrapper">
                        <canvas id="areaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- Consolidated navigateTo function for all pages ---
        // This function should ideally be in a shared JS file to avoid repetition
        function navigateTo(page) {
            const routes = {
                profile_admin: '/admin.profile_admin',        // Example URL for profile
                notifikasi_admin: '/admin.notifikasi_admin', // Example URL for notifications
                settings: '/settings',      // Example URL for settings
                laporan: '/laporan.html',
                dokumen: '/dokumen.html'
            };
            // Use window.location.href to redirect, making sure the path is correct
            // If the current page IS the dashboard, we might not want to navigate away.
            // For the back button, we explicitly go to dashboard.
            if (page === 'dashboard' && window.location.pathname.endsWith('/dashboard.html')) {
                // Do nothing if already on dashboard and back button clicked
                console.log("Already on dashboard.");
            } else {
                window.location.href = routes[page] || '/'; // Default to root if route not found
            }
        }
        // --- End Consolidated navigateTo function ---

        document.addEventListener('DOMContentLoaded', function() {
            // Add click effects to interactive elements
            const clickableElements = document.querySelectorAll(
                '.back-btn, .profile-icon, .notification-icon, .settings-icon'
            );
            clickableElements.forEach(element => {
                element.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            const barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['0', '1', '2', '3', '4'],
                    datasets: [{
                        label: 'Kehadiran', /* Added label for clarity */
                        data: [55, 2, 58, 100, 73],
                        backgroundColor: '#4db6ac',
                        borderRadius: 4,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 25
                            },
                            grid: {
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Pie Chart 1 (Sekolah)
            const pieCtx1 = document.getElementById('pieChart1').getContext('2d');
            const pieChart1 = new Chart(pieCtx1, {
                type: 'doughnut',
                data: {
                    labels: ['Hadir', 'Sakit', 'Izin', 'Alpa'],
                    datasets: [{
                        data: [65, 15, 10, 10],
                        backgroundColor: ['#4285f4', '#ea4335', '#fbbc05', '#34a853'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '30%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Pie Chart 2 (Mahasiswa)
            const pieCtx2 = document.getElementById('pieChart2').getContext('2d');
            const pieChart2 = new Chart(pieCtx2, {
                type: 'doughnut',
                data: {
                    labels: ['Hadir', 'Sakit', 'Izin', 'Alpa'],
                    datasets: [{
                        data: [75, 10, 10, 5],
                        backgroundColor: ['#4285f4', '#ea4335', '#fbbc05', '#34a853'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '30%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Area Chart
            const areaCtx = document.getElementById('areaChart').getContext('2d');
            const areaChart = new Chart(areaCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sept'],
                    datasets: [{
                        label: 'Peserta',
                        data: [32, 38, 35, 45, 43, 46, 52, 50, 48],
                        borderColor: '#ff6b6b',
                        backgroundColor: 'rgba(255, 107, 107, 0.2)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 0,
                        pointHoverRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 60,
                            ticks: {
                                stepSize: 10
                            },
                            grid: {
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });
        });
    </script>
</body>
</html>
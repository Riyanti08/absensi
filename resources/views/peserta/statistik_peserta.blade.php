<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        /* CSS Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #E6EEF8;
            min-height: 100vh;
        }

        /* HEADER */
        .header-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .header {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-container {
            padding-top: 120px;
            max-width: 800px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
        }

        .main-content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            padding-top: 100px;
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

        /* Dashboard and Charts */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            max-width: 100%;
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
        }

        .chart-wrapper.small {
            height: 250px;
        }

        .chart-wrapper.pie {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pie-legend {
            margin-top: 15px;
            text-align: right;
        }

        .legend-item {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            font-size: 14px;
            margin-bottom: 5px;
            color: #666;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 3px;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
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
        }
    </style>
</head>
<body>
    <div class="header-wrapper">
        <div class="header">
            <div class="header-left">
                <span class="back-btn" onclick="window.history.back()">←</span>
                <h1 class="page-title">Statistik</h1> 
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
    </div>

    <div class="main-content">
        <div class="dashboard-grid">
            <div class="chart-container">
                <h3 class="chart-title">Grafik Kehadiran Harian</h3>
                <div class="chart-wrapper">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            <div class="chart-container">
                <h3 class="chart-title">Grafik Alpa Perminggu dalam 1 bulan</h3>
                <div class="chart-wrapper small">
                    <canvas id="alpaChart"></canvas>
                </div>
            </div>

            <div class="chart-container">
                <h3 class="chart-title">Grafik Izin Perminggu dalam 1 bulan</h3>
                <div class="chart-wrapper small">
                    <canvas id="izinChart"></canvas>
                </div>
            </div>

            <div class="chart-container">
                <h3 class="chart-title">Grafik Hadir Perminggu dalam 1 Bulan</h3>
                <div class="chart-wrapper pie">
                    <canvas id="hadirChart"></canvas>
                </div>
                <div class="pie-legend">
                    <div class="legend-item">
                        <span>Minggu 1</span>
                        <div class="legend-color" style="background-color: #4285f4;"></div>
                    </div>
                    <div class="legend-item">
                        <span>Minggu 2</span>
                        <div class="legend-color" style="background-color: #ea4335;"></div>
                    </div>
                    <div class="legend-item">
                        <span>Minggu 3</span>
                        <div class="legend-color" style="background-color: #fbbc05;"></div>
                    </div>
                    <div class="legend-item">
                        <span>Minggu 4</span>
                        <div class="legend-color" style="background-color: #34a853;"></div>
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

        function goBack() {
            window.history.back();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Chart 1: Grafik Kehadiran Harian (Teal bars)
            const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
            const attendanceChart = new Chart(attendanceCtx, {
                type: 'bar',
                data: {
                    labels: ['0', '1', '2', '3', '4'],
                    datasets: [{
                        data: [55, 5, 58, 100, 73],
                        backgroundColor: '#4db6ac',
                        borderRadius: 4,
                        barThickness: 50
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
                                stepSize: 25,
                                color: '#666'
                            },
                            grid: {
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#666'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Chart 2: Grafik Alpa Perminggu (Orange bars)
            const alpaCtx = document.getElementById('alpaChart').getContext('2d');
            const alpaChart = new Chart(alpaCtx, {
                type: 'bar',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    datasets: [{
                        label: 'Alpa',
                        data: [5, 2, 1, 2],
                        backgroundColor: '#ff6b35',
                        borderRadius: 4,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 12,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5,
                            ticks: {
                                stepSize: 1,
                                color: '#666'
                            },
                            grid: {
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#666',
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Chart 3: Grafik Izin Perminggu (Blue bars)
            const izinCtx = document.getElementById('izinChart').getContext('2d');
            const izinChart = new Chart(izinCtx, {
                type: 'bar',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    datasets: [{
                        label: 'Izin',
                        data: [0, 1, 0, 2],
                        backgroundColor: '#6bb6ff',
                        borderRadius: 4,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 12,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 2.5,
                            ticks: {
                                stepSize: 0.5,
                                color: '#666'
                            },
                            grid: {
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#666',
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Chart 4: Grafik Hadir Perminggu (Pie Chart)
            const hadirCtx = document.getElementById('hadirChart').getContext('2d');
            const hadirChart = new Chart(hadirCtx, {
                type: 'pie',
                data: {
                    labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    datasets: [{
                        data: [33.3, 20, 26.7, 20],
                        backgroundColor: ['#4285f4', '#ea4335', '#fbbc05', '#34a853'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });

            // Add interaction effects
            document.querySelectorAll('.back-btn, .profile-icon, .notification-icon').forEach(el => {
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
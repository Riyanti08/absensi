<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian/Mingguan</title>
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
            display: flex; /* Add this */
            justify-content: space-between; /* Add this */
            align-items: center; /* Add this */
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

        .page-container {
            padding: 100px 30px 30px; /* Adjusted padding to accommodate fixed header */
            max-width: 1400px;
            margin: 0 auto;
        }

        .main-content {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            font-size: 16px;
            background: white;
            color: #666;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 1rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            transition: all 0.2s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #0356B5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .date-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            font-size: 16px;
            background: white;
            color: #666;
            transition: all 0.2s ease;
        }

        .date-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            color: #333;
        }

        .textarea-group {
            position: relative;
        }

        .form-textarea {
            width: 100%;
            min-height: 120px;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            font-size: 16px;
            font-family: inherit;
            resize: vertical;
            background: white;
            color: #333;
            transition: all 0.2s ease;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-textarea::placeholder {
            color: #9ca3af;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #0356B5 0%, #0356B5 61%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .page-container {
                padding: 10px;
            }

            .main-content {
                border-radius: 15px;
            }

            .main-content {
                padding: 20px;
            }
        }

        /* Animasi fade in */
        .form-group {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="header-wrapper">
        <div class="header">
            <div class="header-left">
                <span class="back-btn" onclick="window.history.back()">←</span>
                <h1 class="page-title">Laporan</h1>
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
    
    <div class="page-container">
        <div class="main-content">
            <form id="reportForm" onsubmit="submitReport(event)">
                <div class="form-group">
                    <label class="form-label" for="reportType">Jenis Laporan</label>
                    <select class="form-select" id="reportType" name="reportType" required>
                        <option value="" disabled selected>----Pilih Jenis Laporan----</option>
                        <option value="harian">Laporan Harian</option>
                        <option value="mingguan">Laporan Mingguan</option>
                        <option value="bulanan">Laporan Bulanan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="reportDate">Tanggal</label>
                    <input type="date" class="date-input" id="reportDate" name="reportDate" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="todayActivity">Laporan kegiatan hari ini</label>
                    <input type="text" class="date-input" id="todayActivity" name="todayActivity" placeholder="Universitas/Sekolah">
                </div>

                <div class="form-group textarea-group">
                    <textarea class="form-textarea" id="activityDescription" name="activityDescription" placeholder="Deskripsikan Kegiatan magang hari ini" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Kirim Laporan</button>
            </form>
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
        
        // Set tanggal hari ini sebagai default
        document.getElementById('reportDate').valueAsDate = new Date();

        function goBack() {
            window.history.back();
        }

        function submitReport(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const reportData = {
                type: formData.get('reportType'),
                date: formData.get('reportDate'),
                activity: formData.get('todayActivity'),
                description: formData.get('activityDescription')
            };

            // Simulasi pengiriman laporan
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Mengirim...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Laporan berhasil dikirim!');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Reset form
                event.target.reset();
                document.getElementById('reportDate').valueAsDate = new Date();
            }, 2000);

            console.log('Data Laporan:', reportData);
        }

        // Animasi smooth untuk focus
        document.querySelectorAll('input, select, textarea').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
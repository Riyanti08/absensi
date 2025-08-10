<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Personal</title>
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
            font-size: 20px; /* Adjusted to 20px */
            margin-right: 15px; /* Adjusted to 15px */
            cursor: pointer;
            color: #333;
            transition: transform 0.2s ease-in-out;
        }
        .back-btn:active {
            transform: scale(0.95);
        }

        .page-title {
            font-size: 24px; /* Adjusted to 24px */
            font-weight: 600;
            color: #333;
        }

        /* --- Fixed Header Right Styles --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px; /* Adjusted to 15px */
        }

        .admin-text {
            color: #333;
            font-size: 14px; /* Adjusted to 14px */
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
            width: 24px; /* Adjusted to 24px */
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .notification-icon:hover, .settings-icon:hover {
            color: #4A90E2;
        }
        /* --- End Fixed Header Right Styles --- */
        
        /* GAYA UNTUK BODY KONTEN (SEKARANG MENGGUNAKAN CLASS .MAIN-CONTENT) */
        .page-container {
            padding: 100px 30px 30px; /* Adjusted padding to accommodate fixed header */
            max-width: 1400px;
            margin: 0 auto;
        }

        .main-content {
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
        }


        .alert-box {
            background: #E93B3B;
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(211, 47, 47, 0.2);
        }

        .alert-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .alert-text {
            font-size: 16px;
            line-height: 1.5;
            opacity: 0.95;
        }

        .instructions-box {
            background: #0356B5;
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(121, 134, 203, 0.2);
        }

        .instructions-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .instructions-list {
            list-style: none;
            padding: 0;
        }

        .instructions-list li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
            font-size: 15px;
            line-height: 1.4;
        }

        .instructions-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 18px;
        }

        .upload-area {
            border: 3px dashed #9fa8da;
            border-radius: 15px;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8eaf6 100%);
            padding: 60px 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .upload-area:hover {
            border-color: #7986cb;
            background: linear-gradient(135deg, #e8eaf6 0%, #c5cae9 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(121, 134, 203, 0.15);
        }

        .upload-area.dragover {
            border-color: #4f46e5;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            transform: scale(1.02);
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            position: relative;
        }

        .folder-icon {
            width: 60px;
            height: 48px;
            background: #ffc107;
            border-radius: 4px 4px 8px 8px;
            position: relative;
            margin: 0 auto;
        }

        .folder-icon::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 0;
            width: 20px;
            height: 8px;
            background: #ffc107;
            border-radius: 4px 4px 0 0;
        }

        .document-icon {
            width: 30px;
            height: 40px;
            background: white;
            border-radius: 3px;
            position: absolute;
            top: 5px;
            right: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .document-icon::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 4px;
            right: 4px;
            height: 2px;
            background: #ddd;
            border-radius: 1px;
            box-shadow: 0 6px 0 #ddd, 0 12px 0 #ddd;
        }

        .upload-text {
            font-size: 16px;
            color: #666;
            font-weight: 500;
        }

        .file-input {
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #0356B5 0%, #0356B5 61%); /* Adjusted to solid blue similar to previous button */
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .file-info {
            background: #f0f8ff;
            border: 2px solid #4f46e5;
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            display: none;
        }

        .file-info.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        .file-name {
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 5px;
        }

        .file-size {
            color: #666;
            font-size: 14px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .page-container { /* Changed from .container to .page-container */
                padding: 10px; /* Changed from margin to padding */
            }
            
            .main-content {
                border-radius: 15px;
                padding: 20px; /* Added padding for smaller screens */
            }
            
            .header {
                padding: 15px 20px;
            }

            .upload-area {
                padding: 40px 20px;
            }

            .alert-title {
                font-size: 20px;
            }

            .instructions-title {
                font-size: 18px;
            }
        }

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="header-wrapper">
        <div class="header">
            <div class="header-left">
                <span class="back-btn" onclick="window.history.back()">←</span>
                <h1 class="page-title">Dokumen</h1>
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
            <div class="alert-box">
                <h2 class="alert-title">Dokumen Belum Lengkap</h2>
                <p class="alert-text">Anda harus menggugah surat keterangan diterima magang sebelum dapat mulai absensi</p>
            </div>

            <div class="instructions-box">
                <h3 class="instructions-title">Petunjuk Upload Dokumen</h3>
                <ul class="instructions-list">
                    <li>Upload surat keterangan diterima magang dari DPRD Kota Bogor</li>
                    <li>Format file yang diizinkan: PDF, JPG, PNG (Maksimal 5MB)</li>
                    <li>Pastikan dokumen jelas dan dapat dibaca</li>
                    <li>Dokumen harus berisi kop surat resmi DPRD Kota Bogor</li>
                    <li>Setelah upload berhasil, tunggu verifikasi dari admin</li>
                </ul>
            </div>

            <div class="upload-area" onclick="triggerFileInput()" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                <div class="upload-icon">
                    <div class="folder-icon"></div>
                    <div class="document-icon"></div>
                </div>
                <p class="upload-text">Klik untuk upload file atau drag & drop</p>
                <input type="file" class="file-input" id="fileInput" accept=".pdf,.jpg,.jpeg,.png" onchange="handleFileSelect(event)">
            </div>

            <div class="file-info" id="fileInfo">
                <div class="file-name" id="fileName"></div>
                <div class="file-size" id="fileSize"></div>
            </div>

            <button class="submit-btn" id="submitBtn" onclick="submitDocument()" disabled>
                Kirim Dokumen
            </button>
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
        
        let selectedFile = null;

        function goBack() {
            window.history.back();
        }

        function triggerFileInput() {
            document.getElementById('fileInput').click();
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                processFile(file);
            }
        }

        function handleDragOver(event) {
            event.preventDefault();
            event.currentTarget.classList.add('dragover');
        }

        function handleDragLeave(event) {
            event.currentTarget.classList.remove('dragover');
        }

        function handleDrop(event) {
            event.preventDefault();
            event.currentTarget.classList.remove('dragover');
            
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                processFile(files[0]);
            }
        }

        function processFile(file) {
            // Validasi tipe file
            const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan PDF, JPG, atau PNG.');
                return;
            }

            // Validasi ukuran file (5MB = 5 * 1024 * 1024 bytes)
            const maxSize = 5 * 1024 * 1024;
            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 5MB.');
                return;
            }

            selectedFile = file;
            
            // Tampilkan informasi file
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = formatFileSize(file.size);
            document.getElementById('fileInfo').classList.add('show');
            
            // Enable submit button
            document.getElementById('submitBtn').disabled = false;
            
            // Update upload area text
            document.querySelector('.upload-text').textContent = 'File berhasil dipilih - Klik untuk mengganti';
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function submitDocument() {
            if (!selectedFile) {
                alert('Pilih file terlebih dahulu.');
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.textContent;
            
            // Show loading state
            submitBtn.innerHTML = '<span class="loading"></span>Mengirim...';
            submitBtn.disabled = true;

            // Simulate upload process
            setTimeout(() => {
                alert('Dokumen berhasil dikirim! Menunggu verifikasi admin.');
                
                // Reset form
                selectedFile = null;
                document.getElementById('fileInput').value = '';
                document.getElementById('fileInfo').classList.remove('show');
                document.querySelector('.upload-text').textContent = 'Klik untuk upload file atau drag & drop';
                
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = true;
            }, 3000);
        }

        // Add some interactive feedback
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to interactive elements
            const interactiveElements = document.querySelectorAll('.upload-area, .submit-btn, .back-btn, .notification-icon, .profile-icon'); /* Adjusted selector */
            
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', function() {
                    // Only apply transform if it's not the disabled submit button
                    if (!this.disabled) { 
                        this.style.transform = this.style.transform || 'translateY(-2px)';
                    }
                });
                
                element.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('dragover') && !this.disabled) {
                        this.style.transform = '';
                    }
                });
            });
        });
    </script>
</body>
</html>
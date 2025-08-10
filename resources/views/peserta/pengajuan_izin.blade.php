<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Izin</title>
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

        .container {
            padding: 30px 30px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .tab-navigation {
            display: flex;
            background: white;
            border-radius: 30px; /* Ukuran radius lebih besar */
            padding: 10px;
            margin-bottom: 40px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .tab {
            flex: 1;
            padding: 15px 25px; /* Padding tab ditingkatkan */
            text-align: center;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            color: #666;
        }

        .tab.active {
            background: #6c85d8;
            color: white;
            box-shadow: 0 3px 10px rgba(108, 133, 216, 0.3);
        }

        .tab:not(.active):hover {
            background: #f5f5f5;
            color: #333;
        }

        .form-container, .status-container, .history-container {
            background: white;
            border-radius: 25px; /* Ukuran radius lebih besar */
            padding: 40px; /* Padding konten ditingkatkan */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .status-container, .history-container {
            display: none;
        }

        .status-container.active, .history-container.active {
            display: block;
        }

        .status-card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 40px;
            color: white;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .status-title-main {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .status-subtitle {
            font-size: 1.4rem;
            margin-bottom: 20px;
            opacity: 0.95;
        }

        .status-info {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .summary-section {
            margin-top: 30px;
        }

        .summary-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .summary-card {
            border-radius: 25px;
            padding: 35px;
            text-align: center;
            color: white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .summary-card.total {
            background: linear-gradient(135deg, #a8b5ff 0%, #c8a8ff 100%);
        }

        .summary-card.approved {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        }

        .summary-card.pending {
            background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%);
        }

        .summary-number {
            font-size: 3.5rem;
            font-weight: 300;
            margin-bottom: 15px;
            line-height: 1;
        }

        .summary-label {
            font-size: 1.2rem;
            font-weight: 500;
            opacity: 0.95;
        }

        .history-item {
            background: linear-gradient(135deg, #b8c6db 0%, #f5f7fa 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .history-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .history-item:last-child {
            margin-bottom: 0;
        }

        .history-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .history-date {
            font-size: 1.1rem;
            color: #666;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: block;
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-subtitle {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .select-wrapper {
            position: relative;
        }

        .form-select {
            width: 100%;
            padding: 18px 25px;
            border: 2px solid #e0e0e0;
            border-radius: 20px;
            font-size: 18px;
            background: white;
            color: #999;
            cursor: pointer;
            appearance: none;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #6c85d8;
            box-shadow: 0 0 0 3px rgba(108, 133, 216, 0.1);
        }

        .select-arrow {
            position: absolute;
            top: 50%;
            right: 25px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #999;
            font-size: 16px;
        }

        .form-textarea {
            width: 100%;
            padding: 18px 25px;
            border: 2px solid #e0e0e0;
            border-radius: 20px;
            font-size: 18px;
            font-family: inherit;
            resize: vertical;
            min-height: 150px;
            transition: all 0.3s ease;
        }

        .form-textarea::placeholder {
            color: #ccc;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #6c85d8;
            box-shadow: 0 0 0 3px rgba(108, 133, 216, 0.1);
        }

        .upload-section {
            margin-bottom: 40px;
        }

        .upload-label {
            display: block;
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .upload-area {
            border: 2px dashed #6c85d8;
            border-radius: 20px;
            padding: 50px;
            text-align: center;
            background: linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .upload-area:hover {
            border-color: #5a73c4;
            background: linear-gradient(135deg, #e0efff 0%, #f5f7ff 100%);
            transform: translateY(-2px);
        }

        .camera-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            position: relative;
        }

        .camera-body {
            width: 60px;
            height: 45px;
            background: #6c85d8;
            border-radius: 10px;
            position: relative;
            margin: 0 auto;
        }

        .camera-lens {
            width: 30px;
            height: 30px;
            background: #1a237e;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .camera-lens::after {
            content: '';
            width: 15px;
            height: 15px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .camera-flash {
            width: 10px;
            height: 10px;
            background: #ff4081;
            border-radius: 3px;
            position: absolute;
            top: -6px;
            right: 6px;
        }

        .camera-grip {
            width: 25px;
            height: 18px;
            background: #8e99db;
            border-radius: 6px 6px 0 0;
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
        }

        .upload-text {
            font-size: 18px;
            color: #333;
            font-weight: 500;
        }

        .file-input {
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, #6c85d8 0%, #5a73c4 100%);
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(108, 133, 216, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 133, 216, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .preview-image {
            max-width: 100%;
            max-height: 250px;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .remove-image {
            background: #ff4444;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 16px;
            display: none;
        }

        @media (max-width: 768px) {
            body {
                padding: 0;
            }

            .container {
                padding: 0 15px;
            }
            
            .header {
                padding: 15px 20px;
            }

            .page-title {
                font-size: 20px;
            }
            
            .header-right {
                gap: 15px;
            }
            
            .profile-icon {
                width: 35px;
                height: 35px;
            }
            
            .notification-icon, .settings-icon {
                width: 22px;
                height: 22px;
            }
            
            .form-container, .history-container, .status-container {
                padding: 25px;
            }
            
            .tab-navigation {
                margin-top: 25px;
            }
            
            .tab {
                padding: 12px 18px;
                font-size: 15px;
            }

            .summary-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header-wrapper">
        <div class="container">
            <div class="header">
                <div class="header-left">
                    <span class="back-btn" onclick="window.history.back()">←</span>
                    <h1 class="page-title">Pengajuan</h1>
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
    </div>

    <div class="container">
        <div class="tab-navigation">
            <div class="tab active">Ajukan Izin</div>
            <div class="tab">Status Izin</div>
            <div class="tab">Riwayat</div>
        </div>

        <div class="form-container" id="formContainer">
            <form id="leaveForm">
                <div class="form-group">
                    <label class="form-label">Jenis Izin</label>
                    <div class="form-subtitle">Pilih Jenis Izin:</div>
                    <div class="select-wrapper">
                        <select class="form-select" id="leaveType" required>
                            <option value="">---Pilih Jenis Izin---</option>
                            <option value="sakit">Izin Sakit</option>
                            <option value="cuti">Cuti Tahunan</option>
                            <option value="urusan_keluarga">Urusan Keluarga</option>
                            <option value="keperluan_pribadi">Keperluan Pribadi</option>
                            <option value="dinas_luar">Dinas Luar</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <div class="select-arrow">▼</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <div class="form-subtitle">Alasan/Keterangan:</div>
                    <textarea 
                        class="form-textarea" 
                        id="reason" 
                        placeholder="Masukan alasan izin anda..."
                        required
                    ></textarea>
                </div>

                <div class="upload-section">
                    <label class="upload-label">Upload foto bukti:</label>
                    <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                        <div class="camera-icon">
                            <div class="camera-grip"></div>
                            <div class="camera-body">
                                <div class="camera-lens"></div>
                                <div class="camera-flash"></div>
                            </div>
                        </div>
                        <div class="upload-text">Klik untuk upload foto atau drag & drop</div>
                        <button type="button" class="remove-image" onclick="removeImage(event)">×</button>
                    </div>
                    <input 
                        type="file" 
                        id="fileInput" 
                        class="file-input" 
                        accept="image/*"
                        onchange="handleFileSelect(event)"
                    >
                </div>

                <button type="submit" class="submit-btn">Ajukan Izin</button>
            </form>
        </div>

        <div class="status-container" id="statusContainer">
            <div class="status-card-header">
                <div class="status-title-main">Status Terkini</div>
                <div class="status-subtitle">Izin Sakit - 23 Juli 2025</div>
                <div class="status-info">
                    Status: Disetujui<br>
                    Diajukan 19 jam yang lalu
                </div>
            </div>

            <div class="summary-section">
                <div class="summary-title">Ringkasan Izin</div>
                <div class="summary-cards">
                    <div class="summary-card total">
                        <div class="summary-number">1</div>
                        <div class="summary-label">Total Izin</div>
                    </div>
                    <div class="summary-card approved">
                        <div class="summary-number">1</div>
                        <div class="summary-label">Disetujui</div>
                    </div>
                    <div class="summary-card pending">
                        <div class="summary-number">0</div>
                        <div class="summary-label">Pending</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="history-container" id="historyContainer">
            <div class="history-item">
                <div class="history-title">Izin Sakit</div>
                <div class="history-date">24 - 25 Juli 2025 (1 Hari)</div>
            </div>
            
            <div class="history-item">
                <div class="history-title">Keperluan Keluarga</div>
                <div class="history-date">2 - 3 Juni 2024 (1 Hari)</div>
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

        // Tab switching functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Show/hide containers based on selected tab
                const formContainer = document.getElementById('formContainer');
                const statusContainer = document.getElementById('statusContainer');
                const historyContainer = document.getElementById('historyContainer');
                
                if (this.textContent === 'Status Izin') {
                    formContainer.style.display = 'none';
                    statusContainer.style.display = 'block';
                    historyContainer.style.display = 'none';
                } else if (this.textContent === 'Riwayat') {
                    formContainer.style.display = 'none';
                    statusContainer.style.display = 'none';
                    historyContainer.style.display = 'block';
                } else {
                    formContainer.style.display = 'block';
                    statusContainer.style.display = 'none';
                    historyContainer.style.display = 'none';
                }
            });
        });

        // History item click functionality
        document.querySelectorAll('.history-item').forEach(item => {
            item.addEventListener('click', function() {
                const title = this.querySelector('.history-title').textContent;
                const date = this.querySelector('.history-date').textContent;
                alert(`Detail Riwayat Izin:\n\nJenis: ${title}\nPeriode: ${date}\n\nStatus: Disetujui`);
            });
        });

        // File upload handling
        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const uploadArea = document.querySelector('.upload-area');
                    const existingImage = uploadArea.querySelector('.preview-image');
                    
                    if (existingImage) {
                        existingImage.remove();
                    }
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-image';
                    
                    uploadArea.appendChild(img);
                    document.querySelector('.remove-image').style.display = 'block';
                    
                    // Hide the upload text and icon
                    uploadArea.querySelector('.camera-icon').style.display = 'none';
                    uploadArea.querySelector('.upload-text').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove image functionality
        function removeImage(event) {
            event.stopPropagation();
            const uploadArea = document.querySelector('.upload-area');
            const previewImage = uploadArea.querySelector('.preview-image');
            
            if (previewImage) {
                previewImage.remove();
            }
            
            // Show the upload elements again
            uploadArea.querySelector('.camera-icon').style.display = 'block';
            uploadArea.querySelector('.upload-text').style.display = 'block';
            document.querySelector('.remove-image').style.display = 'none';
            
            // Reset file input
            document.getElementById('fileInput').value = '';
        }

        // Drag and drop functionality
        const uploadArea = document.querySelector('.upload-area');

        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = '#5a73c4';
            this.style.background = 'linear-gradient(135deg, #e0efff 0%, #f0f5ff 100%)';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = '#6c85d8';
            this.style.background = 'linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%)';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#6c85d8';
            this.style.background = 'linear-gradient(135deg, #e3f2fd 0%, #f8f9ff 100%)';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    document.getElementById('fileInput').files = files;
                    handleFileSelect({ target: { files: files } });
                } else {
                    alert('Hanya file gambar yang diperbolehkan!');
                }
            }
        });

        // Form submission
        document.getElementById('leaveForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const leaveType = document.getElementById('leaveType').value;
            const reason = document.getElementById('reason').value;
            const fileInput = document.getElementById('fileInput');
            
            if (!leaveType || !reason) {
                alert('Mohon lengkapi semua field yang diperlukan!');
                return;
            }
            
            // Simulate form submission
            alert('Pengajuan izin berhasil dikirim!\n\nJenis Izin: ' + leaveType + '\nAlasan: ' + reason + '\nFoto: ' + (fileInput.files.length > 0 ? 'Sudah diupload' : 'Tidak ada'));
            
            // Reset form
            this.reset();
            removeImage(new Event('click'));
        });

        // Select dropdown enhancement
        document.getElementById('leaveType').addEventListener('change', function() {
            if (this.value) {
                this.style.color = '#333';
            } else {
                this.style.color = '#999';
            }
        });
    </script>
</body>
</html>
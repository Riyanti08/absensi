<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Jennie Medelyn</title>
    <style>
        /* CSS Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #E6EEF8;
            min-height: 100vh;
            padding-top: 100px;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: white;
            height: 80px;
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

        /* Main content area, now more flexible */
        .main-content {
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        /* Profile card and menu card adjustments */
        .profile-card, .menu-card {
            width: 100%;
        }

        .profile-card {
            background: #a8c5e8;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #a8c5e8 0%, #8db4e2 100%);
            z-index: 0;
        }

        .profile-content {
            position: relative;
            z-index: 1;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 25px;
            overflow: hidden;
            border: 4px solid rgba(255, 255, 255, 0.3);
            background: white;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .profile-university {
            color: #34495e;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .profile-department {
            color: #34495e;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .edit-profile-btn {
            background: #4a90e2;
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .edit-profile-btn:hover {
            background: #357abd;
            transform: translateY(-2px);
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 20px 25px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #f0f0f0;
            transition: background 0.3s ease;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-item:hover {
            background: #f8f9fa;
        }

        .menu-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #4a90e2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 24px;
            color: white;
        }

        .menu-content {
            flex: 1;
        }

        .menu-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 3px;
            color: #2c3e50;
        }

        .menu-subtitle {
            font-size: 14px;
            color: #7f8c8d;
        }

        .menu-arrow {
            font-size: 18px;
            color: #bdc3c7;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            padding: 20px;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .modal-content, .profile-modal-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: slideIn 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e8ed;
            border-radius: 25px;
            font-size: 14px;
            background: #f8f9fa;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #4a90e2;
            background: white;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #4a90e2;
            color: white;
        }

        .btn-primary:hover {
            background: #357abd;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #6c757d;
            border: 2px solid #e1e8ed;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            transform: translateY(-1px);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .profile-photo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .current-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 4px solid #e1e8ed;
            position: relative;
        }

        .current-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-section h3 {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .file-input-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        .file-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px dashed #ccc;
            border-radius: 15px;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .file-input:hover {
            border-color: #4a90e2;
            background: #f0f4ff;
        }

        .file-input input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            pointer-events: none;
        }

        .file-status {
            color: #666;
            font-size: 14px;
        }

        .upload-btn {
            width: 100%;
            padding: 12px 20px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .upload-btn:hover {
            background: #357abd;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }

        .upload-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* New Media Query for larger screens */
        @media (min-width: 768px) {
            .main-content {
                display: flex;
                flex-direction: row; /* Change to row layout */
                align-items: flex-start; /* Align items to the top */
                justify-content: center; /* Center the content horizontally */
                gap: 30px;
                padding: 40px 20px;
            }

            .profile-card {
                width: 40%; /* Adjust width for profile card */
                max-width: 350px; /* Max width to prevent it from being too wide */
                padding: 40px;
            }
            
            .menu-card {
                width: 60%; /* Adjust width for menu card */
                max-width: 600px; /* Max width to prevent it from being too wide */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <span class="back-btn" onclick="window.history.back()">←</span>
                <h1 class="page-title">Profile</h1>
            </div>
            <div class="header-right">
                <span class="admin-text">Peserta</span>
                <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_peserta')">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
            </div>
        </div>

        <div class="main-content">
            <div class="profile-card">
                <div class="profile-content">
                    <div class="profile-image">
                        <img src="{{ asset('images/profile_peserta.svg') }}">
                    </div>
                    <h1 class="profile-name">Jennie Medelyn</h1>
                    <p class="profile-university">Universitas Pakuan</p>
                    <p class="profile-department">Bagian Arsip</p>
                    <button class="edit-profile-btn" onclick="editProfile()">
                        ✏️ Edit Profile
                    </button>
                </div>
            </div>

            <div class="menu-card">
                <a href="#" class="menu-item" onclick="editPersonalData()">
                    <div class="menu-icon">👤</div>
                    <div class="menu-content">
                        <div class="menu-title">Edit Data Personal</div>
                        <div class="menu-subtitle">Ubah nama, email, dan informasi pribadi lainnya</div>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>
                
                <a href="#" class="menu-item" onclick="logout()">
                    <div class="menu-icon">↗️</div>
                    <div class="menu-content">
                        <div class="menu-title">Logout</div>
                        <div class="menu-subtitle">Keluar dari akun</div>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Data Personal</h2>
            </div>
            
            <form id="editForm">
                <div class="form-group">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" id="nama" class="form-input" value="Jennie Medelyn">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-input" value="jenniemedelyn@gmail.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="universitas">Universitas/Sekolah</label>
                    <input type="text" id="universitas" class="form-input" value="Universitas Pakuan">
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="profileModal" class="modal">
        <div class="profile-modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Ubah Foto Profile</h2>
            </div>
            
            <div class="profile-photo-section">
                <div id="currentPhotoDisplay" class="current-photo">
                    <img src="{{ asset('images/profile_peserta.svg') }}" id="profilePreview">
                </div>
                
                <div class="upload-section">
                    <h3>Upload Foto Profile Baru</h3>
                    
                    <div class="file-input-wrapper">
                        <div class="file-input">
                            <input type="file" id="photoUpload" accept="image/*" onchange="handleFileSelect(event)">
                            <div class="file-input-text">
                                <span>Choose File</span>
                                <span class="file-status" id="fileStatus">No file Choose</span>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="upload-btn" id="uploadButton" onclick="uploadPhoto()" disabled>
                        Upload Foto
                    </button>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="closeProfileModal()">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="saveProfilePhoto()">Simpan</button>
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

        function editProfile() {
            document.getElementById('profileModal').classList.add('show');
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.remove('show');
            // Reset file input
            document.getElementById('photoUpload').value = '';
            document.getElementById('fileStatus').textContent = 'No file Choose';
            document.getElementById('uploadButton').disabled = true;
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            const fileStatus = document.getElementById('fileStatus');
            const uploadButton = document.getElementById('uploadButton');
            
            if (file) {
                fileStatus.textContent = file.name;
                uploadButton.disabled = false;
                
                // Preview the selected image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                fileStatus.textContent = 'No file Choose';
                uploadButton.disabled = true;
            }
        }

        function uploadPhoto() {
            const fileInput = document.getElementById('photoUpload');
            if (fileInput.files[0]) {
                // Simulate upload process
                const uploadButton = document.getElementById('uploadButton');
                uploadButton.textContent = 'Uploading...';
                uploadButton.disabled = true;
                
                setTimeout(() => {
                    uploadButton.textContent = 'Upload Foto';
                    alert('Foto berhasil diupload!');
                    uploadButton.disabled = false; // Re-enable for another upload
                }, 1500);
            }
        }

        function saveProfilePhoto() {
            const newPhotoSrc = document.getElementById('profilePreview').src;
            
            // Update main profile image and header icon
            document.querySelector('.profile-image img').src = newPhotoSrc;
            document.querySelector('.header-right a img').src = newPhotoSrc;
            
            closeProfileModal();
            alert('Foto profil berhasil diperbarui!');
        }

        document.addEventListener('click', function(e) {
            const profileModal = document.getElementById('profileModal');
            if (e.target === profileModal) {
                closeProfileModal();
            }
        });

        function editPersonalData() {
            document.getElementById('editModal').classList.add('show');
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        document.addEventListener('click', function(e) {
            const modal = document.getElementById('editModal');
            if (e.target === modal) {
                closeModal();
            }
        });

        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const universitas = document.getElementById('universitas').value;
            
            document.querySelector('.profile-name').textContent = nama;
            document.querySelector('.profile-university').textContent = universitas;
            
            closeModal();
            alert('Data berhasil diperbarui!');
        });

        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar dari akun?')) {
                window.location.href = '/login'; 
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.profile-card, .menu-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>
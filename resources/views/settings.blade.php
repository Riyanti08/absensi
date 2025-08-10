<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Sistem</title>
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

        .main-content {
            display: flex;
            gap: 20px;
            padding: 100px 30px 30px; /* sesuai tinggi header */
            max-width: 1200px;
            margin: 0 auto;
        }

        .tab-navigation {
            display: flex;
            padding: 20px 30px 0;
            gap: 10px;
        }

        .tab {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tab.active {
            background: #B0CAE8;
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .tab:hover:not(.active) {
            background: rgba(102, 126, 234, 0.2);
        }

        .content {
            padding: 40px 30px;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            max-width: 500px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 16px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: #f8fafc;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .submit-btn {
            width: 100%;
            background: #0356B5;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .user-role-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .user-role-header {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 10px 0;
            border-bottom: 2px solid #e2e8f0;
            margin-bottom: 10px;
        }

        .user-role-header span {
            font-weight: 600;
            color: #4a5568;
            font-size: 16px;
        }

        .user-item {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .user-email {
            font-size: 16px;
            color: #2d3748;
        }

        .role-select-container {
            position: relative;
        }

        .role-select {
            width: 100%;
            padding: 10px 40px 10px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            background: #f8fafc;
            cursor: pointer;
            appearance: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .role-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .role-select-container::after {
            content: '▼';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #718096;
            font-size: 12px;
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 2px solid #e2e8f0;
            border-top: none;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .dropdown.active {
            display: block;
        }

        .dropdown-option {
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-option:hover {
            background: #f8fafc;
        }

        .dropdown-option.selected {
            background: #667eea;
            color: white;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #e2e8f0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .checkbox.checked {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }

        .checkbox.checked::after {
            content: '✓';
            font-size: 12px;
            font-weight: bold;
        }

        .update-btn {
            width: 100%;
            background: #0356B5;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 20px;
        }

        .update-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .update-btn:active {
            transform: translateY(0);
        }

        /* Notification Settings Styles */
        .notification-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .notification-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            border-color: #B0CAE8;
            background: white;
        }

        .notification-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-icon-large {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
        }

        .notification-text {
            font-size: 16px;
            font-weight: 500;
            color: #2d3748;
        }

        .toggle-switch {
            position: relative;
            width: 60px;
            height: 30px;
            background: #cbd5e0;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .toggle-switch.active {
            background: #B0CAE8;
        }

        .toggle-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .toggle-switch.active .toggle-slider {
            transform: translateX(30px);
        }

        .notification-section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 15px;
            }

            .header {
                padding: 15px 20px;
            }

            .header h1 {
                font-size: 20px;
            }

            .tab-navigation {
                padding: 15px 20px 0;
                flex-wrap: wrap;
            }

            .tab {
                padding: 10px 18px;
                font-size: 14px;
            }

            .content {
                padding: 25px 20px;
            }

            .form-card {
                padding: 25px;
            }

            .form-title {
                font-size: 20px;
            }

            .notification-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .notification-info {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
        <div class="header-left">
            <button class="back-btn">←</button>
            <h1 class="page-title">Pengaturan</h1>
        </div>
        <div class="header-right">
            <span class="admin-text">Admin</span>
            <a href="/profile_admin"> <img src="{{ asset('images/profile.svg') }}" alt="Profil Pengguna">
                </a>
            <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_admin')">
                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
            </svg>
        </div>
    </div>

        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <button class="tab active">Atur Jam Masuk & Pulang</button>
            <button class="tab">Atur Batas Waktu Absen</button>
            <button class="tab">Atur User Role</button>
            <button class="tab">Pengaturan Notifikasi</button>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="form-card">
                <h2 class="form-title">Atur Jam Masuk & Pulang</h2>
                
                <form id="timeSettingsForm">
                    <div class="form-group">
                        <label class="form-label" for="jamMasuk">Jam Masuk</label>
                        <input type="time" class="form-input" id="jamMasuk" name="jamMasuk" value="08:00">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="jamPulang">Jam Pulang</label>
                        <input type="time" class="form-input" id="jamPulang" name="jamPulang" value="17:00">
                    </div>

                    <button type="submit" class="submit-btn">Simpan waktu operasional</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.tab');
        const formCard = document.querySelector('.form-card');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Update form content based on selected tab
                updateFormContent(index);
            });
        });

        function updateFormContent(tabIndex) {
            const titles = [
                'Atur Jam Masuk & Pulang',
                'Atur Batas Waktu Absen',
                'Atur User Role',
                'Pengaturan Notifikasi'
            ];
            
            const formTitle = document.querySelector('.form-title');
            formTitle.textContent = titles[tabIndex];

            const form = document.getElementById('timeSettingsForm');

            if (tabIndex === 0) {
                // Atur Jam Masuk & Pulang
                form.innerHTML = `
                    <div class="form-group">
                        <label class="form-label" for="jamMasuk">Jam Masuk</label>
                        <input type="time" class="form-input" id="jamMasuk" name="jamMasuk" value="08:00">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="jamPulang">Jam Pulang</label>
                        <input type="time" class="form-input" id="jamPulang" name="jamPulang" value="17:00">
                    </div>

                    <button type="submit" class="submit-btn">Simpan waktu operasional</button>
                `;
            } else if (tabIndex === 1) {
                // Atur Batas Waktu Absen
                form.innerHTML = `
                    <div class="form-group">
                        <label class="form-label" for="batasAbsenMasuk">Batas Absen Masuk</label>
                        <input type="time" class="form-input" id="batasAbsenMasuk" name="batasAbsenMasuk" value="08:30" placeholder="Contoh: 08:30">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="batasAbsenPulang">Batas Absen Pulang</label>
                        <input type="time" class="form-input" id="batasAbsenPulang" name="batasAbsenPulang" value="16:30" placeholder="Contoh: 16:30">
                    </div>

                    <button type="submit" class="submit-btn">Simpan batas absen</button>
                `;
            } else if (tabIndex === 2) {
                // Atur User Role
                form.innerHTML = `
                    <div class="user-role-container">
                        <div class="user-role-header">
                            <span>Email</span>
                            <span>Role</span>
                        </div>
                        
                        <div class="user-item">
                            <div class="user-email">anindyaazelsi@gmail.com</div>
                            <div class="role-select-container">
                                <div class="role-select" data-user="anindyaazelsi@gmail.com">Admin</div>
                                <div class="dropdown" id="dropdown-anindya">
                                    <div class="dropdown-option" data-role="Admin">
                                        <div class="checkbox checked"></div>
                                        Admin
                                    </div>
                                    <div class="dropdown-option" data-role="User">
                                        <div class="checkbox"></div>
                                        User
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="user-item">
                            <div class="user-email">mahendra@gmail.com</div>
                            <div class="role-select-container">
                                <div class="role-select" data-user="mahendra@gmail.com">User</div>
                                <div class="dropdown" id="dropdown-mahendra">
                                    <div class="dropdown-option" data-role="Admin">
                                        <div class="checkbox"></div>
                                        Admin
                                    </div>
                                    <div class="dropdown-option" data-role="User">
                                        <div class="checkbox checked"></div>
                                        User
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-btn update-btn">Update Peran</button>
                `;
                
                // Initialize dropdown functionality for user roles
                initializeRoleDropdowns();
            } else if (tabIndex === 3) {
                // Pengaturan Notifikasi
                form.innerHTML = `
                    <div class="notification-container">
                        <div class="notification-section-title">Notifikasi Admin</div>
                        
                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">👤</div>
                                <div class="notification-text">Admin mendapatkan notifikasi izin peserta</div>
                            </div>
                            <div class="toggle-switch active" data-notification="admin-izin">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">📊</div>
                                <div class="notification-text">Admin mendapatkan laporan harian</div>
                            </div>
                            <div class="toggle-switch" data-notification="admin-laporan">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-section-title">Notifikasi Pembimbing</div>
                        
                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">⏰</div>
                                <div class="notification-text">Pembimbing mendapatkan notifikasi keterlambatan</div>
                            </div>
                            <div class="toggle-switch active" data-notification="pembimbing-terlambat">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">📝</div>
                                <div class="notification-text">Pembimbing mendapatkan ringkasan mingguan</div>
                            </div>
                            <div class="toggle-switch" data-notification="pembimbing-ringkasan">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-section-title">Notifikasi Peserta</div>
                        
                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">📋</div>
                                <div class="notification-text">Peserta mendapatkan notifikasi log aktivitas</div>
                            </div>
                            <div class="toggle-switch active" data-notification="peserta-log">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">🔔</div>
                                <div class="notification-text">Peserta mendapatkan pengingat absen</div>
                            </div>
                            <div class="toggle-switch active" data-notification="peserta-pengingat">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <div class="notification-icon-large">✅</div>
                                <div class="notification-text">Peserta mendapatkan konfirmasi absen</div>
                            </div>
                            <div class="toggle-switch" data-notification="peserta-konfirmasi">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-btn">Simpan Pengaturan Notifikasi</button>
                `;

                // Initialize toggle switches
                initializeToggleSwitches();
            }
        }

        // Initialize toggle switches for notification settings
        function initializeToggleSwitches() {
            const toggleSwitches = document.querySelectorAll('.toggle-switch');
            
            toggleSwitches.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    toggle.classList.toggle('active');
                    
                    // Get notification type
                    const notificationType = toggle.getAttribute('data-notification');
                    const isActive = toggle.classList.contains('active');
                    
                    console.log(`Notification ${notificationType} is now ${isActive ? 'enabled' : 'disabled'}`);
                });
            });
        }

        // Initialize role dropdowns
        function initializeRoleDropdowns() {
            const roleSelects = document.querySelectorAll('.role-select');
            
            roleSelects.forEach(select => {
                select.addEventListener('click', (e) => {
                    e.stopPropagation();
                    
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                    
                    // Toggle current dropdown
                    const dropdown = select.nextElementSibling;
                    dropdown.classList.add('active');
                });
            });

            // Handle dropdown option clicks
            document.querySelectorAll('.dropdown-option').forEach(option => {
                option.addEventListener('click', (e) => {
                    e.stopPropagation();
                    
                    const role = option.getAttribute('data-role');
                    const dropdown = option.closest('.dropdown');
                    const roleSelect = dropdown.previousElementSibling;
                    
                    // Update selected role
                    roleSelect.textContent = role;
                    
                    // Update checkboxes
                    dropdown.querySelectorAll('.checkbox').forEach(checkbox => {
                        checkbox.classList.remove('checked');
                    });
                    option.querySelector('.checkbox').classList.add('checked');
                    
                    // Close dropdown
                    dropdown.classList.remove('active');
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', () => {
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });
        }

        // Form submission
        document.getElementById('timeSettingsForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const jamMasuk = document.getElementById('jamMasuk')?.value;
            const jamPulang = document.getElementById('jamPulang')?.value;
            const batasAbsenMasuk = document.getElementById('batasAbsenMasuk')?.value;
            const batasAbsenPulang = document.getElementById('batasAbsenPulang')?.value;
            
            // Check if this is user role update
            const isUserRoleTab = document.querySelector('.user-role-container');
            const isNotificationTab = document.querySelector('.notification-container');
            
            if (jamMasuk && jamPulang) {
                // Simulate saving for Jam Masuk & Pulang
                saveFormData('Berhasil disimpan!', jamMasuk, jamPulang);
                console.log('Jam Masuk:', jamMasuk, 'Jam Pulang:', jamPulang);
            } else if (batasAbsenMasuk && batasAbsenPulang) {
                // Simulate saving for Batas Absen
                saveFormData('Batas absen berhasil disimpan!', batasAbsenMasuk, batasAbsenPulang);
                console.log('Batas Absen Masuk:', batasAbsenMasuk, 'Batas Absen Pulang:', batasAbsenPulang);
            } else if (isUserRoleTab) {
                // Handle user role updates
                const roleSelects = document.querySelectorAll('.role-select');
                const userRoles = {};
                
                roleSelects.forEach(select => {
                    const user = select.dataset.user;
                    const role = select.textContent;
                    userRoles[user] = role;
                });
                
                saveFormData('Peran berhasil diperbarui!');
                console.log('Updated User Roles:', userRoles);
            } else if (isNotificationTab) {
                // Handle notification settings
                const toggleSwitches = document.querySelectorAll('.toggle-switch');
                const notificationSettings = {};
                
                toggleSwitches.forEach(toggle => {
                    const notificationType = toggle.getAttribute('data-notification');
                    const isActive = toggle.classList.contains('active');
                    notificationSettings[notificationType] = isActive;
                });
                
                saveFormData('Pengaturan notifikasi berhasil disimpan!');
                console.log('Notification Settings:', notificationSettings);
            }
        });

        function saveFormData(successMessage, value1, value2) {
            const button = document.querySelector('.submit-btn');
            if (!button) return;
            
            const originalText = button.textContent;
            
            button.textContent = 'Menyimpan...';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = successMessage;
                button.style.background = 'linear-gradient(135deg, #48bb78, #38a169)';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                    button.style.background = 'linear-gradient(135deg, #667eea, #764ba2)';
                }, 2000);
            }, 1000);
        }

        // Back button functionality
            document.querySelector('.back-btn').addEventListener('click', () => {
                window.history.back(); // ini yang benar
                console.log('Back button clicked');
            });
            
        function navigateTo(page) {
            const routes = {
                profile_admin: '/admin.profile_admin',        
                notifikasi_admin: '/admin.notifikasi_admin', 
                settings: '/settings',      
            };
            const target = routes[page] || '/';
            window.location.href = target;
        }
    </script>
</body>
</html>
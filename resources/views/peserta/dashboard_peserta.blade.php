<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyIntern</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #E6EEF8;
            min-height: 100vh; /* Pastikan body minimal setinggi viewport */
            display: flex; /* Aktifkan Flexbox pada body */
            flex-direction: column; /* Susun elemen di dalam body secara kolom */
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px; /* Pertahankan padding untuk konten utama */
            flex-grow: 1; /* Biarkan container utama mengisi sisa ruang */
            display: flex; /* Buat container ini juga flex untuk menata header dan menu-grid */
            flex-direction: column; /* Susun header dan menu-grid secara kolom */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            padding: 10px 20px;
            border-radius: 16px;
            width: fit-content;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-box img {
            width: 60px;
            height: 60px;
        }

        .logo-text {
            color: black;
            font-size: 20px;
            font-weight: 500; /* Perbaiki typo: 50 jadi 500 */
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
            background-color: #dc3545;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            /* Tambahkan cursor dan transition untuk interaktivitas */
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        .profile-icon:active {
            transform: scale(0.95);
        }
        .header-right .profile-icon img { /* Agar gambar profil tidak memecah layout lingkaran */
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }


        .notification-icon, .settings-icon {
            width: 24px;
            height: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }
        .notification-icon:hover, .settings-icon:hover {
            color: #007bff; /* Warna hover konsisten */
        }
        .notification-icon:active, .settings-icon:active {
            transform: scale(0.95);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-items: center;
            padding: 0 10px;
            margin-bottom: 40px; /* Tambahkan margin-bottom untuk jarak ke footer */
        }

        .menu-item {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-width: 180px;
            max-width: 100%;
            height: 150px;
            /* width: 400; <-- Ini typo, hapus atau ganti dengan unit */
            position: relative; /* Penting untuk pseudo-element ::before */
            overflow: hidden; /* Penting untuk pseudo-element ::before */
        }

        .menu-item img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .menu-text {
            font-size: 20px; /* Diubah dari 22px menjadi 20px agar konsisten dengan logo-text */
            font-weight: 600;
            color: #333;
            position: relative;
            z-index: 2;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 1);
        }

        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
            z-index: 1; /* Pastikan di bawah konten menu-item */
        }

        .menu-item:hover::before {
            left: 100%;
        }

        .menu-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .footer {
            /* Hapus width: 100vw; dan margin-left: calc(-50vw + 50%); */
            width: 100%; /* Ambil 100% lebar parent container */
            height: auto; /* Biarkan tinggi menyesuaikan konten */
            display: flex;
            justify-content: space-between;
            align-items: center; /* Ubah stretch ke center agar konten tidak meregang vertikal */
            gap: 30px;
            padding: 30px;
            background: #BFD4ED;
            border-radius: 30px 30px 0 0; /* Hanya sudut atas yang melengkung */
            box-shadow: 0 -8px 25px rgba(0, 0, 0, 0.1); /* Shadow ke atas */
            margin-top: auto; /* PENTING: Mendorong footer ke bawah di flex container */
            color: white;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 0 0 auto; /* Ubah dari 300px agar lebih responsif */
        }

        .footer-left img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .footer-text-box {
            font-size: 18px;
            color: #333; /* Warna teks jadi gelap seperti di gambar */
            font-weight: 600;
            line-height: 1.3;
        }

        .footer-middle {
            flex: 1; /* Allows the map container to take remaining space */
            min-width: 280px; /* Minimum width for the map */
            display: flex; /* To center map container if it doesn't take full flex-grow */
            justify-content: center;
            align-items: center;
        }

        .map-container {
            width: 100%;
            height: 200px; /* Tinggi map container tetap */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: #f0f4f8;
            /* Hapus display flex, align-items, justify-content jika iframe sudah mengisi penuh */
            /* display: flex;
            align-items: center;
            justify-content: center; */
            position: relative;
        }

        .map-container iframe { /* Pastikan iframe mengisi penuh kontainer map */
            width: 100%;
            height: 100%;
        }

        .map-placeholder {
            /* Ini tidak perlu jika sudah pakai iframe asli */
            display: none;
        }

        .footer-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            flex: 0 0 auto; /* Ubah dari 280px agar lebih responsif */
            color: #555; /* Warna teks kontak jadi abu-abu */
        }

        .footer-right h3 {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 0;
        }

        .contact-item img {
            width: 20px;
            height: 20px;
            object-fit: contain;
            /* Filter SVG warna hitam menjadi abu-abu #666 */
            filter: invert(39%) sepia(21%) saturate(200%) hue-rotate(170deg) brightness(90%) contrast(89%);
        }

        .contact-item span {
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Padding lebih kecil untuk mobile */
            }
            .menu-grid {
                grid-template-columns: 1fr;
                padding: 0; /* Hapus padding horizontal di mobile */
            }

            .header {
                flex-direction: column; /* Header jadi kolom di mobile */
                align-items: flex-start;
                gap: 15px;
            }
            .header-right {
                width: 100%;
                justify-content: flex-end; /* Pindahkan ikon ke kanan */
            }

            .footer {
                flex-direction: column; /* Footer jadi kolom di mobile */
                align-items: center; /* Pusatkan konten footer */
                gap: 20px;
                padding: 30px; /* Sesuaikan padding */
                border-radius: 30px 30px 0 0; /* Pertahankan radius atas */
                text-align: center; /* Rata tengah teks di footer mobile */
            }

            .footer-left,
            .footer-right {
                flex: none;
                width: 100%; /* Ambil lebar penuh */
                max-width: 300px; /* Batasi lebar agar tidak terlalu lebar di tablet */
            }
            .footer-left {
                justify-content: center; /* Pusatkan logo dan teks di mobile */
            }
            .footer-text-box {
                text-align: center;
            }

            .contact-item {
                justify-content: center; /* Pusatkan item kontak */
            }

            .map-container {
                height: 200px; /* Pertahankan tinggi map */
                width: 100%; /* Pastikan map container penuh lebar */
            }
        }

        /* Keyframes untuk animasi */
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

        .menu-item {
            animation: fadeInUp 0.6s ease forwards;
        }

        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.2s; }
        .menu-item:nth-child(3) { animation-delay: 0.3s; }
        .menu-item:nth-child(4) { animation-delay: 0.4s; }
        .menu-item:nth-child(5) { animation-delay: 0.5s; }
        .menu-item:nth-child(6) { animation-delay: 0.6s; }
        .menu-item:nth-child(7) { animation-delay: 0.7s; }
        .menu-item:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-box">
                <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor">
                <span class="logo-text">DailyIntern</span>
            </div>
            <div class="header-right">
                <span class="admin-text">Peserta</span>
                <div class="profile-icon" onclick="navigateTo('profile_peserta')">
                    <img src="{{ asset('images/profile_peserta.svg') }}" alt="Profil Pengguna">
                </div>
                <svg class="notification-icon" viewBox="0 0 24 24" fill="currentColor" onclick="navigateTo('notifikasi_peserta')">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                </svg>
            </div>
        </div>
        <div class="menu-grid">
            <div class="menu-item" onclick="navigateTo('home_peserta')">
                <img src="{{ asset('images/icon_home.svg') }}">
                <div class="menu-text">Home</div>
            </div>

            <div class="menu-item" onclick="navigateTo('pengajuan_izin')">
                <img src="{{ asset('images/icon_peserta.svg') }}">
                <div class="menu-text">Pengajuan Izin</div>
            </div>

            <div class="menu-item" onclick="navigateTo('absensi_peserta')">
                <img src="{{ asset('images/icon_absensi.svg') }}">
                <div class="menu-text">Absensi</div>
            </div>

            <div class="menu-item" onclick="navigateTo('laporan_peserta')">
                <img src="{{ asset('images/icon_laporan.svg') }}">
                <div class="menu-text">Laporan</div>
            </div>

            <div class="menu-item" onclick="navigateTo('dokumen_peserta')">
                <img src="{{ asset('images/icon_document.svg') }}">
                <div class="menu-text">Dokumen</div>
            </div>

            <div class="menu-item" onclick="navigateTo('statistik_peserta')">
                <img src="{{ asset('images/icon_statistik.svg') }}">
                <div class="menu-text">Statistik</div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-left">
            <img src="{{ asset('images/logo_bogor.svg') }}" alt="Logo Bogor">
            <div class="footer-text-box">
                Sistem Absensi Magang<br>DPRD Kota Bogor
            </div>
        </div>

        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.78453488258!2d106.79061097486899!3d-6.551717993437976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e3d9f7a77b%3A0xc3f1d8f5d0b4b2c1!2sDPRD%20Kota%20Bogor!5e0!3m2!1sen!2sid!4v1701768800000!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="footer-right">
            <h3>Kontak</h3>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z'/%3E%3C/svg%3E" alt="Location Icon">
                <span>Jl. Pemuda No.25, Tanah Sareal, Kota Bogor.</span>
            </div>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z'/%3E%3C/svg%3E" alt="Phone Icon">
                <span>(0251) 8323472</span>
            </div>
            <div class="contact-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23666' viewBox='0 0 24 24'%3E%3Cpath d='M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z'/%3E%3C/svg%3E" alt="Email Icon">
                <span>dprdbgr@gmail.com</span>
            </div>
        </div>
    </div>

    <script>
    // Fungsionalitas navigateTo
    function navigateTo(page, event = null) {
    if (event && event.currentTarget) {
        const targetElement = event.currentTarget;
        targetElement.style.transform = 'scale(0.95)';
        setTimeout(() => {
            targetElement.style.transform = '';
            performNavigation(page);
        }, 150);
    } else {
        performNavigation(page);
    }
    }

    function performNavigation(page) {
        const routes = {
            home_peserta: '/peserta.home_peserta',
            pengajuan_izin: '/peserta.pengajuan_izin',
            absensi_peserta: '/peserta.absensi_peserta',
            laporan_peserta: '/peserta.laporan_peserta',
            dokumen_peserta: '/peserta.dokumen_peserta',
            statistik_peserta: '/peserta.statistik_peserta',
            profile_peserta: '/peserta.profile_peserta',        // Contoh URL untuk profile
            notifikasi_peserta: '/peserta.notifikasi_peserta', // Updated for notifikasi.blade.php
        };
        window.location.href = routes[page] || '/';
    }

    // Animasi klik untuk menu-item (sudah ada)
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function() {
            // navigateTo akan menangani efek klik
        });
    });

    // Efek parallax ringan
    document.addEventListener('mousemove', (e) => {
        const items = document.querySelectorAll('.menu-item');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        items.forEach((item, index) => {
            const speed = (index + 1) * 0.5;
            const rotateX = (y - 0.5) * speed;
            const rotateY = (x - 0.5) * speed;

            item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
    });

    document.addEventListener('mouseleave', () => {
        const items = document.querySelectorAll('.menu-item');
        items.forEach(item => {
            item.style.transform = '';
        });
    });

    // Tambahkan event listener untuk ikon di header
    document.addEventListener('DOMContentLoaded', () => {
    const profileIcon = document.querySelector('.profile-icon');
    const notificationIcon = document.querySelector('.notification-icon');
    const settingsIcon = document.querySelector('.settings-icon');

    if (profileIcon) {
        profileIcon.addEventListener('click', function(e) {
            navigateTo('profile_peserta', e);
        });
    }
    if (notificationIcon) {
        notificationIcon.addEventListener('click', function(e) {
            navigateTo('notifikasi_peserta', e);
        });
    }
    if (settingsIcon) {
        settingsIcon.addEventListener('click', function(e) {
            navigateTo('settings', e);
        });
    }
});
</script>
</body>
</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    .footer {
        background: linear-gradient(135deg, #022B63 0%, #013a86 100%);
        color: #fff;
        width: 100%;
        padding: 55px 0 25px;
        margin-top: 0;
        overflow: hidden;
    }

    .container-footer {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 40px;
    }

    .footer-content {
        display: grid;
        grid-template-columns: 1.8fr 1fr 1.2fr 1.4fr;
        gap: 45px;
        align-items: start;
    }

    .footer-column h3 {
        position: relative;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        padding-bottom: 10px;
    }

    .footer-column h3::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 45px;
        height: 3px;
        background: #FFC107;
        border-radius: 10px;
    }

    /* ====================
       Tentang Universitas
    ==================== */
    .about-wrapper {
        display: flex;
        gap: 18px;
        align-items: flex-start;
    }

    .about-logo {
        width: 80px;
        height: auto;
        flex-shrink: 0;
        background: rgba(255,255,255,0.08);
        padding: 8px;
        border-radius: 12px;
    }

    .about-text {
        margin: 0;
        font-size: 14px;
        line-height: 1.8;
        color: #dbeafe;
        text-align: justify;
    }

    /* ====================
       Quick Links
    ==================== */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 14px;
    }

    .footer-links a {
        color: #dbeafe;
        text-decoration: none;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        transition: all .3s ease;
    }

    .footer-links a::before {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        margin-right: 10px;
        color: #FFC107;
    }

    .footer-links a:hover {
        color: #FFC107;
        transform: translateX(5px);
    }

    /* ====================
       Kontak
    ==================== */
    .footer-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 18px;
    }

    .footer-item i {
        width: 18px;
        color: #FFC107;
        margin-top: 4px;
        font-size: 15px;
    }

    .footer-item a {
        color: #dbeafe;
        text-decoration: none;
        line-height: 1.6;
        font-size: 14px;
        transition: .3s;
    }

    .footer-item a:hover {
        color: #FFC107;
    }

    /* ====================
       Maps
    ==================== */
    .map-wrapper {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,.25);
        transition: .3s ease;
    }

    .map-wrapper:hover {
        transform: translateY(-3px);
    }

    .footer-map {
        width: 100%;
        height: 190px;
        border: none;
        display: block;
    }

    /* ====================
       Footer Bottom
    ==================== */
    .footer-bottom {
        margin-top: 45px;
        padding-top: 20px;
        border-top: 1px solid rgba(255,255,255,.15);
        text-align: center;
        color: #cbd5e1;
        font-size: 13px;
        letter-spacing: .3px;
    }

    /* ====================
       Responsive
    ==================== */
    @media (max-width: 1024px) {
        .footer-content {
            grid-template-columns: repeat(2, 1fr);
            gap: 35px;
        }
    }

    @media (max-width: 768px) {
        .container-footer {
            padding: 0 25px;
        }

        .footer-content {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .footer-column h3 {
            text-align: center;
        }

        .footer-column h3::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .about-wrapper {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .about-text {
            text-align: center;
        }

        .footer-item {
            justify-content: center;
            text-align: center;
        }

        .footer-links {
            text-align: center;
        }

        .footer-links a {
            justify-content: center;
        }

        .map-wrapper {
            max-width: 450px;
            margin: 0 auto;
        }
    }
</style>

<footer class="footer">
    <div class="container-footer">

        <div class="footer-content">

            <!-- Tentang -->
            <div class="footer-column">
                <h3>Tentang Universitas</h3>

                <div class="about-wrapper">
                    <img src="{{ asset('assets/images/logo_unwnobg.png') }}"
                        alt="Logo Universitas Ngudi Waluyo"
                        class="about-logo">

                    <p class="about-text">
                        Sistem Evaluasi Dosen Oleh Mahasiswa (EDOM) Universitas
                        Ngudi Waluyo merupakan sarana evaluasi pembelajaran yang
                        digunakan untuk meningkatkan mutu akademik, kualitas
                        pengajaran dosen, serta pelayanan pendidikan secara
                        berkelanjutan.
                    </p>
                </div>
            </div>

            <!-- Quick Link -->
            <div class="footer-column">
                <h3>Tautan Cepat</h3>

                <ul class="footer-links">
                    <li>
                        <a href="{{ url('/') }}">
                            Beranda Utama
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Panduan EDOM
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="footer-column">
                <h3>Hubungi Kami</h3>

                <div class="footer-item">
                    <i class="fas fa-location-dot"></i>
                    <a href="https://maps.google.com/?q=Universitas+Ngudi+Waluyo" target="_blank">
                        Jl. Diponegoro No.186, Gedanganak,
                        Kec. Ungaran Timur, Kab. Semarang
                    </a>
                </div>

                <div class="footer-item">
                    <i class="fas fa-phone"></i>
                    <a href="tel:0246925408">
                        (024) 6925408
                    </a>
                </div>

                <div class="footer-item">
                    <i class="fas fa-globe"></i>
                    <a href="https://unw.ac.id" target="_blank">
                        www.unw.ac.id
                    </a>
                </div>
            </div>

            <!-- Maps -->
            <div class="footer-column">
                <h3>Lokasi Kampus</h3>

                <div class="map-wrapper">
                    <iframe
                        class="footer-map"
                        src="https://www.google.com/maps?q=Universitas+Ngudi+Waluyo&output=embed"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }}
            Universitas Ngudi Waluyo |
            Sistem Evaluasi Dosen Oleh Mahasiswa (EDOM).
            All Rights Reserved.
        </div>

    </div>
</footer>
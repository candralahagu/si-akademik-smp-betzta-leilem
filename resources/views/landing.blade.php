<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SMP Betzata Leilem, membentuk generasi cerdas, beriman, dan berakhlak mulia di tanah Minahasa.">
    <title>SISMPETZATA</title>
    <link rel="icon" href="{{ asset('style/assets/logo-sekolah.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --primary: #26A69A; /* Teal */
            --secondary: #1E88E5; /* Blue */
            --accent: #FFD700; /* Gold */
            --dark: #1A202C; /* Dark Gray */
            --light: #F7FAFC; /* Light Gray */
            --text-dark: #2D3748;
            --text-light: #EDF2F7;
            --transition: 0.3s ease;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.8;
            background-color: var(--light);
            overflow-x: hidden;
        }

        header {
            background: rgba(81, 199, 159, 0.527);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        header.scrolled {
            background: rgba(38, 166, 154, 0.95);
            box-shadow: var(--shadow);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 45px;
            transition: var(--transition);
        }

        .logo img:hover {
            transform: rotate(360deg);
        }

        .logo span {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-light);
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-menu a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: var(--transition);
        }

        .nav-menu a:hover {
            color: var(--accent);
            transform: translateY(-2px);
            display: inline-block;
        }

        .login-button {
            background: linear-gradient(135deg, var(--secondary), #1565C0);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: var(--transition);
        }

        .login-button:hover {
            background: linear-gradient(135deg, #1565C0, var(--secondary));
            transform: scale(1.05);
        }

        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--text-light);
            background: url('{{ asset('style/assets/sekolah3.png') }}') center/cover no-repeat fixed;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6));
            z-index: 1;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .particles span {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(100vh) scale(0); }
            100% { transform: translateY(-10vh) scale(1); opacity: 0; }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 2rem;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInDown 1s ease-out;
        }

        .hero-content p {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.3s;
            animation-fill-mode: backwards;
        }

        .cta-button {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
        }

        .cta-button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }

        .section {
            padding: 5rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--primary);
            text-align: center;
            margin-bottom: 3rem;
        }

        .info-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            padding: 5rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1.1rem;
            color: var(--text-dark);
        }

        #lokasi .card iframe {
            width: 100%;
            border-radius: 10px;
        }

        footer {
            background: var(--dark);
            color: var(--text-light);
            padding: 3rem 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-content h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .footer-content p, .footer-content a {
            font-size: 1rem;
            color: var(--text-light);
            text-decoration: none;
        }

        .footer-content a:hover {
            color: var(--accent);
        }

        .social-links a {
            font-size: 1.5rem;
            margin: 0 0.5rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            color: var(--accent);
            transform: translateY(-3px);
            display: inline-block;
        }

        .newsletter input {
            padding: 0.5rem;
            border: none;
            border-radius: 5px 0 0 5px;
            width: 70%;
        }

        .newsletter button {
            padding: 0.5rem 1rem;
            border: none;
            background: var(--primary);
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter button:hover {
            background: var(--secondary);
        }

        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary);
            color: white;
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            display: none;
            z-index: 1001;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        #backToTop:hover {
            background: var(--secondary);
            transform: scale(1.1);
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hamburger {
            display: none;
            font-size: 1.8rem;
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            .hero-content h1 {
                font-size: 3rem;
            }

            .hero-content p {
                font-size: 1.2rem;
            }

            .section h2 {
                font-size: 2.2rem;
            }

            .info-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                flex-direction: column;
                width: 100%;
                text-align: center;
                padding: 1rem;
                box-shadow: var(--shadow);
                transform: translateY(-10px);
                opacity: 0;
                transition: var(--transition);
            }

            .nav-menu.show {
                display: flex;
                transform: translateY(0);
                opacity: 1;
            }

            .nav-menu a {
                color: var(--text-dark);
                padding: 0.5rem 0;
            }

            .nav-menu .login-button {
                background: var(--primary);
                color: white;
                margin: 0.5rem auto;
                width: fit-content;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section h2 {
                font-size: 2rem;
            }

            .info-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 1.5rem;
            }

            #lokasi .card iframe {
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 0.9rem;
            }

            .cta-button {
                padding: 0.6rem 1.5rem;
                font-size: 0.9rem;
            }

            .section h2 {
                font-size: 1.8rem;
            }

            .card h3 {
                font-size: 1.5rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('style/assets/logo-sekolah.png') }}" alt="Logo Betzata">
            <span>SMP BETZATA LEILEM</span>
        </div>

        <button id="menuToggle" class="hamburger" aria-label="Toggle navigation">
            ☰
        </button>

        <ul class="nav-menu">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#profil">Profil Sekolah</a></li>
            <li><a href="#informasi">Alamat</a></li>
            <li><a href="#kontak">Kontak</a></li>
            <li><a href="#lokasi">Lokasi</a></li>
            <li><a href="/login" class="login-button">Login</a></li>
        </ul>
    </header>

    <div class="hero" id="beranda">
        <div class="particles">
            <script>
                for (let i = 0; i < 50; i++) {
                    let span = document.createElement('span');
                    span.style.width = span.style.height = Math.random() * 10 + 'px';
                    span.style.left = Math.random() * 100 + 'vw';
                    span.style.animationDuration = Math.random() * 10 + 5 + 's';
                    span.style.animationDelay = Math.random() * 5 + 's';
                    document.querySelector('.particles').appendChild(span);
                }
            </script>
        </div>
        <div class="hero-content">
            <h1>Mencetak Generasi Cerdas & Berakhlak</h1>
            <p>Berbasis Iman, Ilmu, dan Integritas</p>
            <a href="#tentang" class="cta-button">Lihat Lebih Lanjut</a>
        </div>
    </div>

    <div class="info-row">
        <div class="card" id="tentang" data-aos="zoom-in" data-aos-delay="100">
            <h3>Tentang Kami</h3>
            <p>Kami adalah lembaga pendidikan yang menekankan pentingnya keseimbangan antara prestasi akademik dan pembentukan karakter. Di SMP Betzata Leilem, siswa diajak untuk tumbuh menjadi pribadi yang tangguh, peduli, dan berintegritas.</p>
        </div>

        <div class="card" id="profil" data-aos="zoom-in" data-aos-delay="200">
            <h3>Profil Sekolah</h3>
            <p>SMP Betzata Leilem adalah sekolah yang berkomitmen membentuk karakter peserta didik berdasarkan iman, ilmu, dan integritas. Kami menyediakan lingkungan belajar yang mendukung perkembangan akademik dan spiritual siswa.</p>
        </div>

        <div class="card" id="informasi" data-aos="zoom-in" data-aos-delay="300">
            <h3>Alamat</h3>
            <p>Jl. Raya Sonder No.45, Leilem, Kec. Sonder, Kab. Minahasa, Sulawesi Utara 95661</p>
        </div>
    </div>

    <section id="lokasi" class="section" data-aos="fade-up">
        <h2>Lokasi Sekolah</h2>
        <div class="card" data-aos="zoom-in" data-aos-delay="100">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15926.426919694852!2d124.8146006!3d1.2601581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32876a621b26aa4f%3A0x20ccd8e943c79b5e!2sBETZATA%20ABD!5e0!3m2!1sid!2sid!4v1714812345678!5m2!1sid!2sid"
                width="100%"
                height="400"
                style="border:0; border-radius: 12px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <br><br>
            <a href="https://www.google.com/maps/place/BETZATA+ABD/@1.2601581,124.8146006,17z/data=!3m1!4b1!4m6!3m5!1s0x32876a621b26aa4f:0x20ccd8e943c79b5e!8m2!3d1.2601581!4d124.8171755!16s%2Fg%2F11g6qdv4rj?hl=id&entry=ttu"
               target="_blank"
               style="display:inline-block;margin-top:1rem;color:var(--secondary);font-weight:600;text-decoration:underline;">
                Lihat di Google Maps
            </a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div id="kontak">
                <h3>Kontak Kami</h3>
                <p>📞 +62 852-1234-5678<br>📧 info@smpbetzata.sch.id</p>
            </div>
            <div>
                <h3>Media Sosial</h3>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <p style="text-align: center; margin-top: 2rem;">© {{ date('Y') }} SMP Betzata Leilem. All Rights Reserved.</p>
    </footer>

    <button id="backToTop" title="Kembali ke atas">↑</button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });

        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            const backToTop = document.getElementById('backToTop');

            if (window.scrollY > 50) {
                header.classList.add('scrolled');
                backToTop.style.display = 'block';
            } else {
                header.classList.remove('scrolled');
                backToTop.style.display = 'none';
            }
        });

        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        document.getElementById('menuToggle').addEventListener('click', () => {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.classList.toggle('show');
        });

        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelector('.nav-menu').classList.remove('show');
            });
        });
    </script>
</body>
</html>

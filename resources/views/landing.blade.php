<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SMP Betzata Leilem, sekolah Kristen berbasis karakter yang unggul dalam iman, ilmu, dan pelayanan.">
    <title>SMP BETZATA LEILEM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@700;900&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2ed1d1; /* Cyan for vibrancy */
            --secondary: #1e3a8a; /* Deep blue for trust */
            --accent-gold: #d4af37; /* Gold for divine inspiration */
            --accent-green: #43a047;
            --accent-red: #e53935;
            --light: #f8fafc; /* Softer white */
            --dark: #1f2937; /* Softer dark */
            --text-light: #e5e7eb;
            --text-dark: #1f2937;
            --transition: 0.4s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Lora', serif;
            background-color: var(--light);
            color: var(--text-dark);
            line-height: 1.8;
            transition: var(--transition);
        }

        body.dark-mode {
            background-color: var(--dark);
            color: var(--text-light);
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        a, button {
            font-family: 'Poppins', sans-serif;
        }

        header {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: var(--light);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-container img {
            height: 60px;
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
        }

        .logo-container strong {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .toggle-dark {
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .toggle-dark:hover {
            transform: rotate(180deg);
        }

        nav {
            background-color: var(--secondary);
            padding: 1rem 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            flex-wrap: wrap;
            gap: 2rem;
        }

        nav ul li a {
            color: var(--light);
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            color: var(--accent-gold);
            transform: scale(1.05);
        }

        .hero {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('{{ asset('style/assets/sekolah3.png') }}') center/cover no-repeat;
            height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--light);
            padding: 0 2rem;
        }

        .hero::before {
            content: '✝';
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 3rem;
            opacity: 0.2;
            color: var(--accent-gold);
            animation: pulse 3s infinite;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: rgba(0, 0, 0, 0.5);
            padding: 1rem 2rem;
            border-radius: 12px;
            letter-spacing: 1px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-family: 'Lora', serif;
            font-size: 1.4rem;
            font-weight: 400;
            max-width: 600px;
            line-height: 1.9;
        }

        .info-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            padding: 4rem 2rem;
        }

        .info-box {
            background: var(--light);
            padding: 2rem;
            flex: 1 1 300px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        body.dark-mode .info-box {
            background: #374151;
            color: var(--text-light);
        }

        .info-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .green { border-left: 6px solid var(--accent-green); }
        .gold { border-left: 6px solid var(--accent-gold); }
        .blue { border-left: 6px solid var(--secondary); }

        .info-box h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        .info-box p {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .section {
            padding: 5rem 2rem;
        }

        .principal-message {
            display: flex;
            flex-wrap: wrap;
            gap: 3rem;
            align-items: center;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .principal-message img {
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .principal-message h2 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
            letter-spacing: 1px;
        }

        .principal-message p {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            line-height: 1.9;
        }

        .facilities {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .facility {
            background: var(--light);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1 1 250px;
            transition: var(--transition);
        }

        body.dark-mode .facility {
            background: #374151;
            color: var(--text-light);
        }

        .facility:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .facility-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            color: var(--light);
            display: inline-block;
        }

        .facility h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            letter-spacing: 0.5px;
        }

        .facility p {
            font-family: 'Lora', serif;
            font-size: 1rem;
            line-height: 1.8;
        }

        .vision-mission {
            max-width: 1200px;
            margin: 0 auto;
        }

        .vision-mission h2 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        footer {
            background: linear-gradient(90deg, var(--secondary), var(--primary));
            color: var(--light);
            text-align: center;
            padding: 2rem;
            position: relative;
        }

        footer p {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        footer .quote {
            font-family: 'Lora', serif;
            font-size: 1.2rem;
            font-style: italic;
            opacity: 0.9;
            line-height: 1.9;
        }

        .btn {
            background: var(--accent-green);
            color: var(--light);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }

        .btn:hover {
            background: #2d7d3a;
            transform: scale(1.05);
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 0.5; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            nav ul {
                flex-direction: column;
                gap: 1rem;
            }

            .principal-message img {
                width: 100%;
                max-width: 300px;
            }

            .principal-message h2 {
                font-size: 2rem;
            }

            .info-box h3 {
                font-size: 1.6rem;
            }

            .facility h4 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('style/assets/logo-sekolah.png') }}" alt="Logo SMP Betzata Leilem">
            <strong>SMP BETZATA LEILEM</strong>
        </div>
        <div>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <button class="toggle-dark" aria-label="Toggle dark mode" onclick="toggleDarkMode()">🌙</button>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">SELAMAT DATANG DI SISTEM INFORMASI SEKOLAH</a></li>
        </ul>
    </nav>

    <div class="hero" data-aos="fade-up">
        <h1>SMP BETZATA LEILEM</h1>
        <p>Mencetak generasi beriman, berkarakter, dan berprestasi untuk kemuliaan Tuhan.</p>
    </div>

    <div class="info-boxes" data-aos="fade-up" data-aos-delay="100">
        <div class="info-box green">
            <h3>Sekolah Berbasis Karakter</h3>
            <p>Mengembangkan siswa dengan pendekatan karakter Kristen dan pembelajaran kolaboratif.</p>
        </div>
        <div class="info-box gold">
            <h3>Berprestasi</h3>
            <p>Berbagai prestasi akademik dan non-akademik telah diraih oleh siswa/i kami.</p>
        </div>
        <div class="info-box blue">
            <h3>Berdaya Saing</h3>
            <p>Kurikulum unggulan untuk membentuk siswa yang percaya diri dan siap bersaing.</p>
        </div>
    </div>

    <div class="section principal-message" data-aos="fade-up" data-aos-delay="200">
        <img src="{{ asset('style/assets/profile.png') }}" alt="Kepala Sekolah SMP Betzata Leilem">
        <div>
            <h2 style="font-family: 'Playfair Display', serif;">SAMBUTAN KEPALA SEKOLAH</h2>
            <p>Selamat datang di Website Resmi SMP Betzata Leilem!</p>
            <p>Dengan penuh sukacita dan ucapan syukur, kami menyambut Anda di portal informasi resmi sekolah kami. SMP Betzata Leilem bukan hanya tempat untuk belajar, tetapi juga rumah untuk bertumbuh — dalam iman, karakter, dan pengetahuan.</p>
            <p>Berlandaskan nilai-nilai Kristen, kami berkomitmen mencetak generasi muda yang cerdas, berintegritas, dan siap menghadapi tantangan zaman. Setiap anak adalah anugerah Tuhan yang unik, dan kami berupaya menyediakan lingkungan belajar yang penuh kasih serta fasilitas yang mendukung.</p>
            <p>Mari bersama-sama membentuk masa depan yang cerah untuk kemuliaan nama Tuhan. Tuhan memberkati! 🙏</p>
        </div>
    </div>

    <div class="section vision-mission" data-aos="fade-up" data-aos-delay="300">
        <h2 style="font-family: 'Playfair Display', serif; text-align: center; margin-bottom: 2rem;">Visi dan Misi</h2>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem;">
            <div class="info-box blue">
                <h3>Visi</h3>
                <p>Menjadi sekolah Kristen yang unggul dalam iman, karakter, dan ilmu pengetahuan untuk mempersiapkan generasi yang berdampak bagi bangsa dan kemuliaan Tuhan.</p>
            </div>
            <div class="info-box green">
                <h3>Misi</h3>
                <ul style="padding-left: 1.5rem; margin: 0;">
                    <li>Menyelenggarakan pendidikan berdasarkan nilai-nilai Kristiani.</li>
                    <li>Mengembangkan potensi akademik dan non-akademik secara maksimal.</li>
                    <li>Menciptakan lingkungan belajar yang aman, nyaman, dan menyenangkan.</li>
                    <li>Menanamkan karakter disiplin, jujur, dan bertanggung jawab sejak dini.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="400">
        <h2 style="font-family: 'Playfair Display', serif; text-align: center; margin-bottom: 2rem;">Fasilitas</h2>
        <div class="facilities">
            <div class="facility">
                <div class="facility-icon" style="background-color: var(--accent-green);">🏫</div>
                <h4>Gedung Milik Sendiri</h4>
                <p>Ruang belajar yang nyaman, luas, dan modern.</p>
            </div>
            <div class="facility">
                <div class="facility-icon" style="background-color: var(--accent-gold);">👨‍🏫</div>
                <h4>Guru Kompeten</h4>
                <p>Tenaga pendidik profesional, ramah & berdedikasi.</p>
            </div>
            <div class="facility">
                <div class="facility-icon" style="background-color: var(--accent-red);">💸</div>
                <h4>Bebas Biaya SPP</h4>
                <p>Program beasiswa & subsidi bagi siswa terpilih.</p>
            </div>
            <div class="facility">
                <div class="facility-icon" style="background-color: var(--secondary);">⚽</div>
                <h4>Fasilitas Lengkap</h4>
                <p>Lab, lapangan, aula, dan ruang praktik modern.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>© {{ date('Y') }} SMP Betzata Leilem. All Rights Reserved.</p>
        <p class="quote">"Sebab Aku tahu rancangan yang Kumiliki bagimu, rancangan damai sejahtera dan bukan rancangan kecelakaan." — Yeremia 29:11</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        }

        window.addEventListener('load', () => {
            if (localStorage.getItem('darkMode') === 'true') {
                document.body.classList.add('dark-mode');
            }
        });
    </script>
</body>
</html>

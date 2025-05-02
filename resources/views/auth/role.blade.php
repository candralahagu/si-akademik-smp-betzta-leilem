<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Role - SMP BETZATA LEILEM</title>
    <link rel="icon" href="{{ asset('style/assets/logo-sekolah.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9d2abd8931.js" crossorigin="anonymous"></script>

    <!-- Tambahkan Google Font Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url("{{ asset('style/assets/bg-aula.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            animation: fadeInUp 0.9s ease-out forwards;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 40px 30px;
            width: 90%;
            max-width: 600px;
            color: white;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }

        .logo-section img {
            width: 100px;
            margin-bottom: 10px;
        }

        .logo-section h1 {
            font-size: 25px;
            margin-bottom: 0;
        }

        .logo-section h2 {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .intro {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .role-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .custom-radio input[type="radio"] {
            display: none;
        }

        .role-box {
            background-color: rgba(255, 255, 255, 0.08);
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 20px 10px;
            transition: 0.3s;
            cursor: pointer;
        }

        .role-box i {
            font-size: 30px;
            margin-bottom: 10px;
            color: #00d4ff;
        }

        .role-box p {
            margin: 0;
            font-size: 14px;
            color: #fff;
        }

        .custom-radio input[type="radio"]:checked + .role-box {
            border-color: #00d4ff;
            background-color: rgba(0, 212, 255, 0.15);
            box-shadow: 0 4px 12px rgba(0, 212, 255, 0.4);
        }

        .role-box:hover {
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            color: #eee;
            font-size: 12px;
            margin-top: 20px;
            position: relative;
            z-index: 1;
        }

        .btn-danger {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-section">
            <img src="{{ asset('style/assets/logo-sekolah.png') }}" alt="Logo">
            <h1>Sistem Informasi Sekolah</h1>
            <h2>SMP BETZATA LEILEM</h2>
        </div>

        <p class="intro">Pilih Hak Akses</p>
        <p style="font-size: 14px;">Silakan pilih role yang ingin kamu gunakan untuk masuk.</p>

        @if (count($roles) > 0)
        <form id="roleForm" action="{{ route('post_role') }}" method="POST">
            @csrf
            <div class="role-grid">
                @foreach ($roles as $role)
                    <label class="custom-radio">
                        <input type="radio" name="role" value="{{ $role }}" onchange="document.getElementById('roleForm').submit();">
                        <div class="role-box">
                            @if ($role === 'Super Admin')
                                <i class="fa-solid fa-user-gear"></i>
                            @elseif ($role === 'Admin')
                                <i class="fa-solid fa-users-gear"></i>
                            @elseif ($role === 'Guru')
                                <i class="fa-solid fa-chalkboard-user"></i>
                            @elseif ($role === 'Wali Kelas')
                                <i class="fa-solid fa-user-group"></i>
                            @endif
                            <p>{{ $role }}</p>
                        </div>
                    </label>
                @endforeach
            </div>
        </form>
        @else
        <div style="margin-top: 30px;">
            <h5 style="color: red;">Akun Anda saat ini tidak memiliki role yang tersedia. Silahkan hubungi admin.</h5>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Keluar</button>
            </form>
        </div>
        @endif
    </div>

    <div class="footer">
        &copy; SISTEM INFORMASI SEKOLAH | 2025 | SMP BETZATA LEILEM
    </div>
</body>
</html>

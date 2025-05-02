<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMP BETZATA LEILEM</title>
    <link rel="icon" href="{{ asset('style/assets/logo-sekolah.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9d2abd8931.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: url("{{ asset('style/assets/bg-aula.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Parallax overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        /* Animasi Fade-In */
        @keyframes fadeIn {
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
            animation: fadeIn 1s ease forwards;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            width: 350px;
            color: white;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            position: relative;
            z-index: 1;
        }

        .login-container .user-icon {
            width: 80px;
            height: 80px;
            background-color: #2ecc71;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .login-container h2 {
            text-align: center;
            margin-top: 50px;
            font-weight: 600;
            font-size: 1.5rem;
        }

        form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            padding-left: 40px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .form-group i {
            position: absolute;
            top: 12px;
            left: 12px;
            color: #ccc;
        }

        .form-control:focus {
            outline: none;
        }

        .remember {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-top: -10px;
        }

        .remember input {
            margin-right: 5px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #27ae60;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #eee;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="user-icon">
            <i class="fas fa-user"></i>
        </div>

        <h2>Login</h2>

        @if ($errors->any())
        <div style="color: #ffcccc; font-size: 14px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('post_login') }}" method="POST">
            @csrf
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="remember">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="{{ route('forget.password.get') }}" style="color: #eee;">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">LOGIN</button>
        </form>

        <div class="footer">
            &copy; SISTEM INFORMASI SEKOLAH | SMP BETZATA LEILEM 2025
        </div>
    </div>
</body>
</html>

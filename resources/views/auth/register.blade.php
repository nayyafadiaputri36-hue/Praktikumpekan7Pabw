<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Petugas BPBD</title>
    <style>
        body {
            font-family: Arial;
            background: #e8f5e9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 35px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #aaa;
        }

        h2 {
            text-align: center;
            color: #0280aa;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #0280aa;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Register Petugas</h2>

    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <input type="text" name="name"
            placeholder="Nama Lengkap" required>

        <input type="email" name="email"
            placeholder="Email" required>

        <input type="password" name="password"
            placeholder="Password minimal 8 karakter" required>

        <input type="password" name="password_confirmation"
            placeholder="Konfirmasi Password" required>

        <button type="submit">Daftar</button>
    </form>

    <p style="text-align:center">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>
</body>
</html>
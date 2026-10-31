<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Petugas BPBD</title>
    <style>
        body {
            font-family: Arial;
            background: #e8f5e9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
    <h2>Login Petugas BPBD</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <input type="email" name="email"
            placeholder="Email" value="{{ old('email') }}" required>

        <input type="password" name="password"
            placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <p style="text-align:center">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar di sini</a>
    </p>
</div>
</body>
</html>
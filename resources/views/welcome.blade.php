<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay Kingking — Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-deep:  #1a3a6b;
            --blue-mid:   #2255a4;
            --blue-light: #4a80d4;
            --blue-pale:  #e8f0fb;
            --blue-frost: #f3f7ff;
            --blue-line:  #d0dff5;
            --text:       #111827;
            --muted:      #6b7a99;
            --white:      #ffffff;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            height: 100%;
            font-family: 'DM Sans', sans-serif;
            background: var(--blue-frost);
            color: var(--text);
        }

        body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        .left {
            background: var(--blue-deep);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
            text-align: center;
        }

        .left-eyebrow {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            margin-bottom: 24px;
        }

        .left-title {
            font-size: 52px;
            font-weight: 600;
            color: var(--white);
            line-height: 1.05;
            margin-bottom: 18px;
        }

        .left-line {
            width: 36px; height: 2px;
            background: var(--blue-light);
            margin: 0 auto 22px;
            border-radius: 2px;
        }

        .left-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.58);
            line-height: 1.85;
            font-weight: 300;
            max-width: 280px;
            margin-bottom: 40px;
        }

        .left-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .left-meta-item {
            font-size: 11.5px;
            color: rgba(255,255,255,0.45);
            font-weight: 300;
        }

        .left-footer {
            margin-top: 56px;
            font-size: 9.5px;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
        }

        .form-box {
            width: 100%;
            max-width: 360px;
        }

        .form-tag {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--blue-light);
            margin-bottom: 10px;
            display: block;
            text-align: center;
        }

        .form-title {
            font-size: 30px;
            font-weight: 600;
            color: var(--blue-deep);
            text-align: center;
            margin-bottom: 6px;
        }

        .form-sub {
            font-size: 13px;
            color: var(--muted);
            text-align: center;
            font-weight: 300;
            margin-bottom: 36px;
        }

        .f-label {
            display: block;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .f-input {
            width: 100%;
            border: 1.5px solid var(--blue-line);
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 14px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            background: var(--white);
            transition: border-color 0.2s, box-shadow 0.2s;
            margin-bottom: 18px;
        }

        .f-input:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 3px rgba(74,128,212,0.12);
        }

        .f-input::placeholder { color: #b8c9e4; }

        .pw-wrap {
            position: relative;
            margin-bottom: 18px;
        }

        .pw-wrap .f-input {
            margin-bottom: 0;
            padding-right: 42px;
        }

        .pw-toggle {
            position: absolute;
            right: 13px; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: var(--muted); font-size: 15px; padding: 0;
            transition: color 0.15s;
        }

        .pw-toggle:hover { color: var(--blue-mid); }

        .btn-signin {
            width: 100%;
            padding: 11px 0;
            background: var(--blue-deep);
            color: var(--white);
            border: none;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 4px;
            transition: background 0.2s;
        }

        .btn-signin:hover { background: var(--blue-mid); }

        .error-bar {
            background: #fff0f0;
            border-left: 3px solid #e05252;
            padding: 10px 14px;
            font-size: 12.5px;
            color: #b52828;
            margin-bottom: 20px;
            border-radius: 0 6px 6px 0;
        }

        .form-foot {
            margin-top: 28px;
            font-size: 10.5px;
            color: #b4c0d8;
            letter-spacing: 0.5px;
            text-align: center;
        }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .left { padding: 48px 32px; }
            .left-title { font-size: 36px; }
            .right { padding: 48px 28px; }
        }
    </style>
</head>

<body>
        <div class="left">
            <div class="left-eyebrow">Official Government System</div>
            <h1 class="left-title">Barangay<br>Kingking</h1>
            <div class="left-line"></div>
            <p class="left-desc">
                Barangay Management System for Barangay Kingking,
                Municipality of Pantukan, Province of Davao de Oro.
            </p>
            <div class="left-meta">
                <div class="left-meta-item">Republic of the Philippines</div>
                <div class="left-meta-item">Province of Davao de Oro</div>
                <div class="left-meta-item">Municipality of Pantukan</div>
            </div>
            <div class="left-footer">Barangay Management System &nbsp;·&nbsp; {{ date('Y') }}</div>
        </div>

        <div class="right">
            <div class="form-box">
                <span class="form-tag">Secure Access</span>
                <div class="form-title">Sign In</div>
                <div class="form-sub">Enter your credentials to continue</div>

                @if(session('error'))
                    <div class="error-bar">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="error-bar">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <label class="f-label">Email Address</label>
                    <input type="email" name="email" class="f-input"
                        placeholder="your@email.com"
                        value="{{ old('email') }}" required autofocus>

                    <label class="f-label">Password</label>
                    <div class="pw-wrap">
                        <input type="password" name="password" id="pwInput"
                            class="f-input" placeholder="••••••••" required>
                        <button type="button" class="pw-toggle" onclick="togglePw()">
                            <i class="bi bi-eye" id="pwIcon"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn-signin">Sign In</button>
                </form>

                <div class="form-foot">
                    Authorized personnel only &mdash; Barangay Kingking &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
        
    <script>
        function togglePw() {
            const input = document.getElementById('pwInput');
            const icon  = document.getElementById('pwIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>
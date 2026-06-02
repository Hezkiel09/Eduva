<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kode Verifikasi Eduva</title>
    <style>
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #F1F5F9;
            color: #1E293B;
        }
        .wrapper {
            max-width: 560px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        .header {
            background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
            padding: 32px 40px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .header h1 span { color: #93C5FD; }
        .body {
            padding: 36px 40px;
        }
        .greeting {
            font-size: 16px;
            color: #475569;
            margin: 0 0 8px;
        }
        .greeting strong { color: #0F172A; }
        .desc {
            font-size: 15px;
            color: #64748B;
            line-height: 1.7;
            margin: 12px 0 28px;
        }
        .code-box {
            background: #F8FAFC;
            border: 2px dashed #CBD5E1;
            border-radius: 12px;
            text-align: center;
            padding: 24px 16px;
            margin-bottom: 24px;
        }
        .code-label {
            font-size: 12px;
            font-weight: 600;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }
        .code-value {
            font-size: 38px;
            font-weight: 800;
            letter-spacing: 8px;
            color: #2563EB;
            font-family: 'Courier New', monospace;
        }
        .expiry {
            font-size: 13px;
            color: #94A3B8;
            margin-top: 10px;
        }
        .expiry strong { color: #EF4444; }
        .note {
            background: #FEF3C7;
            border-left: 4px solid #F59E0B;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 13px;
            color: #92400E;
            line-height: 1.6;
            margin-bottom: 28px;
        }
        .footer {
            border-top: 1px solid #E2E8F0;
            padding: 20px 40px;
            text-align: center;
            font-size: 12px;
            color: #94A3B8;
            line-height: 1.7;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1><span>EDU</span>VA</h1>
        </div>
        <div class="body">
            <p class="greeting">Halo, <strong>{{ $username }}</strong>! 👋</p>
            <p class="desc">
                Terima kasih sudah mendaftar di <strong>Eduva</strong>. 
                Gunakan kode di bawah ini untuk memverifikasi akun kamu dan mulai perjalanan belajarmu.
            </p>

            <div class="code-box">
                <div class="code-label">Kode Verifikasi Kamu</div>
                <div class="code-value">{{ $code }}</div>
                <div class="expiry">Berlaku selama <strong>10 menit</strong></div>
            </div>

            <div class="note">
                ⚠️ <strong>Jangan bagikan kode ini</strong> kepada siapa pun, termasuk tim Eduva. 
                Kode ini bersifat rahasia dan hanya untuk digunakan oleh kamu.
            </div>

            <p style="font-size: 14px; color: #64748B;">
                Jika kamu tidak merasa mendaftar di Eduva, abaikan saja email ini.
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Eduva &mdash; Platform Belajar Teknologi Indonesia<br>
            Email ini dikirim secara otomatis, mohon tidak membalas.
        </div>
    </div>
</body>
</html>

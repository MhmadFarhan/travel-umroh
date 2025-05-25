<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email Anda - Haromain Travel</title>
    <style>
        /* Universal styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }
        td {
            vertical-align: top;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a.button {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background-color: #17a2b8; /* Warna teal/hijau muda mirip Xendit */
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
        }

        /* Main container */
        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden; /* Penting untuk gambar header */
        }

        /* Header section */
        .header-area {
            background-color: #5d6d7e; 
            height: 110px;
            position: relative;
            padding: 20px;
            text-align: left;
            color: #ffffff;
        }
        .header-area .logo-wrapper {
            position: absolute; /* Sesuaikan posisi logo agar terlihat baik */
            top: 20px; /* Jarak dari atas */
            left: 20px; /* Jarak dari kiri */
            /* Jika Anda ingin logo di tengah, Anda bisa pakai:
            left: 50%;
            transform: translateX(-50%);
            */
        }
        .header-area .logo {
            max-width: 100px; /* Sesuaikan ukuran logo Anda */
            height: auto;
        }

        /* Content section */
        .content-area {
            padding: 30px;
        }

        /* Footer section */
        .footer-area {
            background-color: #5d6d7e; /* Warna latar belakang footer */
            color: #cccccc;
            padding: 20px 30px;
            font-size: 0.85em;
            text-align: center;
        }
        .footer-area p {
            margin: 0 0 10px 0;
        }
        .footer-area .social-icons img {
            width: 24px;
            height: 24px;
            margin: 0 5px;
        }
        .footer-area a {
            color: #ffffff;
            text-decoration: underline;
        }
        .footer-area .address {
            font-size: 0.9em;
            margin-top: 15px;
        }
        .footer-area .copyright {
            margin-top: 15px;
            font-size: 0.8em;
        }
        .footer-disclaimer {
            background-color: #f4f4f4;
            color: #777777;
            padding: 15px 30px;
            font-size: 0.8em;
            text-align: center;
        }

        /* Responsive styles (optional, email clients vary) */
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                margin: 0 !important;
                border-radius: 0 !important;
            }
            .content-area, .footer-area, .footer-disclaimer {
                padding: 20px !important;
            }
            .header-area {
                height: 150px !important;
            }
            .header-area .logo {
                max-width: 80px !important;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="header-area">
            <div class="logo-wrapper">
                {{-- PERUBAHAN UTAMA DI SINI --}}
                <img src="{{ asset('images/logo.png') }}" alt="Haromain Travel Logo" class="logo">
            </div>
            </div>

        <div class="content-area">
            <p>Hai,</p>
            <p>Terima kasih telah mendaftar akun Haromain Travel.</p>
            <p>Untuk melanjutkan, mohon verifikasi email Anda dengan mengklik tombol berikut.</p>
            <p style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">Verifikasi Email</a>
            </p>

            <p>Jika tombol di atas tidak berfungsi, Anda bisa menyalin dan menempelkan tautan berikut ke browser Anda:</p>
            <p><code>{{ $verificationUrl }}</code></p>
            <p>Tautan ini akan kedaluwarsa dalam 24 jam.</p>
            <p>Jika Anda tidak merasa melakukan pendaftaran ini, mohon abaikan email ini.</p>

            <p>Jika Anda punya pertanyaan, <a href="mailto:support@haromaintravel.com">hubungi kami</a> atau email ke <a href="mailto:support@haromaintravel.com">support@haromaintravel.com</a>.</p>
            <p>Salam,<br>Tim Haromain Travel</p>
        </div>

        <div class="footer-area">
            <p>
                <a href="https://haromaintravel.com" target="_blank" style="color: #ffffff;">Kunjungi Situs</a> |
                <a href="https://haromaintravel.com/kontak" target="_blank" style="color: #ffffff;">Hubungi Kami</a>
            </p>
            <div class="social-icons" style="margin-top: 15px;">
                </div>
            <p class="address">
                Jl.ParungJaya no 56 B, RT.01/RW0.1 Kel. Parung Jaya, <br>Kec. Karang Tengah Kota Tanggerang (15159) <br> (Samping Apartemen Metro Garden)
            </p>
            <p class="copyright">
                &copy; {{ date('Y') }} Haromain Travel.
            </p>
        </div>
        <div class="footer-disclaimer">
            <p>Kamu menerima email ini karena kamu adalah customer Haromain Travel.</p>
        </div>
    </div>
</body>
</html>
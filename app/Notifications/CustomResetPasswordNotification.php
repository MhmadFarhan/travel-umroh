<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang; // Opsional: untuk teks multibahasa

class CustomResetPasswordNotification extends Notification
{
    public $token;

    /**
     * Buat instance notifikasi baru.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Dapatkan saluran pengiriman notifikasi.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Dapatkan representasi email dari notifikasi.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Variabel $url adalah KUNCI. Ini akan menjadi tautan di email kustom kamu.
        // route('password.reset') akan menghasilkan URL yang mengarahkan ke form reset password
        // (yaitu yang dihandle oleh resources/views/auth/passwords/reset.blade.php)
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false)); // 'false' memastikan URL relatif jika tidak diatur di .env

        // Ambil waktu kedaluwarsa token dari konfigurasi Laravel (defaultnya 60 menit)
        $expireInMinutes = config('auth.passwords.users.expire');

        return (new MailMessage)
        ->subject(Lang::get('Reset Password Akun Anda'))
        ->view('emails.payment.custom-reset', [ // <-- UBAH DI SINI! Tambahkan 'payment.'
            'url' => $url,
            'email' => $notifiable->getEmailForPasswordReset(),
            'token' => $this->token,
            'expireInMinutes' => $expireInMinutes,
        ]);
    }
}
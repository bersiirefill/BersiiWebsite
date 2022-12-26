<!DOCTYPE html>
<html>
<head>
    <title>Bersii Password Recovery</title>
</head>
<body>
    {{-- <h1>{{ $mailData['title'] }}</h1> --}}
    <p style="text-align: justify;">{{ $mailData['nama'] }} yang terhormat,</p>
    <p style="text-align: justify;">Terima kasih telah meminta pemulihan kata sandi untuk akun Anda. Untuk mengatur ulang kata sandi Anda, silakan masukkan kode berikut: {{ $mailData['kode'] }}</p>
    <p style="text-align: justify; font-weight: bold;">Jika Anda tidak meminta pemulihan kata sandi, abaikan email ini dan hubungi tim dukungan kami di support@bersii.my.id untuk melaporkan aktivitas yang tidak sah.</p>
    <p style="text-align: justify;">Terima kasih telah menggunakan Bersii.</p>
    <p style="text-align: justify;">Dengan hormat,</p>
    <p style="text-align: justify;">Bersii</p>
</body>
</html>
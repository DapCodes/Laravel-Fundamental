@php
$data = [
        'nama' => 'Daffa Ramadhan',
        'umur' => '18'
    ];

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <p>Nama saya {{ $data['nama'] }}</p>
    <p>Usia saya {{ $data['umur'] }}</p>
</body>
</html>

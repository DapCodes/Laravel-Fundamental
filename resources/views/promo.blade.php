<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($barang)
        @if ($kode)
            Kode Promo {{$kode}}. untuk {{$barang}}
        @else
            Promo untuk {{$barang}}
        @endif
    @else 
        Menampilkan semua promo barang
    @endif
</body>
</html>
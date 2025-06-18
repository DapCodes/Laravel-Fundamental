<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($key)
        Baranng yang anda cari <strong>{{$key}}</strong>
    @else
        Silahkan input barang yang anda cari.
    @endif
</body>
</html>
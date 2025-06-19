<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form action="/buku/{{ $buku['id']}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="judul" value="{{ $buku['judul'] }}"><br>
        <input type="text" name="harga" value="{{ $buku['harga']}}" required><br>
        <select name="kategori" id="">
            <option value="">Pilih Kategori</option>
            <option value="Self Improvment" {{ $buku['kategori'] == 'Self improvment' ? 'selected' : '' }}>Self Improvment</option>
            <option value="Bacaan" {{ $buku['kategori'] == 'Bacaan' ? 'selected' : '' }}>Bacaan</option>
            <option value="Teknologi" {{ $buku['kategori'] == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
        </select> <br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pengaduan</title>
    <style>
        body {
            font-family: Arial;
        }
        form {
            width: 300px;
            margin: auto;
        }
        input, select, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
        }
        button {
            width: 100%;
            padding: 7px;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

<h2>Form Pengaduan</h2>

<form method="POST" action="/submit">
    @csrf

    <input type="text" name="lokasi" placeholder="Lokasi" required>

    <select name="id_kategori">
        @foreach ($kategori as $k)
            <option value="{{ $k->id_kat }}">{{ $k->ket_kat }}</option>
        @endforeach
    </select>

    <textarea name="keterangan" placeholder="Keterangan" required></textarea>

    <button type="submit">Kirim</button>
</form>

<p style="text-align:center;">
    <a href="/data">Lihat Data</a>
</p>

</body>
</html>
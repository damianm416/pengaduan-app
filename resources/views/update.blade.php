<head>
    <title>Update Status</title>
    <style>
        body {
            font-family: Arial;
        }
        form {
            width: 300px;
            margin: auto;
        }
        select, textarea {
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

<h2>Update Status</h2>

<form method="POST" action="/update">
    @csrf

    <input type="hidden" name="id" value="{{ $id }}">

    <label>Status</label>
    <select name="status">
        <option>Menunggu</option>
        <option>Proses</option>
        <option>Selesai</option>
    </select>

    <label>Feedback</label>
    <textarea name="feedback" rows="4" placeholder="Masukkan feedback"></textarea>

    <button type="submit">Simpan</button>
</form>

<p style="text-align:center;">
    <a href="/data">Kembali</a>
</p>

</body>
</html>

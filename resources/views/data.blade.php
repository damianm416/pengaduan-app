<style>
    body {
        font-family: Arial;
    }
    table {
        border-collapse: collapse;
        width: 70%;
        margin: auto;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #eee;
    }
    h2 {
        text-align: center;
    }
    a {
        text-decoration: none;
    }
</style>

<h2>Data Pengaduan</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Feedback</th>
        <th>Aksi</th>
    </tr>

    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id_pelapor }}</td>
        <td>{{ $d->lokasi }}</td>
        <td>{{ $d->keterangan }}</td>

        <td style="color:
            {{ $d->status == 'Selesai' ? 'green' : ($d->status == 'Proses' ? 'orange' : 'red') }}">
            {{ $d->status ?? 'Menunggu' }}
        </td>

        <td>{{ $d->feedback ?? '-' }}</td>

        <td>
            <a href="/update/{{ $d->id_pelapor }}">Update</a>
        </td>
    </tr>
    @endforeach

</table>

<p style="text-align:center;">
    <a href="/form">Tambah Pengaduan</a>
</p>
<hr>
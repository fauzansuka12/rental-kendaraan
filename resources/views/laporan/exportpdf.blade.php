<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            max-width: 1200px;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f5ff;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .empty-row {
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Polisi</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Pesan</th>
                <th scope="col">Lama</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->mobil->nopolisi}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->tgl_pesan}}</td>
                <td>{{$data->lama}}</td>
                <td>{{$data->total}}</td>
            </tr>
            @empty 
            <tr>
                <td colspan="7" class="empty-row">Data transaksi Belum Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

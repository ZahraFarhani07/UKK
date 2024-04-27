<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .info-table {
            margin-bottom: 20px;
        }

        .info-table td {
            border: none;
            padding: 8px;
        }
    </style>
    <title>Slip Gaji</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Informasi Karyawan</b></p>
        <div class="info-table">
            <table>
                <tr>
                    <td><strong>Nama:</strong></td>
                    <td>{{ $data['nama'] ?? '' }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal:</strong></td>
                    <td>{{ $data['tanggal'] ?? '' }}</td>
                </tr>
                <tr>
                    <td><strong>Keterangan:</strong></td>
                    <td>{{ $data['keterangan'] ?? '' }}</td>
                </tr>
            </table>
        </div>

        <table>
            <tr>
                <th colspan="5" style="text-align: center;">Rincian Gaji</th>
            </tr>
            <tr>
                <td colspan="2"><strong>Jumlah Gaji:</strong></td>
                <td colspan="3">{{ $data['jumlah_gaji'] ?? '' }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Jumlah Lembur:</strong></td>
                <td colspan="3">{{ $data['jumlah_lembur'] ?? '' }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Potongan:</strong></td>
                <td colspan="3">{{ $data['jumlah_cuti'] ?? '' }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Total Gaji:</strong></td>
                <td colspan="3">{{ $data['total_gaji'] ?? '' }}</td>
            </tr>
        </table>
    </div>
</body>

</html>

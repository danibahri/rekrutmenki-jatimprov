<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lengkap Pelamar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        .container {
            margin: auto;
            max-width: 800px;
            border: 1px solid #000;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 80px;
        }

        .header h1 {
            margin: 10px 0 5px;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 16px;
        }

        .header p {
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer .signature {
            margin-top: 40px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Header -->
        <div class="header">
            <img src="{{ asset('image/sumekar.png') }}" alt="Logo Instansi">
            <h1>Rekruitmen KI</h1>
            <h2>Data Lengkap Pelamar</h2>
            <p>Nomor Berkas ke-{{ $user->id }}</p>
        </div>

        <!-- Data Pelamar -->
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $user->full_name }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>{{ $user->birth_place }}, {{ \Carbon\Carbon::parse($user->birth_date)->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $user->nik }}</td>
            </tr>
            <tr>
                <th>No. Kartu Keluarga</th>
                <td>{{ $user->kk_number }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $user->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $user->religion }}</td>
            </tr>
            <tr>
                <th>Status Perkawinan</th>
                <td>
                    @switch($user->marital_status)
                        @case('single')
                            Lajang
                        @break

                        @case('married')
                            Menikah
                        @break

                        @case('divorced')
                            Cerai
                        @break

                        @case('widowed')
                            Duda/Janda
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td>{{ $user->nationality }}</td>
            </tr>
            <tr>
                <th>Alamat Domisili</th>
                <td>{{ $user->current_address }}</td>
            </tr>
            <tr>
                <th>Alamat Tetap</th>
                <td>{{ $user->permanent_address }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ $user->phone_number }}</td>
            </tr>
            <tr>
                <th>KTP Scan</th>
                <td>
                    @if ($user->ktp_scan_path)
                        <a href="{{ asset($user->ktp_scan_path) }}">Lihat File</a>
                    @else
                        Tidak Ada
                    @endif
                </td>
            </tr>
            <tr>
                <th>KK Scan</th>
                <td>
                    @if ($user->kk_scan_path)
                        <a href="{{ asset($user->kk_scan_path) }}">Lihat File</a>
                    @else
                        Tidak Ada
                    @endif
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Dikeluarkan pada: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
            <p>Petugas Verifikasi,</p>
            <p class="signature">(_________________________)</p>
        </div>
    </div>
</body>

</html>

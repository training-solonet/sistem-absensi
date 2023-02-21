<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Sistem Absensi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/jabatan">Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/karyawan">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Absensi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 50px; width: 800px; height: auto;">
        <h2>Data Karyawan</h2>
        <div class="card">
            <div class="card-body">
                <a href="/karyawan/tambah" style="float: right; margin-right: 20px;"> + Tambah Karyawan Baru</a>
                <br />
                <br />
                <!-- Form Pencarian
                <p>Cari Data Jabatan :</p>
                <div class="form-group" >
                </div>
                <form action="/jabatan/cari" method="GET">
                    <input class="form_control" type="text" name="cari" placeholder="Cari jabatan .." value="{{ old('cari') }}">
                    <input class="btn btn-primary ml-3" type="submit" value="CARI">
                </form> -->
                <br />
                <table class="table table-bordered" style="width:500px;" >
                    <tr style="text-align: center;">
                        <th>ID</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th></th>
                    </tr>
                    @foreach($karyawan as $k)
                    <tr>
                        <td style="text-align: center;">{{ $k->id }}</td>
                        <td>{{ $k->nama_karyawan }}</td>
                        <td>{{ $k->jabatan_id }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-warning btn-sm" href="/karyawan/edit/{{ $k->id }}">Edit</a>
                            |
                            <a class="btn btn-danger btn-sm" href="/karyawan/hapus/{{ $k->id }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

</html>
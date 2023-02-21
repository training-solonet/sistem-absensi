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
        <h2>Tambah Data Jabatan</h2>
        <div class="card">
            <div class="card-body">
                <form action="/jabatan/store" method="post">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="nama_jabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_jabatan">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <input type="button" class="btn btn-danger" style="float: right;" value="Go Back" onclick="history.back(-1)" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Absensi</title>
    @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
                    <p class="mb-4">Berisi tentang informasi macam-macam Jabatan diPerusahaan</p>

                    <!-- DataTales  -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <!-- <a href="/jabatan/tambah"> + Tambah Jabatan</a> -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Jabatan
                                    </button>
                                </h3>
                            </div>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Data Jabatan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                {{ csrf_field() }}
                                                <div class="row mb-3">
                                                    <label for="nama_jabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama_jabatan" style="text-transform:uppercase">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Jabatan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    @foreach($jabatan as $j)
                                    <tr>
                                        <td style="text-align: center;">{{ $j->id }}</td>
                                        <td>{{ $j->nama_jabatan }}</td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-warning btn-sm" href="/jabatan/edit/{{ $j->id }}">Edit</a>
                                            |
                                            <a class="btn btn-danger btn-sm" href="/jabatan/hapus/{{ $j->id }}">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Karyawan</h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="/karyawan/update" method="post">
                                <input type="hidden" name="id" value="{{ $karyawan->id }}"> <br/>
                                    {{ csrf_field() }}
                                    <div class="row mb-3">
                                        <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jabatan_id" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select id="jabatan_id" name="jabatan_id" class="select2bs4 form-control">
                                                <option value="">-- Pilih Jabatan --</option>
                                                @foreach ($jabatan as $data)
                                                <option value="{{ $data->id }}" @if ($karyawan->jabatan_id == $data->id)
                                                    selected
                                                    @endif>{{ $data->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <input type="button" class="btn btn-danger" style="float: right;" value="Go Back" onclick="history.back(-1)" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
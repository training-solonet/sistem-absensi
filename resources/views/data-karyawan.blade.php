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
                    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
                    <p class="mb-4">Berisi tentang Semua Karyawan beserta Jabatannya</p>

                    <!-- DataTales  -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary float-left">Data Karyawan</h4>
                            <h3 class="m-0 font-weight-bold text-primary float-right">
                                <button type="button" class="btn btn-success btn-sm" onClick="add()"
                                    href="javascript:void(0)">
                                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Karyawan
                                </button>
                            </h3>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <!-- Modal -->
                        <div class="card-body">
                            <div class="modal fade bd-example-modal-lg" id="karyawan-modal" tabindex="-1"
                                role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="KaryawanModal"></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{--
                                                <form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data">
                                            --}}
                                            <form action="javascript:void(0)" id="KaryawanForm" name="KaryawanForm"
                                                class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="nama_karyawan" class="col-sm-3 col-form-label">Nama
                                                        Karyawan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nama_karyawan"
                                                            id="nama_karyawan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jabatan_id"
                                                        class="col-sm-3 col-form-label">Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <select id="jabatan_id" name="jabatan_id"
                                                            class="form-control selectpicker" data-live-search="true">
                                                            <option selected disabled>--Pilih Kategori--</option>
                                                            {{-- @foreach ($jabatan as $data)
                                                            <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i>
                                                        &nbsp; Kembali</button>
                                                    <button type="submit" class="btn btn-primary" id="btn-save"><i
                                                            class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table table-stripped">
                            
                            <table class="table table-bordered" id="ajax-crud-datatable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><center>ID</center></th>
                                        <th><center>Nama Karyawan</center></th>
                                        <th><center>Jabatan Karyawan</center></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($karyawan as $k)
                                    <tr>
                                        <td style="text-align: center;">{{ $k->id }}</td>
                                        <td>{{ $k->nama_karyawan }}</td>
                                        <td>{{ $k->jabatan->nama_jabatan  }}</td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('karyawan.destroy', $k->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-warning btn-sm" href="{{ route('karyawan.edit', $k->id) }}">Edit</a>
                                                |
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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


    <script type="text/javascript">
        var table;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            table = $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('karyawan.index') }}",
                    type: "GET",
                    data: function(data) {
                        data.jabatan_id = $('#jabatan_id').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_karyawan',
                        name: 'nama_karyawan'
                    },
                    {
                        data: 'jabatan.nama_jabatan',
                        name: 'jabatan.nama_jabatan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });

        function reload_table() {
            table.ajax.reload(null, false);
        }

        //berisi kode yang diberikan dan menampilkan modal Tmabah data karyawan
        function add() {
            $('#KaryawanForm').trigger("reset");
            $('#KaryawanModal').html("Tambah Data Karyawan");
            $('#karyawan-modal').modal('show');
            $('#id').val('');
            $('#jabatan_id').html("");
            $('[name="jabatan_id"]').selectpicker('val', [0]);
            // table.draw();
        }

        //berisi kode yang diberikan dan menampilkan modal edit data karyawan dengan detail karyawan
        function editFunc(id) {
            //Ajax Load data from ajax
            $.ajax({
                type: "GET",
                url: "karyawan/" + id,
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#KaryawanModal').html("Edit Data Karyawan");
                    $('#karyawan-modal').modal('show');
                    $('#id').val(res.id);
                    $('#nama_karyawan').val(res.nama_karyawan);
                    $('#jabatan_id').val(res.jabatan.nama_jabatan);
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("anda yakin ingin menghapus data?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "DELETE",
                    url: "karyawan/" + id,
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        // 
                    }
                });
            }
        }
        $('#CompanyForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('store-karyawan') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#karyawan-modal").modal('hide');
                    // 
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>

</body>

</html>

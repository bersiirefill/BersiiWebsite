@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <p class="mb-4">Daftar Pengguna</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Pengguna</h6>
                    <a class="btn btn-primary float-right btn-md" data-toggle="modal" data-target="#addModal">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th hidden>Alamat</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden>Alamat</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($pengguna as $data)
                                <tr role=" row" class="odd">
                                    <td hidden><span id="alamat{{ $data->id }}">{{ $data->alamat }}</span></td>
                                    <td class="sorting_1"><span id="id_admin{{ $data->id }}">{{ $data->id }}</span></td>
                                    <td><span id="nama{{ $data->id }}">{{ $data->nama }}</span></td>
                                    <td><span id="email{{ $data->id }}">{{ $data->email }}</span></td>
                                    <td><span id="nomor_telepon{{ $data->id }}">{{ $data->nomor_telepon }}</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm del" onclick="deleteItem(this)" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}">Hapus</button>
                                        <button class="btn btn-warning btn-sm usrst" onclick="deleteItem(this)" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}">Reset Password</button>
                                    </td>
                                </tr>  
                                @endforeach      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<script type="application/javascript">

    function deleteItem(e){

        let id = e.getAttribute('data-id');
        let nama = e.getAttribute('data-nama');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ?',
            text: "Apa anda yakin ingin menghapus pengguna \n\"" + nama + "\"",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed){
                    $.ajax({
                        type:'DELETE',
                        url:'{{url("/delete_pengguna")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            window.location.href = "{{ route('pengguna') }}"
                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Pengubahan data dibatalkan',
                    'error'
                );
            }
        });

    }

    function userReset(e){

        let id = e.getAttribute('data-id');
        let nama = e.getAttribute('data-nama');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ?',
            text: "Apa anda yakin ingin mereset password \n\"" + nama + "\"",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Reset',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed){
                    $.ajax({
                        type:'PUT',
                        url:'{{url("/reset_pengguna")}}/' +id,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            window.location.href = "{{ route('pengguna') }}"
                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    'Pengubahan data dibatalkan',
                    'error'
                );
            }
        });

        }

</script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "js/demo/id.json"
            }
        });
    });
</script>

@endsection
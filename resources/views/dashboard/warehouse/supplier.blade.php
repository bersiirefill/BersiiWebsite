@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Supplier</h1>
    <p class="mb-4">Daftar Supplier</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Supplier</h6>
                    <a class="btn btn-primary float-right btn-md" data-toggle="modal" data-target="#addModal">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th hidden>Nomor Telepon</th>
                                    <th>Kode</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Toko</th>
                                    <th>Alamat</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden>Nomor Telepon</th>
                                    <th>Kode</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Toko</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($supplier as $data)
                                <tr role=" row" class="odd">
                                    <td hidden><span id="nomor_telepon{{ $data->kode_supplier }}">{{ $data->nomor_telepon }}</span></td>
                                    <td class="sorting_1"><span id="kode_supplier{{ $data->kode_supplier }}">{{ $data->kode_supplier }}</span></td>
                                    <td><span id="nama_pemilik{{ $data->kode_supplier }}">{{ $data->nama_pemilik }}</span></td>
                                    <td><span id="nama_toko{{ $data->kode_supplier }}">{{ $data->nama_toko }}</span></td>
                                    <td><span id="alamat{{ $data->kode_supplier }}">{{ $data->alamat }}</span></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del" data-kode_supplier="{{ $data->kode_supplier }}" data-nama="{{ $data->nama_toko }}">Hapus</a>
                                        <button type="button" class="btn btn-warning btn-sm supedit" value="{{ $data->kode_supplier }}"><span class="glyphicon glyphicon-edit"></span>Ubah</button>
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
    {{-- Add Supplier --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Supplier</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('save_supplier') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nama_toko" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="phone" class="form-control" name="nomor_telepon" id="nomor_telepon" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Supplier --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Supplier</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update_supplier') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kode Supplier</label>
                            <input type="text" class="form-control" name="kode_edit" id="kode_edit" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama_pemilik_edit" id="nama_pemilik_edit" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" name="nama_toko_edit" id="nama_toko_edit" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="phone" class="form-control" name="nomor_telepon_edit" id="nomor_telepon_edit" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".supedit", function(){
        var kode=$(this).val();
        var nama_pemilik=$('#nama_pemilik'+kode).text();
        var nama_toko=$('#nama_toko'+kode).text();
        var nomor_telepon=$('#nomor_telepon'+kode).text();
        var alamat=$('#alamat'+kode).text();
        $('#editModal').modal('show');
        $('#kode_edit').val(kode);
        $('#nama_pemilik_edit').val(nama_pemilik);
        $('#nama_toko_edit').val(nama_toko);
        $('#nomor_telepon_edit').val(nomor_telepon);
        $('#alamat_edit').val(alamat);
    });
</script>    
<script>
    $(".del").on("click", function () {
        var nama = $(this).data('nama');
        var kode_supplier = $(this).data('kode_supplier');
        swal({
            title: "Anda yakin ?",
            text: "Apa anda yakin ingin menghapus supplier \n\"" + nama + "\"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // console.log(kode_supplier);
                window.location.href = '{{ route('delete_supplier', ['kode_supplier' => $data->kode_supplier??null]) }}';
            }
        });
    })
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
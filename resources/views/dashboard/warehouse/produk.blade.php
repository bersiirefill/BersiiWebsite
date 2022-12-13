@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk</h1>
    <p class="mb-4">Daftar Produk</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Produk</h6>
                    <a class="btn btn-primary float-right btn-md" data-toggle="modal" data-target="#addModal">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th hidden>Nama Supplier</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Tanggal Update Stok</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden>Nama Supplier</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Tanggal Update Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($daftar as $data)
                                <tr role=" row" class="odd">
                                    <td hidden><span id="nama_supplier{{ $data->id_produk }}">{{ $data->nama_toko }}</span></td>
                                    <td class="sorting_1"><span id="id_produk{{ $data->id_produk }}">{{ $data->id_produk }}</span></td>
                                    <td><span id="nama_produk{{ $data->id_produk }}">{{ $data->nama_produk }}</span></td>
                                    <td><span id="stok{{ $data->id_produk }}">{{ $data->stok }}</span></td>
                                    <td><span id="update{{ $data->id_produk }}">{{ $data->updated_at }}</span></td>
                                    <td>
                                        <a class="btn btn-danger btn-sm del" data-id_produk="{{ $data->id_produk }}" data-nama="{{ $data->nama_produk }}">Hapus</a>
                                        <button type="button" class="btn btn-warning btn-sm supedit" value="{{ $data->id_produk }}"><span class="glyphicon glyphicon-edit"></span>Ubah</button>
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-control" name="nama_pemilik" id="nama_pemilik">
                                @foreach($supplier as $data2)
                                    <option value="{{ $data2->kode_supplier }}">{{ $data2->kode_supplier }} - {{ $data2->nama_toko }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4 py-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" name="nama_produk[]" id="nama_produk[]" >
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok (liter)</label>
                                            <input type="text" class="form-control" name="stok[]" id="stok[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="target">

                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" id="plusInput">Tambah</button>

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
                    <form method="POST" action="" enctype="multipart/form-data">
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
<script>
    $('#plusInput').on('click', function (e) {
        e.preventDefault();
        var shot =
            ' <div class="card mb-4 py-3 parent"><div class="card-body"><div class="mb-3"><label class="form-label">Nama Produk</label><input type="text" class="form-control" name="nama_produk[]" id="nama_produk[]" ></div><div class="mb-3"><label class="form-label">Stok (liter)</label><input type="text" class="form-control" name="stok[]" id="stok[]"></div><button class="btn btn-danger del-input" type="button" onclick="del(this)" style="font-size: 15px">Hapus</button></div></div>';
        $('#target').append(shot);
    });

    function del(a) {
        a.closest('.parent').remove();
    }
</script>
@endsection
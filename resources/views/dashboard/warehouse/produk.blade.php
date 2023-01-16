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
                                    <th hidden>Gambar</th>
                                    <th hidden>Deskripsi</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Harga (Rupiah)</th>
                                    <th>Tanggal Update Stok</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden>Nama Supplier</th>
                                    <th hidden>Gambar</th>
                                    <th hidden>Deskripsi</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Harga (Rupiah)</th>
                                    <th>Tanggal Update Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($daftar as $data)
                                <tr role=" row" class="odd">
                                    <td hidden><span id="nama_supplier{{ $data->id_produk }}">{{ $data->nama_toko }}</span></td>
                                    <td hidden><span id="gambar{{ $data->id_produk }}">{{ $data->gambar_produk }}</span></td>
                                    <td hidden><span id="deskripsi{{ $data->id_produk }}">{{ $data->deskripsi_produk }}</span></td>

                                    <td class="sorting_1"><span id="id_produk{{ $data->id_produk }}">{{ $data->id_produk }}</span></td>
                                    <td><span id="nama_produk{{ $data->id_produk }}">{{ $data->nama_produk }}</span></td>
                                    <td><span id="stok{{ $data->id_produk }}">{{ $data->stok }}</span></td>
                                    <td><span id="harga{{ $data->id_produk }}">{{ $data->harga_produk }}</span></td>
                                    <td><span id="update{{ $data->id_produk }}">{{ $data->updated_at }}</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm del" onclick="deleteItem(this)" data-id_produk="{{ $data->id_produk }}" data-nama="{{ $data->nama_produk }}">Hapus</button>
                                        <button type="button" class="btn btn-warning btn-sm prodedit" value="{{ $data->id_produk }}"><span class="glyphicon glyphicon-edit"></span>Ubah</button>
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
    {{-- Add Produk --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('save_produk') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-control" name="kode_supplier" id="kode_supplier">
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
                                            <input type="text" class="form-control" name="nama_produk[]" id="nama_produk[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Produk</label>
                                            <textarea class="form-control" name="deskripsi_produk[]" id="deskripsi_produk[]" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Stok (liter)</label>
                                            <input type="number" class="form-control" name="stok[]" id="stok[]" step="0.1" min="0" max="100" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Harga (Rupiah)</label>
                                            <input type="number" class="form-control" name="harga_produk[]" id="harga_produk[]" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gambar Produk</label>
                                            <input type="file" class="form-control" name="gambar_produk[]" id="gambar_produk[]" accept="image/*" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id="target">

                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" id="plusInput">Tambah Produk</button>

                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Produk --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Produk</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update_produk') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">ID Produk</label>
                            <input type="text" class="form-control" name="id_produk_edit" id="id_produk_edit" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk_edit" id="nama_produk_edit" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <input type="text" class="form-control" name="supplier_edit" id="supplier_edit" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" name="deskripsi_produk_edit" id="deskripsi_produk_edit" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok (liter)</label>
                            <input type="number" class="form-control" name="stok_edit" id="stok_edit" step="0.1" min="0" max="100" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga (Rupiah)</label>
                            <input type="number" class="form-control" name="harga_edit" id="harga_edit" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" name="gambar_produk_edit" id="gambar_produk_edit" accept="image/*">
                        </div>
                        <input type="hidden" name="gambar_produk_lama" id="gambar_produk_lama" value="">
                        <a href="" target="_blank" id="gambar_lama" class="btn btn-warning">Gambar Produk Lama</a>
                        <br>
                        <br>
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
    $(document).on("click", ".prodedit", function(){
        var id_produk=$(this).val();
        var nama_produk=$('#nama_produk'+id_produk).text();
        var nama_supplier=$('#nama_supplier'+id_produk).text();
        var stok=$('#stok'+id_produk).text();
        var harga=$('#harga'+id_produk).text();
        var gambar=$('#gambar'+id_produk).text();
        var deskripsi=$('#deskripsi'+id_produk).text();
        $('#editModal').modal('show');
        $('#id_produk_edit').val(id_produk);
        $('#nama_produk_edit').val(nama_produk);
        $('#deskripsi_produk_edit').val(deskripsi);
        $('#supplier_edit').val(nama_supplier);
        $('#stok_edit').val(stok);
        $('#harga_edit').val(harga);
        $('#gambar_produk_lama').val(gambar);
        var link = document.getElementById("gambar_lama");
        // Ganti jadi https://bersii.my.id saat deployment
        link.setAttribute("href", 'https://bersii.my.id/storage/upload/'+gambar);
        //link.setAttribute("href", 'http://192.168.1.70:8000/storage/upload/'+gambar);
    });
</script>  

<script type="application/javascript">

    function deleteItem(e){

        let id_produk = e.getAttribute('data-id_produk');
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
            text: "Apa anda yakin ingin menghapus produk \n\"" + nama + "\"",
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
                        url:'{{url("/delete_produk")}}/' +id_produk,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            window.location.href = "{{ route('produk_supplier') }}"
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
                "url": "{{ asset('js/demo/id.json') }}"
            }
        });
    });
</script>
<script>
    $('#plusInput').on('click', function (e) {
        e.preventDefault();
        var shot =
            '<div class="card mb-4 py-3 parent"><div class="card-body"><div class="mb-3"><label class="form-label">Nama Produk</label><input type="text" class="form-control" name="nama_produk[]" id="nama_produk[]" required></div><div class="mb-3"><label class="form-label">Deskripsi Produk</label><textarea class="form-control" name="deskripsi_produk[]" id="deskripsi_produk[]" rows="3"></textarea></div><div class="mb-3"><label class="form-label">Stok (liter)</label><input type="number" class="form-control" name="stok[]" id="stok[]" step="0.1" min="0" max="100" required></div><div class="mb-3"><label class="form-label">Harga (Rupiah)</label><input type="number" class="form-control" name="harga_produk[]" id="harga_produk[]" required></div><div class="mb-3"><label class="form-label">Gambar Produk</label><input type="file" class="form-control" name="gambar_produk[]" id="gambar_produk[]" accept="image/*" required></div><button class="btn btn-danger del-input" type="button" onclick="del(this)" style="font-size: 15px">Hapus</button></div></div>';
        $('#target').append(shot);
    });

    function del(a) {
        a.closest('.parent').remove();
    }
</script>
@endsection
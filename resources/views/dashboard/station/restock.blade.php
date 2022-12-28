@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Stok Station {{ $ids->nomor_seri }}</h1>
    <p class="mb-4">Daftar Stok Station {{ $ids->nomor_seri }}</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Station {{ $ids->nomor_seri }}</h6>
                    <a class="btn btn-primary float-right btn-md" data-toggle="modal" data-target="#addModal">Tambah</a>
                    <a href="{{ route('station') }}" class="btn btn-warning float-right btn-md mr-2">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Tanggal Update Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok (liter)</th>
                                    <th>Tanggal Update Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($station as $data)
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><span id="id_produk{{ $data->id_produk }}">{{ $data->id_produk }}</span></td>
                                    <td><span id="nama_produk{{ $data->id_produk }}">{{ $data->nama_produk }}</span></td>
                                    <td><span id="stok{{ $data->id_produk }}">{{ $data->stok }}</span></td>
                                    <td><span id="tanggal_update{{ $data->id_produk }}">{{ $data->updated_at }}</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm del" onclick="deleteItem(this)" data-id_produk="{{ $data->id_produk }}" data-nama_produk="{{ $data->nama_produk }}">Hapus</button>
                                        <button type="button" class="btn btn-warning btn-sm stokedit" value="{{ $data->id_produk }}"><span class="glyphicon glyphicon-edit"></span>Ubah</button>
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
    {{-- Add Stock --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Stok</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('save_restock_station') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Seri</label>
                            <input type="text" class="form-control" name="nomor_seri" id="nomor_seri" value="{{ $ids->nomor_seri }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <select class="form-control" name="id_produk" id="id_produk" required>
                                @foreach($produk as $data_produk)
                                    <option value="{{ $data_produk->id_produk }}">{{ $data_produk->id_produk }} - {{ $data_produk->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok (liter)</label>
                            <input type="number" class="form-control" name="stok" id="stok" min="1" max="100" required>
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
    {{-- Edit Stock --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Stok</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update_restock_station') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nomor Seri</label>
                            <input type="text" class="form-control" name="nomor_seri_edit" id="nomor_seri_edit" value="{{ $ids->nomor_seri }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" name="produk_edit" id="produk_edit" value="" readonly>
                            <input type="hidden" class="form-control" name="id_produk_edit" id="id_produk_edit" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok (liter)</label>
                            <input type="text" class="form-control" name="stok_edit" id="stok_edit" value="">
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
    $(document).on("click", ".stokedit", function(){
        var id_produk=$(this).val();
        var nama_produk=$('#nama_produk'+id_produk).text();
        var stok=$('#stok'+id_produk).text();
        $('#editModal').modal('show');
        $('#produk_edit').val(id_produk+ ' - ' +nama_produk);
        $('#id_produk_edit').val(id_produk);
        $('#stok_edit').val(stok);
    });
</script>    
<script type="application/javascript">

    function deleteItem(e){

        let id_produk = e.getAttribute('data-id_produk');
        let nama_produk = e.getAttribute('data-nama_produk');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ?',
            text: "Apa anda yakin ingin menghapus produk \n\"" + nama_produk + "\"",
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
                        url:'{{url("/delete_restock_station")}}/' +id_produk,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            window.location.href = "{{ route('restock_station', ['nomor_seri' => $ids->nomor_seri]) }}"
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
@endsection
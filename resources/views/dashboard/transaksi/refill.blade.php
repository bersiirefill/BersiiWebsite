@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaksi Refill</h1>
    <p class="mb-4">Daftar Transaksi Refill</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Transaksi - Refill</h6>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th>ID Transaksi</th>
                                    <th>Nomor Seri</th>
                                    <th>Total Harga (Rupiah)</th>
                                    <th>Tanggal Transaksi</th>
                                    <th style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Nomor Seri</th>
                                    <th>Total Harga (Rupiah)</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($transaksi_refill as $data)
                                <tr role=" row" class="odd">
                                    <td class="sorting_1"><span id="id_trx{{ $data->id_trx }}">{{ $data->id_transaksi }}</span></td>
                                    <td><span id="nomor_seri{{ $data->id_trx }}">{{ $data->nomor_seri }}</span></td>
                                    <td><span id="harga{{ $data->id_trx }}">{{ $data->total_harga }}</span></td>
                                    <td><span id="tanggal_transaksi{{ $data->id_trx }}">{{ $data->created_at }}</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm del" onclick="deleteItem(this)" data-id_trx="{{ $data->id_transaksi }}">Hapus</button>
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
        // link.setAttribute("href", 'https://bersii.my.id/storage/upload/'+gambar);
        link.setAttribute("href", 'http://127.0.0.1:8000/storage/upload/'+gambar);
    });
</script>  

<script type="application/javascript">

    function deleteItem(e){

        let id_trx = e.getAttribute('data-id_trx');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ?',
            text: "Apa anda yakin ingin menghapus transaksi \n\"" + id_trx + "\"",
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
                        url:'{{url("/delete_produk")}}/' +id_trx,
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
        var table = $('#dataTable').DataTable({
            "language": {
                "url": "{{ asset('js/demo/id.json') }}"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: 'Export ke Excel'
                },
            ]
        });
    });
</script>

@endsection
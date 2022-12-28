@extends('dashboard.master.master')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Station</h1>
    <p class="mb-4">Daftar Station</p>

    <div class="row">
        <div class="col">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Station</h6>
                    <a class="btn btn-primary float-right btn-md" data-toggle="modal" data-target="#addModal">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th hidden>Latitude</th>
                                    <th hidden>Longitude</th>
                                    <th>Nomor Seri</th>
                                    <th>Alamat</th>
                                    <th>Status Mesin</th>
                                    <th>Tanggal Update Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden>Latitude</th>
                                    <th hidden>Longitude</th>
                                    <th>Nomor Seri</th>
                                    <th>Alamat</th>
                                    <th>Status Mesin</th>
                                    <th>Tanggal Update Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($station as $data)
                                <tr role=" row" class="odd">
                                    <td hidden><span id="latitude{{ $data->nomor_seri }}">{{ $data->latitude }}</span></td>
                                    <td hidden><span id="longitude{{ $data->nomor_seri }}">{{ $data->longitude }}</span></td>
                                    <td class="sorting_1"><span id="nomor_seri{{ $data->nomor_seri }}">{{ $data->nomor_seri }}</span></td>
                                    <td><span id="alamat{{ $data->nomor_seri }}">{{ $data->alamat }}</span></td>
                                    <td>
                                        <?php if ($data->status_mesin == 0) {?>
                                            <span id="status_mesin{{ $data->nomor_seri }}"><button class="btn btn-danger btn-sm">Tidak Aktif</button></span>
                                        <?php } else if($data->status_mesin == 2) { ?>
                                            <span id="status_mesin{{ $data->nomor_seri }}"><button class="btn btn-warning btn-sm">Maintenance</button></span>
                                        <?php } else { ?>
                                            <span id="status_mesin{{ $data->nomor_seri }}"><button class="btn btn-primary btn-sm">Aktif</button></span>
                                        <?php } ?>
                                    </td>
                                    <td><span id="tanggal_update{{ $data->nomor_seri }}">{{ $data->updated_at }}</span></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm del" onclick="deleteItem(this)" data-nomor_seri="{{ $data->nomor_seri }}">Hapus</button>
                                        <button type="button" class="btn btn-warning btn-sm statedit" value="{{ $data->nomor_seri }}"><span class="glyphicon glyphicon-edit"></span>Ubah</button>
                                        <a href="{{ route('restock_station', ['nomor_seri' => $data->nomor_seri]) }}" class="btn btn-primary btn-sm">Restock</a>
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
    {{-- Add Station --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Station</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('save_station') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Seri</label>
                            <input type="text" class="form-control" name="nomor_seri" id="nomor_seri" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude_add" id="latitude_add" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude_add" id="longitude_add" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button>
                            <button class="btn btn-warning" type="button" onclick="getLocationAdd()">Koordinat Kini</button>
                            <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Station --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Station</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nomor Seri</label>
                            <input type="text" class="form-control" name="nomor_seri_edit" id="nomor_seri_edit" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude_edit" id="latitude_edit" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude_edit" id="longitude_edit" value="">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button> 
                            <button class="btn btn-warning" type="button" onclick="getLocationEdit()">Koordinat Kini</button>
                            <button type="submit" class="btn btn-primary" type="button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".statedit", function(){
        var nomor_seri=$(this).val();
        var latitude=$('#latitude'+nomor_seri).text();
        var longitude=$('#longitude'+nomor_seri).text();
        var alamat=$('#alamat'+nomor_seri).text();
        $('#editModal').modal('show');
        $('#nomor_seri_edit').val(nomor_seri);
        $('#latitude_edit').val(latitude);
        $('#longitude_edit').val(longitude);
        $('#alamat_edit').val(alamat);
    });
</script>    
<script type="application/javascript">

    function deleteItem(e){

        let nomor_seri = e.getAttribute('data-nomor_seri');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Anda yakin ?',
            text: "Apa anda yakin ingin menghapus station \n\"" + nomor_seri + "\"",
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
                        url:'{{url("/delete_station")}}/' +nomor_seri,
                        data:{
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(data) {
                            window.location.href = "{{ route('station') }}"
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
    var lat_add = document.getElementById("latitude_add");
    var long_add = document.getElementById("longitude_add");
    function getLocationAdd() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        lat_add.value = "Browser tidak mendukung geolokasi.";
        long_add.value = "Browser tidak mendukung geolokasi.";
      }
    }
    function showPosition(position) {
      lat_add.value = position.coords.latitude;
      long_add.value = position.coords.longitude;
    }
</script>
@endsection
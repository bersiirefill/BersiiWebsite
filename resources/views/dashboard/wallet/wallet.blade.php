@extends('dashboard.master')

@section('konten')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">BersiiWallet</h1>
                    <p class="mb-4" style="font-weight: bold;">Saldo Anda : Rp.{{ $saldo->saldo }}</p>
                    <button class="btn btn-primary">TopUp Sekarang</button>
                    <br>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kredit</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($wallet as $data)
                                            <tr>
                                                <td>{{ $data->topup_id }}</td>
                                                <td>Rp.{{ $data->nominal }}</td>
                                                <td>{{ Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</td>
                                                <td>
                                                    @if($data->payment_status == 1)
                                                        <p><strong>Menunggu Pembayaran</strong></p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('checkout', ['topup_id' => $data->topup_id]) }}" class="btn btn-primary">Bayar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @endsection
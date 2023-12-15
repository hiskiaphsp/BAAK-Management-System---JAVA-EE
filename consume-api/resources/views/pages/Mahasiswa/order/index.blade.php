<x-web-layout title="Kaos IT DEL" class="kaos-it-del">

    @section('css')
        <!-- Include your CSS files here -->
        <!-- ... (Add other CSS files if needed) ... -->
    @endsection

    @section('breadcrumb-title')
        <h3>Order</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Order</li>
    @endsection

    <div class="container-fluid kaos-it-del-container">
        <div class="row justify-content-center">
            <!-- Display Kaos IT DEL Table -->
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Kaos IT DEL</h1>

                    </div>
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(count($kaos) > 0)
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ukuran Baju</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kaos as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['ukuran'] }}</td>
                                            <td>{{ $data['harga'] }}</td>
                                            <td>{{ $data['keterangan'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 d-flex justify-content-center">
                                <div id="pagination-links" class="mt-4">
                                    <!-- ... (Add pagination links if needed) ... -->
                                </div>
                            </div>
                        @else
                            <p>Tidak ada data Baju</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Request Pesanan Kaos Form -->
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-body pt-0">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h1>Pesan Kaos</h1>
                            <form action="{{ route('AddPaymentKaos') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="selection" class="form-label">Pilih Ukuran Baju</label>
                                    <select class="form-select" name="kaos_id" id="selection">
                                        @foreach($kaos as $data)
                                            <option value="{{ $data['id'] }}" data-harga="{{ $data['harga'] }}">{{ $data['ukuran'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Jenis Pembayaran</label>
                                    <select class="form-select" name="jenis_pembayaran" id="selection">
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="DANA">DANA</option>
                                        <option value="OVO">OVO</option>
                                        <option value="Rekening Bank">Rekening Bank</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Pembayaran Nominal</label>
                                    <input type="number" class="form-control col-md-3" id="harga" name="nominal_pembayaran" required placeholder="Masukkan Harga" min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Pesanan Saya</h1>

                    </div>
                    <div class="card-body pt-0">
                        @if(count($pemesanankaos) > 0)
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Ukuran Kaos</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemesanankaos as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['user']['nama_Lengkap'] }} - {{ $data['user']['nim'] }}</td>
                                            <td>{{ $data['kaos']['ukuran'] }}
                                            <td>Dibayar Dengan :{{ $data['jenis_pembayaran'] }}
                                                <p>&nbsp;</p>
                                                Dengan Nominal :Rp. {{ number_format($data['nominal_pembayaran'], 0, ',', '.') }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                             </table>
                             <div class="mt-4 d-flex justify-content-center">
                            <div id="pagination-links" class="mt-4">
                            </div>
                        @else
                            <p>Tidak Ada Data Pesanan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var kaosDropdown = document.getElementById('selection');
            var hargaInput = document.getElementById('harga');

            kaosDropdown.addEventListener('change', function() {
                var selectedOption = kaosDropdown.options[kaosDropdown.selectedIndex];
                var harga = selectedOption.getAttribute('data-harga');

                hargaInput.value = harga;
            });
        });
    </script>
    @endsection

</x-web-layout>

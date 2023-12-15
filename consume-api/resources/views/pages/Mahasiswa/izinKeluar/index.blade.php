<x-web-layout title="Izin Keluar Kampus" class="izin-keluar-kampus">

    @section('css')
        <!-- Include your CSS files here -->
        <!-- ... (Add other CSS files if needed) ... -->
    @endsection

    @section('breadcrumb-title')
        <h3>Izin Keluar Kampus</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Izin Keluar Kampus</li>
    @endsection

    <div class="container-fluid izin-keluar-kampus-container">
        <div class="row justify-content-center">
            <!-- Request Izin Keluar Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-body pt-0">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h1>Request Izin Keluar</h1>
                            <form action="{{ route('AddIK') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keperluan</label>
                                    <input type="text" class="form-control col-md-6" id="keterangan" name="keterangan" required placeholder="Masukkan Keterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="waktuBerangkat" class="form-label">Waktu Berangkat</label>
                                    <input type="datetime-local" class="form-control col-md-6" id="waktuBerangkat" name="waktuBerangkat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                                    <input type="datetime-local" class="form-control col-md-6" id="waktuKembali" name="waktuKembali" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display Izin Keluar Kampus Table -->
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Data Izin Keluar Kampus</h1>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(count($izinkeluar) > 0)
                            <div class="table-responsive user-datatable">
                            <table class="display" id="export-button">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Keperluan</th>
                                        <th>Waktu Izin Keluar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($izinkeluar as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['keterangan'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data['waktuBerangkat'])->format('d/m/Y H:i') }} - {{ \Carbon\Carbon::parse($data['waktuKembali'])->format('d/m/Y H:i') }}</td>
                                            <td>{{ $data['status'] }}</td>
                                            <td>
                                                @if($data['status'] == "Canceled")
                                                    <p> - </p>
                                                @else
                                                    <a href="{{ route('Canceled_IK', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                        <i class="fa fa-ban"></i> Canceled
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        @else
                            <p>Tidak ada data Izin Keluar Kampus</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // ... (Existing script code) ...
            });

            function filterByStatus() {
                // ... (Existing filterByStatus code) ...
            }
        </script>
    @endsection

</x-web-layout>

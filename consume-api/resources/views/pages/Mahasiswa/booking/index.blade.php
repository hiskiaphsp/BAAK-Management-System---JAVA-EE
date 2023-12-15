<x-web-layout title="Booking Ruangan" class="booking-ruangan">

    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
        <!-- ... (Add other CSS files if needed) ... -->
    @endsection

    @section('breadcrumb-title')
        <h3>Booking Ruangan</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Booking Ruangan</li>
    @endsection

    <div class="container-fluid booking-container">
        <div class="row justify-content-center">
            <!-- Booking Request Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-body pt-0">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h1>Request Booking Ruangan</h1>
                            <form action="{{ route('AddBooking') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="selection" class="form-label">Pilih Ruangan Yang Ingin Di Booking</label>
                                    <select class="form-select" name="ruangan_id" id="selection">
                                        @foreach($ruangan as $data)
                                            <option value="{{ $data['id'] }}">{{ $data['nama_ruangan'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keperluan</label>
                                    <input type="text" class="form-control col-md-6" id="keterangan" name="keterangan" required placeholder="Masukkan Keterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="waktuBerangkat" class="form-label">Waktu Booking</label>
                                    <input type="datetime-local" class="form-control col-md-6" id="waktuMulai" name="waktuMulai" required>
                                </div>
                                <div class="mb-3">
                                    <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                                    <input type="datetime-local" class="form-control col-md-6" id="waktuSelesai" name="waktuSelesai" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Request Booking Ruangan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display Booking Ruangan Table -->
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                            <h1>Data Booking</h1>
                        </div>
                    <div class="card-body align-items-center py-5 gap-2 gap-md-5">
                        @if(count($booking) > 0)
                        <div class="table-responsive user-datatable">
                            <table class="display" id="export-button">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th> Status </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['ruangan']['nama_ruangan'] }}</td>
                                            <td>{{ $data['keperluan'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data['odate'])->format('d/m/Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data['cdate'])->format('d/m/Y H:i') }}</td>
                                            <td>{{ $data['status'] }}</td>
                                            <td>
                                                @if($data['status'] == "Canceled" || $data['status'] == "Approve")
                                                 <p> - </p>
                                                @else
                                                 <a href="{{ route('Canceled_Booking', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                 <i class="fa fa-ban"></i> Cancel
                                                 </a>
                                                @endif
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                             </table>
                            </div>
                        @else
                            <p>No Booking Ruangan data available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <!-- Include your scripts here -->
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

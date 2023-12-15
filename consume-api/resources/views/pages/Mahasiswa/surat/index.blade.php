<x-web-layout title="Request Surat" class="booking-ruangan">

    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
        <!-- ... (Add other CSS files if needed) ... -->
    @endsection

    @section('breadcrumb-title')
        <h3>Request Surat</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Request Surat</li>
    @endsection

    <div class="container-fluid booking-container">
        <div class="row justify-content-center">
            <!-- Request Surat Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-body pt-0">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h1>Request Surat</h1>
                            <form method="POST" action="{{ route('AddSurat') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="topic" class="form-label">Topik Request Surat</label>
                                    <input type="text" class="form-control" id="topic" name="topic" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_surat" class="form-label">Keterangan Request Surat</label>
                                    <textarea class="form-control" id="keterangan_surat" name="keterangan_surat" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Request Surat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display Request Surat Table -->
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Data Request Surat</h1>
                    </div>
                    <div class="card-body align-items-center py-5 gap-2 gap-md-5">
                        @if(count($surat) > 0)
                            <div class="table-responsive user-datatable">
                                <table class="display" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Topik Request Surat</th>
                                            <th>Keterangan Request Surat</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($surat as $data)
                                            <tr>
                                                <td>{{ $data['id'] }}</td>
                                                <td>{{ $data['topic'] }}</td>
                                                <td>{{ $data['keterangan_surat'] }}</td>
                                                <td>{{ $data['status'] }}</td>
                                                <td>
                                                    <!-- Adjust action buttons based on status -->
                                                    @if($data['status'] == "Canceled" || $data['status'] == "Rejected")
                                                        <p> - </p>
                                                    @endif
                                                    @if($data['status'] == "Pending")
                                                        <a href="{{ route('Canceled_Surat', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                            <i class="fa fa-ban"></i> Canceled
                                                        </a>
                                                    @endif
                                                    <!-- @if($data['status'] == "Approve")
                                                        <a href="{{ asset('surat_mahasiswa/' . $data['nama_surat']) }}" download>
                                                            <i class="fas fa-print"></i> Unduh File
                                                        </a>
                                                    @endif -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>Tidak ada Data Request Surat</p>
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
        <!-- ... (Add other script files if needed) ... -->
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

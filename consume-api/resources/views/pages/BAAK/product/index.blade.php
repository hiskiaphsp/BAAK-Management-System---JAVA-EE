<x-admin-layout title="Kaos Management" class="kaos-management">

    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection

    @section('breadcrumb-title')
        <h3>Kaos Management</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Kaos</li>
    @endsection

    <div class="container-fluid kaos-container">
        <div class="row justify-content-center">
            <div class="row col-md-12 col-sm-12">
                <!-- Add/Edit Kaos Form -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h1>Form</h1>
                        </div>
                        <div class="card-body pt-0">
                            <form id="kaosForm" method="POST">
                                @csrf
                                <input type="hidden" id="kaosId" name="kaosId" value="">
                                <div class="mb-3">
                                    <label for="ukuran" class="form-label">Ukuran</label>
                                    <input type="text" class="form-control col-md-6" id="ukuran" name="ukuran" required placeholder="Masukkan Ukuran" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control col-md-3" id="harga" name="harga" required placeholder="Masukkan Harga" min="1" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control col-md-6" id="keterangan" name="keterangan" required placeholder="Masukkan Keterangan" data-validation="required">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Display Kaos Table -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Data Kaos</h1>
                        </div>
                        <div class="card-body pt-0">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(count($kaos) > 0)
                                <div class="table-responsive user-datatable">
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ukuran Baju</th>
                                                <th>Harga</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kaos as $data)
                                                <tr>
                                                    <td>{{ $data['id'] }}</td>
                                                    <td>{{ $data['ukuran'] }}</td>
                                                    <td>{{ $data['harga'] }}</td>
                                                    <td>{{ $data['keterangan'] }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-success" onclick="editKaos('{{ $data['id'] }}', '{{ $data['ukuran'] }}', '{{ $data['harga'] }}', '{{ $data['keterangan'] }}')">
                                                            <i class="fa fa-copy"></i> Edit
                                                        </a>
                                                        <a href="{{ route('Delete_kaos', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 d-flex justify-content-center">
                                    <div id="pagination-links" class="mt-4">
                                        <!-- Pagination links go here -->
                                    </div>
                                </div>
                            @else
                                <p>Tidak ada data Kaos</p>
                            @endif
                        </div>
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
        function submitForm() {
            var kaosId = document.getElementById('kaosId').value;
            var formAction = (kaosId !== '') ? '{{ url("BAAK/Editkaos") }}/' + kaosId : '{{ route("addkaos") }}';
            document.getElementById('kaosForm').action = formAction;
            document.getElementById('kaosForm').submit();
        }

        function editKaos(id, ukuran, harga, keterangan) {
            document.getElementById('kaosId').value = id;
            document.getElementById('ukuran').value = ukuran;
            document.getElementById('harga').value = harga;
            document.getElementById('keterangan').value = keterangan;
        }
    </script>
@endsection



</x-admin-layout>

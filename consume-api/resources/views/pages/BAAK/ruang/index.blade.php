<x-admin-layout title="Ruangan Management">
    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h3>Ruangan Management</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Ruangan</li>
    @endsection
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="row col-md-12 col-sm-12">
                <!-- Add/Edit Ruangan Form -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h1>Form</h1>
                        </div>
                        <div class="card-body pt-0">
                            <form id="ruanganForm" method="POST">
                                @csrf
                                <input type="hidden" id="ruanganId" name="ruanganId" value="">
                                <div class="mb-3">
                                    <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                                    <input type="text" class="form-control col-md-6" id="nama_ruangan" name="nama_ruangan" required placeholder="Masukkan Nama Ruangan" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="status_ruangan" class="form-label">Status Ruangan</label>
                                    <input type="text" class="form-control col-md-3" id="status_ruangan" name="status_ruangan" required placeholder="Masukkan Status Ruangan" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                    <input type="number" class="form-control col-md-6" id="kapasitas" name="kapasitas" required placeholder="Masukkan Kapasitas" min="1" data-validation="required">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="submitRuanganForm()">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Display Ruangan Table -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Data Ruangan</h1>
                        </div>
                        <div class="card-body pt-0">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(count($ruangan) > 0)
                                <div class="table-responsive user-datatable">
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Ruangan</th>
                                                <th>Status Ruangan</th>
                                                <th>Kapasitas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ruangan as $data)
                                                <tr>
                                                    <td>{{ $data['id'] }}</td>
                                                    <td>{{ $data['nama_ruangan'] }}</td>
                                                    <td>{{ $data['status_ruangan'] }}</td>
                                                    <td>{{ $data['kapasitas'] }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-success" onclick="editRuangan('{{ $data['id'] }}', '{{ $data['nama_ruangan'] }}', '{{ $data['status_ruangan'] }}', '{{ $data['kapasitas'] }}')">
                                                            <i class="fa fa-copy"></i> Edit
                                                        </a>
                                                        <a href="{{ route('Delete_Ruangan', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Tidak ada data Ruangan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... existing code ... -->
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
    <script>
        function submitRuanganForm() {
            var ruanganId = document.getElementById('ruanganId').value;
            var formAction = (ruanganId !== '') ? '{{ url("BAAK/EditRuangan") }}/' + ruanganId : '{{ route("addruangan") }}';
            document.getElementById('ruanganForm').action = formAction;
            document.getElementById('ruanganForm').submit();
        }

        function editRuangan(id, nama_ruangan, status_ruangan, kapasitas) {
            document.getElementById('ruanganId').value = id;
            document.getElementById('nama_ruangan').value = nama_ruangan;
            document.getElementById('status_ruangan').value = status_ruangan;
            document.getElementById('kapasitas').value = kapasitas;
        }
    </script>

</x-admin-layout>

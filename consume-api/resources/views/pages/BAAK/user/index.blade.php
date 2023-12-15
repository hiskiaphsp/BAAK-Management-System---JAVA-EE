<x-admin-layout title="User Management" class="users-management">

    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection

    @section('breadcrumb-title')
        <h3>User Management</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">User</li>
    @endsection

    <div class="container-fluid users-container">
        <div class="row justify-content-center">
            <div class="row col-md-12 col-sm-12">
                <!-- Add/Edit User Form -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h1>Form</h1>
                        </div>
                        <div class="card-body pt-0">
                            <form id="usersForm" method="POST">
                                @csrf
                                <input type="hidden" id="userId" name="userId" value="">
                                <!-- <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control col-md-6" id="username" name="username" required placeholder="Masukkan username" data-validation="required">
                                </div> -->
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama</label>
                                    <input type="text" class="form-control col-md-6" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan Nama" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="nim" class="form-label">nim</label>
                                    <input type="text" class="form-control col-md-6" id="nim" name="nim" required placeholder="Masukkan NIM" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="NIK" class="form-label">KTP</label>
                                    <input type="text" class="form-control col-md-6" id="NIK" name="NIK" required placeholder="Masukkan KTP" data-validation="required">
                                </div>
                                <div class="mb-3">
                                    <label for="noHandphone" class="form-label">HP</label>
                                    <input type="text" class="form-control col-md-6" id="noHandphone" name="noHandphone" required placeholder="Masukkan HP" data-validation="required">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">Update User</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Display User Table -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Data User</h1>
                        </div>
                        <div class="card-body pt-0">
                            <!-- @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif -->

                            @if(count($users) > 0)
                                <div class="table-responsive user-datatable">
                                    <table class="display" id="export-button">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Username</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>NIM</th>
                                                <th>KTP</th>
                                                <th>HP</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $data)
                                                <tr>
                                                    <td>{{ $data['id'] }}</td>
                                                    <td>{{ $data['username'] }}</td>
                                                    <td>{{ $data['nama_Lengkap'] }}</td>
                                                    <td>{{ $data['nim'] }}</td>
                                                    <td>{{ $data['nomor_KTP'] }}</td>
                                                    <td>{{ $data['nomor_Handphone'] }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-success" onclick="editUser('{{ $data['id'] }}', '{{ $data['nama_Lengkap'] }}', '{{ $data['nim'] }}', '{{ $data['nomor_KTP'] }}', '{{ $data['nomor_Handphone'] }}')">
                                                            <i class="fa fa-copy"></i> Edit
                                                        </a>
                                                        <a href="{{ route('Delete_User', ['id' => $data['id']]) }}" class="btn btn-danger">
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
                                <p>Tidak ada data User</p>
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
            var userId = document.getElementById('userId').value;
            var formAction = (userId !== '') ? '{{ url("BAAK/EditUser") }}/' + userId : '{{ url("#") }}';
            document.getElementById('usersForm').action = formAction;
            document.getElementById('usersForm').submit();
        }

        function editUser(id, nama_Lengkap, nim, nomor_KTP, nomor_Handphone) {
            document.getElementById('userId').value = id;
            // document.getElementById('username').value = username;
            document.getElementById('nama_lengkap').value = nama_Lengkap;
            document.getElementById('nim').value = nim;
            document.getElementById('NIK').value = nomor_KTP;
            document.getElementById('noHandphone').value = nomor_Handphone;
        }
    </script>
@endsection



</x-admin-layout>

<x-admin-layout title="Izin Keluar Kampus">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection

    @section('breadcrumb-title')
        <h3>Izin Keluar Kampus</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Izin Keluar Kampus</li>
        <li class="breadcrumb-item active">Data Izin Keluar</li>
    @endsection

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-10">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Izin Keluar</h3>
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
                                            @if($data['status'] != "Canceled")
                                                <tr>
                                                    <td>{{ $data['id'] }}</td>
                                                    <td>{{ $data['keterangan'] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data['waktuBerangkat'])->format('d/m/Y H:i') }} - {{ \Carbon\Carbon::parse($data['waktuKembali'])->format('d/m/Y H:i') }}</td>
                                                    <td>{{ $data['status'] }}</td>
                                                    <td>
                                                        @if($data['status'] == "Approve" || $data['status'] == "Rejected")
                                                            -
                                                        @else
                                                            <a href="{{ route('Approve_IK', ['id' => $data['id']]) }}" class="btn btn-success">
                                                                <i class="fa fa-check-square"></i> Approve
                                                            </a>
                                                            <a href="{{ route('Rejected_IK', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                                <i class="fa fa-ban"></i> Reject
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <div id="pagination-links" class="mt-4">
                                </div>
                            </div>
                        @else
                            <p>Tidak ada data Izin Keluar</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
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
        function confirmDeleteOrder(orderId) {
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this order!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-order-form-' + orderId).submit();
                }
            });
        }
    </script>
    @endsection
</x-admin-layout>

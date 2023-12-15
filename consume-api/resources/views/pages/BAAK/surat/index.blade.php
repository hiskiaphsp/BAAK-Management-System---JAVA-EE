<x-admin-layout title="Request Surat" class="request-surat">

    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h3>Request Surat</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Reqe</li>
    @endsection

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border">
                            <h3>Request Surat</h3>
                        </div>
                        <div class="card-body pt-0">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <hr>
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
                                                <td>{{ $data['keterangan_surat'] }} </td>
                                                <td>{{ $data['status'] }}</td>
                                                <td>
                                                    @if($data['status'] == "Approve" || $data['status'] == "Rejected")
                                                        -
                                                    @else
                                                        <a href="{{ route('Approve_Surat', ['id' => $data['id']]) }}" class="btn btn-success">
                                                            <i class="fa fa-check-square"></i> Approve |
                                                        </a>
                                                        <a href="{{ route('Rejected_Surat', ['id' => $data['id']]) }}" class="btn btn-danger">
                                                            <i class="fa fa-times"></i> Rejected
                                                        </a>
                                                    @endif
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
                                <p>Tidak ada Data Request Surat</p>
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
@endsection
</x-admin-layout>

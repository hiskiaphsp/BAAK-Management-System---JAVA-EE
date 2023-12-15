<x-admin-layout title="Order " class="pemesanan-kaos">
    @section('css')
        <!-- Include your CSS files here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables/dataTables.bootstrap5.min.css') }}">
    @endsection

    @section('breadcrumb-title')
        <h3>Order Management</h3>
    @endsection

    @section('breadcrumb-items')
        <li class="breadcrumb-item">Dashboards</li>
        <li class="breadcrumb-item active">Order</li>
    @endsection
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <h1>Order</h1>
                        </div>
                        <div class="card-body pt-0">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h1>Pemesanan </h1>
                            <hr>

                            @if(count($pemesanankaos) > 0)
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Ukuran </th>
                                            <th>Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanankaos as $data)
                                            <tr>
                                                <td>{{ $data['id'] }}</td>
                                                <td>{{ $data['user']['nama_Lengkap'] }} - {{ $data['user']['nim'] }}</td>
                                                <td>{{ $data['kaos']['ukuran'] }}</td>
                                                <td>
                                                    Dibayar Dengan: {{ $data['jenis_pembayaran'] }}
                                                    <p>&nbsp;</p>
                                                    Dengan Nominal: Rp. {{ number_format($data['nominal_pembayaran'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @else
                                <p>Tidak Ada Data Pesanan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var tableRows = document.querySelectorAll('.table tbody tr');
                var rowsPerPage = 10;
                var paginationContainer = document.getElementById('pagination-links');
                var totalRows = tableRows.length;
                var currentPage = 1;
                var totalPages = Math.ceil(totalRows / rowsPerPage);

                function showPage(page) {
                    currentPage = page;

                    var start = (page - 1) * rowsPerPage;
                    var end = start + rowsPerPage;

                    tableRows.forEach(function (row, index) {
                        if (index >= start && index < end) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    updatePaginationLinks();
                }

                function createPaginationLinks() {
                    var links = '';
                    for (var i = 1; i <= totalPages; i++) {
                        links += `<span style="padding:10px;margin:5px;" class="border border-primary"><a href="#" class="pagination-link " data-page="${i}">${i}</a></span>`;
                    }
                    paginationContainer.innerHTML = links;

                    updatePaginationLinks();
                }

                function updatePaginationLinks() {
                    var paginationLinks = paginationContainer.querySelectorAll('.pagination-link');
                    paginationLinks.forEach(function (link) {
                        link.classList.remove('active');
                        if (parseInt(link.getAttribute('data-page')) === currentPage) {
                            link.classList.add('active');
                        }
                    });
                }

                showPage(1);
                createPaginationLinks();

                paginationContainer.addEventListener('click', function (event) {
                    if (event.target.classList.contains('pagination-link')) {
                        var selectedPage = parseInt(event.target.getAttribute('data-page'));
                        showPage(selectedPage);
                    }
                });
            });
        </script>
    @endsection

</x-admin-layout>

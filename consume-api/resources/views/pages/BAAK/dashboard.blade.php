<x-admin-layout title="Dashboard">

    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.min.css">
    @endsection
    @section('breadcrumb-title')
    <h3>Dashboard</h3>
    @endsection

    @section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    @endsection
        <div class="container-fluid">
            <div class="row size-column">
                <div class="col-sm-12 ">
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="row justify-content-center">
                                <!-- Informasi ringkas -->
                                <div class="col-lg-6">
                                    <div class="card bg-primary">
                                        <div class="card-body">
                                            <h3 class="card-title text-white">Selamat Datang di Dashboard!,  {{ $user['nama_Lengkap'] }}</h3>
                                            <p class="card-text text-white">Layanan BAAK</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @section('script')

    @endsection
</x-admin-layout>

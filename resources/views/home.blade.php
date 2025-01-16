{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.dashboard-volt')

@section('content')
<div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
                <div
                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                    <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 30px;"></i>
                    </div>
                    <div class="d-sm-none">
                        <h2 class="h5">Customers</h2>
                        <h3 class="fw-extrabold mb-1">345,678</h3>
                    </div>
                </div>
                <div class="col-12 col-xl-7 px-xl-0">
                    <div class="d-none d-sm-block">
                        <h2 class="h6 text-gray-400 mb-0">Center Point</h2>
                        <h3 class="fw-extrabold mb-2">{{ $centerPoint }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
                <div
                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                    <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 30px;"></i>
                    </div>
                    <div class="d-sm-none">
                        <h2 class="fw-extrabold h5">Revenue</h2>
                        <h3 class="mb-1">$43,594</h3>
                    </div>
                </div>
                <div class="col-12 col-xl-7 px-xl-0">
                    <div class="d-none d-sm-block">
                        <h2 class="h6 text-gray-400 mb-0">Spot</h2>
                        <h3 class="fw-extrabold mb-2">{{ $spot }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
                <div
                    class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                    <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 30px;"></i>
                    </div>
                    <div class="d-sm-none">
                        <h2 class="fw-extrabold h5"> Bounce Rate</h2>
                        <h3 class="mb-1">50.88%</h3>
                    </div>
                </div>
                <div class="col-12 col-xl-7 px-xl-0">
                    <div class="d-none d-sm-block">
                        <h2 class="h6 text-gray-400 mb-0">Kecamatan</h2>
                        <h3 class="fw-extrabold mb-2">{{ $kecamatan }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
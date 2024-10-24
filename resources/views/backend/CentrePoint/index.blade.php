@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Set Center Point
                        <a href="{{ route('centre-point.create') }}" class="btn btn-info btn-sm float-end">Create Data</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-striped" id="dataCenterPoint">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Titik Koordinat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#dataCenterPoint', {
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            ajax: '{{ route('centre-point.data') }}',
            columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'coordinates'
            }, {
                data: 'action'
            }]
        });
    </script>
@endpush
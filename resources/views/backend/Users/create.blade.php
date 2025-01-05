@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <style>
        
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control @error('name') 
                                    is-invalid
                                @enderror" name="name" id="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ @message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') 
                                    is-invalid @enderror" name="email" id="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ @message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control @error('password') 
                                    is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ @message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm my-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
@endpush
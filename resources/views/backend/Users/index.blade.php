@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Users
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
                        <table class="table table-striped" id="dataUsers">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Users</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <form action="" method="post" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus" style="display:none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let table = new DataTable('#dataUsers', {
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            ajax: '{{ route('user.data') }}',
            columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, {
                data: 'name'
            }, {
                data: 'role'
            }, {
                data: 'action'
            }]
        });
    </script>
    <script>
    $(function() {
                $(document).on('click', '#delete', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");

                    Swal.fire({
                        title: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut?",
                        text: "Kamu Tidak Bisa Mengembalikan Data Tersebut Jika Dihapus!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, Hapus!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            // Menggunakan variabel 'link' daripada 'href'
                            document.getElementById('deleteForm').action = link;
                            document.getElementById('deleteForm').submit();
                            Swal.fire({
                            title: "Data Sudah Terhapus!",
                            text: "Data Kamu Sudah Berhasil Dihapus!",
                            icon: "success"
                            });
                        }
                        });
                })
            })
</script>
@endpush
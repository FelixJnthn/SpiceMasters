@extends('layouts.client')

@section('content')

<style>
    /* Tambahkan gaya tambahan di sini */
    body {
        background-image: url('{{ asset("images/SpiceMaster.png") }}');
        background-size: cover; /* Untuk memastikan gambar latar belakang menutupi seluruh halaman */
        background-repeat: no-repeat; /* Untuk menghindari pengulangan gambar latar belakang */
    }

    .card {
        border-radius: 15px;
        max-width: 800px; /* Lebar maksimum card */
        margin: 0 auto; /* Mengatur margin otomatis untuk mencenternya */
    }

    .card-header {
        border-bottom: 2px solid #FFA500; /* Sesuaikan warna dengan tema Anda */
    }

    .card-header h1 {
        font-size: 36px;
        line-height: 1.2;
    }
</style>

<div class="container">

<div class="container-fluid d-flex justify-content-center"> <!-- Menambahkan class d-flex justify-content-center untuk membuat konten berada di tengah -->
    <!-- Content Row -->

    <div class="card border-0 shadow-sm">
        <div class="card-header py-3 bg-transparent">
            <h1 class="m-0 font-weight-bold text-center">
                <img src="images/trophy.png" alt="Leaderboard" style="width: 50px; margin-right: 10px;">
                {{ __('Leaderboard') }}
                <img src="images/trophy.png" alt="Leaderboard" style="width: 50px; margin-left: 10px;">
            </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="leaderboardTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($results->sortByDesc('total_points')->take(10) as $key => $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $result->user->name }}</td>
                            <td>{{ $result->total_points }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">{{ __('Data Empty') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Content Row -->
</div>

</div>
@endsection


@push('script-alt')
<script>
    $(document).ready(function() {
        $('#leaderboardTable').DataTable({
            order: [[ 2, 'desc' ]], // Mengurutkan berdasarkan kolom Points secara descending
            responsive: true // Aktifkan responsivitas tabel
        });
    });
</script>
@endpush

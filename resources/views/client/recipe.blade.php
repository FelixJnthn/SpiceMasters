@extends('layouts.client')

@section('content')

<div class="container">

    <!-- Input pencarian -->
    <div class="row">
        <div class="col-sm-12">
            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div id="my-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @forelse($informations as $info)
                        <!-- Lapis Daging -->
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="text-center">{{ $info->recipe_name }}</h1>
                                    <div class="text-left">
                                        <h3> Bahan yang dibutuhkan dan perlu disiapkan : </h3>
                                        <ul>
                                            @php
                                                $ingredients = explode(',', $info->ingredients);
                                            @endphp
                                            @foreach($ingredients as $ingredient)
                                                <li>{{ $ingredient }}</li>
                                            @endforeach
                                        </ul>
                                        <h3> Petunjuk memasak : </h3>
                                        <ol>
                                            @php
                                                $instructions = explode('.', $info->instructions);
                                            @endphp
                                            @foreach($instructions as $instruction)
                                                <li>{{ $instruction }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Handle case when $informations is empty -->
                        <p class="text-center">No information available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        position: relative;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('images/batik.png');
        opacity: 0.5;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: -1;
    }

    .item {
        margin-top: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
        border-radius: 20px; 
        padding: 20px;
    }

    .text-center {
        text-align: center !important; 
    }

    h1, h3, p {
        margin-bottom: 10px; 
    }
</style>

<script>
    // Fungsi untuk melakukan filter berdasarkan input pencarian
    function search() {
        // Ambil nilai input pencarian
        var input, filter, items, item, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        items = document.getElementsByClassName('item');

        // Iterasi semua item
        for (var i = 0; i < items.length; i++) {
            item = items[i];
            txtValue = item.textContent || item.innerText;
            // Jika teks item cocok dengan input pencarian, tampilkan item, jika tidak, sembunyikan
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        }
    }

    // Tambahkan event listener untuk mendeteksi perubahan pada input pencarian
    document.getElementById('searchInput').addEventListener('input', search);
</script>
@endsection

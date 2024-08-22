@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <h2>Welcome to Our Kitchen!</h2>
                <p class="lead">Explore our recipes or take a quiz to test your culinary knowledge.</p>
                <div class="btn-group" role="group" aria-label="Button Group">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id="about" class="btn btn-primary" href="{{ route('client.recipe') }}"><span>&#x1F4C3;</span>&nbsp&nbspRecipes</a>
                    <a id="quiz" class="btn btn-secondary" href="{{ route('client.difficulty') }}"><span>&#x1F4D6;</span>&nbsp&nbspTake a Quiz</a>
                </div>
                <!-- Ganti tombol Leaderboard dengan gambar yang dapat diklik -->
                <a href="{{ route('client.leaderboard') }}">
                    <img src="images/trophy.png" alt="Leaderboard" style="width: 50px;">
                </a>
            </div>
        </div>
    </div>
    
</div>

<style>
    body {
        position: relative;
        overflow: hidden;
    }

    body::before,
    body::after {
        content: "";
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        z-index: -1;
    }

    body::before {
        left: 0;
        background-image: url('images/Chef.png');
        background-size: cover;
        opacity: 0.5;
    }

    body::after {
        right: 0;
        background-image: url('images/Exam.png');
        background-size: cover;
        opacity: 0.5;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Adjusted height */
        text-align: center;
    }

    .btn-group {
        margin-top: 30px;
    }

    .btn {
        padding: 15px 30px;
        font-size: 20px;
        letter-spacing: 1px;
        font-weight: bold;
        border-radius: 25px;
        margin: 20px;
        outline: none;
        transition: all ease 0.5s;
        position: relative; /* Added for icon positioning */
    }

    .btn span {
        position: absolute;
        left: 10px; /* Adjust as needed */
    }

    #about {
        background-color: #FCC822;
        border: 3px solid #FCC822;
    }

    #about:hover {
        background-color: #FFA500;
        border-color: #FFA500;
    }

    #quiz {
        background-color: #6C63FF;
        border: 3px solid #6C63FF;
    }

    #quiz:hover {
        background-color: #483D8B;
        border-color: #483D8B;
    }
</style>

@endsection

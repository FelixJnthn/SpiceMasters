@extends('layouts.client')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <div class="btn-group">
                    <a id="diff-easy" class="btn btn-easy" href="{{ route('client.quizeasy') }}">Easy</a>
                    <a id="diff-medium" class="btn btn-medium" href="{{ route('client.quizmedium') }}">Medium</a>
                    <a id="diff-hard" class="btn btn-hard" href="{{ route('client.quizhard') }}">Hard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        position: relative;
    }



    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('images/Spices.png');
        opacity: 0.5;
        background-size: cover;
        background-position: center;
        z-index: -1; /* Memastikan lapisan ini berada di bawah konten lain */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 86vh;
    }

    .btn-group {
        margin-top: 50px;
        text-align: center;
    }

    .btn {
        width: 150px;
        padding: 10px 15px;
        font-size: 20px;
        color: black;
        letter-spacing: 2px;
        font-weight: bold;
        border-radius: 10px;
        margin: 30px;
        outline: none;
        border: none;
        transition: all ease 0.5s;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-easy {
        background: linear-gradient(45deg, #FCC822, #FF7E5F);
    }

    .btn-medium {
        background: linear-gradient(45deg, #6A11CB, #2575FC);
    }

    .btn-hard {
        background: linear-gradient(45deg, #FFD645, #FF4E50);
    }

    .btn::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.1);
        transition: all ease 0.5s;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
    }

    .btn:hover::before {
        width: 0;
        height: 0;
    }

    .btn:hover {
        transform: translateY(-5px);
    }

    .btn:hover:active {
        transform: translateY(0);
    }
</style>

<script>
    // Function to handle button click
    function handleClick(difficulty) {
        // Display confirmation message
        var confirmed = window.confirm("Apakah kamu yakin akan memulai kuis ini?");
        // If user confirms, proceed to the quiz
        if (confirmed) {
            window.location.href = difficulty; // Redirect to the selected quiz difficulty
        } else {
            // If user cancels, do nothing
            // or you can redirect them back to the difficulty selection page
            // window.location.href = "/difficulty";
        }
    }

    // Add event listeners to the buttons
    document.getElementById("diff-easy").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default action of clicking the link
        handleClick("{{ route('client.quizeasy') }}");
    });

    document.getElementById("diff-medium").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default action of clicking the link
        handleClick("{{ route('client.quizmedium') }}");
    });

    document.getElementById("diff-hard").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default action of clicking the link
        handleClick("{{ route('client.quizhard') }}");
    });
</script>



@endsection

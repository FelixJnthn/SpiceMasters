@extends('layouts.client')

@section('content')
<style>

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        color: white;
        font-weight: bold;
        border-bottom: none;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 30px;
    }

    .notification {
        font-size: 24px;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
    }

    .table {
        margin-bottom: 30px;
    }

    .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FCC822;
            color: #fff;
            border: 3px solid #FCC822;
            border-radius: 10px;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #FFA500;
            border-color: #FFA500;
        }



    /* Warna notifikasi berdasarkan skor */
    .notification.success {
        background-color: #4CAF50; /* Hijau */
        color: white;
    }

    .notification.warning {
        background-color: #FFEB3B; /* Kuning */
        color: black;
    }

    .notification.danger {
        background-color: #F44336; /* Merah */
        color: white;
    }

    /* Penyesuaian tautan berbagi */
    .btn-social-icon {
        margin-right: 5px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: @php echo $result->total_points >= 90 ? '#4CAF50' : ($result->total_points >= 80 ? '#FFEB3B' : ($result->total_points >= 60 ? '#FFEB3B' : '#F44336')); @endphp">
                    Results of your Quiz
                </div>

                <div class="card-body">
                    @php
                    $totalPoints = $result->total_points;
                    $notification = '';
                    if ($totalPoints >= 90) {
                        $notification = "Great! You got $totalPoints points!";
                        $notificationClass = 'success';
                    } elseif ($totalPoints >= 80) {
                        $notification = "Great! You got $totalPoints points!";
                        $notificationClass = 'warning';
                    } elseif ($totalPoints >= 60) {
                        $notification = "Not bad! You got $totalPoints points!";
                        $notificationClass = 'warning';
                    } else {
                        $notification = "Oops! You Only Get $totalPoints points!";
                        $notificationClass = 'danger';
                    }
                    @endphp
                    <p class="notification {{ $notificationClass }}">{{ $notification }}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Question Text</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result->questions as $question)
                            <tr>
                                <td>{{ $question->question_text }}</td>
                                <td>{{ $question->pivot->points }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-center">
                    <!-- Tautan berbagi ke media sosial -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}&quote=I%20got%20{{ $totalPoints }}%20points%20in%20the%20quiz!" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=I%20got%20{{ $totalPoints }}%20points%20in%20the%20quiz!" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title=Quiz%20Results&summary=I%20got%20{{ $totalPoints }}%20points%20in%20the%20quiz!" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                    <a href="https://api.whatsapp.com/send?text=I%20got%20{{ $totalPoints }}%20points%20in%20the%20quiz!%20Check%20it%20out:%20{{ urlencode(Request::fullUrl()) }}" class="btn btn-social-icon btn-whatsapp"><i class="fa fa-whatsapp"></i></a>
                    <a href="mailto:?subject=Quiz%20Results&body=I%20got%20{{ $totalPoints }}%20points%20in%20the%20quiz!%20Check%20it%20out:%20{{ urlencode(Request::fullUrl()) }}" class="btn btn-social-icon btn-email"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="card-footer text-center">
                <a href="/home" class="btn-back">
                 Back to Home
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

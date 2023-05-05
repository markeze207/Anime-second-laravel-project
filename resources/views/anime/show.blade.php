@extends('layouts.main')

@section('content')
    @include('includes.navbar');
    <body id="#top">
    <main>
        <article>
            <section style="background: none;" class="movie-detail">
                <div class="container">

                    <figure class="movie-detail-banner">

                        <img src="{{ $anime->preview_photo }}" alt="{{ $anime->title }} movie poster">

                        <button class="play-btn">
                            <ion-icon name="play-circle-outline"></ion-icon>
                        </button>
                    </figure>

                    <div class="movie-detail-content">

                        <h1 class="h1 detail-title">
                            {{ $anime->title }}
                        </h1>

                        <div class="meta-wrapper">

                            <div class="badge-wrapper">
                                <div class="badge badge-outline">{{ $anime->quality }}</div>
                            </div>

                            <div class="ganre-wrapper">
                                @foreach($voiceovers as $voiceover)
                                    <a href="#">{{ $voiceover->title }} </a>
                                @endforeach
                            </div>

                            <div class="date-time">
                                <div>
                                    <ion-icon name="time-outline"></ion-icon>

                                    <time datetime="PT115M">Episodes: {{ $anime->episodes->count() }}</time>
                                </div>

                            </div>

                        </div>

                        <p class="storyline" style="font-size: 17px;">
                           {{ $anime->content }}
                        </p>


                    </div>

                </div>
            </section>

            <section class="tv-series">
                <div class="container">

                    <p class="section-subtitle">Best TV Series</p>

                    <h2 class="h2 section-title">World Best TV Series</h2>

                    <ul class="movies-list">
                        @foreach($animes as $anime)
                        <li>
                            <div class="movie-card">

                                <a href="./movie-details.html">
                                    <figure class="card-banner">
                                        <img src="{{ $anime->preview_photo }}" alt="Moon Knight movie poster">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="./movie-details.html">
                                        <h3 class="card-title">{{ $anime->title }}</h3>
                                    </a>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">2K</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT47M">Episodes: {{ $anime->episodes->count() }}</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>Likes: {{ $anime->likes }}</data>
                                    </div>
                                </div>

                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </section>
        </article>
    </main>

@endsection

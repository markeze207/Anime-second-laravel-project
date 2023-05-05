@extends('layouts.main')

@section('content')
    @include('includes.navbar')
    <body id="top">
    <main>
        <article>


            <!--
        - #TOP RATED
      -->

            <section class="top-rated">
                <div class="container">

                    <p class="section-subtitle">Online Streaming</p>

                    <h2 class="h2 section-title">Anime list</h2>


                    <ul class="movies-list">
                        @foreach($animes as $anime)
                        <li>
                            <div class="movie-card">

                                <a href="{{ route('anime.show', $anime->id) }}">
                                    <figure class="card-banner">
                                        <img src="{{ $anime->preview_photo }}" alt="{{ $anime->title }}">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="{{ route('anime.show', $anime->id) }}">
                                        <h3 class="card-title">{{ $anime->title }}</h3>
                                    </a>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">{{ $anime->quality }}</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT122M">Episodes: {{ $anime->episodes->count() }}</time>
                                    </div>

                                    <div class="rating">
                                        <data>Likes: {{ $anime->likes }}</data>
                                    </div>
                                </div>

                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <div class="pagination_bootstrap">
                        {{ $animes->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </section>
        </article>
    </main>

    </body>
@endsection

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
                                    <a href="./movie-details.html">
                                        <h3 class="card-title">{{ $anime->title }}</h3>
                                    </a>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">2K</div>

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





    <!--
      - #FOOTER
    -->

    <footer class="footer">

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    &copy; 2022 <a href="#">codewithsadee</a>. All Rights Reserved
                </p>

                <img src="{{ asset('assets/images/footer-bottom-img.png') }}" alt="Online banking companies logo" class="footer-bottom-img">

            </div>
        </div>

    </footer>





    <!--
      - #GO TO TOP
    -->

    <a href="#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up"></ion-icon>
    </a>





    <!--
      - custom js link
    -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!--
      - ionicon link
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
@endsection

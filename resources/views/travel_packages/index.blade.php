@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
      <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="feature swiper-slide">
              <img src="{{ asset('frontend/assets/img/trvlpk.jpg') }}" alt="" class="feature__bg" />
              
              <div class="feature__container container">
                <div class="feature__data">
                  <h2 class="feature__subtitle">Explore</h2>
                  <h1 class="feature__title">Package Travel</h1>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>

      <!--==================== POPULAR ====================-->
      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center">All</span>
          <h2 class="section__title" style="text-align: center">
            Package Travel
          </h2>

          <div class="popular__all">
          @foreach($travel_packages as $travel_package)
        <article class="popular__card">
            <a href="{{ route('travel_package.show', $travel_package->slug) }}" class="popular__card-link">
                <div class="card-content">
                    <div class="card-image-wrapper">
                        <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" alt="{{ $travel_package->type ?? 'Paket Umroh' }}" class="popular__img" />
                        <h2 class="popular__price">
                            Rp {{ number_format($travel_package->price ?? 0, 0, ',', '.') }}/pax
                        </h2>
                    </div>

                    <div class="popular__data">
                        <h3 class="popular__title">
                            {{ $travel_package->type ?? 'Nama Paket Umroh' }}
                        </h3>
                        <p class="popular__description">
                            {{ $travel_package->location ?? $travel_package->description ?? 'Deskripsi singkat paket' }}
                        </p>

                        <div class="popular__button-wrapper">
                            <button class="popular__button">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    @endforeach
</div>
        </div>
      </section>
@endsection
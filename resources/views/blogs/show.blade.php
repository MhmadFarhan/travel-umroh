@extends('layouts.frontend')

@section('content')
    <section class="feature">
        <img src="{{ Storage::url($blog->image) }}" alt="" class="feature__bg" />
        <div class="feature__container container">
            <div class="feature__data">
                <h2 class="feature__subtitle">{{ $blog->title }}</h2>
                </div>
        </div>
    </section>

    <section class="gallery-blog section">
        <div class="container">
            @if ($blog->blogImages->isNotEmpty())
                <h2 class="section__title" style="text-align: center; margin-bottom: 2rem;">Galeri Foto</h2>
                <div class="swiper gallerySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($blog->blogImages as $blogImage)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($blogImage->image_path) }}" alt="Gambar Galeri Blog" class="img-fluid">
                            </div>
                        @endforeach
                    </div>
                    @if ($blog->blogImages->count() > 1)
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail">
                    {!! \Illuminate\Support\Str::of($blog->description)->replaceMatches('/<oembed url="(.*?)"><\/oembed>/', function ($matches) {
                        return '<iframe width="100%" height="400" src="' . str_replace('watch?v=', 'embed/', $matches[1]) . '" frameborder="0" allowfullscreen></iframe>';
                    }) !!}
                    <div class="blog__footer" style="margin-top: 2rem;">
                        <div class="blog__reaction">{{ date('d M Y', strtotime($blog->created_at)) }}</div>
                        <div class="blog__reaction">
                            <i class="bx bx-show"></i>
                            <span>{{ $blog->reads }}</span>
                        </div>
                    </div>
                </div>
                <div class="package-travel">
                    <h3>Category</h3>
                    <ul>
                        <li>
                            <a href="{{ route('blog.category', $blog->category->slug) }}">
                                {{ $blog->category->name }}
                            </a>
                        </li>
                    </ul>
                    <h3 style="margin-bottom: 1rem">Popular Trip</h3>
                    @foreach($travel_packages as $travel_package)
                        <article class="popular__card" style="margin-bottom: 1rem">
                            <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                                <img
                                    src="{{ Storage::url($travel_package->galleries->first()->images) }}"
                                    alt=""
                                    class="popular__img"
                                />
                                <div class="popular__data">
                                    <h2 class="popular__price">Rp {{ number_format($travel_package->price, 0, ',', '.') }}</h2>
                                    <h3 class="popular__title">{{ preg_replace('/-\d+$/', '', $travel_package->type) }}</h3>
                                    <p class="popular__description">{{ $travel_package->location }}</p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="blog" id="blog">
        <div class="blog__container container">
            <span class="section__subtitle" style="text-align: center"
                >Related Blog</span
            >
            <h2 class="section__title" style="text-align: center">
                Find The Best Places
            </h2>

            <div class="blog__content grid">
                @foreach($relatedBlogs as $relatedBlog)
                <article class="blog__card">
                    <div class="blog__image">
                        <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                            <img src="{{ Storage::url($relatedBlog->image) }}" alt="" class="blog__img" />
                        </a>
                        <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="blog__button">
                            <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                    <div class="blog__data">
                        <h2 class="blog__title">{{ $relatedBlog->title }}</h2>
                        <p class="blog__description">
                            {{ $relatedBlog->excerpt }}
                        </p>

                        <div class="blog__footer">
                            <div class="blog__reaction">{{ date('d M Y', strtotime($relatedBlog->created_at)) }}</div>
                            <div class="blog__reaction">
                                <i class="bx bx-show"></i>
                                <span>{{ $relatedBlog->reads }}</span>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('style-alt')
<style>
    blockquote {
        border-left: 8px solid #b4b4b4;
        padding-left: 1rem;
    }
    .blog__detail ul li {
        list-style: initial;
    }

    /* --- Gaya Spesifik untuk Galeri Swiper Blog --- */

    /* Kontainer utama bagian galeri blog */
    .gallery-blog {
        padding-bottom: 3rem; /* Memberi sedikit ruang di bawah galeri */
    }

    /* Kontainer Swiper itu sendiri */
    .gallerySwiper {
        width: 100%; /* Lebar penuh dari kontainer induknya */
        height: auto; /* Tinggi disesuaikan dengan konten */
        position: relative; /* Penting untuk penempatan tombol navigasi absolut */
        overflow: hidden; /* Pastikan tidak ada konten yang meluap */
        border-radius: 8px; /* Sudut sedikit membulat untuk estetika */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Tambahkan sedikit bayangan */
    }

    /* Setiap slide di dalam Swiper */
    .gallerySwiper .swiper-slide {
        text-align: center;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        /* Properti tinggi gambar yang sudah Anda miliki (height: auto;) */
    }

    /* Gambar di dalam setiap slide */
    .gallerySwiper .swiper-slide img {
        display: block;
        width: 100%;
        /* Properti tinggi dan object-fit gambar yang sudah Anda miliki */
        height: auto;
        object-fit: cover; /* To maintain aspect ratio */
    }

    /* Gaya untuk tombol navigasi Swiper (Next/Prev) */
    .gallerySwiper .swiper-button-next,
    .gallerySwiper .swiper-button-prev {
        color: var(--first-color, #007bff); /* Warna sesuai tema Anda, default biru */
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.7); /* Background putih transparan */
        border-radius: 50%; /* Bentuk lingkaran */
        transition: background-color 0.3s ease; /* Transisi halus saat hover */
        z-index: 10; /* Pastikan di atas gambar */

        /* Mengatur posisi vertikal di tengah */
        top: 50%; /* Pindahkan ke tengah vertikal */
        transform: translateY(-50%); /* Geser ke atas 50% dari tinggi elemennya sendiri */
        margin-top: 0; /* Override margin-top default dari Swiper jika ada */
    }

    .gallerySwiper .swiper-button-next:hover,
    .gallerySwiper .swiper-button-prev:hover {
        background-color: rgba(255, 255, 255, 1); /* Lebih solid saat di-hover */
    }

    /* Ikon panah di dalam tombol */
    .gallerySwiper .swiper-button-next::after,
    .gallerySwiper .swiper-button-prev::after {
        font-size: 1.5rem; /* Ukuran ikon panah */
    }

    /* Penempatan tombol */
    .gallerySwiper .swiper-button-prev {
        left: 10px; /* Jarak dari kiri */
    }

    .gallerySwiper .swiper-button-next {
        right: 10px; /* Jarak dari kanan */
    }

    /* Gaya untuk pagination (titik-titik di bawah slider) */
    .gallerySwiper .swiper-pagination {
        position: absolute;
        bottom: 10px; /* Jarak dari bawah slider */
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        z-index: 10; /* Pastikan di atas gambar */
    }

    /* Titik pagination individual */
    .gallerySwiper .swiper-pagination-bullet {
        background: rgba(0, 0, 0, 0.5); /* Warna default titik */
        opacity: 0.8; /* Transparansi default */
        width: 8px; /* Ukuran titik */
        height: 8px; /* Ukuran titik */
        margin: 0 4px; /* Jarak antar titik */
        transition: background-color 0.3s ease, opacity 0.3s ease; /* Transisi halus */
    }

    /* Titik pagination aktif */
    .gallerySwiper .swiper-pagination-bullet-active {
        background: var(--first-color, #007bff); /* Warna aktif sesuai tema Anda */
        opacity: 1; /* Tidak transparan saat aktif */
    }

    /* Media queries untuk responsivitas (opsional, sesuaikan) */
    @media screen and (max-width: 768px) {
        .gallerySwiper .swiper-button-next,
        .gallerySwiper .swiper-button-prev {
            width: 30px;
            height: 30px;
        }
        .gallerySwiper .swiper-button-next::after,
        .gallerySwiper .swiper-button-prev::after {
            font-size: 1.2rem;
        }
    }
</style>
@endpush

@push('script-alt')
    <script>
        const gallerySwiper = new Swiper(".gallerySwiper", {
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
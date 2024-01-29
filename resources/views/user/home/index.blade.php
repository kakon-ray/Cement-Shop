@extends('layouts.user.master')
@section('title')
    {{ 'Cement Shop | Home ' }}
@endsection

@section('content')
    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section slider__section--bg">
            <div class="hero__slider--inner position__relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero__slider--activation swiper">
                                <div class="hero__slider--wrapper swiper-wrapper">

                                    @foreach ($slider as $item)
                                        <div class="swiper-slide ">
                                            <div class="hero__slider--items">
                                                <div class="hero__slider--thumbnail">
                                                    <img class="hero__slider--thumbnail__img display-block"
                                                        src="{{ $item->image }}" alt="slider img">
                                                </div>
                                                <div class="slider__content text-center">
                                                    <h2 class="slider__content--maintitle h1">{{ $item->title }}
                                                    </h2>
                                                    <p class="slider__content--desc d-sm-2-none">{{ $item->desc }}</p>
                                                    <div
                                                        class="slider__content--footer d-flex align-items-center justify-content-center">
                                                        <a class="slider__content--btn primary__btn" href="#shop">Shop
                                                            Now</a>
                                                        <div class="bideo__play slider__play--bideo">
                                                            <a class="bideo__play--icon glightbox"
                                                                href="https://vimeo.com/115041822" data-gallery="video">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="16" viewBox="0 0 31 37">
                                                                    <path data-name="Polygon 1"
                                                                        d="M16.783,2.878a2,2,0,0,1,3.435,0l14.977,25.1A2,2,0,0,1,33.477,31H3.523a2,2,0,0,1-1.717-3.025Z"
                                                                        transform="translate(31) rotate(90)"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                                <span class="visually-hidden">Play</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__pagination swiper-pagination"></div>
            </div>
        </section>
        <!-- End slider section -->


        <!-- Start about section -->
        <section class="about__section section--padding border-bottom">
            <div class="container">
                <div class="row row-cols-md-1 row-cols-1  align-items-center mb-50">
                    <div class="col">
                        <h2 class="text-center text__secondary mb-10">ABOUT US</h2>
                    </div>
                </div>
                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1 align-items-center">
                    <div class="col">
                        <div class="about__content">
                            <h2 class="about__content--title mb-18">We Have This Builders
                                Easy integrative.</h2>
                            <div class="about__content--step mb-25">
                                <p class="about__content--desc mb-20">Beyond more stoic this along goodness this sed wow
                                    manatee mongos
                                    flusterd impressive man farcrud opened inside owin punitively
                                    wasteful telling spransac coldly spokeles.</p>
                                <ul class="mb-20">
                                    <li class="about__content--desc__list">Beyond drone is an to be contre unmanned aerial.
                                    </li>
                                    <li class="about__content--desc__list">With various equipment including tho drone.</li>
                                </ul>
                                <p class="about__content--desc style2">Beyond more stoic this along goodness this sed wow
                                    flusterd impressive</p>
                            </div>
                            <div class="about__content--author d-flex align-items-center mb-50">
                                <div class="about__content--author__thumb">
                                    <img class="display-block" src="{{ asset('user/img/other/about-author.webp') }}"
                                        alt="about author thumb">
                                </div>
                                <div class="about__content--author__text d-flex align-items-center">
                                    <div class="about__content--author__text--left">
                                        <h3 class="about__content--author__name text__secondary">- Rubel Wilson,</h3>
                                        <span class="about__content--author__rank">Founder</span>
                                    </div>
                                    <img class="about__author--signature display-block"
                                        src="{{ asset('user/img/icon/signature.webp') }}" alt="signature">
                                </div>
                            </div>
                            <a class="about__content--btn primary__btn" href="contact.html">Ask For Price</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="about__thumbnail">
                            <img class="display-block" src="{{ asset('user/img/other/about-thumb.webp') }}"
                                alt="about-thumb">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->



        <!-- Start project section -->
        <section id="shop" class="project__section project__section--bg section--padding">
            <div class="container">
                <div class="section__heading text-center mb-20">
                    <h2 class="section__heading--maintitle text__secondary mb-10">Our Products</h2>
                    <p class="section__heading--desc">Beyond more stoic this along goodness this sed wow manatee mongos
                        flusterd impressive man farcrud opened.</p>
                </div>
                <ul class="project__tab--one project__tab--btn d-flex justify-content-center mb-40">
                    <li class="project__tab--btn__list active" data-toggle="tab" data-target="#all">All</li>
                    <li class="project__tab--btn__list" data-toggle="tab" data-target="#dorean">Rod</li>
                    <li class="project__tab--btn__list" data-toggle="tab" data-target="#development">Cement</li>

                </ul>
                <div class="tab_content">
                    <div id="all" class="tab_pane active show">
                        <div class="project__section--inner">
                            <div class="row row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($allproduct as $item)
                                    <div class="col custom-col-2 mb-30">
                                        <article class="project__card ">
                                            <a class="project__card--link"
                                                href="{{ route('user.product.details', ['id' => $item->id]) }}">
                                                <div class="project__card--thumbnail">
                                                    <img class="project__card--thumbnail__img display-block"
                                                        src="{{ $item->thumbnail }}" alt="product-img">
                                                </div>
                                                <div
                                                    class="project__card--content d-flex justify-content-between align-items-center">
                                                    <div class="project__card--content__left">
                                                        <h3 class="project__card--content__title">{{ $item->brand_title }}
                                                        </h3>
                                                        <span class="project__card--content__subtitle">Price:
                                                            {{ $item->price }}</span>

                                                        @if ($item->rod_brand)
                                                            <p class="project__card--content__subtitle">Rod Brand:
                                                                {{ $item->rod_brand }}</p>
                                                        @endif
                                                        @if ($item->cement_brand)
                                                            <p class="project__card--content__subtitle">Cement Brand:
                                                                {{ $item->cement_brand }}</p>
                                                        @endif
                                                    </div>
                                                    <span class="project__card--btn"><svg class="project__card--btn__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="15.51"
                                                            height="15.443" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="48" d="M268 112l144 144-144 144M392 256H100">
                                                            </path>
                                                        </svg></span>
                                                </div>
                                            </a>
                                        </article>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                    <div id="dorean" class="tab_pane">
                        <div class="project__section--inner">
                            <div class="row row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($allproduct as $item)
                                    @if ($item->category == 'rod')
                                        <div class="col custom-col-2 mb-30">
                                            <article class="project__card ">
                                                <a class="project__card--link"
                                                    href="{{ route('user.product.details', ['id' => $item->id]) }}">
                                                    <div class="project__card--thumbnail">
                                                        <img class="project__card--thumbnail__img display-block"
                                                            src="{{ $item->thumbnail }}" alt="product-img">
                                                    </div>
                                                    <div
                                                        class="project__card--content d-flex justify-content-between align-items-center">
                                                        <div class="project__card--content__left">
                                                            <h3 class="project__card--content__title">
                                                                {{ $item->brand_title }}</h3>
                                                            <span class="project__card--content__subtitle">Price:
                                                                {{ $item->price }}</span>
                                                        </div>
                                                        <span class="project__card--btn"><svg
                                                                class="project__card--btn__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="15.51"
                                                                height="15.443" viewBox="0 0 512 512">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="48"
                                                                    d="M268 112l144 144-144 144M392 256H100"></path>
                                                            </svg></span>
                                                    </div>
                                                </a>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="development" class="tab_pane">
                        <div class="project__section--inner">
                            <div class="row row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($allproduct as $item)
                                    @if ($item->category == 'cement')
                                        <div class="col custom-col-2 mb-30">
                                            <article class="project__card ">
                                                <a class="project__card--link"
                                                    href="{{ route('user.product.details', ['id' => $item->id]) }}">
                                                    <div class="project__card--thumbnail">
                                                        <img class="project__card--thumbnail__img display-block"
                                                            src="{{ $item->thumbnail }}" alt="product-img">
                                                    </div>
                                                    <div
                                                        class="project__card--content d-flex justify-content-between align-items-center">
                                                        <div class="project__card--content__left">
                                                            <h3 class="project__card--content__title">
                                                                {{ $item->brand_title }}</h3>
                                                            <span class="project__card--content__subtitle">Price:
                                                                {{ $item->price }}</span>
                                                        </div>
                                                        <span class="project__card--btn"><svg
                                                                class="project__card--btn__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="15.51"
                                                                height="15.443" viewBox="0 0 512 512">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="48"
                                                                    d="M268 112l144 144-144 144M392 256H100"></path>
                                                            </svg></span>
                                                    </div>
                                                </a>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End project section -->




        <!-- Start team members section -->
        <section class="team__section section--padding">
            <div class="container">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle text__secondary mb-10">Our Employees</h2>
                    <p class="section__heading--desc">Beyond more stoic this along goodness this sed wow manatee mongos
                        flusterd impressive man farcrud opened.</p>
                </div>
                <div class="team__container">
                    <div class="row row-cols-md-3 row-cols-sm-2 row-cols-2 mb--n30">
                        @foreach ($allemployee as $item)
                            <div class="col custom-col mb-30">
                                <article class="team__card">
                                    <div class="team__card--thumbnail">
                                        <a href="{{ route('user.employee.details', ['id' => $item->id]) }}">
                                            <img class="team__card--thumbnail__img display-block"
                                                src="{{ $item->image }}" alt="team-thumb">
                                        </a>
                                    </div>
                                    <div class="team__card--content ">
                                        <h3 class="team__card--content__title">{{ $item->name }} </h3>
                                        <span
                                            class="team__card--content__subtitle text__secondary">{{ $item->position }}</span>
                                        <ul class="team__card--content__info">
                                            <li class="team__card--content__info--list">
                                                <svg class="team__card--content__info--icon"
                                                    xmlns="http://www.w3.org/2000/svg" width="15.797" height="20.05"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0083 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0013.8-25.8C465 391.17 468 391.17 451 374z"
                                                        fill="currentColor" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                </svg>
                                                <a href="tel:099-56336958">{{ $item->phone }}</a>
                                            </li>
                                            <li class="team__card--content__info--list">
                                                <svg class="team__card--content__info--icon"
                                                    xmlns="http://www.w3.org/2000/svg" width="20.57" height="13.13"
                                                    viewBox="0 0 31.57 31.13">
                                                    <path
                                                        d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z"
                                                        transform="translate(-2 -4)" fill="currentColor"></path>
                                                </svg>
                                                <a href="mailto:demo@example.com">{{ $item->email }}</a>
                                            </li>

                                        </ul>

                                    </div>
                                </article>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- End team members section -->


        <!-- Start project section -->
        <section class="project__section project__section--bg section--padding">
            <div class="container">
                <div class="section__heading text-center mb-20">
                    <h2 class="section__heading--maintitle text__secondary mb-10">Gallery</h2>
                    <p class="section__heading--desc">Beyond more stoic this along goodness this sed wow manatee mongos
                        flusterd impressive man farcrud opened.</p>
                </div>
                <div class="tab_content">
                    <div id="all" class="tab_pane active show">
                        <div class="project__section--inner">
                            <div class="row row-cols-md-3 row-cols-2 mb--n30">
                                @foreach ($gallery->slice(0, 6) as $item)
                                    <div class="col custom-col-2 mb-30">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="assets/img/product/big-product1.webp"><img
                                                    class="product__media--preview__items--img"
                                                    src="{{ $item->thumbnail }}" alt="product-media-img"></a>

                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="{{ $item->thumbnail }}" data-gallery="product-media-preview">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18"
                                                        height="18" viewBox="0 0 18 18">
                                                        <image width="18" height="18"
                                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAABHNCSVQICAgIfAhkiAAAAVhJREFUOE/llLtKA0EUhjdY+BD6ABaW3tIYTWEhiKKCCGIgqGhCgqXvoQFRQdBGERQvUaJFgilVRHwF8RWCWqzfD7OyjrPZ7R342HP2nP1n58yZSfm+/+F53ivUoAseoALtxirBIXiHLPSlEHrBaMGyEYzR+BXuwduHTgltYNzBKSxAM6HSAHknMAf9EqpjjEIGzmAK7mPE0sSrRkQ/cSWhIkZQE4kdwzxoAteQiCbMgeqqsSIhO3nEJK7xPLKC0/h7oT/5CbuEFByDCShDeKZNfC3lwp49SihiVdGv/6GQdm4WSlaxt/AvQ9vedteCZlsn68Aqr/pLPfenaVVsHcBt80HQbIv4txF75GravIQafKClDMKNq9kcgspXd0+CjlM1OLTXZu1LPNVwScYwSYcwA2kJPWJ8QQGekyiEcnqxd6BDQp8YupPOoRueYDdGME9c18gbjMv+BiJYeHc6xpjnAAAAAElFTkSuQmCC" />
                                                    </svg>
                                                    <span class="visually-hidden">Media Gallery</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End project section -->


    </main>
@endsection

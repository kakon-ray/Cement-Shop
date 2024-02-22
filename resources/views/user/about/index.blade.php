@extends('layouts.user.master')
@section('title')
    {{ 'About Us | User ' }}
@endsection

@section('content')
    <main class="main__content_wrapper">
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10">About Us</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">About Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

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
                            <h2 class="about__content--title mb-18">{{ $aboutus->title }}</h2>
                            <div class="about__content--step mb-25">
                                @php
                                    echo $aboutus->desc;
                                @endphp
                            </div>
                            <a class="about__content--btn primary__btn" href="/user/contact">Ask For Price</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="about__thumbnail">
                            <img class="display-block" src="{{ $aboutus->image }}" alt="about-thumb">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->

    </main>
@endsection

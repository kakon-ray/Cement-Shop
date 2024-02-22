@extends('layouts.user.master')
@section('title')
    {{ 'Gallery | রড সিমেন্ট বিক্রেতা ' }}
@endsection

@section('content')


<main class="main__content_wrapper">
        
                    <!-- Start breadcrumb section -->
     <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title mb-10">Gallery</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text__secondary">Gallery</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

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
                                        @foreach ($gallery as $item)
                                            <div class="col custom-col-2 mb-30">
                                                <div class="product__media--preview__items">
                                                    <a class="product__media--preview__items--link glightbox"
                                                        data-gallery="product-media-preview"
                                                        href="assets/img/product/big-product1.webp"><img
                                                            class="product__media--preview__items--img"
                                                            src="{{ $item->thumbnail }}" alt="product-media-img"></a>
                                              
                                                    <div class="product__media--view__icon">
                                                        <a class="product__media--view__icon--link glightbox"
                                                            href="{{ $item->thumbnail }}"
                                                            data-gallery="product-media-preview">
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

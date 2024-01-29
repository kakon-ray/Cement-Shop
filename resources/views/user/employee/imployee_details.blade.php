@extends('layouts.user.master')
@section('title')
    {{ 'Employee Details | রড সিমেন্ট বিক্রেতা ' }}
@endsection

@section('content')

<style>
    .imployee-details{
        margin: 10px auto;
    }

    .employ-address{
        display: flex;
        align-items: center;
    }
</style>
    <main class="main__content_wrapper">


        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-1">
                    <div class="col imployee-details">
                        <article class="team__card">
                            <div class="team__card--thumbnail">
                                <img class="team__card--thumbnail__img display-block"
                                    src="{{ $employee->image }}" alt="team-thumb">
                            </div>
                            <div class="team__card--content ">
                                <h3 class="team__card--content__title">{{ $employee->name}} </h3>
                                <span class="team__card--content__subtitle text__secondary">{{ $employee->position}}</span>
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
                                        <a href="tel:099-56336958">{{$employee->phone}}</a>
                                    </li>
                                    <li class="team__card--content__info--list">
                                        <svg class="team__card--content__info--icon"
                                            xmlns="http://www.w3.org/2000/svg" width="20.57" height="13.13"
                                            viewBox="0 0 31.57 31.13">
                                            <path
                                                d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z"
                                                transform="translate(-2 -4)" fill="currentColor"></path>
                                        </svg>
                                        <a href="mailto:demo@example.com">{{$employee->email}}</a>
                                    </li>
                                    <li class="team__card--content__info--list employ-address">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.57" height="15.13" viewBox="0 0 31.57 31.13">
                                            <path id="ic_account_balance_24px" d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z" transform="translate(-2 -1)" fill="currentColor"></path>
                                        </svg>
                                        <a style="margin: 5px" href="mailto:demo@example.com">{{$employee->address}}</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>
        <!-- End product details section -->

    </main>
@endsection

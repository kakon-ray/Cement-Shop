
	
<!-- Start header area -->
	<header class="header__section">
        <!-- Start Header topbar -->
        <div class="header__topbar bg__primary color-primary-2">
            <div class="container">
                <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                    <ul class="header__contact--info d-flex align-items-center">
                        <li class="header__contact--info__list text-white">
                            <svg class="header__contact--info__icon" xmlns="http://www.w3.org/2000/svg" width="15.797" height="20.05" viewBox="0 0 512 512"><path d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0083 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0013.8-25.8C465 391.17 468 391.17 451 374z" fill="currentColor" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <a href="tel:+8801711295135">+8801711295135</a>
                        </li>
                        <li class="header__contact--info__list text-white">
                            <svg class="header__contact--info__icon" xmlns="http://www.w3.org/2000/svg" width="20.57" height="13.13" viewBox="0 0 31.57 31.13">
                                <path  d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor"></path>
                            </svg>
                            <a href="mailto:abdul.razzak.aziz@gmail.com">abdul.razzak.aziz@gmail.com</a>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>
        <!-- Start Header topbar -->

        <!-- Start main header -->
        <div class="main__header position__relative header__sticky">
            <div class="container">
                <div class="main__header--inner d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="index.html"><img class="main__logo--img" src="{{asset('user/img/logo/nav-logo.jpg')}}" alt="logo-img"></a></h1>
                        <div class="header__menu d-none d-lg-block">
                            <nav class="header__menu--navigation">
                                <ul class="d-flex">
                                    <li class="header__menu--items">
                                        <a class="header__menu--link {{ request()->routeIs('home') ? 'active-nav-menue' : '' }}" href="{{route('home')}}">Home</a>
                                    </li>

                                    <li class="header__menu--items">
                                        <a class="header__menu--link {{ request()->routeIs('user.about') ? 'active-nav-menue' : '' }}" href="{{route('user.about')}}">About US </a>  
                                    </li>
                         

                                    <li class="header__menu--items mega__menu--items">
                                        <a class="header__menu--link {{ request()->routeIs('user.shop') ? 'active-nav-menue' : '' }}" href="{{route('user.employee')}}">Employes</a>
                                      
                                    </li>
                                 
                                    <li class="header__menu--items">
                                        <a class="header__menu--link {{ request()->routeIs('user.gallery') ? 'active-nav-menue' : '' }}" href="{{route('user.gallery')}}">Gallery</a>  
                                    </li>
                                    <li class="header__menu--items">
                                        <a class="header__menu--link {{ request()->routeIs('user.contact') ? 'active-nav-menue' : '' }}" href="{{route('user.contact')}}">Contact</a>  
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- End main header -->

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas-header" tabindex="-1">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="index.html">
                        <img src="{{asset('user/img/logo/nav-logo.jpg')}}" alt="Rokon Logo">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas>close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item {{ request()->routeIs('home') ? 'active-nav-menue' : '' }}" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item {{ request()->routeIs('user.about') ? 'active-nav-menue' : '' }}" href="{{route('user.about')}}">About US </a>  
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item {{ request()->routeIs('user.shop') ? 'active-nav-menue' : '' }}" href="{{route('user.employee')}}">Employes</a>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item {{ request()->routeIs('user.gallery') ? 'active-nav-menue' : '' }}" href="{{route('user.gallery')}}">Gallery</a>             
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item {{ request()->routeIs('user.contact') ? 'active-nav-menue' : '' }}" href="{{route('user.contact')}}">Contact</a>  
                        </li>
                    
                    </ul>
               
                   
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar" tabindex="-1">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{ request()->routeIs('home') ? 'active-nav-menue' : '' }}" href="{{route('home')}}"">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
             
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->

    </header>
        <!-- End header area -->
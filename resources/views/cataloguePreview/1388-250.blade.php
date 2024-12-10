<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- s:promoboxdesktop: -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* CSS Channelbox */
        @font-face {
            font-family: "montserrat-bold";
            font-weight: bold;
            font-style: normal;
            src: url("https://cdn.detik.net.id/health/fonts/montserrat-bold.eot");
            src: url("https://cdn.detik.net.id/health/fonts/montserrat-bold.eot?#iefix") format("embedded-opentype"),
                url("https://cdn.detik.net.id/health/fonts/montserrat-bold.ttf") format("truetype");
        }

        @font-face {
            font-family: montserrat-light;
            src: url("https://cdnstatic.detik.com/live/_assets/fonts/montserrat/montserrat-Light.ttf");
        }

        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

        a {
            text-decoration: none;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container {
            width: 100%;
            max-width: 694px;
            position: relative;
            background-color: #fafafa;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header {
            border-radius: 8px;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header a {
            width: 100%;
            border-radius: 8px;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header img {
            width: 100%;
            max-width: 694px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header .swiper-button-next::after,
        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header .swiper-button-prev::after {
            display: none;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header .swiper-button-next svg,
        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header .swiper-button-prev svg {
            width: 20px;
            height: 20px;
            background: #333333;
            padding: 5px;
            border-radius: 100px;
            transition: 0.25s;
            opacity: 0;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header:hover .swiper-button-next svg,
        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header:hover .swiper-button-prev svg {
            opacity: 1;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-header .swiper-pagination span {
            width: 5px;
            height: 5px;
            background: #ffffff;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct {
            padding: 0 6px;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-block: 8px;
            width: 100%;
            background-color: #fafafa;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            width: 100%;
            max-width: 350px;
            gap: 12px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1),
                0 1px 2px -1px rgb(0 0 0 / 0.1);
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-thumbnail {
            background: #aeaeae;
            aspect-ratio: 1/1;
            width: 100%;
            max-width: 90px;
            max-height: 90px;
            overflow: hidden;
            border-radius: 8px;
            flex-shrink: 0;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-thumbnail img {
            aspect-ratio: 1/1;
            width: 90px;
            object-fit: cover;
            transition: 0.25s;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-data {
            display: flex;
            flex-flow: column;
            justify-content: center;
            padding: 4px 0;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-data .cb-product-title {
            margin: 0 0 8px 0;
            font-family: montserrat-bold;
            font-size: 16px;
            line-height: 18px;
            text-align: left;
            color: #000000;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-data .cb-product-price-container .cb-product-price.discount {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 14px;
            text-align: left;
            color: #9a9a9a;
            margin-top: 0;
            margin-bottom: 4px;
            text-decoration: line-through;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-data .cb-product-price-container .cb-product-price.not-discount~.cb-product-price {
            display: none;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card .cb-product-data .cb-product-price-container .cb-product-price {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: 16px;
            text-align: left;
            color: #414141;
            margin: 0;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .cb-product-container .cb-product-card:hover .cb-product-thumbnail img {
            transform: scale(1.1);
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct .swiper-button-next::after,
        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct .swiper-button-prev::after {
            display: none;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct .swiper-button-next svg,
        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct .swiper-button-prev svg {
            width: 20px;
            height: 20px;
            background: #333333;
            padding: 5px;
            border-radius: 100px;
            transition: 0.25s;
            opacity: 0;
        }

        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct:hover .swiper-button-next svg,
        #{{ __('id-') . $catalogue->id }} .cb-container .swiperProduct:hover .swiper-button-prev svg {
            opacity: 1;
        }
    </style>
</head>

<body id="{{ __('id-') . $catalogue->id }}">
    <div class="cb-container">
        <!-- S: CB Header -->
        <div class="swiper cb-header">
            <!-- S: Landing Page -->
            <!-- E: Landing Page -->

            <!-- S: Creative Banner -->
            <div class="swiper-wrapper">
                <!-- Dynamic banners -->
                <a href="{{ $catalogue->catalogue_url }}" target="_blank" class="swiper-slide"
                    onclick="trackClick({{ $catalogue->id }})">
                    <img src="{{ $catalogue->catalogue_banner }}" alt="header" loading="lazy"
                        onload="trackImpression({{ $catalogue->id }})" />
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </a>
                <!-- Hard Code Creative Banner for CTA, -->
                <a href="https://detik.com" target="_blank" class="swiper-slide">
                    <img src="https://cdnstatic.detik.com/live/2024/07/samsung/240803-6FoldFlip6-1388x240-v2-2.jpg"
                        alt="header" loading="lazy" />
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </a>
            </div>
            <!-- E: Creative Banner -->

            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                aria-controls="swiper-wrapper-8a8101010047b7e4870">
                <svg xmlns="http://www.w3.org/2000/svg" height="0.1em" viewBox="0 0 320 512">
                    <path fill="#ffffff"
                        d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                </svg>
            </div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                aria-controls="swiper-wrapper-8a8101010047b7e4870">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                    <path fill="#ffffff"
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                </svg>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- E: CB Header -->

        <!-- S: CB Article -->
        <div class="swiper swiperProduct">
            <div class="cb-product-container swiper-wrapper" id="cb-product-container">
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        <a href="{{ $product->product_url }}" target="_blank"
                            onclick="trackProductClick({{ $product->id }})">
                            <div class="cb-product-card">
                                <div class="cb-product-thumbnail">
                                    <img src="{{ $product->thumbnail }}" alt="thumbnail" />
                                </div>
                                <div class="cb-product-data">
                                    <h1 class="cb-product-title">{{ $product->product_name }}</h1>
                                    <div class="cb-product-price-container">
                                        @if ($product->original_price > -1)
                                            <p
                                                class="cb-product-price {{ $product->discounted_price ? 'discount' : '' }}">
                                                Rp. {{ number_format($product->original_price, 0, ',', '.') }}</p>
                                        @endif
                                        @if ($product->discounted_price)
                                            <p class="cb-product-price"> Rp
                                                {{ number_format($product->discounted_price, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                aria-controls="swiper-wrapper-8a8101010047b7e4870">
                <svg xmlns="http://www.w3.org/2000/svg" height="0.1em" viewBox="0 0 320 512">
                    <path fill="#ffffff"
                        d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                </svg>
            </div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                aria-controls="swiper-wrapper-8a8101010047b7e4870">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                    <path fill="#ffffff"
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                </svg>
            </div>
        </div>
        <!-- E: CB Article -->
    </div>

    <script type="text/javascript" src="https://cdnstatic.detik.com/live/_assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const catalogueId = {{ $catalogue->id }};
        // Track impression when banners are loaded
        function trackImpression(catalogueId) {
            // Check if the impression has already been tracked for this session
            if (!sessionStorage.getItem(`impression_${catalogueId}`)) {
                // Track the impression
                fetch(`{{ env('APP_URL') }}/api/catalogue/impression`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            catalogue_id: catalogueId
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            // console.log("Impression tracked successfully");
                        }
                    })
                    .catch((error) =>
                        console.error("Error tracking impression:", error)
                    );

                // Set session storage to avoid tracking again in the same session
                sessionStorage.setItem(`impression_${catalogueId}`, true);
            }
        }

        // Track click on banners
        function trackClick(catalogueId) {
            fetch(`{{ env('APP_URL') }}/api/catalogue/click`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        catalogue_id: catalogueId
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // console.log("Click tracked successfully");
                    }
                })
                .catch((error) => console.error("Error tracking click:", error));
        }

        // Track click on product
        function trackProductClick(productId) {
            fetch(`{{ env('APP_URL') }}/api/product/click`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        product_id: productId
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // console.log("Product click tracked successfully");
                    }
                })
                .catch((error) =>
                    console.error("Error tracking product click:", error)
                );
        }

        // Initialize Swiper
        var swiper = new Swiper(".cb-header", {
            lazy: true,
            autoHeight: true,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiperProduct = new Swiper(".swiperProduct", {
            spaceBetween: 12,
            slidesPerView: 2,
            slidesPerGroup: 1,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>

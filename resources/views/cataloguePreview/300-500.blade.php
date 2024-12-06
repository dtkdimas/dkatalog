<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Demo styles -->
    <style>
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

        body {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        .cb-container {
            width: 300px;
            height: 500px;
            background-color: #fafafa;
            /* overflow: hidden; */
        }

        .cb-container .cb-container-header {}

        .cb-container .cb-container-header .swiper {
            height: 150px;
            width: 300px;
        }

        .cb-container .swiperHeader {
            border-radius: 8px;
        }

        .cb-container .swiperHeader img {
            width: 100%;
            height: 150px;
            border-radius: 8px;
        }

        .cb-container .swiperHeader .swiper-button-next::after,
        .cb-container .swiperHeader .swiper-button-prev::after {
            display: none;
        }

        .cb-container .swiperHeader .swiper-button-next svg,
        .cb-container .swiperHeader .swiper-button-prev svg {
            width: 20px;
            height: 20px;
            background: #333333;
            padding: 5px;
            border-radius: 100px;
            transition: 0.25s;
            opacity: 0;
        }

        .cb-container .swiperHeader:hover .swiper-button-next svg,
        .cb-container .swiperHeader:hover .swiper-button-prev svg {
            opacity: 1;
        }

        .cb-container .swiperHeader .swiper-pagination span {
            width: 5px;
            height: 5px;
            background: #ffffff;
        }


        .cb-container .cb-container-product {}

        .cb-container .cb-container-product .swiper {
            width: 300px !important;
            height: 350px;
            padding: 24px 8px 8px;
            box-sizing: border-box;

        }

        .cb-container .cb-container-product .swiper .swiper-slide {
            height: calc((100% - 60px) / 3) !important;
            width: 284px !important;
            box-sizing: border-box;

        }

        .cb-container .cb-container-product .cb-product-card {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            gap: 16px;
            padding: 8px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1),
                0 1px 2px -1px rgb(0 0 0 / 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-thumbnail {
            background: #aeaeae;
            aspect-ratio: 1/1;
            width: 100%;
            max-width: 80px;
            overflow: hidden;
            border-radius: 8px;
            flex-shrink: 0;
            max-height: 80px;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-thumbnail img {
            aspect-ratio: 1/1;
            width: 80px;
            object-fit: cover;
            transition: 0.25s;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-data {
            display: flex;
            flex-flow: column;
            justify-content: center;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-data .cb-product-title {
            font-family: montserrat-bold;
            font-size: 14px;
            line-height: 20px;
            text-align: left;
            color: #000000;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-top: 0;
            margin-bottom: 6px;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-data .cb-product-price {
            font-family: "Montserrat", sans-serif;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
            color: #000000;
            margin: 0;
        }

        .cb-container .cb-container-product .cb-product-card .cb-product-data .cb-product-price.discount {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            font-size: 14px;
            text-align: left;
            color: #9a9a9a;
            margin-top: 0;
            margin-bottom: 0px;
            text-decoration: line-through;
        }

        .cb-container .swiperProduct .swiper-button-next::after,
        .cb-container .swiperProduct .swiper-button-prev::after {
            display: none;
        }

        .cb-container .swiperProduct .swiper-button-next svg,
        .cb-container .swiperProduct .swiper-button-prev svg {
            width: 20px;
            height: 20px;
            background: #333333;
            padding: 5px;
            border-radius: 100px;
            transition: 0.25s;
            opacity: 0;
        }

        .cb-container .swiperProduct:hover .swiper-button-next svg,
        .cb-container .swiperProduct:hover .swiper-button-prev svg {
            opacity: 1;
        }

        .cb-container .swiperProduct .swiper-pagination span {
            width: 10px;
            height: 10px;
            background: #080808;
        }
    </style>
</head>

<body>
    <!-- Swiper -->

    <div class="cb-container">
        <div class="cb-container-header">
            <div class="swiper swiperHeader">
                <div class="swiper-wrapper">
                    <a href="{{ $catalogue->catalogue_url }}" target="_blank" class="swiper-slide">
                        <img src="{{ $catalogue->catalogue_banner }}" alt="header" loading="lazy" />
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    </a>
                    <a h ref="https://detik.com" target="_blank" class="swiper-slide">
                        <img src="https://cdnstatic.detik.com/live/2024/07/samsung/240803-6FoldFlip6-1388x240-v2-2.jpg"
                            alt="header" loading="lazy" />
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    </a>
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="cb-container-product">
            <div class="swiper swiperProduct">
                <div class="swiper-wrapper" id="containerSwiperSlideProduct">
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
                                        @if ($product->original_price)
                                            <p
                                                class="cb-product-price {{ $product->discounted_price ? 'discount' : '' }}">
                                                Rp. {{ number_format($product->original_price, 0, ',', '.') }}
                                            </p>
                                        @endif
                                        @if ($product->discounted_price)
                                            <p class="cb-product-price"> Rp
                                                {{ number_format($product->discounted_price, 0, ',', '.') }}</p>
                                        @endif
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
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swipera = new Swiper(".swiperHeader", {
            loop: true,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".swiperProduct", {
            slidesPerView: 1,
            loop: true,
            grid: {
                rows: 3,
            },
            spaceBetween: 24,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        const catalogueId = {{ $catalogue->id }};
        // Track impression when banners are loaded
        function trackImpression(catalogueId) {
            // Check if the impression has already been tracked for this session
            if (!sessionStorage.getItem(`impression_${catalogueId}`)) {
                // Track the impression
                fetch(`${process.env.MIX_APP_URL}/api/catalogue/impression`, {
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
            fetch(`${process.env.MIX_APP_URL}/api/catalogue/click`, {
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
            fetch(`${process.env.MIX_APP_URL}/api/product/click`, {
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
    </script>
</body>

</html>

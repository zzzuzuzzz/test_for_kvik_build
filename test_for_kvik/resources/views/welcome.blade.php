<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Task Sprint</title>


    <!-- Favicons -->
    <link href="{{ asset('bladeAssets/assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('bladeAssets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('bladeAssets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bladeAssets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('bladeAssets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('bladeAssets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bladeAssets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('bladeAssets/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('bladeAssets/assets/img/logo.png') }}" alt="">
            <h1 class="sitename">Task Sprint</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Начальная страница<br></a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#services">Наш продукт</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted flex-md-shrink-0" href="{{ route('register') }}">Зарегистрироваться!</a>

    </div>
</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Увеличь эффективность своего бизнеса уже сейчас!</h1>
                    <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('register') }}" class="btn-get-started mt-5">Зарегистрироваться! <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('bladeAssets/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Кто мы</h3>
                        <h2>Мы - команда профессионалов, которая создала уникальный продукт для Вас!</h2>
                        <p>
                            Нашим продуктом пользуются больше 1 000 человек ежедневно. Присоединяетесь и Вы!
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="{{ route('register') }}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Зарегистрироваться!</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('bladeAssets/assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Values Section -->
    <section id="values" class="values section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Наши преимущества</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('bladeAssets/assets/img/values-1.png') }}" class="img-fluid" alt="">
                        <h3>Международная компания</h3>
                        <p>Наши клиенты находятся по всему миру!</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <img src="{{ asset('bladeAssets/assets/img/values-2.png') }}" class="img-fluid" alt="">
                        <h3>Скорость нашей работы</h3>
                        <p>С нами Вы уже завтра увидите увеличение эффективности работы</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <img src="{{ asset('bladeAssets/assets/img/values-3.png') }}" class="img-fluid" alt="">
                        <h3>Удобный интерфейс</h3>
                        <p>Нашим продуктом сможет пользоваться каждый</p>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>

    </section><!-- /Values Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Хороших отзывов</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-journal-richtext color-orange flex-shrink-0" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Компаний-партнеров</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-headset color-green flex-shrink-0" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Пользователей онлайн</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-people color-pink flex-shrink-0" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Крупных компаний онлайн</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Наши услуги и продукты</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-bounding-box-circles icon"></i>
                        <h3>Внедрение под ключ</h3>
                        <p>Внедрим наш продукт в Ваш бизнес без осложнений. Обучим весь персонал</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-calendar4-week icon"></i>
                        <h3>Task-менеджер</h3>
                        <p>Вы можете начать пользоваться нашим продуктом и без обучения. Нужно только попробовать</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-chat-square-text icon"></i>
                        <h3>Поддержка 24/7</h3>
                        <p>Наши операторы помогут Вам в любой непонятной ситуации</p>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Цены</h2>
            <p>Подберем наилучший для Вас вариант!<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-tem">
                        <h3 style="color: #20c997;">Бесплатный план</h3>
                        <div class="price"><sup>$</sup>0<span> / мес</span></div>
                        <div class="icon">
                            <i class="bi bi-box" style="color: #20c997;"></i>
                        </div>
                        <ul>
                            <li>До 5 команд</li>
                            <li>До 5 человек в команде</li>
                            <li>До 50 активных задач</li>
                            <li class="na">Уникальные темы</li>
                            <li class="na">Статистика</li>
                            <li class="na">Собственные статусы задач</li>
                        </ul>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-tem">
                        <span class="featured">Хит</span>
                        <h3 style="color: #0dcaf0;">Стандартный план</h3>
                        <div class="price"><sup>$</sup>19<span> / мес</span></div>
                        <div class="icon">
                            <i class="bi bi-send" style="color: #0dcaf0;"></i>
                        </div>
                        <ul>
                            <li>Неограниченное количество команд</li>
                            <li>Неограниченное количество человек в команде</li>
                            <li>Неограниченное количество задач</li>
                            <li>Уникальные темы</li>
                            <li>Статистика</li>
                            <li>Собственные статусы задач</li>
                        </ul>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-tem">
                        <h3 style="color: #fd7e14;">Годовой план</h3>
                        <div class="price"><sup>$</sup>200<span> / год</span></div>
                        <div class="icon">
                            <i class="bi bi-airplane" style="color: #fd7e14;"></i>
                        </div>
                        <ul>
                            <li>Неограниченное количество команд</li>
                            <li>Неограниченное количество человек в команде</li>
                            <li>Неограниченное количество задач</li>
                            <li>Уникальные темы</li>
                            <li>Статистика</li>
                            <li>Собственные статусы задач</li>
                        </ul>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pricing-tem">
                        <h3 style="color: #0d6efd;">Бизнес план</h3>
                        <div class="price"><sup>$</sup>500<span> / год</span></div>
                        <div class="icon">
                            <i class="bi bi-rocket" style="color: #0d6efd;"></i>
                        </div>
                        <ul>
                            <li>Неограниченное количество команд и задач</li>
                            <li>Неограниченное количество человек в команде</li>
                            <li>Автоматизация Вашего бизнеса</li>
                            <li>Уникальные темы</li>
                            <li>Статистика</li>
                            <li>Собственные статусы задач</li>
                        </ul>
                    </div>
                </div><!-- End Pricing Item -->

            </div><!-- End pricing row -->

        </div>

    </section><!-- /Pricing Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Отзывы</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      },
                      "breakpoints": {
                        "320": {
                          "slidesPerView": 1,
                          "spaceBetween": 40
                        },
                        "1200": {
                          "slidesPerView": 3,
                          "spaceBetween": 1
                        }
                      }
                    }
                </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Долго искал хороший планировщик и нашел! Решил начать с пробного плана и потом купил годовой
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('bladeAssets/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Идеальный инструмент для большого бизнеса. Удобный и быстрый планировщик
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('bladeAssets/assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Одно из самых лучших приложений, которые когда либо использовала. Определнно заслуживает внимания
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('bladeAssets/assets/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Лучшее предложение на рынке. Давно не видел настолько проработанную систему
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('bladeAssets/assets/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Пожалуй лучшее решение для бизнеса. Очень рад что нашел этот планировщик
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('bladeAssets/assets/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->


    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Task Sprint</strong> <span>Все права защищены</span></p>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('bladeAssets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/isotope-layout.blade.php/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('bladeAssets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('bladeAssets/assets/js/main.js') }}"></script>

</body>

</html>

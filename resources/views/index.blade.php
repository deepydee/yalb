@extends('front.layouts.layout')

@section('description')
ТОО «СИЛМАСТЕР» — производитель уплотнений для гидроцилиндров и гидравлического оборудования в Караганде. Компания оснащена уникальным оборудованием DMH (Австрия) для производства манжет и уплотнений методом точения любых размеров с использованием европейских материалов. Также мы поставляем продукцию ведущих производителей РТИ, таких как Kastas, Trelleborg, Hallite на все виды стационарного и мобильного оборудования.
@endsection

@section('keywords')
Продажа готовых манжет уплотнений в Караганде, Производство манжет методом точения в Караганде, манжеты, уплотнения, сальники, гидроцилиндры, маслостанции, пневмоцилиндры, резиновые кольца, гидравлические манжеты, пыльники на строительную дорожную технику
@endsection

@push('scripts')
<script>
    const carouselElement = document.getElementById('carousel');
    const carousel = new bootstrap.Carousel(carouselElement, {
    ride: false,
    interval: 10000,
    touch: true,
    pause: 'hover',
    keyboard: true,
    });

    const reviewsUrl = 'https://public-api.reviews.2gis.com/2.0/branches/70000001045235526/reviews?limit=12&is_advertiser=false&fields=reviews.is_verified&without_my_first_review=false&rated=true&sort_by=date_edited&key=37c04fe6-a560-4549-b459-02309cf643ad&locale=ru_KZ';
    getReviews(reviewsUrl);
</script>
@endpush

@section('content')
<main>
    <section class="container-fluid slider mb-3 mb-sm-5">
      <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="false">
        <ol class="carousel-indicators d-none d-md-flex">
          <li data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
          <li data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Second slide"></li>
          <li data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Third slide"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item overlay active">
            <img
              srcset="
                assets/front/img/slides/001-510x207.png 510w
                assets/front/img/slides/001-690x280.png 690w
                assets/front/img/slides/001-1110x547.png 1110w
              "
              src="assets/front/img/slides/001-1110x547.png"
              class="w-100 d-block"
              alt="First slide">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col col-xxl-10">
                    <a href="#" class="no-underline text-white"><h5 class="mb-3 mb-md-4 slide-heading">Точим манжеты и уплотнения в&nbsp;Караганде</h5></a>
                    <p class="d-none d-sm-block mb-4 slide-description">Штучное изготовление манжет методом точения на современном австрийском станке с числовым программным управлением DMH-500. Изготовим любой нестандартный профиль по Вашим чертежам в течение часа.</p>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAskPhoneCall">Оформить заявку</button>
                  </div>
                </div>
              </div>
          </div>

          <div class="carousel-item overlay">
            <img
            srcset="
              assets/front/assets/front/img/slides/002-510x207.jpg 510w
              assets/front/assets/front/img/slides/002-690x280.jpg 690w
              assets/front/assets/front/img/slides/002-1110x547.jpg 1110w
            "
            src="assets/front/img/slides/002-1110x547.jpg"
            class="w-100 d-block"
            alt="First slide">
            <div class="carousel-caption">
              <div class="row">
                <div class="col col-xxl-10">
                  <a href="#" class="no-underline text-white"><h5 class="mb-3 mb-md-4 slide-heading">Ремонт и производство гидроцилиндров</h5></a>
                  <p class="d-none d-sm-block mb-4 slide-description">Мы предлагаем профессиональный ремонт гидроцилиндров и пневмоцилиндров с диаметром гильзы до 260 мм и длиной до 8 м. Замер и диагностика гидросистем. Изготовление новых гидроцилиндров на замену по образцам или чертежам.</p>
                  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAskPhoneCall">Оформить заявку</button>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item overlay">
            <img
            srcset="
              assets/front/img/slides/003-510x207.jpg 510w
              assets/front/img/slides/003-690x280.jpg 690w
              assets/front/img/slides/003-1110x547.jpg 1110w
            "
            src="assets/front/img/slides/003-1110x547.jpg"
            class="w-100 d-block"
            alt="First slide">
            <div class="carousel-caption">
              <div class="row">
                <div class="col col-xxl-10">
                  <a href="#" class="no-underline text-white"><h5 class="mb-3 mb-md-4 slide-heading">Гидравлические уплотнения Kastas</h5></a>
                  <p class="d-none d-sm-block mb-4 slide-description">Всегда в наличии широкий ассортимент уплотнительных элементов для гидравлического и пневматического оборудования турецкой компании KASTAS</p>
                  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAskPhoneCall">Оформить заявку</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

    <section class="container seals-production mb-3 mb-sm-5">
      <div class="row gy-5 mb-3 mb-md-5">
        <div class="col-12 col-lg-9">
          <h2 class="display-6 fw-bold mb-4">Производство манжет</h2>
          <p>Собственные производственные мощности, широкий выбор материалов и гибкость в перенастройке оборудования дают возможность производить уплотнения любой сложности.</p>
          <p>В процессе изготовления уплотнительных элементов применяется большой ассортимент материалов, например, таких как полиуретан (PU), маслобензостойкая резина (NBR), тефлон (PTFE), фторный каучук (FPM), синтетические эластомеры и иные материалы.</p>
          <div class="row row-cols-md-2 gy-md-5 mt-4">
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Универсальность</h3>
              <p>Выпускаем РТИ для различных видов спецтехники – сельскохозяйственной, коммунальной, дорожно-строительной, погрузочной, промышленного оборудования и др</p>
            </div>
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Европейские материалы</h3>
              <p>Высококачественные  полуфабрикаты для производства уплотнений из Австрии – тубы из полиуретана HPU, CHPU, резины NBR, HNBR, FPM, EPDM, PTFE, POM и др</p>
            </div>
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Скорость изготовления</h3>
              <p>Выточим манжету за 30 минут по Вашему образцу или чертежу</p>
            </div>
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Индивидуально</h3>
              <p>Минимальный объем заказа - 1 шт.</p>
            </div>
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Высокая точность</h3>
              <p>Точность обработки поверхностей выточенных манжет до 0,01 мм</p>
            </div>
            <div class="col-md-6 feature-card">
              <h3 class="fw-bold">Доставка</h3>
              <p>Удобная доставка транспортной компанией по Караганде и Казахстану</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-cols-md-4 g-2 g-sm-4">
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/1.png" alt="Грязесъемники">
              <div class="card-body">
                <h4 class="card-title text-center">Грязесъемники</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/2.png" alt="Уплотнения штока">
              <div class="card-body">
                <h4 class="card-title text-center">Уплотнения штока</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/3.png" alt="Уплотнения поршня">
              <div class="card-body">
                <h4 class="card-title text-center">Уплотнения поршня</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/oporn.webp" alt="Опорные кольца">
              <div class="card-body">
                <h4 class="card-title text-center">Опорные кольца</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/5.png" alt="Плоские уплотнения">
              <div class="card-body">
                <h4 class="card-title text-center">Плоские уплотнения</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/6.png" alt="Защитные кольца">
              <div class="card-body">
                <h4 class="card-title text-center">Защитные кольца</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/7.png" alt="Направляющие кольца">
              <div class="card-body">
                <h4 class="card-title text-center">Направляющие кольца</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3">
          <a href="#" class="card-production">
            <div class="card">
              <img class="card-img-top" src="assets/front/img/production/8.png" alt="Роторные уплотнения">
              <div class="card-body">
                <h4 class="card-title text-center">Роторные уплотнения</h4>
              </div>
            </div>
          </a>
        </div>
        <a href="#">Перейти к разделу</a>
      </div>
    </section>

    <section class="container-fluid mb-3 mb-sm-5 our-benefits py-4 p-sm-4">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <h2 class="display-6 fw-bold mb-5">Преимущества нашего производства</h2>
          </div>
        </div>
        <div class="row text-center g-4 justify-content-center align-items-start">
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Изготовим за 30 минут</h3>
            <span class="icon icon-fw-30" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Европейское качество</h3>
            <span class="icon icon-thumbs-up" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Точность размеров до 0,01 мм</h3>
            <span class="icon icon-tools-alt" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Производство от 1 уплотнения</h3>
            <span class="icon icon-tool-kit" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Доставка по регионам</h3>
            <span class="icon icon-delivery-truck" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1">Опытные специалисты</h3>
            <span class="icon icon-education" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </section>

    <section class="container mb-3 mb-sm-5 repair">
      <div class="row">
        <div class="col-lg-9">
          <h2 class="display-6 fw-bold mb-4">Ремонт</h2>
          <p class="mb-4">Некачественные, либо несвоевременные диагностика, ремонт оборудования и его обслуживание – главные причины аварий с тяжелыми последствиями. Наша компания осуществляет квалифицированный ремонт вашего оборудования</p>
        </div>
      </div>
      <div class="row g-2 g-sm-4">
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/repair/001-265x265.jpg" alt="Изготовление РВД и шлангов">
            <div class="overlay overlay-1">
              <a href="#"><h3>Изготовление РВД и шлангов</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/repair/002-265x265.png" alt="Ремонт гидроцилиндров и пневмоцилиндров">
            <div class="overlay overlay-1">
              <a href="#"><h3>Ремонт гидроцилиндров и пневмоцилиндров</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/repair/003-265x265.png" alt="Ремонт и производство маслостанций">
            <div class="overlay overlay-1">
              <a href="#"><h3>Ремонт и производство маслостанций</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/repair/004-265x265.png" alt="Ремонт гидронасосов и моторов">
            <div class="overlay overlay-1">
              <a href="#"><h3>Ремонт гидронасосов и моторов</h3></a>
            </div>
          </div>
        </div>
        <a href="#">Перейти к разделу</a>
      </div>
    </section>

    <section class="container spare-parts mb-3 mb-sm-5">
        <h2 class="display-6 fw-bold mb-4">Ремкомплекты уплотнений</h2>
        <p>Предлагаем ремкомплекты для гидроцилиндров на импортную технику. Все ремкомплекты  сформированы на основании технической документации и долгосрочного сотрудничества с техническими службами заводов изготовителей гидроцилиндров и спецтехники и являются полными оригиналами или аналогами со 100% заменяемостью</p>
        <div class="row g-2 gx-md-4 gy-md-4">
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/John-Deer.svg" alt="John Deer logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">John Deer</h4>
                <p class="card-text">США</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Claas.svg" alt="CLAAS logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">CLAAS</h4>
                <p class="card-text">Германия</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Komatsu.svg" alt="Komatsu logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Komatsu</h4>
                <p class="card-text">Япония</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Sandvik.svg" alt="Sandvik logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Sandvik</h4>
                <p class="card-text">Швеция</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/JCB.svg" alt="JCB logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">JCB</h4>
                <p class="card-text">Великобритания</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/CAT.svg" alt="Caterpillar logo">
              </div>
              <div class="card-body p-0 py-3 text-center py-0">
                <h4 class="card-title fw-bold">Caterpillar</h4>
                <p class="card-text">США</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Epiroc.svg" alt="Epiroc logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Epiroc</h4>
                <p class="card-text">Швеция</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Hitachi.svg" alt="Hitachi logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Hitachi</h4>
                <p class="card-text">Япония</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Volvo.svg" alt="Volvo logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Volvo</h4>
                <p class="card-text">Швеция</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Fuchs.svg" alt="Fuchs logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Fuchs</h4>
                <p class="card-text">Германия</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Liebherr.svg" alt="Liebherr logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Liebherr</h4>
                <p class="card-text">Германия</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card card-brand card-wrapper">
              <div class="card-img-wrapper">
                <img class="card-img-top p-3" src="assets/front/img/logos/Terex.svg" alt="Terex logo">
              </div>
              <div class="card-body p-0 py-3 text-center">
                <h4 class="card-title fw-bold">Terex</h4>
                <p class="card-text">Германия</p>
              </div>
              <div class="overlayed overlayed_4">
                <a href="#" class="btn btn-outline-light">Подробнее</a>
              </div>
            </div>
          </div>
          <a href="#">Перейти к разделу</a>
        </div>
    </section>

    <section class="container-fluid mb-3 mb-sm-5 cta-section py-4 p-sm-4">
      <div class="container">
        <div class="row mb-4">
          <div class="col">
            <h2 class="display-6 fw-bold mb-4">Ждем звонка!</h2>
            <p>Наш менеджер ответит Вам на любой вопрос. Вы всегда можете связаться с нами любым удобным для Вас способом.</p>
          </div>
        </div>
        <div class="row justify-content-center g-4 mb-4 text-center text-md-start">
          <div class="col-6 col-lg-3">
            <div class="card icon-card">
              <div class="row align-items-center gy-3">
                <div class="col-md-3 align-self-center">
                  <a href="tel:+77764407004" class="phone-link"><span class="icon icon-phone-out" aria-hidden="true"></span></a>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="card-title fw-bold">Звонок</h5>
                    <a href="tel:+77764407004" class="phone-link">+7 (776) 440-70-04</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card icon-card">
              <div class="row align-items-center gy-3">
                <div class="col-md-3 align-self-center">
                  <a href="tel:+7076026021" class="phone-link"><span class="icon icon-phone-out" aria-hidden="true"></span></a>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="card-title fw-bold">Звонок</h5>
                    <a href="tel:+7076026021" class="phone-link">+7 (707) 602-60-21</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card icon-card">
              <div class="row align-items-center gy-3">
                <div class="col-md-3 align-self-center">
                  <a href="mailto:sealmasterkz@gmail.com"><span class="icon icon-mail" aria-hidden="true"></span></a>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <h5 class="card-title fw-bold">Email</h5>
                    <a href="mailto:sealmasterkz@gmail.com" class="phone-link">sealmasterkz@gmail.com</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card icon-card">
              <div class="row align-items-center gy-3">
                <div class="col-md-3 align-self-center">
                  <a class="phone-link" href="https://wa.me/77764407004?text=Здравствуйте%2C+у+меня+есть+вопрос" target="_blank"><span class="icon icon-wa" aria-hidden="true"></span></a>
                </div>
                <div class="col-md-9">
                  <div class="card-body p-0">
                    <a class="phone-link" href="https://wa.me/77764407004?text=Здравствуйте%2C+у+меня+есть+вопрос" target="_blank"><h5 class="card-title fw-bold">WhatsApp</h5></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container goods mb-3 mb-sm-5">
      <div class="row">
        <div class="col-lg-9">
          <h2 class="display-6 fw-bold mb-4">Товары</h2>
          <p>Мы являемся официальным представителем фирмы Кastas (Турция) в странах Средней Азии. В наличии склад с широким ассортиментом качественной готовой продукции: все виды уплотнительных элементов на пневматические и гидравлические цилиндры</p>
        </div>
      </div>
      <div class="row gy-2 gy-sm-4">
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/goods/001-265x265.png" alt="Уплотнения Kastas">
            <div class="overlay overlay-1">
              <a href="#"><h3>Уплотнения Kastas</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/goods/002-265x265.jpg" alt="Гидрокомпоненты">
            <div class="overlay overlay-1">
              <a href="#"><h3>Гидрокомпоненты</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/goods/003-265x265.png" alt="Пневмокомпоненты">
            <div class="overlay overlay-1">
              <a href="#"><h3>Пневмокомпоненты</h3></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="good-card rounded">
            <img src="assets/front/img/goods/004-265x265.png" alt="Металлорукава и металлические трубки">
            <div class="overlay overlay-1">
              <a href="#"><h3>Металлорукава и металлические трубки</h3></a>
            </div>
          </div>
        </div>
        <a href="#">Перейти к разделу</a>
      </div>
    </section>

    <section class="container-fluid about mb-3 mb-sm-5 text-white">
      <div class="container">
        <div class="row row-about py-5">
          <div class="col-lg-7">
            <h2 class="display-5 fw-bold mb-4">Компания <span class="text-uppercase">"Cилмастер"</span></h2>

            <p class="mb-lg-5">
              Компания ТОО «СИЛМАСТЕР», объединившая ведущих специалистов в области гидравлики, создана для решения следующих задач:
            </p>
            <ul class="mb-lg-5">
              <li>Обеспечение рынка Центрального Казахстана качественными уплотнительными элементами;</li>
              <li>Оперативное производство манжет и уплотнений в кратчайшие сроки;</li>
              <li>Качественный ремонт гидравлического и пневматического оборудования.</li>
            </ul>
            <p>
              Поставщиком готовых уплотнений выбрана известная фирма KASTAS - один из крупнейших производителей уплотнений в мире.
            </p>
            <p>
              Для изготовления нестандартных манжет или колец методом точения, приобретен станок ЧПУ фирмы DMH (Австрия) - мирового лидера в области производства станков ЧПУ и материалов для изготовления уплотнений.
            </p>
            <p>
              Качественный ремонт оборудования обеспечивается опытными сотрудниками; используются специализированные гидравлические стенды - по разбору и сбору гидроцилиндров, по проверке гидронасосов и гидромоторов, по проверке гидрораспределителей.
            </p>
            <p>
              Оперативно поставляем Заказчикам запасные части на импортное оборудование по каталожным номерам, различные гидрокомпоненты – насосы, гидромоторы, распределители, клапаны и т.д.
            </p>
            <p>
              Решаем проблемы наших Заказчиков в области ремонта гидравлического и пневматического оборудования, работаем без выходных, всегда готовы подсказать и проконсультировать наших Покупателей по интересующим их вопросам!
            </p>

            <a href="#" class="btn btn-outline-primary px-5 mb-4">Подробнее</a>
          </div>
          <div class="col-lg-5">
            <div class="row gy-lg-5">
              <div class="col-6 col-lg-12 img-about-wrapper">
                <img src="assets/front/img/about/001-467x265.jpg" alt="" class="img-fluid left-offset">
              </div>
              <div class="col-6 col-lg-12 img-about-wrapper">
                <img src="assets/front/img/about/002-467x265.jpg" alt="" class="img-fluid right-offset">
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="container-fluid mb-3 mb-sm-5 our-benefits-1 py-4 p-sm-4">
      <div class="container">

        <div class="row text-center">
          <div class="col">
            <h2 class="display-6 fw-bold mb-4">6 причин для сотрудничества</h2>
          </div>
        </div>
        <div class="row text-center g-4 justify-content-center align-items-start">

          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">24/7</h3>
            <p class="order-1">Работаем без выходных</p>
            <span class="icon icon-fw-30" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">30 мин</h3>
            <p class="order-1">Производство манжет</p>
            <span class="icon icon-time" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">Kastas</h3>
            <p class="order-1">Европейское качество в Караганде</p>
            <span class="icon icon-chart-ring" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">8740</h3>
            <p class="order-1">Уплотнений на складе</p>
            <span class="icon icon-data-sharing-group" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">25 мин</h3>
            <p class="order-1">На изготовление РВД (Uniflex)</p>
            <span class="icon icon-time" aria-hidden="true"></span>
          </div>
          <div class="col-6 col-md-3 col-lg-2 icon-benefit">
            <h3 class="order-1 fw-bold">2260 км</h3>
            <p class="order-1">Путь манжеты до г. Кульсары</p>
            <span class="icon icon-crossroads" aria-hidden="true"></span>
          </div>

        </div>
      </div>
    </section>

    <section class="container mb-3 mb-sm-5">
      <div class="row">
        <div class="col-lg-9">
          <h2 class="display-5 fw-bold">Сертификаты о партнерстве</h2>
          <p>Нашими заказчиками являются крупнейшие предприятия Казахстана, а также предприятия по ремонту и производству гидравлических систем. ТОО "СИЛМАСТЕР" осуществляет полный спектр работ, связанных с изготовлениеи манжет и уплотнительных элементов для гидравлического оборудования, а также ремонтом гидравлических систем.</p>
          <p>Благодаря партнерству, ТОО "СИЛМАСТЕР" гарантирует надежность и своевременность поставок, а также имеет возможность привлекать лучших специалистов, использовать новейшие технологии, оборудование и материалы и идти в ногу со временем.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="assets/front/img/certificates/dmh.png" alt="Сертфикат о партнерстве с австрийской фирмой DMH" class="img-fluid">
        </div>
        <div class="col-md-6">
          <img src="assets/front/img/certificates/kastas.png" alt="Сертфикат о партнерстве с турецкой фирмой Kastas" class="img-fluid">
        </div>
      </div>
    </section>

    <section class="container partners d-none d-md-block mb-3 mb-sm-5">
      <h2 class="display-6 fw-bold mb-4">Заказчики и партнеры</h2>
      <div class="row gy-4">

        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/ArcelorMittal.svg" alt="Arcelor Mittal logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Arcelor Mittal</h4>
              <p class="card-text">Люксембург</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/Kazakhmys_logo.svg" alt="Kazakhmys logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Kazakhmys</h4>
              <p class="card-text">Казахстан</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/KSP_Steel_Logo.svg" alt="KSP Steel logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">KSP Steel</h4>
              <p class="card-text">Казахстан</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/Sandvik.svg" alt="Sandvik logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Sandvik</h4>
              <p class="card-text">Швеция</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/Ken-Group.svg" alt="Ken Group logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Ken Group</h4>
              <p class="card-text">Казахстан</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/eumlogo.jpg" alt="Eurasian Machinery logo">
            </div>
            <div class="card-body p-0 text-center">
              <h4 class="card-title fw-bold">Eurasian Machinery</h4>
              <p class="card-text">Казахстан</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/dmh.png" alt="DMH logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">DMH</h4>
              <p class="card-text">Австрия</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/kastas.png" alt="Kastas logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Kastas</h4>
              <p class="card-text">Турция</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/uniflex.png" alt="Uniflex logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Uniflex</h4>
              <p class="card-text">Германия</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/barboflex.svg" alt="Barboflex logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Barboflex</h4>
              <p class="card-text">Португалия</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/Festo_logo.svg" alt="Festo logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">Festo</h4>
              <p class="card-text">Германия</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-2">
          <div class="card card-brand">
            <div class="card-img-wrapper">
              <img class="card-img-top p-3" src="assets/front/img/logos/aso.png" alt="ASO logo">
            </div>
            <div class="card-body p-0 py-3 text-center">
              <h4 class="card-title fw-bold">ASO</h4>
              <p class="card-text">Италия</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="container blog mb-4 mb-sm-5">
      <h2 class="display-6 fw-bold mb-4">Блог</h2>
      @include('front.layouts.chunks.popular-posts')
      <a href="{{ route('blog.index') }}">Все записи</a>
    </section>

    <section class="container faq mb-3 mb-sm-5" itemscope itemtype="https://schema.org/FAQPage">
      <div class="row">
        <div class="col-md-6">
          <h2 class="display-6 fw-bold mb-4">Ваши вопросы</h2>
          <div class="accordion accordion-flush" id="accordionFaq">

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingOne" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" itemprop="name">
                  Как мне удостовериться в том, что у вас качественная продукция?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  Мы сотрудничаем с мировыми лидерами в области производства уплотнительных элементов. В секторе готовой продукции <strong>мы используем уплотнения фирмы KASTAS.</strong> В секторе производства уплотнительных элементов мы используем <strong>австрийские полуфабрикаты DMH</strong>, изготавливаем уплотнения из них на высокоточном ЧПУ станке DMH (Австрия).
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingTwo" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" itemprop="name">
                  Как быстро вы комплектуете манжеты и уплотнения под заказ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  <strong>Время определения вида и размеров уплотнительных элементов в цилиндре</strong>, при наличии образцов манжет или раitemprop="text"зобранного цилиндра в среднем <strong>составляет 15-20 минут.</strong> Если все уплотнения  стандартные и ничего не нужно точить, то на комплектацию уплотнений тратится  примерно 20 мин. Если необходимо что-то изготавливать на станке ЧПУ DMH   то время комплектации увеличивается в зависимости от многих факторов – наличия подходящих туб на складе, вида уплотнения, необходимого  количества манжет и т.д.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingThree" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" itemprop="name">
                  Можно ли привезти к вам на ремонт гидроцилиндр в сборе?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  Привозите гидроцилиндр в сборе. <strong>Наши опытные специалисты разберут цилиндр, выполнят дефектовку, определят общую стоимость работ.</strong> После согласования всех работ и их стоимости с Вами, мы выполним ремонт гироцилиндра. В стоимость входит работа по разбору и сбору гидроцилиндра, ремкомплект уплотнений. Если на Вашем цилиндре имеются повреждения штока, поршня, корпуса или других частей цилиндра – мы Вам сообщим и после согласования с Вами отремонтируем гидроцилиндр.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingFour" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" itemprop="name">
                  У меня экскаватор-погрузчик САТ428, дюймовые размеры штока и корпуса цилиндра. Вы изготавливаете манжеты дюймового размера?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  <strong>Да, мы комплектуем ремкомплект манжет уплотнений для дюймовых размеров гидроцилиндра.</strong> У нас есть как готовые уплотнения, так и возможность выточить уплотнительные элементы на дюймовые размеры.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingFive" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" itemprop="name">
                  У меня пневмоцилиндр стоит на оборудовании по стыковке оконных профилей, возможно ли найти уплотнения на мой пневмоцилиндр?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  <strong>На нашем складе имеется огромное количество уплотнений на пневматические цилиндры.</strong> Отправьте пожалуйстаста фото размеров Ваших уплотнений, мы подберем подходящие манжеты.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingSix" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" itemprop="name">
                  Нам необходимо изготовить уплотнительное кольцо из пищевой резины, есть ли у вас такие материалы?
                </button>
              </h2>
              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="faqHeadingSix" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  Да, у нас есть в наличии полуфабрикаты для производства уплотнений, которые применяются в пищевой промышленности.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingSeven" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" itemprop="name">
                  У меня вышли из строя уплотнения цилиндра сцепления, в этом цилиндре используется тормозная жидкость, можно ли изготовить такие уплотнения?
                </button>
              </h2>
              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="faqHeadingSeven" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  Да у нас есть такой материал - <strong>EPDM</strong>, который работает с тормозными жидкостями на основе гликоля. Пожалуйста, обращайтесь, мы изготовим уплотнение.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingEight" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight" itemprop="name">
                  У меня промышленный домкрат на 100 тонн, в нем утечки масла. Используется маслостанция для этого домкрата давлением до 700 бар. Ремонтируете ли вы такие домкраты?
                </button>
              </h2>
              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="faqHeadingEight" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  <strong>У нас есть опыт в ремонте таких домкратов.</strong> В наличии полуфабрикаты для производства уплотнений, работающих при давлении до 700 бар. Привозите свой домкрат, мы отремонтируем его.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingTwelve" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve" itemprop="name">
                  У меня экскаватор САТ336, хотел бы заменить уплотнения на цилиндре рукояти. Можно ли по каталожному номеру получить от вас ремкомплект?
                </button>
              </h2>
              <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwelve" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  По каталожному номеру САТ мы подберем уплотнения, А если Вы хотите получить ремкомплект именно САТ, мы привезем его под заказ в течение 14 дней.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingFourteen" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen" itemprop="name">
                  Я нахожусь далеко от Караганды, у меня есть только  фото уплотнения, можно ли по фото подобрать аналог?
                </button>
              </h2>
              <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="faqHeadingFourteen" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  Если на фото указаны названия и размеры уплотнения, подобрать можно, особенно если Вы ищите воротниковую манжету, либо пыльник (грязесъемник). По другим манжетам требуются дополнительные данные – размеры по металлу посадочных мест уплотнений.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faqHeadingFifteen" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen" itemprop="name">
                  Я живу в г. Уральск. Как я могу получить манжету, есть ли доставка?
                </button>
              </h2>
              <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="faqHeadingFifteen" data-bs-parent="#accordionFaq" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="accordion-body" itemprop="text">
                  <strong>Мы работаем со всеми регионами РК</strong>, в том числе и с заказчиками из г. Уральск. После уточнения параметров уплотнения и оплаты, которую Вы можете произвести перечислением на наш счет либо переводом по банковскому приложению, мы отправим нашу продукцию. Способ отправки выбирает Заказчик – это может быть курьерская компания (обычно срок доставки варьируется от трех до семи рабочих дней), либо через приложения Indrive (Indriver), Яндекс и т.д. – гораздо быстрее, но дороже.
                </div>
              </div>
            </div>

          </div>
          <a href="#">Перейти к разделу</a>
        </div>

        <div class="d-none d-md-flex col-md-6">
         <!-- Gallery -->
          <div class="row align-content-start">
            <!-- <h3 class="section-heading">Наши будни</h3> -->
            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                src="assets/front/img/gallery/002-w160.jpg"
                class="w-100 rounded mb-4"
                alt="Boat on Calm Water"
                />
                <figcaption class="blockquote-footer">MDN Logo</figcaption>
              </figure>

              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/001-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Wintry Mountain Landscape"
                />
                <figcaption class="blockquote-footer">Ремонт гидромолота</figcaption>
              </figure>
            </div>

            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/003-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Mountains in the Clouds"
                />
                <figcaption class="blockquote-footer">Ремонт гидроцилиндра</figcaption>
              </figure>
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/004-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Boat on Calm Water"
                />
                <figcaption class="blockquote-footer">Ремонт гидроцилиндра</figcaption>
              </figure>
            </div>

            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/005-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Waves at Sea"
                />
                <figcaption class="blockquote-footer">Описание</figcaption>
              </figure>
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/001-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Yosemite National Park"
                />
                <figcaption class="blockquote-footer">Описание</figcaption>
              </figure>
            </div>

            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                src="assets/front/img/gallery/002-w160.jpg"
                class="w-100 rounded mb-4"
                alt="Boat on Calm Water"
                />
                <figcaption class="blockquote-footer">MDN Logo</figcaption>
              </figure>

              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/001-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Wintry Mountain Landscape"
                />
                <figcaption class="blockquote-footer">Ремонт гидромолота</figcaption>
              </figure>
            </div>

            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/003-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Mountains in the Clouds"
                />
                <figcaption class="blockquote-footer">Ремонт гидроцилиндра</figcaption>
              </figure>
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/004-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Boat on Calm Water"
                />
                <figcaption class="blockquote-footer">Ремонт гидроцилиндра</figcaption>
              </figure>
            </div>

            <div class="col-md-6 col-lg-4 mb-lg-0">
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/005-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Waves at Sea"
                />
                <figcaption class="blockquote-footer">Описание</figcaption>
              </figure>
              <figure class="text-end">
                <img
                  src="assets/front/img/gallery/001-w160.jpg"
                  class="w-100 rounded mb-4"
                  alt="Yosemite National Park"
                />
                <figcaption class="blockquote-footer">Описание</figcaption>
              </figure>
            </div>
          </div>
          <!-- Gallery -->
        </div>
      </div>
    </section>

    <section class="container testimonials mb-4 mb-sm-5">
      <div class="row">
        <h2 class="display-6 fw-bold mb-4">Отзывы</h2>

        <div class="row">
          <div class="col-12">
            <p>Вы уже наш клиент? Оставьте свой отзыв, нам очень важно Ваше мнение о нас!</p>
            <p>
              <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#shotTestimonialForm" aria-expanded="false" aria-controls="shotTestimonialForm">
                Оставить отзыв
              </a>
            </p>
            <div class="collapse" id="shotTestimonialForm">
              <div class="col-md-6">
                <form action="#">
                  <div class="mb-3">
                    <label for="setTestimonialName" class="form-label">Ваше имя*</label>
                    <input type="text"
                      class="form-control" name="setTestimonialName" id="setTestimonialName" aria-describedby="setTestimonialNameHelpId" placeholder="Ринат" required>
                    <small id="setTestimonialNameHelpId" class="form-text text-muted d-none"></small>
                  </div>

                  <div class="mb-3">
                    <label for="setTestimonialPhoto" class="form-label">Добавить фото</label>
                    <input type="file" class="form-control" name="setTestimonialPhoto" id="setTestimonialPhoto" placeholder="Добавить фото" aria-describedby="setTestimonialFileHelpId">
                    <div id="setTestimonialFileHelpId" class="form-text">Выберите изображение любого поддерживаемого формата</div>
                  </div>

                  <div class="mb-1">
                    <label for="setTestimonialText" class="form-label">Текст отзыва*</label>
                    <textarea class="form-control" name="setTestimonialText" id="setTestimonialText" rows="3" required></textarea>
                  </div>

                  <div class="mb-3">
                    <small class="form-text text-muted">Поля, помеченные звездочкой (*) нужно обязательно заполнить</small>
                  </div>

                  <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Отправить</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div id="testimonialsCarousel" class="carousel carousel-dark slide carousel-testimonials" data-bs-ride="false">

            <div id="testimonialsList" class="carousel-inner" role="listbox">


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
              </button>
          </div>
        </div>
      </div>
    </section>
@endsection

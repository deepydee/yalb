
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ТОО СИЛМАСТЕР | Регистрация</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('assets/admin/img/logo.png') }}" alt="Логотип ТОО СИЛМАСТЕР">
                  <span class="d-none d-lg-block">ТОО "СИЛМАСТЕР"</span>
                </a>
              </div><!-- End Logo -->


                <div class="row">
                    <h1>Подтвердите Email</h1>

                    <div class="col-12">
                        @isset($message)
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endisset
                    </div>

                    <div class="col-12">
                        <form class="d-flex justify-content-center mb-4" action="{{ route('verification.send') }}" method="post">
                        @csrf
                            <input class="btn btn-outline-primary" type="submit" value="Отправить ссылку повторно">
                        </form>
                    </div>
                </div>

              <div class="credits">
                &copy; {{ date('Y') }} ТОО <strong><span>СИЛМАСТЕР</span></strong>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/admin/js/admin.js') }}"></script>

</body>

</html>

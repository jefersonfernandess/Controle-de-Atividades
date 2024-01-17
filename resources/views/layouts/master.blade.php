<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    <!--BOOTSTRAP CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--FA FA ICONS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--IZITOAST CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&family=Montserrat&family=Roboto:wght@100;300;400&display=swap');

        nav {
            font-family: 'Kanit', sans-serif;
            font-size: 1.2rem;
            background-color: #fb8351;
        }

        .nav-item {
            font-family: 'Montserrat', sans-serif;
        }

        .colorTextWhite {
            color: white !important;
        }

        .card>a:hover {
            border-bottom: 1px solid #000000;
        }
    </style>
</head>

<body>
    <!--BOOTSTRP JS CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--CKEDITOR JS CDN-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/e1bfb12b2a.js" crossorigin="anonymous"></script>

    <!--JQUERY JS CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--IZITOAST JS CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.warning({
                    title: 'Atenção!',
                    position: 'bottomRight',
                    message: '{{ $error }}'
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: 'Sucesso!',
                position: 'bottomRight',
                message: '{{ session()->get('success') }}'
            });
        </script>
    @endif

    @if (session()->get('fails'))
        <script>
            iziToast.error({
                title: 'Falha!',
                position: 'bottomLeft',
                message: '{{ session()->get('fails') }}'
            });
        </script>
    @endif
    @yield('content')

</body>

</html>

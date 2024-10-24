<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>App Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    @yield('css')
</head>

<body>
    <h2 class="uk-text-center">App Karyawan</h2>
    <div class="uk-container">
        @yield('body')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        const csrf = $('meta[name="csrf-token"]').attr('content');
        console.log(csrf);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            }
        });
    </script>
    @yield('js')
</body>

</html>

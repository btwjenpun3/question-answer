<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/x-icon" href="/img/fav.ico">
    <title>Kindy Care - Tanya Jawab</title>
    <!-- CSS files -->
    <link href="/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @livewireStyles
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="page">

        <!-- Navbar -->
        @include('partials.navbar')

        <div class="page-wrapper">

            <!-- Page header -->
            @yield('header')

            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">

                    @yield('content')

                </div>
            </div>

            <!-- Footer -->
            @include('partials.footer')
        </div>
    </div>
    @livewireScripts
    <!-- Tabler Core -->
    <script src="/js/tabler.min.js?1684106062" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/fab3mq5ub6hfyipj1a2mykqusq77k1yj0wz0zyiglx54gnd4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
</body>

</html>

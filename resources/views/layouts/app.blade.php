<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head', ['pageTitle' => $pageTitle, 'metaTitle' => $metaTitle])

<body>

    <div>
        @include('partials.menu')
    </div>

    <div>
        @yield('content')
    </div>
    @include('partials.script')
</body>

</html>

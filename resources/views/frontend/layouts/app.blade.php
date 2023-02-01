@php
    $categories = App\Models\Category::all();
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="bn">

    {{-- Header  --}}
    @include('frontend.partials.header')

<body class="common-home">
    <div class="toastr-div">
    </div>
    @yield('page_conent')

    {{-- Header  --}}
    @include('frontend.partials.footer')


@stack('js')

</body>

</html>

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



    {{-- ================================================================================================
        =============================================  javascript  global function ========================
        =================================================================================================  --}}
    <script>
        // ========================Language conversation
        var bn2en = n => n.replace(/[০-৯]/g, d => "০১২৩৪৫৬৭৮৯".indexOf(d));
        var en2bn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯" [d]);


        //  ===================Toaster object
        var toastr = {
            count: 0,
            toaster_append(msg, class_name) {
                $('.toastr-div').append(`<div class="toastr ${class_name} mt-2">
                                                    <span class="toaster-msg">${msg}</span>
                                                </div>`);
            },
            success(msg) {
                let class_name = 'toastr' + this.count;
                this.toaster_append(msg, class_name);

                $('.' + class_name).fadeIn(1000);
                setTimeout(() => {
                    $('.' + class_name).fadeOut(1000);
                }, 2500);
                this.count++;
            },
            error(msg) {
                let class_name = 'toastr' + this.count;
                this.toaster_append(msg, class_name);

                $('.' + class_name).css({
                    backgroundColor: 'red'
                });
                $('.' + class_name).fadeIn(1000);
                setTimeout(() => {
                    $('.' + class_name).fadeOut(1000);
                }, 2500);
                this.count++;
            }
        }
        // ===================End Toaster object


    </script>

    @stack('custom-js')
</body>

</html>

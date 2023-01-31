@php
    $categories = App\Models\Category::all();
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="bn">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $site_info->title ?? 'E-WEB - SECURITY FAST' }} </title>
    <base />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ $site_info->logo }}" rel="icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @stack('custom-css')

<meta name="facebook-domain-verification" content="t9icvcr865mfrcw30zt52aaegmi5ay" />


</head>


<body class="common-home">
    <div class="toastr-div">
    </div>
    @yield('page_conent')

    <footer class="footer">
        <footer class="wrapper-container">
            <div class="footer-content d-flex flex-wrap">
                <div class="footer-widget footer-contact-info">
                    <h4 class="title">Contact Us</h4>

                        <ul class="contact_footer">
                            <li><i class="fa fa-phone"></i><a href="tel:{{ $site_contact_info->phone }}">{{ $site_contact_info->phone }}</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:{{ $site_contact_info->email }}">{{ $site_contact_info->email }}</a></li>
                        </ul>
                </div>
                <div class="footer-widget">
                    <h4 class="title">Customer Care</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping &amp; Delivery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h4 class="title">Company Information</h4>
                    <ul>
                        <li><a href="#">Refund and Return Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Cashback Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="copy-right">
                    <p class="m-0">All Rights Reserved <strong>{{ ucfirst($site_info->name)  }}</strong> | Designed And developed by <strong>Security First</strong> | Powdered by <strong>Business Mind Academy</strong></p>
                </div>
            </div>
        </div>
    </footer>
</footer>

    <div class="overlay"></div>
    <div class="footer-bottom-bar">
        <div class="bottom-bar d-flex flex-wrap justify-content-around">
            <a href="#" class="bottom-item offer">
                <div class="bottom-item-icon">
                    <i class="fa fa-bookmark text-light" aria-hidden="true"></i>
                </div>
                <span class="text text-light">Offers</span>
            </a>
            {{-- href="https://m.me/babycare.bangladesh" --}}
            <a href="javascript::void(0)" class="bottom-item barnd">
                <div class="bottom-item-icon">
                    <i class="fa-brands fa-facebook-messenger text-light"></i>
                </div>
                <span class="text text-light">Messenger</span>
            </a>

        </div>
    </div>
    <div id="fb-root"></div>


    <div class="fb-customerchat" attribution=setup_tool page_id="377420772353763" theme_color="#005662">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
         <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    {{-- jquery  --}}
    <script>
        // Language conversation
        var bn2en = n => n.replace(/[০-৯]/g, d => "০১২৩৪৫৬৭৮৯".indexOf(d));
        var en2bn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯" [d]);
        //  Toaster object
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
        // End Toaster object
    </script>


    <script>
        var width = screen.width;
        if(width<767){
            $('#cart i').removeClass('shopping-cart');
        }
         if(width>767){
            $('#cart_mobile i').removeClass('shopping-cart');
        }

    </script>
    {{-- End jquery  --}}
    <script>
        //load  add to card product
        let count_mobile = document.querySelector('.count-mobile');
        let count = document.querySelectorAll('.count');
        let counts = document.querySelector('.count');
        if (localStorage.getItem('product_storage')) {
            let product_number = Object.keys(JSON.parse(localStorage.getItem('product_storage'))).length;
            count_mobile.innerText = product_number;
            counts.innerText = product_number + ' item(s)';
        }
        window.addEventListener('load', function() {
            // side navbar tigger
            let side_nav_tigger = document.querySelector('.menu-nav-bar');
            let check = false;
            side_nav_tigger.addEventListener('click', function() {
                let side_nav = document.getElementById('side_nav');
                if (check) {
                    side_nav.style.left = '-360px';
                    check = false;
                } else {
                    side_nav.style.left = '0';
                    check = true;
                }
            });

            //add to card
            let add_to_card_btn = document.querySelectorAll('.add-to-cart');

            add_to_card_btn.forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    let product_id = this.getAttribute('id');
                    let title = document.querySelector(`.title${product_id}`).textContent;
                    let img = document.querySelector(`.img${product_id}`).getAttribute('src');
                    let price = document.querySelector(`.price${product_id}`).textContent;
                    let dis_price = document.querySelector(`.dis-price${product_id}`).textContent;

                    if (localStorage.getItem('product_storage')) {
                        let product_storage = JSON.parse(localStorage.getItem('product_storage'));
                        if (product_storage[product_id]) {
                            toastr.error('This product already added to your card')
                        } else {
                            product_storage[product_id] = {
                                'title': title,
                                'img': img,
                                'price': price,
                                'dis_price': dis_price
                            };
                            localStorage.setItem('product_storage', JSON.stringify(
                                product_storage));
                            count.forEach(item => {
                                item.innerText = Object.keys(product_storage).length +
                                    ' item(s)';
                            })
                            count_mobile.innerText = Object.keys(product_storage).length;
                            // toastr.success('This product added to your card')
                            addToCartAnimation(item);
                        }
                    } else {
                        let product_storage = {};
                        product_storage[product_id] = {
                            'title': title,
                            'img': img,
                            'price': price,
                            'dis_price': dis_price
                        };
                        localStorage.setItem('product_storage', JSON.stringify(product_storage));
                        count.forEach(item => {
                            item.innerText = Object.keys(product_storage).length +
                                ' item(s)';
                        });
                        count_mobile.innerText = Object.keys(product_storage).length;
                        // toastr.success('This product added to your card')
                        addToCartAnimation(item);
                    }
                });
            });

        });

        // add to cart animation
        //(use only two class '.add-to-cart', '.shopping-cart' and find image )
        function addToCartAnimation(This){
            // $(This).on('click', function () {
                var cart = $('.shopping-cart');
                var imgtodrag = $(This).parent().parent().find("img");
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                        .css({
                        'opacity': '0.5',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                    })
                        .appendTo($('body'))
                        .animate({
                        'top': cart.offset().top + 10,
                            'left': cart.offset().left+0,
                            'width': 75,
                            'height': 75
                    }, 1000);

                    setTimeout(function () {
                        cart.effect("shake", {
                            times: 2
                        }, 200);
                    }, 1500);

                    imgclone.animate({
                        'width': 0,
                        'height': 0
                    }, function () {
                        $(this).detach()
                    });
                }
            // });
        }
         //End add to cart animation
    </script>

    @stack('custom-js')
</body>
</html>

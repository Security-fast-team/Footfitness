 <!--///////-footer-section-start-///////-->

 <div class="footer-section">
    <div class="container">
        <div class="flex-column">
            <div class="footer-widget footer-contact-info">
                <h4 class="title">Contact Us</h4>
                <ul class="contact_footer">
                    <li><i class="fa fa-phone"></i><a
                            href="tel:{{ $site_contact_info->phone }}">{{ $site_contact_info->phone }}</a></li>
                    <li><i class="fa fa-envelope"></i><a
                            href="mailto:{{ $site_contact_info->email }}">{{ $site_contact_info->email }}</a></li>
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

        </div>
    </div>
</div>
<div class="bottom-footer">
        <div class="container">
        <div class="copy-right">
            <p class="m-0">All Rights Reserved <strong>{{ ucfirst($site_info->name) }}</strong> | Designed
                And developed by <strong>Security First</strong> | Powdered by <strong>Business Mind
                    Academy</strong></p>
        </div>
     </div>
</div>

                    <!--///////-footer-section-end-///////-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

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

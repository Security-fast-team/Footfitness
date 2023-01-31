<footer class="footer">
    <footer class="wrapper-container">
        <div class="footer-content d-flex flex-wrap">
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
            <div class="copy-right">
                <p class="m-0">All Rights Reserved <strong>{{ ucfirst($site_info->name) }}</strong> | Designed
                    And developed by <strong>Security First</strong> | Powdered by <strong>Business Mind
                        Academy</strong></p>
            </div>
        </div>
        </div>
    </footer>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $company_infos->title ?? 'E-WEB - NOBIR HASAN'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

    input {
        caret-color: red;
    }

    body {
        margin: 0;
        width: 100vw;
        /* height: 100vh; */
        background: #ecf0f3;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        place-items: center;
        /* overflow: hidden; */
        font-family: poppins;
    }

    .container {
        position: relative;
        /* width: 350px;
    height: 500px; */
        margin-top: 40px;
        border-radius: 20px;
        padding: 10px 40px 20px 40px;
        box-sizing: border-box;
        background: #ecf0f3;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    }

    /* .brand-logo {
    height: 100px;
    width: 100px;
    background: url("https://img.icons8.com/color/100/000000/twitter--v2.png");
    margin: auto;
    border-radius: 50%;
    box-sizing: border-box;
    box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
    } */

    .company-details {
        margin-top: 10px;
        font-weight: 900;
        font-size: 1.8rem;
        color: #1DA1F2;
        letter-spacing: 1px;
    }

    .inputs {
        text-align: left;
        margin-top: 30px;
    }

    label,
    input,
    button {
        display: block;
        width: 100%;
        padding: 0;
        border: none;
        outline: none;
        box-sizing: border-box;
    }

    label {
        margin-bottom: 4px;
    }

    label:nth-of-type(2) {
        margin-top: 12px;
    }

    input::placeholder {
        color: gray;
    }

    input {
        background: #ecf0f3;
        padding: 10px;
        padding-left: 20px;
        height: 50px;
        font-size: 14px;
        border-radius: 50px;
        box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
    }

    button {
        color: white;
        margin-top: 20px;
        background: #1DA1F2;
        height: 40px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 900;
        box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
        transition: 0.5s;
    }

    button:hover {
        box-shadow: none;
    }

    a {
        position: absolute;
        font-size: 8px;
        bottom: 4px;
        right: 4px;
        text-decoration: none;
        color: black;
        background: yellow;
        border-radius: 10px;
        padding: 2px;
    }

    h1 {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>

<body>


    <div class="container">
        {{-- <div class="brand-logo"></div> --}}
        <div class="company-details">
            <h1>Company Details</h1>
        </div>
        <div class="step-div">
            <span id="step-1" class="step">1</span>
            <span id="step-2" class="step">2</span>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    <p>{{ $err }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('company-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $company_infos->id ?? '' }}">
            <input type="hidden" name="info_id" value="{{ $company_contact_infos->id ?? '' }}">
            <div class="inputs tab" id="tab-1">
                <h3>Company Information</h3>
                <label>Company Name
                    <input type="text" name="name" value="{{ $company_infos->name ?? old('name') }}"
                        placeholder="Inter your website name" />
                </label>

                <label>Company title
                    <input type="text" name="title" value="{{ $company_infos->title ?? old('title') }}"
                        placeholder="Inter your website title" />
                </label>

                <label>Company Logo
                    <input type="file" name="logo" value="{{ $company_infos->logo ?? old('logo') }}"
                        accept=".png,.jpg" placeholder="Inter your website logo" />
                </label>

                <label>Company Address
                    <input type="text" name="address" value="{{ $company_infos->address ?? old('address') }}"
                        placeholder="Inter your comanay Address" />
                </label>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button type="button" onclick="next(1)">Next</button>
                    </div>
                </div>
            </div>
            <div class="inputs tab" id="tab-2">
                <h3>Contact Information</h3>
                <label>Phone No.
                    <input type="tel" name="phone" value="{{ $company_contact_infos->phone ?? old('phone') }}"
                        placeholder="Inter your Mobile Number" />
                </label>

                <label>Whatsapp No.
                    <input type="tel" name="whatsapp"
                        value="{{ $company_contact_infos->whatsapp ?? old('whatsapp') }}"
                        placeholder="Inter your Whatsapp Number" />
                </label>

                <label>FB Page Link
                    <input type="url" name="facebook_page_link"
                        value="{{ $company_contact_infos->facebook_page_link ?? old('facebook_page_link') }}"
                        placeholder="Inter Your Facebook Page Link" />
                </label>

                <label>Youtube Link
                    <input type="url" name="facebook_group_link"
                        value="{{ $company_contact_infos->facebook_group_link ?? old('facebook_group_link') }}"
                        placeholder="Inter Your Facebook Group Link" />
                </label>
                    
                 <label>E-mail
                    <input type="email" name="email"
                        value="{{ $company_contact_infos->email ?? old('email') }}"
                        placeholder="Inter Your E-mail" />
                </label>
                
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <button type="button" onclick="previous(2)">previous</button>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- <a href="#">MADE BY Nobir</a> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".step").css('opacity', '.25');
            $("#step-1").css('opacity', '1');
            $("#tab-2").css('display', 'none');
        });

        function next(next) {
            // alert('next ok');
            var currentTab = next;
            var nextTab = next + 1;
            //switch tab
            $("#tab-" + currentTab).css("display", 'none');
            $("#tab-" + nextTab).css("display", 'block');

            // progess bar
            for (i = 1; i <= nextTab; i++) {
                $("#step-" + i).css('opacity', "1");
            }

        }

        function previous(tab) {
            // alert('next ok');
            var currentTab = tab;
            var previousTab = tab - 1;

            //switch tab
            $("#tab-" + currentTab).css("display", 'none');
            $("#tab-" + previousTab).css("display", 'block');

            // progess bar
            $("#step-" + currentTab).css('opacity', ".25");
        }
    </script>
</body>

</html>

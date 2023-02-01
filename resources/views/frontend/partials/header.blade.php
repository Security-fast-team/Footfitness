<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $site_info->title ?? 'E-WEB - SECURITY FAST' }} </title>
    <base />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ $site_info->logo }}" rel="icon" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stack('custom-css')
</head>

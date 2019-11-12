<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href={{asset("css/style/style.css")}}>
        <link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css")}} integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href={{asset("https://use.fontawesome.com/releases/v5.8.1/css/all.css")}} integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href={{asset("css/fontawesome-free-5.11.2-web/css/all.css")}} rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js")}} integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>{{isset($title)?$title:''}}</title>
        {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
        {{-- <!-- include jQuery -->--}}
        {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
        {{-- <!-- include jQuery UI -->--}}
        {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
</head>
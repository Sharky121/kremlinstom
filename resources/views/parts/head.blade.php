<head>
<meta name="yandex-verification" content="8fdff76fb85287b9" />
<meta name="yandex-verification" content="09c1ab3b337d7c7a" />
<meta name="google-site-verification" content="FPZ3yJUAiHZ41jndK6n4ddTsbFqnUhQz6BWI57t6ga8" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>{{ isset($title_seo)?$title_seo:'' }}</title>

    @if(isset($description_seo) && $description_seo !== '')
        <meta name="description" content="{{ $description_seo }}"/>
    @else
        <meta name="description" content="Современная зубная клиника Рязани «Кремлевская стоматология». Привлекательные цены и высококвалифицированный персонал. {{ isset($page->title)?$page->title:'' }}. Наш телефон: 8 (4912) 50-50-40"/>
    @endif

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="apple-touch-icon" href="/custom-icon.png">

    <meta name="keywords" content="{{ isset($keywords_seo)?$keywords_seo:'' }}"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/master/main.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125337794-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-125337794-1');
    </script>
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?159",t.onload=function(){VK.Retargeting.Init("VK-RTRG-309230-5l16z"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-309230-5l16z" style="position:fixed; left:-999px;" alt=""/></noscript>
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
</head>
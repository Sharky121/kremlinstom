<!DOCTYPE html>
<html lang="ru">
    @include('parts.head')
    <body class="grey">
        @include('parts.header')
        <div class="page-wrap">
            {{--<div class="container-fluid custom-center_padding">
                <div class="row">
                    <div class="col-lg-12">
                        @include('parts.header')
                    </div>
                </div>
            </div>--}}

            @include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])
            @yield ('content')
        </div>
        
        @include('parts.footer')
        @include('parts.mobile-menu')
        @include('parts.question-form')
        @include('parts.thank-you')
        @include('parts.js')

    </body>
</html>
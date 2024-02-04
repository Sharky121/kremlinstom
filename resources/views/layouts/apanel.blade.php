<!DOCTYPE html>
<html  ng-app="app" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Система администрирования</title>
    <link rel="stylesheet" type="text/css" href="apanel_source/css/animate.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/mdb_main.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/tree-control.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/tree-control-attribute.css">

    <link rel="stylesheet" type="text/css" href="apanel_source/css/toaster.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/angular-busy.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/ng-tree-dnd.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="apanel_source/css/admin.css">



</head>
<body ng-controller="mainCtrl">
<toaster-container></toaster-container>

    @yield('content')

    <!-- JavaScripts -->


<script src="apanel_source/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript">
        var token = $('meta[name="csrf-token"]').attr('content');
    </script>
    <script src="apanel_source/js/jquery-ui.js"></script>
    <script src="apanel_source/js/tether.min.js"></script>
    <script src="apanel_source/js/bootstrap.min.js"></script>

    <script src="apanel_source/js/mdb.min2.js"></script>

    <script src="apanel_source/js/jquery.scrollTo.min.js"></script>
    @if(Auth::check())
    <script src="apanel_source/js/angular.min.js"></script>
    <script src="apanel_source/libs/moment.min.js"></script>
    <script src="apanel_source/libs/ru.js"></script>
    <script src="apanel_source/libs/angular-route.1.5.0.js"></script>
    <script src="apanel_source/js/angular-ui.min.js"></script>

    <script src="apanel_source/libs/angular-route-segment.min.1.5.js"></script>
    <script src="apanel_source/libs/angular-locale_ru-ru.js"></script>
    <script src="apanel_source/libs/ng-table.min.js"></script>
    <script src="apanel_source/libs/angular-responsive-tables.js"></script>
    <script src="apanel_source/libs/angular-local-storage.js"></script>
    <script src="apanel_source/libs/angular-tree-control.js"></script>
    <script src="apanel_source/libs/formstamp.js"></script>
    <script src="apanel_source/libs/ng-flow-standalone.min.js"></script>

    <script src="apanel_source/libs/angular-animate.js"></script>
    <script src="apanel_source/libs/angular-busy.js"></script>
    <script src="apanel_source/libs/angular-sortable-view.min.js"></script>

    <script src="apanel_source/libs/toaster.js"></script>
    <script src="apanel_source/libs/angular-service-error-show.js"></script>
    <script src="apanel_source/libs/angular-sanitize.min.js"></script>



    <script src="apanel_source/libs/ng-tree-dnd.js"></script>
    <script src="apanel_source/libs/angular-file-upload.min.js"></script>
    <script src="apanel_source/libs/wysiwyg/ckeditor/ckeditor.js"></script>
    <script src="apanel_source/libs/wysiwyg/ckeditor/adapters/jquery.js"></script>
    <script src="apanel_source/js/ui-bootstrap-tpls-0.14.3.js"></script>
    <script src="apanel_source/libs/jquery.minicolors.js"></script>
    <script src="apanel_source/libs/angular-minicolors.js"></script>

    <script src="apanel_source/controller/mainCtrl.js"></script>
    <script src="apanel_source/js/app.js"></script>
    <script src="apanel_source/js/directive.js"></script>


<script src="apanel_source/controller/cpImagesUpload.js"></script>
<script src="apanel_source/controller/cpFileUpload.js"></script>
<script src="apanel_source/controller/directives_upload.js"></script>
@can('readModule',1){{-- страницы--}}
    <script src="apanel_source/controller/cpPagesList.js"></script>
    <script src="apanel_source/controller/cpPagesEdit.js"></script>
@endcan

@can('readModule',18){{-- пользователи--}}
    <script src="apanel_source/controller/cpUsersList.js"></script>
    <script src="apanel_source/controller/cpUsersEdit.js"></script>
@endcan

@can('readModule',4){{-- сотрудники--}}
    <script src="apanel_source/controller/cpWorkersList.js"></script>
    <script src="apanel_source/controller/cpWorkersEdit.js"></script>
    <script src="apanel_source/controller/cpExperiencesList.js"></script>
    <script src="apanel_source/controller/cpExperienceEdit.js"></script>
@endcan

@can('readModule',7){{-- услуги--}}
    <script src="apanel_source/controller/cpServicesList.js"></script>
    <script src="apanel_source/controller/cpServicesEdit.js"></script>
@endcan

    <script src="apanel_source/controller/cpReviewsList.js"></script>
    <script src="apanel_source/controller/cpReviewsEdit.js"></script>
    <script src="apanel_source/controller/cpQuestionsList.js"></script>


    <script src="apanel_source/controller/cpDefaultList.js"></script>
    <script src="apanel_source/controller/cpDefaultEdit.js"></script>

    <script src="apanel_source/controller/Prices.js"></script>


<script src="apanel_source/controller/cpCtrl.js"></script>

<script src="apanel_source/controller/test.js"></script>
<script src="apanel_source/controller/cpProfileEdit.js"></script>

<script src="apanel_source/js/main.js"></script>
    @endif
<script src="apanel_source/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<div class="clearfix"></div>
</body>
</html>

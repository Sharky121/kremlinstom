<header>

    <!--Navbar-->
    <nav class="navbar navbar-fixed-top navbar-dark primary-color-dark">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="/" target="_blank">Кремлёвская стоматология</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">|&nbsp;&nbsp;&nbsp;МЕНЮ</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a ng-repeat="mitem in menuTitles" class="dropdown-item" href="#/@{{mitem.url}}">@{{mitem.title}}</a>
                        </div>
                    </li>
                </ul>


                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item" >
                        <a href="#/profile" id="show_logout" class="nav-link" tooltip-placement="bottom" uib-tooltip="Личные данные">
                            <i class="fa fa-user"></i> <span>{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" id="show_logout" class="nav-link" tooltip-placement="bottom" uib-tooltip="Выход из панели управления">
                            <i class="fa fa-times-circle"></i><span> ВЫХОД</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->

</header>
<main class="h100">
    <div class="h100 container-fluid" >
        <div class="h100 row">
            <div app-view-segment="1" cg-busy="promise_segment1"  class="win_panel h100 ng-class:class_width ? class_width : 'col-md-4'">
            </div>
            <div ng-show="$routeSegment.chain[2]" app-view-segment="2" class="win_panel h100 ng-class:class_width ? class_width : 'col-md-4';">
            </div>
            <div ng-show="$routeSegment.chain[3]" app-view-segment="3" class="win_panel h100 ng-class:class_width ? class_width : 'col-md-4';">
            </div>
        </div>
    </div>
</main>

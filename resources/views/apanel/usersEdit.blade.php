
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.name?item.name:''}}</h1>
        <span win-control></span>
        <div class="control_content">
            <div quick-scroll ></div>
            <button ng-if="item" ng-disabled="!validFr()" class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>

            <div class="md-form">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="form9_title" class="form-control" ng-model="item.name">
                <label for="form9_title" ng-class="{active: item.name}" data-error="wrong" data-success="right">Имя</label>
            </div>

            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="form9_title" class="form-control validate" ng-model="item.email">
                <label for="form9_title" ng-class="{active: item.email}" data-error="Неверно" data-success="Верно">E-mail</label>
            </div>

            <h5>Смена пароля</h5>
            <br>
            <div class="md-form" ng-if="item">
                <i class="fa fa-lock prefix"></i>
                <input type="password" ng-change="pass_valid()" id="form9_title_pass" class="form-control" ng-class="{'valid':success.pass!='','invalid':errors.pass!=''}"  ng-model="item.pass">
                <label for="form9_title_pass" ng-class="{active: item.pass}" data-error="@{{errors.pass}}" data-success="@{{ success.pass }}">Новый пароль</label>
            </div>

            <div class="md-form" ng-if="item">
                <i class="fa fa-lock prefix"></i>
                <input type="password" ng-change="pass_valid()" id="form9_title_pass_rep" class="form-control" ng-model="item.pass_confirmation" ng-class="{'valid':success.pass_confirmation!='','invalid':errors.pass_confirmation!=''}">
                <label for="form9_title_pass_rep" ng-class="{active: item.pass_confirmation}" data-error="@{{errors.pass_confirmation}}" data-success="@{{ success.pass_confirmation }}">Новый пароль ещё раз</label>
            </div>

        </div>
        @can('readModule',18)
        <div class="card card-block">
            <h4 class="card-title">Доступ к модулям</h4>

            <div ng-if="modules" class="form-inline" ng-repeat="mod in modules" >
                <div class="md-form form-group col-md-3" style="padding-top: 11px;"><h5>@{{ mod['title'] }}</h5></div>
                <div class="md-form form-group">
                    <input @cannot('writeModule',18)  disabled @endcannot type="checkbox" ng-true-value="1" ng-false-value="0" id="check342read@{{ mod['url']+$index }}" ng-model="mod['pivot'].read">
                    <label for="check342read@{{ mod['url']+$index }}">Просмотр</label>
                </div>
                <div class="md-form form-group">
                    <input @cannot('writeModule',18) disabled @endcannot type="checkbox" ng-true-value="1" ng-false-value="0" id="check342write@{{ mod['url']+$index }}" ng-model="mod['pivot'].write">
                    <label for="check342write@{{ mod['url']+$index }}">Редактирование</label>
                </div>
                <div class="md-form form-group">
                    <input @cannot('writeModule',18) disabled @endcannot type="checkbox" ng-true-value="1" ng-false-value="0" id="check342delete@{{ mod['url']+$index }}" ng-model="mod['pivot'].delete">
                    <label for="check342delete@{{ mod['url']+$index }}">Удаление</label>
                </div>
                <hr>
            </div>
        </div>
        @endcan


    </div>
</div>

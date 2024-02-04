
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.title?item.title:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">
        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}" >Название</label>
            </div>
            <div class="md-form">
                <input type="text" id="address" class="form-control" ng-model="item.address">
                <label for="address" ng-class="{active: item.address}" >Адрес</label>
            </div>
            <div class="md-form">
                <input type="text" id="phone" class="form-control" ng-model="item.phone">
                <label for="phone" ng-class="{active: item.phone}" >Телефон</label>
            </div>
            <div class="md-form">
                <input type="text" id="grafik" class="form-control" ng-model="item.grafik">
                <label for="grafik" ng-class="{active: item.grafik}" >Время работы</label>
            </div>
            <div class="md-form">
                <input type="text" id="coords" class="form-control" ng-model="item.coords">
                <label for="coords" ng-class="{active: item.coords}" >Координаты на карте</label>
            </div>

        </div>
    </div>
</div>




<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.title?item.title:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <div quick-scroll ></div>
            <button ng-if="item" @cannot('writeModule',7) disabled @endcannot class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}" data-error="wrong" data-success="right">Заголовок</label>
            </div>

            <div class="md-form">
                <input type="text" id="form39price" class="form-control" ng-model="item.price">
                <label for="form39price" ng-class="{active: item.price}" data-error="wrong" data-success="right">Начальная цена</label>
            </div>
            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.price_max">
                <label for="form39" ng-class="{active: item.price_max}" data-error="wrong" data-success="right">Максимальная цена</label>
            </div>


        </div>

        <div class="card card-block">
            <h4 class="card-title">Описание</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>




    </div>
</div>

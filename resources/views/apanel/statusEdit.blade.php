
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.title?item.title:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <div quick-scroll ></div>
            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}" data-error="wrong" data-success="right">Название</label>
            </div>

            <div class="md-form">
                <input type="text" minicolors="customSettings" id="form9_color" class="form-control" ng-model="item.color">
                <label for="form9_color" ng-class="{active: item.color}" ></label>
            </div>

            {{--<div class="form-group">
                <label for="color-input" class="form-control">Color:</label>
                <input
                        minicolors="customSettings"
                        id="color-input"
                        class="form-control"
                        type="text"
                        ng-model="input.color">
            </div>--}}

        </div>



    </div>
</div>

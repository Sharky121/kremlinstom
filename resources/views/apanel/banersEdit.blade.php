
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.title?item.title:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">
        <input ng-if ="!item.type"  type="hidden" id="form9_type" class="form-control" ng-init="lk=='baners'?item.type=1:item.type=2" ng-model="item.type">
        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1public" ng-model="item.public">
                <label for="check342box1public">Публиковать</label>
            </div>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}">Заголовок</label>
            </div>
            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.link">
                <label for="form39" ng-class="{active: item.link}" data-error="wrong" data-success="right">Ссылка</label>
            </div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Фото</h4>
            <div ng-if="item.id" photos="item.pictures" card-class="col-md-3" obj-photos="item" url="/apanel/model/load-photo-baners/@{{ item.id }}">
            </div>
        </div>
        <div class="card card-block">
            <h4 class="card-title">Прайс</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>
    </div>
</div>

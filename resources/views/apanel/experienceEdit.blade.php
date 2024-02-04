
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.title?item.title:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <button ng-if="item" @cannot('writeModule',1) disabled @endcannot class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1public" ng-model="item.public">
                <label for="check342box1public">Публиковать</label>
            </div>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}" data-error="wrong" data-success="right">Заголовок</label>
            </div>

        </div>

        <div class="card card-block">
            <h4 class="card-title">Содержание</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>



        <div class="card card-block">
            <h4 class="card-title">Фото галерея</h4>
            <div ng-if="item.id" photos="item.pictures" photos-title="false" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo+item.id}}">
            </div>
        </div>
    </div>
</div>

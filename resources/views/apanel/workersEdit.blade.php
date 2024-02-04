
<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.name?item.name:'Элемент не выбран'}}</h1>
        <span win-control></span>
        <div class="control_content">
            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.name">
                <label for="form9_title" ng-class="{active: item.name}" data-error="wrong" data-success="right">Имя</label>
            </div>
            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.link">
                <label for="form39" ng-class="{active: item.link}" data-error="wrong" data-success="right">Ссылка</label>
            </div>
            <div class="md-form">
               <a href="{{ url('/').'/workers/' }}@{{ item.url }}" target="_blank">{{ url('/').'/workers/' }}@{{ item.url }}</a>
            </div>
            <div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1public" ng-model="item.public">
                <label for="check342box1public">Публиковать</label>
            </div>

            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.position">
                <label for="form39" ng-class="{active: item.position}" data-error="wrong" data-success="right">Должность</label>
            </div>

            <div cg-busy="promise_spec">
                <label for="form9selspec">Специализация</label>
                <select ng-if="spec"  id="form9selspec" ng-model="$parent.item.specializations" ng-options="mat as mat.title for mat in spec track by mat.id" class="mdb-select" multiple>
                </select>
            </div>

            <div cg-busy="promise_clinic">
                <label for="form9selclinic">Клиника</label>
                <select ng-if="clinic"  id="form9selclinic" ng-model="item.clinic_id" ng-options="mat.id as mat.title for mat in clinic" class="mdb-select">
                </select>
            </div>

        </div>
        <div class="card card-block">
            <h4 class="card-title">Фото</h4>
            <div ng-if="item.id" photos="item.pictures" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo+item.id}}">
            </div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Фото в заголовке</h4>
            <div ng-if="item.id" photos="item.pictures_top" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo_head+item.id}}">
            </div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Биография</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Сертификаты</h4>
            <div ng-if="item.id" photos_title="true" photos="item.certificates" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo_work+item.id}}">
            </div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Доп. текст</h4>
            <div id="form7" class="ck-editor" name="small_content" ng-model="item.small_content"></div>
        </div>

    </div>
</div>

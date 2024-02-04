<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1 ng-if="!item.owner">Отзыв о клинике</h1>
        <h1 ng-if="item.owner">Отзыв о @{{ item.owner.name?item.owner.name:item.owner.title }}</h1>
        <span win-control></span>
        <div class="control_content">
            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">
        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1public" ng-model="item.public">
                <label for="check342box1public">Публиковать</label>
            </div>
            <div ng-if="item.id" class="md-form">
                <label ng-class="{active: item.type}" for="types" data-success="right">Тип</label>
                <select id="types" ng-model="item.type" ng-options="status.value as status.title for status in types" class="mdb-select">
                </select>
            </div>
            <div ng-if="item.type=='doctor'" cg-busy="promise_workers">
                <label for="form9selmat">Сотрудники</label>
                <select ng-if="workers"  id="form9selmat" ng-model="item.parent" ng-options="mat.id as mat.name for mat in workers" class="mdb-select">
                </select>
            </div>

            <div ng-if="item.type=='service'" cg-busy="promise_services">
                <label for="form9selservice">Услуги</label>
                <select ng-if="services"  id="form9selservice" ng-model="item.parent" ng-options="mat.id as mat.title for mat in services" class="mdb-select">
                </select>
            </div>

            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.author">
                <label for="form9_title" ng-class="{active: item.author}">Имя</label>
            </div>
            {{--<div ng-if="item.id" class="md-form">
                <input ng-model="item.date" placeholder="Дата" type="text" name="date" id="date-picker-example" class="form-control datepicker">
                <label ng-class="{active: item.date}" for="date-picker-example">Дата</label>
            </div>--}}

            <div class="md-form">
                <textarea type="text" id="form7video" class="md-textarea" ng-model="item.video_link"></textarea>
                <label for="form7video" ng-class="{active: item.video_link}">Код видео</label>
            </div>
        </div>
        <div class="card card-block">
            <h4 class="card-title">Отзыв</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>
        <div class="card card-block">
            <h4 class="card-title">Фото</h4>
            <div ng-if="item.id" photos="item.pictures" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo+item.id}}">
            </div>
        </div>
    </div>
</div>

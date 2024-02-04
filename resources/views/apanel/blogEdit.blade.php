
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

            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.link">
                <label for="form39" ng-class="{active: item.link}" data-error="wrong" data-success="right">Ссылка</label>
            </div>
            <div class="md-form">
                <a href="{{ url('/patsientam/blog').'/' }}@{{ item.url }}" target="_blank">{{ url('/patsientam/blog').'/' }}@{{ item.url }}</a>
            </div>

            <div ng-if="item.id" class="md-form">
                <input ng-model="item.date" placeholder="Дата" type="text" name="date" id="date-picker-example" class="form-control datepicker">
                <label ng-class="{active: item.date}" for="date-picker-example">Дата</label>
            </div>

        </div>

        <div class="card card-block">
            <h4 class="card-title">Краткое содержание</h4>
            <div id="form723" class="ck-editor" name="small_content" ng-model="item.small_content"></div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Содержание</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Фото галерея</h4>
            <div ng-if="item.id" photos="item.gallery" photos-title="true" card-class="col-md-3" obj-photos="item" url="@{{link_upload_gallery+item.id}}">
            </div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">SEO</h4>
            <div class="md-form">
                <input type="text" id="form934" class="form-control" ng-model="item.seo_title">
                <label for="form934" ng-class="{active: item.seo_title}" data-error="wrong" data-success="right">seo_title</label>
            </div>

            <div class="md-form">
                <input type="text" id="form94" class="form-control" ng-model="item.seo_keywords">
                <label for="form94" ng-class="{active: item.seo_keywords}" data-error="wrong" data-success="right">seo_keywords</label>
            </div>

            <div class="md-form">
                <textarea type="text" id="form57" ng-model="item.seo_description" class="md-textarea"></textarea>
                <label for="form57" ng-class="{active: item.seo_description}">seo description</label>
            </div>
        </div>

        {{--<div class="card card-block">
            <h4 class="card-title">SEO содержание</h4>
            <div id="form72313" class="ck-editor" name="seo_content" ng-model="item.seo_content"></div>
        </div>--}}


    </div>
</div>


<div class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{ title }}</h1>
        <span win-control></span>
        <div class="control_content">

            <button ng-if="item"  class="btn btn-success" ng-click="save()"><i class="fa fa-save"></i> Сохранить</button>
        </div>

    </div>

    <div class="card-block h100">

        <div class="card card-block">
            <h4 class="card-title">Экспорт</h4>

            {{--<button  class="btn btn-success" ng-click="createFile()"><i class="fa fa-cogs" aria-hidden="true"></i> Создать файл</button>--}}
            <a  class="btn btn-primary" href="/apanel/price_download" ><i class="fa fa-download" aria-hidden="true"></i> Скачать файл</a>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Импорт</h4>
            <label>
                <input ng-disabled="disabled" accept="application/vnd.ms-excel"  type="file" nv-file-select uploader="uploader" style="display: none;" />
            <span class="btn btn-default btn-primary" ng-class="{disabled:disabled}">
                Загрузить файл
            </span>
            </label><br>
            <div ng-if="disabled" class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p ng-if="status" ng-class="{'text-success':status==1, 'text-danger':status==2}" ng-bind-html="mess"></p>
        </div>



    </div>
</div>

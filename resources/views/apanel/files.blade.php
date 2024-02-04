<div ng-if="obj.id!='new'"  ng-controller="FileUpload" nv-file-drop="" uploader="uploader">
    <style>
        .my-drop-zone { border: dotted 3px lightgray; }
        .nv-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
        .another-file-over-class { border: dotted 3px green; }


        .file-field input[type=file]{
            height: 67px;
        }
        canvas {
            background-color: #f3f3f3;
            -webkit-box-shadow: 3px 3px 3px 0 #e3e3e3;
            -moz-box-shadow: 3px 3px 3px 0 #e3e3e3;
            box-shadow: 3px 3px 3px 0 #e3e3e3;
            border: 1px solid #c3c3c3;
            height: 100px;
            margin: 6px 0 0 6px;
        }
        .photos-group .card{
            padding:0px;text-align: center;}
        .photos-group .card img{width:100%;}
        .photos-group .card .move_pic{position: absolute; top:0px;left:0px;z-index: 10;}
        .photos-group .card .md-form input, .md-form textarea {
            margin-bottom: 1rem;text-align: center;
        }
    </style>

    <div ng-if="files" ng-cloak class="row photos-group" sv-root sv-part="files" sv-on-stop="sortFiles($part)">
        <div class="card @{{cardClass}}" ng-repeat="fl in files" sv-element>
            <span title="Для сортировки перетащите файл" class="btn btn-default move_pic" aria-label="Justify" sv-handle type="button" >
                <span class="fa fa-arrows" aria-hidden="true"></span>
            </span>

            <div class="card-block">
                <div class="md-form">
                    <input type="text" id="tile_fl@{{fl.id}}" class="form-control" title="@{{fl.title}}" ng-model="fl.title">
                    <label for="tile_fl@{{fl.id}}" ng-class="{active: fl.title}" data-error="wrong" data-success="right">Название</label>
                </div>
                <button title="Сохранить название" ng-if="fl_title" class="btn btn-success" ng-click="saveFile(fl)"><i class="fa fa-save"></i></button>
                <a title="Скачать файл" ng-if="fl_download" class="btn btn-success" href="@{{down_load_link+fl.id}}"><i class="fa fa-download"></i></a>
                <button title="Удалить файл" class="btn btn-danger" ng-click="deleteFile(fl)"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="file-field">
        <div class="btn btn-primary">
            <span>Выбрать файлы для загрузки</span>
            <input type="file" nv-file-select="" uploader="uploader" multiple >
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text"  placeholder="">
        </div>
        <br class="clearfix">
    </div>
    <br>

    <div class="container-fluid">

        <div class="row" ng-repeat="item in uploader.queue">
            <div class="col-md-6">
                <strong>@{{ item.file.name }}</strong>

            </div>
            <div class="col-md-3">
                <span ng-show="item.isSuccess" title="Загружен"><i class="fa fa-check"></i></span>
                <span ng-show="item.isCancel" title="Отмена загрузки"><i class="fa fa-ban"></i></span>
                <span ng-show="item.isError" title="Ошибка загрузки"><i class="fa fa-times"></i></span>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                    <span class="fa fa-trash"></span> <span class="hidden-lg-down"> Удалить</span>
                </button>
            </div>
            <hr>
        </div>
    </div>

    <div>
        <div>

            <progress class="progress" value="@{{uploader.progress}}" max="100">
                <div class="progress"  style="">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                </div>
            </progress>
        </div>
        <button type="button" class="btn btn-success btn-s" ng-click="uploader.uploadAll()" ng-disabled="!uploader.getNotUploadedItems().length">
            <span class="fa fa-upload"></span> Загрузить на сервер
        </button>
        <!--<button type="button" class="btn btn-warning btn-s" ng-click="uploader.cancelAll()" ng-disabled="!uploader.isUploading">
            <span class="glyphicon glyphicon-ban-circle"></span> Cancel all
        </button>-->
        <button type="button" class="btn btn-danger btn-s" ng-click="uploader.clearQueue()" ng-disabled="!uploader.queue.length">
            <span class="fa fa-trash"></span> Очистить очередь загрузки
        </button>
    </div>

</div>
<div ng-if="obj.id=='new'" layout-padding>
    <md-chips><md-chip>Для загрузки изображений нужно сохранить изменения</md-chip></md-chips>
</div>
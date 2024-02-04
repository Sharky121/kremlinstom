<div ng-if="obj.id!='new'"  ng-controller="ImageUpload" nv-file-drop="" uploader="uploader">
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
        .photos-group .card .move_pic{position: absolute; top:0px;left:0px;}
        .photos-group .card .md-form input, .md-form textarea {
            margin-bottom: 1rem;
        }
    </style>

    <div ng-if="pictures" ng-cloak class="row photos-group" sv-root sv-part="pictures" sv-on-stop="sortPicture($part)">
        <div class="card @{{cardClass}}" ng-repeat="ph in pictures" sv-element>
            <span class="btn btn-default move_pic" aria-label="Justify" sv-handle type="button" >
                <span class="fa fa-arrows" aria-hidden="true"></span>
            </span>
            <img class="img-fluid" ng-src="@{{ph.small_file?ph.small_file:''}}" alt="@{{ph.title}" >
            <div class="card-block">
                <div ng-if="ph_title" class="md-form">
                    <input type="text" id="tile_img@{{ph.id}}" class="form-control" ng-model="ph.title">
            <label for="tile_img@{{ph.id}}" ng-class="{active: ph.title}" data-error="wrong" data-success="right">Название</label>
        </div>
        <button ng-if="ph_title" class="btn btn-success" ng-click="savePhoto(ph)"><i class="fa fa-save"></i> Сохранить</button>
        <button class="btn btn-danger" ng-click="deletePhoto(ph)"><i class="fa fa-trash"></i> Удалить</button>
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
            <div ng-show="uploader.isHTML5" ng-thumb="{ file: item._file, height: 100 }"></div>
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

        <uibProgress class="progress" value="@{{uploader.progress}}" max="100">
            <div class="progress"  style="">
                <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
            </div>
        </uibProgress>
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
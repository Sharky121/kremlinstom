
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
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1public" ng-model="item.public">
                <label for="check342box1public">Публиковать</label>
            </div>

            {{--<div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="check342box1action" ng-model="item.action">
                <label for="check342box1action">Участвует в акции</label>
            </div>--}}

            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.title">
                <label for="form9_title" ng-class="{active: item.title}" data-error="wrong" data-success="right">Заголовок</label>
            </div>

            <div class="md-form">
                <input type="text" id="form39" class="form-control" ng-model="item.link">
                <label for="form39" ng-class="{active: item.link}" data-error="wrong" data-success="right">Ссылка</label>
            </div>
            <div class="md-form">
                <a href="{{ url('/').'/services/' }}@{{ item.url }}" target="_blank">{{ url('/').'/services/' }}@{{ item.url }}</a>
            </div>

            <div cg-busy="promise_workers">
                <label for="form9selmat">Сотрудники</label>
                <select ng-if="workers"  id="form9selmat" ng-model="$parent.item.workers" ng-options="mat as mat.name for mat in workers track by mat.id" class="mdb-select" multiple>
                </select>
            </div>

            {{--<div cg-busy="promise_services">
                <label for="form9selmat2">Доп. услуги</label>
                <select ng-if="dop_services"  id="form9selmat2" ng-model="$parent.item.dop_services" ng-options="mat as mat.title for mat in dop_services track by mat.id" class="mdb-select" multiple>
                </select>
            </div>--}}

            <div cg-busy="promise_diseases">
                <label for="form9diseases">Заболевания</label>
                <select ng-if="diseases"  id="form9diseases" ng-model="$parent.item.diseases" ng-options="mat as mat.title for mat in diseases track by mat.id" class="mdb-select" multiple>
                </select>
            </div>

            <div class="md-form">
                <textarea type="text" id="form57dsf" ng-model="item.dop_content" class="md-textarea"></textarea>
                <label for="form57dsf" ng-class="{active: item.dop_content}">Краткое описание</label>
            </div>

            <div cg-busy="promise_techno">
                <label for="technologies">Технологии</label>
                <select ng-if="technologies"  id="technologies" ng-model="$parent.item.technologies" ng-options="mat as mat.title for mat in technologies track by mat.id" class="mdb-select" multiple>
                </select>
            </div>

            <div cg-busy="promise_actions">
                <label for="form9actions">Участвует в акциях</label>
                <select ng-if="actions"  id="form9actions" ng-model="$parent.item.actions" ng-options="mat as mat.title for mat in actions track by mat.id" class="mdb-select" multiple>
                </select>
            </div>

        </div>

        <div class="card card-block" cg-busy="promise_block">
            <h4 class="card-title">Инфо. блоки</h4>
            <button ng-disabled="!item.id" ng-click="add_block()" class="btn btn-primary"><i class="fa fa-plus"></i> <span class="hidden-lg-down"> Добавить блок</span></button>
            <div class="card" ng-repeat="block in item.content_blocks">
                <div class="card-block">
                    <div class="md-form">
                        <button ng-click="remove_block(block)" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i><span class="hidden-lg-down"> Удалить блок</span>
                        </button>
                    </div>
                    <div class="md-form">
                        <input type="text" id="block_title@{{ block.id }}" class="form-control" ng-model="block.title">
                        <label for="block_title@{{ block.id }}" ng-class="{active: block.title}" >Заголовок</label>
                    </div>
                    <div class="md-form">
                        <input type="number" id="block_sort@{{ block.id }}" class="form-control" ng-model="block.sort">
                        <label for="block_sort@{{ block.id }}" ng-class="{active: item.title}">Сортировка</label>
                    </div>
                    <div class="md-form">
                        <div id="form7bl@{{ block.id }}" class="ck-editor" name="bl_content" ng-model="block.content"></div>
                    </div>

                    <div class="card card-block">
                        <h4 class="card-title">Фото для фона блока</h4>
                        <div ng-if="block.id" photos="block.pictures" card-class="col-md-3" obj-photos="block" url="apanel/model/load-photo-block/@{{block.id}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div cg-busy="promise_prices" class="card card-block">
            <h4 class="card-title">Цены и услуги</h4>
            <button ng-if="item" ng-disabled="item.id==new" class="btn btn-primary" ng-click="editPrice()"><i class="fa fa-plus"></i> Добавить</button>
            <table class="table">
                <thead>
                <tr><th>Название</th><th>Цена от</th><th>Цена до</th><th></th></tr>
                </thead>
                <tbody>
                <tr ng-repeat="price in item.prices track by price.id">
                    <td>@{{ price.title }}</td>
                    <td>@{{ price.price }}</td>
                    <td>@{{ price.price_max }}</td>
                    <td>
                        <button class="btn btn-success" ng-click="editPrice(price)" ><i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-danger" ng-click="delPrice(price)" ><i class="fa fa-trash"></i> </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Описание</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Фото</h4>
            <div ng-if="item.id" photos="photo" card-class="col-md-3" obj-photos="item" url="@{{link_upload_photo+item.id}}">
            </div>
        </div>

        {{--<div class="card card-block">
            <h4 class="card-title">Доп. описание</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.dop_content"></div>
        </div>--}}

        {{--<div class="card card-block">
            <h4 class="card-title">Галерея</h4>
            <div ng-if="item.id" photos="gallery" card-class="col-md-3" obj-photos="item" url="@{{link_upload_gallery+item.id}}">
            </div>
        </div>--}}

        <div class="card card-block">
            <h4 class="card-title">Иконка</h4>
            <div ng-if="item.id" photos="ico" card-class="col-md-3" obj-photos="item" url="@{{link_upload_ico+item.id}}">
            </div>
        </div>

        {{--<div class="card card-block">
            <h4 class="card-title">Опыт</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.dop_content"></div>
        </div>

        <div class="card card-block">
            <h4 class="card-title">Опыт фото</h4>
            <div ng-if="item.id" photos="experience_gallery" card-class="col-md-3" obj-photos="item" url="@{{link_upload_experience_gallery+item.id}}">
            </div>
        </div>--}}
        <div class="card card-block">
            <h4>Опыт</h4>
            <div cg-busy="promise_exp">
                <label for="form9selmat2">Примеры работ</label>
                <select ng-if="exp_services"  id="form9selmat2" ng-model="$parent.item.experiences" ng-options="mat as mat.title for mat in exp_services track by mat.id" class="mdb-select" multiple>
                </select>
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

        <div class="card card-block">
            <h4 class="card-title">SEO содержание</h4>
            <div id="form72313" class="ck-editor" name="seo_content" ng-model="item.seo_content"></div>
        </div>

    </div>
</div>

<script type="text/ng-template" id="editPrice.html">
    <div cg-busy="promise">
        <div class="modal-header">
            <button type="button" class="close" ng-click="cancel()" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Редактирование цены</h4>
        </div>
        <div class="modal-body" >
            <div class="md-form">
                <input type="text" id="form9_title_price" class="form-control" ng-model="item.title">
                <label for="form9_title_price" ng-class="{active: item.title}" >Заголовок</label>
            </div>
            <div class="md-form">
                <input type="text" id="form9_price" class="form-control" ng-model="item.price">
                <label for="form9_price" ng-class="{active: item.price}" >Цена начальная</label>
            </div>
            <div class="md-form">
                <input type="text" id="form9_title_price_max" class="form-control" ng-model="item.price_max">
                <label for="form9_title_price_max" ng-class="{active: item.price_max}" >Цена максимальная</label>
            </div>
            <div class="md-form">
                <input type="number" id="form9_sort" class="form-control" ng-model="item.sort">
                <label for="form9_sort" ng-class="{active: item.sort}" >Номер для сортировки</label>
            </div>
            <div id="form7" class="ck-editor" name="content_price" ng-model="item.content"></div>

        </div>
        <div class="modal-footer" >
            <button class="btn btn-primary" {{--ng-disabled="!item.title_price&&!item.price"--}} type="button" ng-click="ok()">Сохранить</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Отмена</button>
        </div>
    </div>
</script>


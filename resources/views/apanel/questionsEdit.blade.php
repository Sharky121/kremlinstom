<div ng-show="item" class="card" cg-busy="promise">
    <div class="card-header primary-color">
        <h1>@{{item.autor?'Вопрос от '+item.doctor.name:''}}</h1>
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
            <div class="md-form">
                <input type="checkbox" ng-true-value="1" ng-false-value="0" id="faq" ng-model="item.faq">
                <label for="faq">Часто задаваемый</label>
            </div>
            <div class="md-form">
                <input type="text" id="form9_title" class="form-control" ng-model="item.author">
                <label for="form9_title" ng-class="{active: item.author}" data-error="wrong" data-success="right">Имя</label>
            </div>

            <div class="md-form">
                <input type="text" id="phone" class="form-control" ng-model="item.phone">
                <label for="phone" ng-class="{active: item.phone}" >Телефон</label>
            </div>

            <div class="md-form">
                <input type="text" id="form9email" class="form-control" ng-model="item.email">
                <label for="form9email" ng-class="{active: item.email}" >E-mail</label>
            </div>

            <div ng-if="item.id" class="md-form">
                <input ng-model="item.date" placeholder="Дата" type="text" name="date" id="date-picker-example" class="form-control datepicker">
                <label ng-class="{active: item.date}" for="date-picker-example">Дата</label>
            </div>
        </div>


        <div class="card card-block">
            <h4 class="card-title">Вопрос</h4>
            <div id="form7" class="ck-editor" name="content" ng-model="item.content"></div>
        </div>
        <div class="card card-block">
            <h4 class="card-title">Ответ</h4>
            <div id="form7w" class="ck-editor" name="dop_content" ng-model="item.dop_content"></div>
        </div>

    </div>
</div>

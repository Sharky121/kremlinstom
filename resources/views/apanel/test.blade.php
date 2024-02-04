
<div cg-busy="promise" class="h100 card">
    <div class="card-header primary-color">
        <h1>Тесты</h1>
        <span win-control></span>

    </div>

    <div class="card-block">
        <div class="card card-block">
            <h4 class="card-title">Общая информация</h4>
            <div class="md-form">
                <input type="text" id="form39_requisites" class="form-control" ng-model="phone">
                <label for="form39_requisites" ng-class="{active: phone}" data-error="wrong" data-success="right">телефон</label>
            </div>
            <div  class="md-form" cg-busy="promise_phone_id">
                <label for="form9floor" class="active" data-error="wrong" data-success="right">Id телефона</label>
                <select id="form9floor"  ng-model="phone_id"  ng-options="k as vall for (k, vall) in phone_id" class="mdb-select"></select>
            </div>
            <button type="button" ng-click="call_phone()" class="btn btn-primary">Звонить</button>
            <button type="button" ng-click="call_reply()" class="btn btn-success">Ответить</button>
        </div>
    </div>
</div>



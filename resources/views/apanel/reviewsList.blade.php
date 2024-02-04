<style>
    .ng-table th.sortable .sort-indicator {
        padding-right: 18px;
        position: relative;
    }
    .ng-table th.sortable {
        cursor: pointer;
    }
    .ng-table th.sortable .sort-indicator:after, .ng-table th.sortable .sort-indicator:before {
        content: "";
        border-width: 0 4px 4px;
        border-style: solid;
        border-color: #000 transparent;
        visibility: visible;
        right: 5px;
        top: 50%;
        position: absolute;
        opacity: .3;
        margin-top: -4px;
    }
    .ng-table th.sortable .sort-indicator:after, .ng-table th.sortable .sort-indicator:before {
        content: "";
        border-width: 0 4px 4px;
        border-style: solid;
        border-color: #000 transparent;
        visibility: visible;
        right: 5px;
        top: 50%;
        position: absolute;
        opacity: .3;
        margin-top: -4px;
    }
    .ng-table th.sortable.sort-asc .sort-indicator:before, .ng-table th.sortable.sort-desc .sort-indicator:before {
        visibility: hidden;
    }
    .ng-table th.sortable .sort-indicator:before {
        margin-top: 2px;
        border-bottom: none;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #000;
    }
    .ng-table th.sortable.sort-asc .sort-indicator:after, .ng-table th.sortable.sort-asc .sort-indicator:hover:after, .ng-table th.sortable.sort-desc .sort-indicator:after {
        visibility: visible;
        filter: alpha(opacity=60);
        -khtml-opacity: .6;
        -moz-opacity: .6;
        opacity: .6;
    }
    .ng-table th.sortable.sort-asc .sort-indicator:after, .ng-table th.sortable.sort-desc .sort-indicator:after {
        margin-top: -2px;
    }
    .ng-table th.sortable.sort-desc .sort-indicator:after {
        border-bottom: none;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #000;
        box-shadow: none;
    }
</style>


<div cg-busy="promise" class="h100 card">
    <div class="card-header primary-color">
        <h1>@{{ title }}</h1>
        <span win-control></span>
        <div class="control_content">
            <a ng-click="new_item()"  class="btn btn-primary"><i class="fa fa-plus"></i> <span class="hidden-lg-down"> Добавить</span></a>
        </div>
    </div>

    <div class="card-block">
        <div class="card card-block">

            <div ng-if="types" class="md-form">
                <label for="types" class="active" data-error="wrong" data-success="right">Тип</label>
                <select ng-change="type_filtered()" id="types" ng-model="$parent.type_filter" ng-options="status.value as status.title for status in types" class="mdb-select">
                </select>
            </div>

            <div ng-if="statuses" class="md-form">
                <label for="form9floor" class="active" data-error="wrong" data-success="right">Статус</label>
                <select id="form9floor" ng-model="$parent.status_filter" ng-change="status_filtered()"  ng-options="status.value as status.title for status in statuses" class="mdb-select">
                </select>
            </div>

            <table ng-table="tableParams" class="table table-bordered table-striped table-condensed">
                <tr ng-repeat="row in $data track by row.id">
                    <td data-title="'Ф.И.О'" filter="{author: 'text'}" sortable="'author'">@{{row.author}}</td>
                    <td data-title="'Дата'" sortable="'date'">@{{row.date}}</td>
                    <td data-title="''" sortable="'public'">
                        <span  class="fa" ng-class="{'fa-eye text-success':row.public==1, 'fa-eye-slash text-danger':row.public==0}" aria-hidden="true"></span>
                    </td>
                    <td data-title="''">
                        <button ng-click="edit(row)" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i><span class="hidden-lg-down"></span></button>
                        <button ng-click="remove_node(row)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i><span class="hidden-lg-down"></span></button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>



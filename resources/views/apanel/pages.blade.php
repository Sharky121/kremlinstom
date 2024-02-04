<script type="text/ng-template" id="tree-dnd-template-render.html">
    <div ng-class="(treeData.length) ? '' : 'list-group-item active '" ?>
        <ul tree-dnd-nodes>
            <li tree-dnd-node="node" ng-repeat="node in treeData track by node.__hashKey__"
                ng-show="node.__visible__" compile="expandingProperty.cellTemplate"
                ng-include="'tree-dnd-template-fetch.html'"></li>
        </ul>
    </div>
</script>
<script type="text/ng-template" id="tree-dnd-template-fetch.html">
    <div class="list-group-item text-info"
         ng-class="(node.__selected__ ? 'list-group-item-success ':' ') + $node_class"


         ng-style="expandingProperty.cellStyle ? expandingProperty.cellStyle : {}">

        <span ng-if="expanding_property.enable_drag" class="btn btn-default" aria-label="Justify" type="button" tree-dnd-node-handle>
            <span class="fa fa-arrows" aria-hidden="true"></span> </span>

        <span>
                       @{{node[expandingProperty.field] || node[expandingProperty]}}
             </span>

        <span  ng-class="node.__icon_class__" ng-click="toggleExpand(node)"></span>

        <div class="pull-right">
            <span ng-repeat="col in colDefinitions" ng-class="col.cellClass" ng-style="col.cellStyle"
                  compile="col.cellTemplate">
                @{{node[col.field]}}
            </span>
        </div>
        <div class="clearfix"></div>

    </div>
    <ul tree-dnd-nodes>
        <li tree-dnd-node="node" ng-repeat="node in node.__children__ track by node.__hashKey__"
            ng-show="node.__visible__" compile="expandingProperty.cellTemplate"
            ng-include="'tree-dnd-template-fetch.html'"></li>
    </ul>
</script>





<div cg-busy="promise" class="h100 card">
    <div class="card-header primary-color">
        <h1>Страницы</h1>
        <span win-control></span>
        <div class="control_content">
            <a href="@{{ link_add }}" ng-click="new_item()"  class="btn btn-primary"><i class="fa fa-plus"></i> <span class="hidden-lg-down"> Добавить</span></a>
        </div>
    </div>

    <div class="card-block">
        <div ng-if="tree_data.length>0" class="list-group">
            <tree-dnd class="list-group"
                      tree-data="tree_data"
                      tree-control="my_tree"
                      column-defs="col_defs_min"
                      expand-on="expanding_property"
                      expand-level="100"
                      template-url="tree-dnd-template-render.html"
                      callbacks="options"
                      enable-drop="true"
                      enable-drag="expanding_property.enable_drag"
                      enable-collapse="true"

                      icon-leaf="none"
                      icon-expand="fa fa-chevron-down"
                      icon-collapse="fa fa-chevron-right"
            ></tree-dnd>
        </div>
    </div>
</div>



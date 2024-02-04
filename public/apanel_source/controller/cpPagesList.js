(function () {
    'use strict';
    angular.module('app')
        .controller(
        'PagesList', [
            '$scope', '$TreeDnDConvert','$http','toaster','$routeSegment','$location','$timeout','errorShow', function ($scope, $TreeDnDConvert,$http,toaster,$routeSegment,$location,$timeout,errorShow) {
                $scope.segment = $routeSegment.name;
                $scope.tree_data = {};
                $scope.my_tree = {};
                $scope.delete = [];
                $scope.link_add="#/pages/new";
                var link = 'pages/';
                var link_get = 'apanel/model/listpages';
                var link_upload_photo = 'apanel/model/loadphotomaterial/';
                var link_save = 'apanel/model/savepages' ;

                $scope.my_tree.edit = function (node,event) {
                    event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
                    $location.path(link+node.id+'/edit');
                    if(node.id=="new"){
                        $scope.my_tree.deselect_node();
                        toaster.pop('info', 'Внимание!', 'Для редактирования фото нужно сохранить изменения' );
                    }else{
                        $scope.my_tree.select_node(node);
                    }
                    return false;
                };
                $scope.new_item =function(){
                    $scope.my_tree.deselect_node();
                    toaster.pop('info', 'Внимание!', 'Для редактирования фото нужно сохранить изменения' );
                }

                $scope.save = function(){
                    $scope.promise = $http.post(link_save,{tree:$scope.tree_data,delete:$scope.delete}).then(
                        function (response){
                            $routeSegment.chain[1].reload();
                        },
                        function (error){
                            errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка сохраниения'});
                        });
                }

                $scope.remove_node = function(node,event){
                    //event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
                    if(confirm('Удалить запись?')){
                            $scope. promise = $http.post('apanel/model/deletepage', {item: node}).then(
                                function (response) {
                                    toaster.pop('success', 'Удаление', 'Удалено!');// сделать проверку статуса
                                    if($scope.my_tree.get_selected_node()){
                                        if($scope.my_tree.get_selected_node().id==node.id) {
                                            $location.path($scope.$routeSegment.getSegmentUrl($scope.$routeSegment.name.split('.').slice(0,-1).join('.')),$scope.$routeSegment.$routeParams);
                                            $scope.my_tree.deselect_node();
                                        }
                                    }
                                    $scope.my_tree.remove_node(node);
                                },

                                function (error) {
                                    errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка удаления'})
                                });
                    }
                    return false;
                }

                $scope.findNode= function(id,tree){
                    var result = false;
                    $.each(tree,function(ind,obj){
                            if(id==obj['id']){
                                result = obj;
                                return false;
                            }
                            if(obj['__children__']){
                                var res = $scope.findNode(id,obj['__children__']);
                                if(res){
                                    result = res;
                                    return false;
                                }
                            }
                        }
                    );
                    return result;
                }


                $scope.secel =function(node){
                    $scope.my_tree.select_node(node);
                    //if(node.id!="new") {
                    //    $location.path('catalog/' + node.id);
                    //    $scope.my_tree.select_node(node);
                    //}else{
                    //    toaster.pop('info', 'Внимание!', 'Для редактирования товаров нужно сохранить изменения' );
                    //}

                }

                $scope.options = {
                    dragStop: function(){
                        $scope.my_tree.reload_data();
                        $scope.save();
                    }
                }

                $scope.expanding_property = {
                    field:       'title',
                    titleClass:  'text-center',
                    cellClass:   'v-middle',
                    displayName: 'Name',
                    enable_drag:true
                };

                $scope.col_defs_min = [
                    {
                        displayName:  'Добавить',
                        cellTemplate: '<a href="#/pages/{{node.id}}/new"  class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><span class="hidden-lg-down"> Добавить</span></a>'
                    },
                    {
                        displayName:  'Изменить',
                        cellTemplate: '<button ng-click="tree.edit(node, $event)"  class="btn btn-default btn-sm"><i class="fa fa-pencil"></i><span class="hidden-lg-down"> Изменить</span></button>'
                    }, {
                        displayName:  'Удалить',
                        cellTemplate: '<button ng-if="!node.not_delete" ng-click="remove_node(node)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i><span class="hidden-lg-down"> Удалить</span></button>'
                    }];

                $scope.add_node =function(node){
                    $scope.my_tree.deselect_node();
                    //var new_node = {id:'new',title:'Новая страница',parent:0,__edit__:true,__visible__:true};
                    //$scope.my_tree.add_node(node,new_node,0);
                    //$scope.my_tree.reload_data();
                }
                $scope.promise = $http.post('apanel/model/listpages').then(
                    function (response){
                        $scope.tree_data = $TreeDnDConvert.line2tree(response.data, 'id', 'page_id');

                        $timeout(function () {
                            if($routeSegment.$routeParams.id&&$scope.my_tree){
                                $scope.secel($scope.findNode($routeSegment.$routeParams.id,$scope.tree_data));
                            }
                        },200);
                    },
                    function (error){
                        errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка загрузки данных'})
                    });

            }]
    );
})();

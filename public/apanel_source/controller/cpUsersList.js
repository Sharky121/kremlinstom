(function () {
    'use strict';
    angular.module('app')
        .controller(
        'UsersList', [
            '$scope', '$TreeDnDConvert','$http','toaster','$routeSegment','$location','$timeout', function ($scope, $TreeDnDConvert,$http,toaster,$routeSegment,$location,$timeout) {
                $scope.segment = $routeSegment.name;
                $scope.tree_data = {};
                $scope.my_tree = {};
                $scope.lk= 'users';
                $scope.title = 'Пользователи';
                $scope.link_del='apanel/model/delete-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-sort-'+$scope.lk ;
                var pr_key='id';
                var fr_key='name';

                $scope.link_add="/"+$scope.lk+"/new";
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_get = 'apanel/model/list-'+$scope.lk;


                $scope.expanding_property = {
                    field:       'name',
                    titleClass:  'text-center',
                    cellClass:   'v-middle',
                    displayName: 'Name',
                    enable_drag:false
                };
                $scope.options = {
                    dragStop: function(){
                        $scope.my_tree.reload_data();
                        $scope.save();
                    }
                }

                $scope.my_tree.edit = function (node,event) {
                    event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
                    $scope.my_tree.select_node(node);
                    $location.path($scope.link+node.id+'/edit');
                    return false;
                };

                $scope.new_item =function(){
                    if(typeof($scope.my_tree.deselect_node)=='function') {
                        $scope.my_tree.deselect_node();
                    }

                    $location.path($scope.link_add);
                   // toaster.pop('info', 'Внимание!', 'Для редактирования фото нужно сохранить изменения' );
                    return false;
                }



                $scope.save = function(){
                    $scope.promise = $http.post($scope.link_save,{tree:$scope.tree_data}).then(
                        function (response){
                            //$routeSegment.chain[1].reload();
                        },

                        function (error){
                            toaster.pop('danger', 'Ошибка', 'Ошибка сохраниения' );
                            console.log(error.status);
                        });
                }

                $scope.remove_node = function(node){
                    event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
                    if(confirm('Удалить запись?')){
                            $scope. promise = $http.post($scope.link_del, {item: node}).then(
                                function (response) {
                                    toaster.pop('success', 'Удаление', 'Удалено!');// сделать проверку статуса
                                    if($scope.my_tree.get_selected_node()){
                                        if($scope.my_tree.get_selected_node().id==node.id) {
                                            $location.path($routeSegment.getSegmentUrl($routeSegment.name.split('.').slice(0,-1).join('.')),$routeSegment.$routeParams);
                                            $scope.my_tree.deselect_node();
                                        }
                                    }
                                    $scope.my_tree.remove_node(node);
                                },

                                function (error) {
                                    toaster.pop('warning', 'Ошибка', 'Ошибка удаления');
                                    console.log(error.status);
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
                }

                $scope.col_defs_min = [
                    {
                        displayName:  'Изменить',
                        cellTemplate: '<button ng-click="tree.edit(node, $event)"  class="btn btn-default btn-sm"><i class="fa fa-pencil"></i><span class="hidden-lg-down"> Изменить</span></button>'
                    }, {
                        displayName:  'Удалить',
                        cellTemplate: '<button ng-click="remove_node(node)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i><span class="hidden-lg-down"> Удалить</span></button>'
                    }];



                $scope.promise = $http.post($scope.link_get).then(
                    function (response){
                        $scope.tree_data = $TreeDnDConvert.line2tree(response.data.items, pr_key, fr_key);
                        $timeout(function () {
                            if($routeSegment.$routeParams.id&&$scope.my_tree){
                                $scope.secel($scope.findNode($routeSegment.$routeParams.id,$scope.tree_data));
                            }
                        },100);
                    },
                    function (error){
                        toaster.pop('warning', 'Ошибка', 'Ошибка загрузки данных');
                        console.log(error.status);
                    });

            }]
    );
})();

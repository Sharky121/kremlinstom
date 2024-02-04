(function () {
    'use strict';
    angular.module('app')
        .controller(
        'questionsList', [
            '$scope', '$http','toaster','$routeSegment','$location','$timeout',"NgTableParams",'errorShow','options', function ($scope, $http,toaster,$routeSegment,$location,$timeout,NgTableParams,errorShow,options) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.title = options.title;
                $scope.lk = options.lk;
                $scope.link_del='apanel/model/delete-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-sort-'+$scope.lk ;
                $scope.link_add="/"+$scope.lk+"/new";
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_get = 'apanel/model/table-list-'+$scope.lk;
                $scope.class_width = 'col-md-4';

                $scope.statuses = [{'title':'Все','value':''},{'title':'Опубликован','value':1},{'title':'Неопубликован','value':0}];
                $scope.status_filter ='';
                $scope.status_filtered = function(){
                    var filt = $scope.tableParams.filter();
                    angular.extend(filt, {public: $scope.status_filter});
                    $scope.tableParams.filter(filt);

                }

                $scope.tableParams = new NgTableParams({count:5}, {

                    counts: [ 5, 10,20,50,100],
                    paginationMaxBlocks: 13,
                    paginationMinBlocks: 2,
                    getData: function (params) {
                        $scope.promise = $http.post($scope.link_get,params.parameters()).then(
                            function (response){
                                params.total(response.data.items.total);
                                params.page(response.data.items.current_page);
                                return response.data.items.data;
                            },
                            function (error){
                                errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                            });

                        return $scope.promise;
                    }

                });

                $scope.remove_node = function(node){
                    if(confirm('Удалить запись?')){
                        $scope. promise = $http.post($scope.link_del, {item: node}).then(
                            function (response) {
                                toaster.pop('success', 'Удаление', 'Удалено!');// сделать проверку статуса
                                $scope.tableParams.reload();
                            },

                            function (error) {
                                errorShow.show(error,{defaultMess:'Ошибка удаления'});

                            });
                    }
                    return false;
                }

                $scope.edit = function (node) {
                    $location.path($scope.link+node.id+'/edit');
                    return false;
                };

                $scope.new_item =function(){
                    $location.path($scope.link_add);
                    return false;
                }


            }]
    );
})();

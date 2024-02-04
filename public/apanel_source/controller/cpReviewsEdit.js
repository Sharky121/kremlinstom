/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'reviewsEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','options','errorShow', function ($scope, $http,toaster,$routeSegment,$location,options,errorShow) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';
                $scope.options = options;
                $scope.lk=options.lk;
                $scope.link_get = 'apanel/model/get-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-'+$scope.lk ;
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_upload_photo = 'apanel/model/load-photo-'+$scope.lk+'/';
                $scope.link_upload_gallery = 'apanel/model/load-gallery-'+$scope.lk+'/';
                $scope.types = [
                    {'title':'О клиннике','value':'clinic'},
                    {'title':'О докторе','value':'doctor'},
                    {'title':'О услуге','value':'service'}];

                $scope.promise_workers =$http.post('apanel/model/list-workers').then(
                    function (response) {
                        $scope.workers = response.data.items;
                    },
                    function (error) {
                        $scope.workers = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                $scope.promise_services =$http.post('apanel/model/list-services').then(
                    function (response) {
                        $scope.services = response.data.items;
                    },
                    function (error) {
                        $scope.services = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                if($scope.options.action=='new') {
                    $scope.item = {
                        'id':'new'
                    };
                    toaster.pop('info', 'Внимание!', 'Для редактирования фото нужно сохранить изменения' );
                }else {
                    $scope.promise = $http.post($scope.link_get, {id: $routeSegment.$routeParams.id}).then(
                        function (response) {
                            $scope.item = response.data.item;
                        },
                        function (error) {
                            $scope.item = null;
                            errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                        });
                }

                $scope.save = function(){
                    $scope.promise = $http.post($scope.link_save,{item:$scope.item}).then(
                        function (response){
                            toaster.pop('success', 'Сохранение', 'Сохранено!' );
                            $routeSegment.chain[1].reload();
                            if($scope.item.id=='new'){
                                $location.path($scope.link+response.data.id+'/edit');
                            }else{
                                $routeSegment.chain[2].reload();
                            }
                        },

                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка сохранения'});
                        });
                }
            }]
    );
})();
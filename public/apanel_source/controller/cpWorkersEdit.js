/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'WorkersEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','options','errorShow', function ($scope, $http,toaster,$routeSegment,$location,options,errorShow) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';
                $scope.options = options;
                $scope.link_get = 'apanel/model/get-worker';
                $scope.link_save = 'apanel/model/save-worker' ;
                $scope.link = "/workers/";
                $scope.link_upload_photo = 'apanel/model/load-photo-worker/';
                $scope.link_upload_photo_head = 'apanel/model/load-photo-top-worker/';
                $scope.link_upload_photo_work = 'apanel/model/load-photo-cert-worker/';

                $scope.promise_spec =$http.post('apanel/model/list-specializations').then(
                    function (response) {
                        $scope.spec = response.data.items;
                    },
                    function (error) {
                        $scope.spec = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                $scope.promise_clinic =$http.post('apanel/model/list-clinics').then(
                    function (response) {
                        $scope.clinic = response.data.items;
                    },
                    function (error) {
                        $scope.clinic = null;
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
                            toaster.pop('success', 'Сохранение', 'Сохранено!' );// сделать проверку статуса
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
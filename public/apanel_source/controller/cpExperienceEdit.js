/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'experienceEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','options','errorShow', function ($scope, $http,toaster,$routeSegment,$location,options,errorShow) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-4';
                $scope.options = options;
                $scope.link_get = 'apanel/model/get-experiences/'+$routeSegment.$routeParams.worker;
                $scope.link_save = 'apanel/model/save-experiences' ;
                $scope.link = "/workers/"+$routeSegment.$routeParams.worker+"/experiences/";
                $scope.link_upload_photo = 'apanel/model/load-photo-experiences/';


                if($scope.options.action=='new') {
                    $scope.item = {
                        'id':'new',
                        'worker_id':$routeSegment.$routeParams.worker
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
                            $routeSegment.chain[2].reload();
                            if($scope.item.id=='new'){
                                $location.path($scope.link+response.data.id+'/edit');
                            }else{
                                $routeSegment.chain[3].reload();
                            }
                        },

                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка сохранения'});
                        });
                }
            }]
    );
})();
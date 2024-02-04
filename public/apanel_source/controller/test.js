/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'testController', [
            '$scope', '$http','toaster','$routeSegment','$location', function ($scope, $http,toaster,$routeSegment,$location) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';

                //$scope.phone_id = {0:'не указан', 1:'аппарат 1', 2:'аппарат2'};
                $scope.phone_id = {
                    0:'не указан',
                    1:'аппарат 1',
                    2:'аппарат2'
                };


                $scope.call_phone = function(){
                    $http.post('/client_call',{phone:$scope.phone}).then(
                        function (response){
                            toaster.pop('success', 'Звонок отправлен' );// сделать проверку статуса
                        },

                        function (error){
                            if(error.status==422){
                                var err = [];

                                $.each(error.data,function(ind,el){
                                    err.push(el.join('; '));
                                })
                                toaster.pop('error', 'Ошибка ', err.join('; '));
                            }else {
                                if(error.data.mess){
                                    toaster.pop('error', 'Ошибка', error.data.mess);
                                }else {
                                    toaster.pop('error', 'Ошибка', 'Ошибка сохраниения');
                                }
                                console.log(error.status);
                            }
                        });
                }
                $scope.call_reply = function(){
                    $http.post('/client_call_reply',{phone:$scope.phone,phone_id:$scope.phone_id}).then(
                        function (response){

                            toaster.pop('success', 'На звонок ответили' );// сделать проверку статуса

                        },

                        function (error){
                            if(error.status==422){
                                var err = [];

                                $.each(error.data,function(ind,el){
                                    err.push(el.join('; '));
                                })
                                toaster.pop('error', 'Ошибка ', err.join('; '));
                            }else {
                                if(error.data.mess){
                                    toaster.pop('error', 'Ошибка', error.data.mess);
                                }else {
                                    toaster.pop('error', 'Ошибка', 'Ошибка сохраниения');
                                }
                                console.log(error.status);
                            }
                        });
                }
            }]
    );
})();
/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'ProfileEdit', [
            '$scope', '$http','toaster','$routeSegment','$location', function ($scope, $http,toaster,$routeSegment,$location) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';
                $scope.lk= 'profile';
                $scope.errors = {pass:'',pass_confirmation:''};
                $scope.success = {pass:'',pass_confirmation:''};
                $scope.item = {
                    'pass':'',
                    'pass_confirmation':''

                };
                $scope.phone_id = {
                    0:'не указан',
                    1:'аппарат 1',
                    2:'аппарат2'
                };

                $scope.link_get = 'apanel/model/get-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-'+$scope.lk ;
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_upload_photo = 'apanel/model/load-photo-'+$scope.lk+'/';

                $scope.promise = $http.post($scope.link_get, {}).then(
                    function (response) {
                        $scope.item = response.data.item;
                        $scope.item.pass='';
                        $scope.item.pass_confirmation='';
                    },
                    function (error) {
                        $scope.item = null;
                        toaster.pop('danger', 'Ошибка', 'Ошибка загрузки данных');
                        console.log(error.status);
                    });


                $scope.save = function(){
                    $scope.promise = $http.post($scope.link_save,{item:$scope.item,modules:$scope.modules,permiss:$scope.permiss,objects:$scope.objects}).then(
                        function (response){
                            toaster.pop('success', 'Сохранение', 'Сохранено!' );// сделать проверку статуса
                            $routeSegment.chain[1].reload();
                        },
                        function (error){
                            if(error.status==422){
                                var err = [];
                                $.each(error.data,function(ind,el){
                                    err.push(el.join('; '));
                                })
                                toaster.pop('error', 'Ошибка сохраниения', err.join('; '));
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

                $scope.pass_valid = function(){
                    var re = /^[a-zA-Z0-9]{3,}$/i;
                    $scope.errors['pass'] = '';
                    $scope.success['pass'] = '';
                    $scope.errors['pass_confirmation'] = '';
                    $scope.success['pass_confirmation'] = '';
                    if($scope.item.pass!='') {console.log($scope.item.pass+'ff');
                        if (re.test($scope.item.pass)) {
                            $scope.success.pass = 'Верно';
                            if ($scope.item.pass_confirmation == $scope.item.pass) {
                                $scope.success.pass_confirmation = 'Верно';
                            } else {
                                $scope.errors.pass_confirmation = 'Пароли не совпадают';
                            }
                        } else {
                            $scope.errors.pass = 'Пароль должен быть не менее 3 символов и содержать цифры и/или латинские буквы';
                        }
                    }

                }

                $scope.validFr = function(){
                    var res = true;
                    $.each($scope.errors,function(ind,el){
                        if(el!=''){
                            res = false;
                        }
                    })
                    return res;
                }


            }]
    );
})();
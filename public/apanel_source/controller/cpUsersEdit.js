/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'UsersEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','options','errorShow', function ($scope, $http,toaster,$routeSegment,$location,options,errorShow) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';
                $scope.options = options;
                $scope.lk= 'users';
                $scope.errors = {pass:'',pass_confirmation:''};
                $scope.success = {pass:'',pass_confirmation:''};
                $scope.item = {
                    'pass':'',
                    'pass_confirmation':''
                };

                $scope.link_get = 'apanel/model/get-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-'+$scope.lk ;
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_upload_photo = 'apanel/model/load-photo-'+$scope.lk+'/';

                if($scope.options.action=='new') {
                    $scope.item = {
                        'id':'new',
                        'title':""
                    };

                }else {
                    $scope.promise = $http.post($scope.link_get, {id: $routeSegment.$routeParams.id}).then(
                        function (response) {
                            $scope.item = response.data.item;
                            $scope.item.pass='';
                            $scope.item.pass_confirmation='';
                            $scope.modules = response.data.modules;
                            $scope.permiss = response.data.permiss;
                            $scope.objects = response.data.objects;

                        },
                        function (error) {
                            errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                        });
                }

                $scope.save = function(){
                    $scope.promise = $http.post($scope.link_save,{item:$scope.item,modules:$scope.modules,permiss:$scope.permiss,objects:$scope.objects}).then(
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
                            errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка сохраниения'});
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
                        //return true;
                    return res;
                }

                $scope.call_phone = function(){
                    $http.post('/client_call',{phone:'892032344444'}).then(
                        function (response){
                            toaster.pop('success', 'Звонок отправлен' );// сделать проверку статуса
                        },

                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка сохраниения'});
                        });
                }
                $scope.call_reply = function(){
                    $http.post('/client_call_reply',{phone:'892032344444',phone_id:2}).then(
                        function (response){

                            toaster.pop('success', 'На звонок ответили' );// сделать проверку статуса

                        },

                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка сохраниения'});
                        });
                }
            }]
    );
})();
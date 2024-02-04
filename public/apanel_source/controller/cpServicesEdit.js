/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'servicesEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','options','errorShow','$uibModal', function ($scope, $http,toaster,$routeSegment,$location,options,errorShow,$uibModal) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.htmltext = '';
                $scope.class_width = 'col-md-8';
                $scope.options = options;
                $scope.lk="services";
                $scope.link_get = 'apanel/model/get-'+$scope.lk;
                $scope.link_save = 'apanel/model/save-'+$scope.lk ;
                $scope.link = "/"+$scope.lk+"/";
                $scope.link_upload_photo = 'apanel/model/load-photo-'+$scope.lk+'/';
                $scope.link_upload_gallery = 'apanel/model/load-gallery-'+$scope.lk+'/';
                $scope.link_upload_ico = 'apanel/model/load-ico-'+$scope.lk+'/';
                $scope.link_upload_experience_gallery = 'apanel/model/load-experience-gallery-'+$scope.lk+'/';

                $scope.promise_workers =$http.post('apanel/model/list-workers').then(
                    function (response) {
                        $scope.workers = response.data.items;
                    },
                    function (error) {
                        $scope.workers = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                $scope.promise_actions =$http.post('apanel/model/list-actions').then(
                    function (response) {
                        $scope.actions = response.data.items;
                    },
                    function (error) {
                        $scope.actions = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                $scope.promise_diseases =$http.post('apanel/model/list-diseases').then(
                    function (response) {
                        $scope.diseases = response.data.items;
                    },
                    function (error) {
                        $scope.diseases = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                $scope.promise_techno =$http.post('apanel/model/list-technologies').then(
                    function (response) {
                        $scope.technologies = response.data.items;
                    },
                    function (error) {
                        $scope.technologies = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                /*$scope.promise_services =$http.post('apanel/model/list-dopservices').then(
                    function (response) {
                        $scope.dop_services = response.data.items;
                    },
                    function (error) {
                        $scope.dop_services = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });*/

                /*$scope.promise_exp =$http.post('apanel/model/list-experience').then(
                    function (response) {
                        $scope.exp_services = response.data.items;
                    },
                    function (error) {
                        $scope.exp_services = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });*/

                if($scope.options.action=='new') {
                    $scope.item = {
                        'id':'new'
                    };
                    toaster.pop('info', 'Внимание!', 'Для редактирования цен нужно сохранить изменения' );
                }else {
                    $scope.promise = $http.post($scope.link_get, {id: $routeSegment.$routeParams.id}).then(
                        function (response) {
                            $scope.item = response.data.item;
                            $scope.photo = response.data.pictures;
                            $scope.gallery = response.data.gallery;
                            $scope.ico = response.data.ico;
                        },
                        function (error) {
                            $scope.item = null;
                            errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                        });
                }

                $scope.updatePrices = function(){
                    $scope.promise_prices =$http.post('apanel/model/list-price-services',{'service_id':$scope.item.id}).then(
                        function (response) {
                            $scope.item.prices = response.data.items;
                        },
                        function (error) {
                            $scope.item.prices = null;
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

                $scope.editPrice = function (price) {
                    if($scope.modalInstance){
                        $scope.modalInstance.dismiss('cancel');
                    }
                    $scope.modalInstance = $uibModal.open({
                        animation: true,
                        templateUrl: 'editPrice.html',
                        controller: 'priceEdit',
                        size: 'md',
                        resolve: {
                            scope: $scope,
                            price:price
                        }
                    });
                }

                $scope.delPrice = function (price) {
                    if(!confirm('Удалить цену?')){ return false; }
                    $http.post('/apanel/model/delete-price-services',{item:price}).then(
                        function (response){
                            $scope.updatePrices();
                            toaster.pop('success', 'Удаление', 'Удалено!' );
                        },
                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка удаления'});
                        });
                }

                $scope.add_block = function(){
                    $scope.promise_block = $http.post('apanel/model/add-block-'+$scope.lk,{service:$scope.item.id}).then(
                        function (response){
                            toaster.pop('success', 'Добавление блока', 'Блок добавлен' );
                            if(response.data.block!=undefined) {
                                $scope.item.content_blocks.push(response.data.block);
                            }
                        },
                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка добавления'});
                        }
                    );
                }

                $scope.remove_block = function(block){
                    var title =block.title?' '+block.title:'';
                    if(!confirm('Удалить блок'+title+'?' )){return false;}
                    $scope.promise_block = $http.post('apanel/model/delete-block-'+$scope.lk,{block:block}).then(
                        function (response){
                            toaster.pop('success', 'Удаление блока', 'Блок удалён' );
                            var index = $scope.item.content_blocks.indexOf(block);
                            if(index!==-1) {
                                $scope.item.content_blocks.splice(index,1);
                            }
                        },
                        function (error){
                            errorShow.show(error,{defaultMess:'Ошибка удаления'});
                        }
                    );
                }
            }]
    ).
    controller('priceEdit',['$scope','$http','toaster', '$uibModalInstance', 'scope','price','errorShow', function ($scope,$http,toaster,$uibModalInstance, scope,price,errorShow) {
        $scope.item=price||{service_id:scope.item.id,id:'new'};
        $scope.scope=scope;

        $scope.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };

        $scope.ok = function () {
            $scope.promise = $http.post('/apanel/model/set-prices-'+scope.lk, {
                item: $scope.item
            }).then(
                function (response) {
                    toaster.pop('success', 'Изменение цен', response.data.mess);
                    scope.updatePrices();
                    $uibModalInstance.dismiss('cancel');
                },
                function (error) {
                    errorShow.show(error,{defaultMess:'Ошибка редактирования услуги'});
                });
        };
    }]);
})();
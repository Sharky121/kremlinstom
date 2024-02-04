/**
 * Created by misha on 12.07.16.
 */
(function () {
    'use strict';
    angular.module('app').controller(
        'PagesEdit', [
            '$scope', '$http','toaster','$routeSegment','$location','errorShow','options', function ($scope, $http,toaster,$routeSegment,$location,errorShow,options) {
                $scope.$routeSegment = $routeSegment;
                $scope.segment = $routeSegment.name;
                $scope.options = options;
                $scope.htmltext = '';
                $scope.class_width='col-md-8';
                var link = 'pages/';
                var link_get = 'apanel/model/getpage';
                $scope.link_upload_photo = 'apanel/model/loadphotopage/';
                $scope.link_upload_gallery = 'apanel/model/load-gallery-page/';
                $scope.link_upload_ico = 'apanel/model/load-ico-page/';
                var link_save = 'apanel/model/savepage' ;

                $scope.promise_types =$http.post('apanel/model/list-page-types').then(
                    function (response) {
                        $scope.types = response.data.items;
                    },
                    function (error) {
                        $scope.types = null;
                        errorShow.show(error,{defaultMess:'Ошибка загрузки данных'});
                    });

                if($scope.options.action=='new') {
                    $scope.item = {
                        'id':'new',
                        'page_id':$routeSegment.$routeParams.parent?$routeSegment.$routeParams.parent:0,
                        'title':"Новая страница"
                    };
                }else {
                    $scope.promise =$http.post(link_get, {id: $routeSegment.$routeParams.id}).then(
                        function (response) {
                            $scope.item = response.data.item;
                            $scope.pictures = response.data.pictures;
                        },
                        function (error) {
                            $scope.item = null;
                            errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка загрузки данных'});
                        });
                }

                $scope.save = function(){
                    $scope.promise = $http.post(link_save,{item:$scope.item}).then(
                        function (response){
                            toaster.pop('success', 'Сохранение', 'Сохранено!' );// сделать проверку статуса
                            $routeSegment.chain[1].reload();
                            if($scope.item.id=='new'){
                                $location.path(link+response.data.id+'/edit');
                            }else{
                                $routeSegment.chain[2].reload();
                            }
                        },
                        function (error){
                            errorShow.show(error,{title:'Ошибка',defaultMess:'Ошибка сохраниения'});
                        });
                }
            }]
    );
})();
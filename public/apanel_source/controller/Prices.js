(function () {
    'use strict';
    angular.module('app')
        .controller(
        'Prices', [
            '$scope', '$TreeDnDConvert','$http','toaster','$routeSegment','$location','$timeout','FileUploader','options','$sce', function ($scope, $TreeDnDConvert,$http,toaster,$routeSegment,$location,$timeout,FileUploader, options,$sce) {
                $scope.segment = $routeSegment.name;
                $scope.tree_data = {};
                $scope.my_tree = {};
                $scope.lk= options.lk;
                $scope.title = options.title;
                $scope.link_save = '/apanel/model/import-file-'+$scope.lk ;
                $scope.disabled = false;


                var uploader = $scope.uploader = new FileUploader({
                    url: $scope.link_save,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    autoUpload:true,
                    removeAfterUpload:true
                });
                uploader.filters.push({
                    name: 'excelFilter',
                    fn: function(item , options) {
                        var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                        return '|vnd.ms-excel|'.indexOf(type) !== -1;
                    }
                });
                uploader.filters.push({
                    name: 'countFilter',
                    fn: function(item /*{File|FileLikeObject}*/, options) {
                        return this.queue.length < 1;
                    }
                });

                    uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {

                        //console.info('onWhenAddingFileFailed', item, filter, options);
                        alert('Неверное расширение файла');
                        $scope.status = 2;
                        $scope.mess = 'Неверное расширение файла';
                        uploader.clearQueue();
                    };
                    //uploader.onAfterAddingFile = function(fileItem) {
                    //    console.info('onAfterAddingFile', fileItem);
                    //};
                    //uploader.onAfterAddingAll = function(addedFileItems) {
                    //    console.info('onAfterAddingAll', addedFileItems);
                    //};
                    uploader.onBeforeUploadItem = function(item) {
                        $scope.disabled = true;
                        $scope.status = null;
                        //console.info('onBeforeUploadItem', item);
                    };
                    //uploader.onProgressItem = function(fileItem, progress) {
                    //    console.info('onProgressItem', fileItem, progress);
                    //};
                    //uploader.onProgressAll = function(progress) {
                    //    console.info('onProgressAll', progress);
                    //};
                    uploader.onSuccessItem = function(fileItem, response, status, headers) {
                        //console.info('onSuccessItem', fileItem, response, status, headers);
                        $scope.disabled = false;
                        $scope.status = response.status;
                        $scope.mess = response.mess;
                        console.log(response.mess);

                    };
                    uploader.onErrorItem = function(fileItem, response, status, headers) {
                        //console.info('onErrorItem', fileItem, response, status, headers);
                        $scope.disabled = false;
                        $scope.status = 2;
                        $scope.mess = "Ошибка сервера! Убедитесь в корректности загруженных данных.";
                        console.log("Ошибка");
                        uploader.clearQueue();

                    };
                    //uploader.onCancelItem = function(fileItem, response, status, headers) {
                    //    console.info('onCancelItem', fileItem, response, status, headers);
                    //};
                    //uploader.onCompleteItem = function(fileItem, response, status, headers) {
                    //    //console.info('onCompleteItem', fileItem, response, status, headers);
                    //};
                    //uploader.onCompleteAll = function() {
                    //    console.info('onCompleteAll');
                    //};


            }]
    );
})();

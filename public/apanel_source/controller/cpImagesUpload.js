/**
 * Created by misha on 14.07.16.
 */
angular.module('app')
    .controller('ImageUpload', ['$scope', 'FileUploader','$http','toaster', function($scope, FileUploader, $http, toaster) {


            var uploader = $scope.uploader = new FileUploader({
                url: $scope.url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                removeAfterUpload:true
            });

        // FILTERS

        uploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        });

            uploader.onCompleteItem = function(fileItem, response, status, headers) {
                //console.log(response);
                if(response.picture){
                    $scope.pictures.splice(9999,0,response.picture);
                }

                // console.info('onCompleteItem', fileItem, response, status, headers);
            };


        $scope.deletePhoto = function(ph){
            if(confirm('Удалить изображение?')) {

                $http.post('apanel/model/delphoto', {id: ph.id}).then(
                    function (response) {
                        toaster.pop('success', 'Удаление', 'Изображение удалено!');// сделать проверку статуса
                        var index = $scope.pictures.indexOf(ph);
                        $scope.pictures.splice(index, 1);
                    },
                    function (error) {
                        toaster.pop('danger', 'Ошибка', 'Ошибка удаления изображения');
                        console.log(error.status);
                    });
            }

        }

        $scope.sortPicture = function(part){
            $http.post('apanel/model/sortphoto', {photo: part}).then(
                function (response) {
                   // toaster.pop('success', 'Сохранение', 'Изменения сохранены!');// сделать проверку статуса

                },
                function (error) {
                    toaster.pop('danger', 'Ошибка', 'Ошибка сортировки');
                    console.log(error.status);
                });
        }

        $scope.savePhoto = function(ph){
            $http.post('apanel/model/savephoto', {photo: ph}).then(
                function (response) {
                    toaster.pop('success', 'Сохранение', 'Изменения сохранены!');// сделать проверку статуса

                },
                function (error) {
                    toaster.pop('danger', 'Ошибка', 'Ошибка сохранения');
                    console.log(error.status);
                });


        }

        // CALLBACKS

        //uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
        //    console.info('onWhenAddingFileFailed', item, filter, options);
        //};
        //uploader.onAfterAddingFile = function(fileItem) {
        //
        //   // console.log($scope.uploader);
        //};
        //uploader.onAfterAddingAll = function(addedFileItems) {
        //    console.info('onAfterAddingAll', addedFileItems);
        //};
        //uploader.onBeforeUploadItem = function(item) {
        //
        //};
        //uploader.onProgressItem = function(fileItem, progress) {
        //    console.info('onProgressItem', fileItem, progress);
        //};
        //uploader.onProgressAll = function(progress) {
        //    console.info('onProgressAll', progress);
        //};
        //uploader.onSuccessItem = function(fileItem, response, status, headers) {
        //    console.info('onSuccessItem', fileItem, response, status, headers);
        //};
        //uploader.onErrorItem = function(fileItem, response, status, headers) {
        //    console.info('onErrorItem', fileItem, response, status, headers);
        //};
        //uploader.onCancelItem = function(fileItem, response, status, headers) {
        //    console.info('onCancelItem', fileItem, response, status, headers);
        //};
        //uploader.onCompleteItem = function(fileItem, response, status, headers) {
        //    //console.log(response);
        //    if(response.picture){
        //        $scope.pictures.splice(9999,0,response.picture);
        //    }
        //
        //    // console.info('onCompleteItem', fileItem, response, status, headers);
        //};
        //uploader.onCompleteAll = function() {
        //    console.info('onCompleteAll');
        //};

        //console.info('uploader', uploader);
    }]);
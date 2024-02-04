/**
 * Created by misha on 14.07.16.
 */
angular.module('app')
    .controller('FileUpload', ['$scope', 'FileUploader','$http','toaster', function($scope, FileUploader, $http, toaster) {




            var uploader = $scope.uploader = new FileUploader({
                url: $scope.url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                removeAfterUpload:true
            });



        // FILTERS

        /*uploader.filters.push({
            name: 'fileFilter',
            fn: function(item /!*{File|FileLikeObject}*!/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|doc|docx|pdf|xls|xlsx|csv|rtf|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        });*/

            uploader.onCompleteItem = function(fileItem, response, status, headers) {
                //console.log(response);
                if(response.file){
                    $scope.files.splice(9999,0,response.file);
                }

                // console.info('onCompleteItem', fileItem, response, status, headers);
            };


        $scope.deleteFile = function(fl){
            if(confirm('Удалить файл?')) {

                $http.post('apanel/model/delfile', {id: fl.id}).then(
                    function (response) {
                        toaster.pop('success', 'Удаление', 'Файл удалён!');// сделать проверку статуса
                        var index = $scope.files.indexOf(fl);
                        $scope.files.splice(index, 1);
                    },
                    function (error) {
                        toaster.pop('danger', 'Ошибка', 'Ошибка удаления файла');
                        console.log(error.status);
                    });
            }

        }

        $scope.sortFiles = function(part){
            $http.post('apanel/model/sortfile', {files: part}).then(
                function (response) {
                   // toaster.pop('success', 'Сохранение', 'Изменения сохранены!');// сделать проверку статуса

                },
                function (error) {
                    toaster.pop('danger', 'Ошибка', 'Ошибка сортировки');
                    console.log(error.status);
                });
        }

        $scope.saveFile = function(fl){
            $http.post('apanel/model/savefile', {file: fl}).then(
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
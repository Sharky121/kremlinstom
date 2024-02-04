(function(angular) {
    angular.module('app')
        .directive('photos',[function(){
        return {
            link:function(scope,elem,attrs,ctrl){

            },
            scope:{
                obj:'=objPhotos',
                enable:'@enablePhotos',
                pictures:'=photos',
                url:'@',
                cardClass:'@',
                ph_title:'=photosTitle'
            },
            restrict:"A",
            templateUrl: function(element,attributes) {

                return 'apanel/views/pictures.html';
            }
        }
    }])
        .directive('files',[function(){
            return {
                link:function(scope,elem,attrs,ctrl){

                },
                scope:{
                    obj:'=objFiles',
                    enable:'@enableFiles',
                    files:'=files',
                    url:'@',
                    cardClass:'@',
                    fl_title:'=fileTitle',
                    fl_download:'=download',
                    down_load_link:'@downloadLink'
                },
                restrict:"A",
                templateUrl: function(element,attributes) {

                    return 'apanel/views/files.html';
                }
            }
        }])
        .directive('winControl',['$location','$routeSegment',function($location,$routeSegment){
            return {
                replace: true,
                restrict:"A",
                template: '<div class="win_control"><i class="open_bt fa fa-expand" ng-hide="open()" ng-click="expand()" aria-hidden="true"></i><i  ng-show="open()" ng-click="compress()" class="close_bt fa fa-compress" aria-hidden="true"></i><i ng-if="segment" class="fa fa-times" ng-click="close()" aria-hidden="true"></i></div>',
                link:function(scope,elem,attrs,ctrl){
                    scope.window = elem.parents('.win_panel').eq(0);
                    scope.open = function(){ return scope.window.hasClass('full_scr');};
                    scope.expand = function(){scope.window.addClass('full_scr');};
                    scope.compress = function(){scope.window.removeClass('full_scr');};
                    scope.segment = scope.window.scope().segment;
                    scope.close = function(){

                        if(scope.segment){
                            $location.path($routeSegment.getSegmentUrl(scope.segment.split('.').slice(0,-1).join('.')),$routeSegment.$routeParams);
                        }
                    }
                }
            }
        }])

        .directive('quickScroll',[function(){
            return {
                replace: true,
                restrict:"A",
                template: '<div class="col-sm-6 pull-right"><select ng-model="block" ng-change="change()" ng-options="obj as obj.title for obj in blocks" class="mdb-select"></select></div>',
                link:function(scope,elem,attrs,ctrl){
                    scope.window = elem.parents('.win_panel').eq(0);
                    scope.content = scope.window.find('div.card-block.h100').eq(0);
                    scope.blocks =[];
                    $.each(scope.window.find('h4'),function(){

                        scope.blocks.push({item:$(this).parent(),title:$(this).html()});

                    });
                    scope.block=scope.blocks[0]?scope.blocks[0]:null;
                    scope.change =function(){
                        scope.content.scrollTo(scope.block.item,500,{axis:'y',offset:{top:-128,left:0}});
                    }
                }
            }
        }])

        .directive('ckEditor', [function () {
            return {
                require: '?ngModel',
                restrict: 'C',
                link: function (scope, elm, attr, model) {
                    var isReady = false;
                    var data = [];
                    var ck = CKEDITOR.replace(elm[0],{
                        'language': 'ru',
                        'filebrowserBrowseUrl':'apanel_source/libs/wysiwyg/kcfinder/browse.php?type=files',
                        'filebrowserImageBrowseUrl':'apanel_source/libs/wysiwyg/kcfinder/browse.php?type=images',
                        'filebrowserFlashBrowseUrl':'apanel_source/libs/wysiwyg/kcfinder/browse.php?type=flash',
                        'filebrowserUploadUrl':'apanel_source/libs/wysiwyg/kcfinder/upload.php?type=files',
                        'filebrowserImageUploadUrl':'apanel_source/libs/wysiwyg/kcfinder/upload.php?type=images',
                        'filebrowserFlashUploadUrl':'apanel_source/libs/wysiwyg/kcfinder/upload.php?type=flash'})

                    function setData() {
                        if (!data.length) { return; }

                        var d = data.splice(0, 1);
                        ck.setData(d[0] || '<span></span>', function () {
                            setData();
                            isReady = true;
                        });
                    }

                    ck.on('instanceReady', function (e) {
                        if (model) { setData(); }
                    });

                    elm.bind('$destroy', function () {
                        ck.destroy(false);
                    });

                    if (model) {
                        ck.on('change', function () {
                            scope.$apply(function () {
                                var data = ck.getData();
                                if (data == '<span></span>') {
                                    data = null;
                                }
                                model.$setViewValue(data);
                            });
                        });

                        model.$render = function (value) {
                            if (model.$viewValue === undefined) {
                                model.$setViewValue(null);
                                model.$viewValue = null;
                            }

                            data.push(model.$viewValue);

                            if (isReady) {
                                isReady = false;
                                setData();
                            }
                        };
                    }

                }
            };
        }]).directive('mdbSelect', ['$timeout',function ($timeout) {
        return {
            require: '?ngModel',
            restrict: 'C',
            link: function (scope, elm, attr, model) {
                $timeout(function () {
                    elm.material_select();
                },0);
            }
        };
    }]).directive('datepicker', ['$timeout',function ($timeout) {
        return {
            require: '?ngModel',
            restrict: 'C',
            link: function (scope, elm, attr, model) {
                $timeout(function () {
                    elm.pickadate({
                        monthsFull: [ 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря' ],
                        monthsShort: [ 'янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек' ],
                        weekdaysFull: [ 'воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота' ],
                        weekdaysShort: [ 'вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб' ],
                        today: 'сегодня',
                        clear: 'удалить',
                        close: 'закрыть',
                        firstDay: 1,
                        format: 'yyyy-mm-dd',
                        formatSubmit: 'yyyy-mm-dd',
                        min: new Date(2005,1,1),
                        container:'body'
                    });
                },0);
            }
        };
    }]).directive('timepicker', ['$timeout',function ($timeout) {
        return {
            require: '?ngModel',
            restrict: 'C',
            link: function (scope, elm, attr, model) {
                $timeout(function () {
                    elm.pickatime({
                        twelvehour: false,
                        donetext: 'Выбрать',
                        autoclose:true,
                        container:'body'

                    });
                },0);

            }
        };
    }]);

})(angular);
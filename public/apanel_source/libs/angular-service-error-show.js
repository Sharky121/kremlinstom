(function(window, document) {
    'use strict';

    angular.module('errorShow', ['toaster'])
        .service( 'errorShow', [
            'toaster', function(toaster) {
               this.show = function(error,option) {
                   var option = option||{};
                   var title = option['title']?option['title']:'Ошибка';
                   var defaultMess=option['defaultMess']?option['defaultMess']:'Ошибка';
                   if(error.status==422){
                       var err = [];
                       $.each(error.data,function(ind,el){
                           err.push(el.join('; '));
                       })
                       toaster.pop('error', title, err.join('; '));
                   } else if(error.status==401){
                       toaster.pop('error', 'Ошибка', error.data.mess);
                   } else {
                       if(error.data.mess){
                           toaster.pop('error', title, error.data.mess);
                       }else {
                           toaster.pop('error', title, defaultMess);
                       }
                   }
               }
        }]);
})(window, document);
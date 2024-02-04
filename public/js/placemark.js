
function init(id,adres,coords) {
  var myMap = new ymaps.Map(id, {
        center: coords,
        zoom: 14,
        controls: ['smallMapDefaultSet']
      }, {
        searchControlProvider: 'yandex#search'
      });

  // Создаем геообъект с типом геометрии "Точка".
  var myPlacemark = new ymaps.Placemark(coords, {
    balloonContentBody: [
      '<address>',
      '<strong>Кремлёвская стоматология</strong>',
      '<br/>',
      ''+adres,
      '<br/>',

      '</address>'
    ].join('')
  }, {
    preset: 'islands#redDotIcon'
  });

  myMap.geoObjects.add(myPlacemark);
 /* myMap.behaviors.disable('drag');*/


}

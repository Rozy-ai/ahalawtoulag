ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [38.158379, 57.964270],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: '"Ahalawtoulag önümçilik birleşigi"',
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            //iconLayout: 'default#image',
            // Своё изображение иконки метки.
            //iconImageHref: '../images/myIcon.gif',
            // Размеры метки.
            //iconImageSize: [30, 42],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            //iconImageOffset: [-5, -38]
        });

    myMap.geoObjects.add(myPlacemark)
});
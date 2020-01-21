$(function () {

   map = new GMaps({
        div: '.manchitro',
        lat: 24.3745,
        lng: 88.6042
      });

      map.addMarker({
        lat: 24.3745,
        lng: 88.6042,
        title: 'Rajshahi',
        click: function(e) {
          alert('You clicked in this marker');
        }
      });

      map.addMarker({
        lat: 22.5726,
        lng: 88.3639,
        title: 'It is Kolkata',
        click: function(e) {
          alert('You clicked in this marker');
        }
      });

});
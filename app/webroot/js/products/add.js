/**
* This is your App script template. Is already working, all you need to do it build your functions and play :)
* Here you can already use Jquery, Modernizr and Bootstrap.js
*/
;(function() {
  var App,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  App = (function() {
  	// Constructor
    function App() {
      this.initialize();
    }

    App.prototype.initialize = function() {
      $('#ProductCostPrice').change(function() {
        var costPrice =  Number($('#ProductCostPrice').val());
        var minPrice = costPrice + (costPrice * 0.4);

        $('#ProductMinimumPrice').val(minPrice.toFixed(2));
      });
    }

    return App;

  })();

  $(function() {
    return App = new App();
  });

}).call(this);
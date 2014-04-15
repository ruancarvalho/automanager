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
      
      this.setupButtons();

      //$('#OrderDate').attr('type', 'date');
      $('#OrderDate').value = new Date();
    }

    App.prototype.setupButtons = function() {

      $('#btnAddItem').click(function() {
        var counter = -1;

        var newRow = $("<tr>");
        var cols = "";           
        
        if (counter == -1)
            counter = $('#products-table tr').length - 1;
        else
            counter++;

        cols += '<td><input name="data[OrderItem]['+ counter +'][name]" class="form-control" disabled="disabled" type="text"></td>';
        cols += '<td><input name="data[OrderItem]['+ counter +'][product_id]" class="form-control" type="text"></td>';
        
        cols += '<td><input name="data[OrderItem]['+ counter +'][quantity]" class="form-control" min="1" step="any" maxlength="8" type="number"></td>';
        cols += '<td><input name="data[OrderItem]['+ counter +'][price]" class="form-control" disabled="disabled" type="text"></td>';

        cols += '<td class="actions">';
        cols += '<button class="btn btn-large btn-danger btn-remove-item" type="button">Remove</button>';
        cols += '</td>';

        newRow.append(cols);
        
        $("#products-table").append(newRow);

        return false;
      });

      // Add removal feature to buttons
      $('#products-table').on('click', 'button', function (e) {

        $(this).closest('tr').fadeOut('slow', function () {
          $(this).remove();
        });
        return false;
      });

    }

    return App;

  })();

  $(function() {
    return App = new App();
  });

}).call(this);
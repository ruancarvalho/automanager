/**
* This is your App script template. Is already working, all you need to do it build your functions and play :)
* Here you can already use Jquery, Modernizr and Bootstrap.js
*/
;(function() {
  var App,
      Total,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  App = (function() {
  	// Constructor
    function App() {
      this.initialize();
    }

    function updateOrderTotal() {
        var sum = 0;
        $('.item-total').each(function() {
            var num = parseFloat(this.value) || 0;
            sum += num;
        });
        
        $('#SubTotal').val(parseFloat(sum).toFixed(2));
        $('#OrderTotal').val(parseFloat(sum).toFixed(2));
        console.log(sum);
    }

    App.prototype.initialize = function() {
      
      this.setupButtons();
      this.setupOrderItems();

      //$('#OrderDate').attr('type', 'date');
      Total = 0;
      $('#OrderDate').value = new Date();
    }

    App.prototype.setupButtons = function() {

      // Button Add Product
      $('#btnAddItem').click(function() {
        var counter = -1;

        var newRow = $("<tr>");
        var cols = "";           
        
        if (counter == -1)
            counter = $('#products-table tr').length - 1;
        else
            counter++;

        cols += '<td><div class="form-group"><input name="data[OrderItem]['+ counter +'][name]" class="form-control" disabled="disabled" type="text" id="OrderItem'+ counter +'Name"></div></td>';
        cols += '<td><div class="form-group"><input name="data[OrderItem]['+ counter +'][product_id]" class="form-control item-id" type="text" id="OrderItem'+ counter +'ProductId"></div></td>';
        
        cols += '<td><div class="form-group"><input name="data[OrderItem]['+ counter +'][quantity]" class="form-control item-quantity" min="0.1" step="any" maxlength="8" type="number" id="OrderItem'+ counter +'Quantity"></div></td>';
        cols += '<td><div class="form-group"><input name="data[OrderItem]['+ counter +'][price]" class="form-control" disabled="disabled" type="text" id="OrderItem'+ counter +'Price"></div></td>';
        cols += '<td><div class="form-group"><input name="data[OrderItem]['+ counter +'][subtotal]" class="form-control item-total" disabled="disabled" type="text" id="OrderItem'+ counter +'SubTotal"></div></td>';

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

    } // setupButtons()

    App.prototype.setupOrderItems = function() {

      // OnChange Código do Produto      
      $(document).on('change', '.item-id', function (e) {
        
        // do stuff here
        console.log('searching product...');

        console.log(e.currentTarget.id);

        var pid = '#' + e.currentTarget.id;
        var input = $(pid).val();

        $.ajax({
            dataType: "HTML",
            type: "POST",
            evalScripts: true,
            url: '/products/info',
            data: ({id:input}),
            success: function (data, textStatus){

                var obj = jQuery.parseJSON(data);
                console.log(obj);

                // Encontra o Campo de Nome e atualiza
                $(pid).parent().parent().prev().find('input').val(obj.name);

                // Encontra o Preço e atualiza
                $(pid).parent().parent().next().find('input').val('1');

                // Encontra o Preço e atualiza
                $(pid).parent().parent().next().next().find('input').val(obj.price);
                $(pid).parent().parent().next().next().next().find('input').val(obj.price);

                // Calcula o Total e Atualiza
                updateOrderTotal();
            }
        });

        console.log('done!');

      });

      // OnChange Quantidade
      $(document).on('change', '.item-quantity', function (e) {

        var fid = '#' + e.currentTarget.id;
        var quantity = $(fid).val();

        // Encontra o Preço e Total do produto
        var price = $(fid).parent().parent().next().find('input').val();
        var productTotal = parseFloat(quantity) * parseFloat(price);

        // Atualiza o total do produto
        $(fid).parent().parent().next().next().find('input').val(productTotal.toFixed(2));

        updateOrderTotal();

      });

    } // setupOrderItems()

    return App;

  })(); 

  $(function() {
    return App = new App();
  });

}).call(this);
<h3></h3>
<div class="row">
	<div class="col-xs-6">
		<div class="row">
			<div class="col-xs-12">
			    <h3>Demonstração do Resultado do Exercício</h3>
			</div>
		</div>
	</div>
	<div class="col-xs-6 pull-right hidden-print">
		<?php echo $this->Html->link(__('Print'),'javascript:window.print()',array('class' => 'btn btn-primary btn-sm pull-right','style' => 'margin-top: 15px')) ?>
  	</div>
</div>

<hr />

<div class="row">
	<div class="col-xs-12">		
		<?php echo $this->Session->flash() ?>

		<div class="table">
		    <table cellspacing="0" class="table" width="100%">
		        <tr class="active">
		            <td><strong>1.</strong></td>
		            <td><strong>RECEITA OPERACIONAL BRUTA</strong></td>
		            <td><?php echo $this->Number->currency(12809.50, 'BRL'); ?></td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>Venda de Mercadorias e/ou Prestação de Serviços</td>
		            <td><?php echo $this->Number->currency(12809.50, 'BRL'); ?></td>
		        </tr>
		        <tr class="active">
		            <td><strong>2.</strong></td>
		            <td><strong>DEDUÇÕES E ABATIMENTOS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>Abatimentos Concedidos</td>
		            <td><?php echo $this->Number->currency(0.00, 'BRL'); ?></td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>Vendas Anuladas</td>
		            <td><?php echo $this->Number->currency(0.00, 'BRL'); ?></td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>Descontos Incondicionais Concedidos</td>
		            <td><?php echo $this->Number->currency(18.50, 'BRL'); ?></td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>Impostos e Contribuições sobre Vendas</td>
		            <td><?php echo $this->Number->currency(0.00, 'BRL'); ?></td>
		        </tr>
		        <tr class="active">
		            <td><strong>3.</strong></td>
		            <td><strong>RECEITA OPERACIONAL LÍQUIDA</strong></td>
		            <td><?php echo $this->Number->currency(12809.50, 'BRL'); ?></td>
		        </tr>
		        <tr class="active">
		            <td><strong>4.</strong></td>
		            <td><strong>CUSTOS OPERACIONAIS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr>
		            <td></td>
		            <td>CMV e/ou Custo dos Serviços Prestados</td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>5.</strong></td>
		            <td><strong>LUCRO BRUTO</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>6.</strong></td>
		            <td><strong>DESPESAS OPERACIONAIS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>7.</strong></td>
		            <td><strong>OUTRAS RECEITAS OPERACIONAIS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>8.</strong></td>
		            <td><strong>LUCRO (PREJUÍZO) OPERACIONAL</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>9.</strong></td>
		            <td><strong>OUTRAS RECEITAS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>10.</strong></td>
		            <td><strong>OUTRAS DESPESAS</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>11.</strong></td>
		            <td><strong>RESULTADO DO EXERCÍCIO ANTES DO IR</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>12.</strong></td>
		            <td><strong>PROVISÃO PARA CONTRIBUIÇÃO SOCIAL</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>13.</strong></td>
		            <td><strong>PROVISÃO PARA IMPOSTO DE RENDA</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>14.</strong></td>
		            <td><strong>RESULTADO DO EXERCÍCIO APÓS O IR</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>15.</strong></td>
		            <td><strong>PARTICIPAÇÕES</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>16.</strong></td>
		            <td><strong>REVERSÃO DE JUROS SOBRE O CAPITAL PRÓPRIO</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>17.</strong></td>
		            <td><strong>LUCRO LÍQUIDO DO EXERCÍCIO</strong></td>
		            <td>0,00</td>
		        </tr>
		        <tr class="active">
		            <td><strong>18.</strong></td>
		            <td><strong>LUCRO LÍQUIDO DO EXERCÍCIO POR AÇÃO DO CAPITAL</strong></td>
		            <td>0,00</td>
		        </tr>
		    </table>
		</div><!-- /.table-responsive -->
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<!DOCTYPE html>
<html>
<style type="text/css">
	@page {
		margin: 0px 0px 0px 0px !important;
		padding: 0px 0px 0px 0px !important;
		/*size: 500pt 400pt !important;*/
		/*page-break-inside: avoid;*/
	}
	.top-right.content {
		position: absolute;
		top: 0;
		right: 160px;
		float: right;
		margin-right: 30px;
	}
	.top-right.content h5, p {
		margin: 0;
		padding: 0;
	}
	.top-right.content p {
		width: 50%;
	}
	.top-right.content h5 {
		margin-top: 57px;
	}
	.Tax-div {
		position: absolute;
		float: right;
		top: 120px;
		right: 180px;
		font-size: 29px;
		color: #fff;
		margin-right: 50px;
	}
	.Invoice-Number {
		position: absolute;
		top: 155px;
		color: #fff;
	}
	.Invoice-Number h4 {
		margin: 0;
		margin-left: 70px;
	}
	.Bill-to {
		position: absolute;
		top: 205px;
		color: #fff;
		margin-left: 20px;
		padding-top: 0px;
		display: inline-block;
	}
	.Bill-to h4 {
		font-size: 14px;
		padding: 0;
		margin: 0;
		float: left;
	}
	.address {
		margin-top: 24px;
		width: 45%;
	}


	.date h4 {
		margin: 0px;
		padding: 0 0 8px 0px;
		float: right;
		position: absolute;
		right: 0;
		top: 330px;
		margin-right: 350px;
		color: #fff;
	}
	.date h5 {
		margin: 0px;
		padding: 0 0 8px 0px;
		float: right;
		position: absolute;
		right: 0;
		top: 350px;
		margin-right: 250px;
		color: #fff;
	}
	.costDue {
		float: right;
		position: absolute;
		right: 0;
		top: 334px;
		margin-right: 50px;
		color: #000;
	}
	.costDue h4 {
		margin: 0px;
		padding: 0 0 8px 0px;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
		color: #4a4a4d;
		font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	th {
		padding: 10px 15px;
		vertical-align: middle;
	}
	td {
		padding-left: 10px;
	}
	tfoot td {
		padding: 10px 15px;
		vertical-align: middle;
	}
	thead {
		background: #cd2827;
		background: linear-gradient(#cd2827, #cd2827);
		color: #fff;
		font-size: 11px;
		text-transform: uppercase;
		border-radius: 0;
	}
	th:first-child {
		border-top-left-radius: 0px;
		text-align: left;
	}
	th:last-child {
		border-top-left-radius: 0px;
	}
	tbody tr:nth-child(even){
		background: #f0f0f2;
	}
	td {
		border-bottom: 1px solid #cecfd5;
		border-right: 1px solid #cecfd5;
	}
	td:first-child {
		border-left: 1px solid #cecfd5;
	}
	.book-title {
		color: #395870;
		display: block;
	}
	.text-offset {
		color: #7c7c80;
		font-size: 12px;
	}
	.item-stock,
	.item-qty {
		text-align:center;
	}
	.item-price {
		text-align:right;
	}
	.item-multiple {
		display: block;
	}
	tfoot {
		text-align: right;
	}
	tfoot tr:last-child {
		background: #f0f0f2;
		color: #395870;
		font-weight: bold;
	}
	tfoot tr:last-child td:first-child {
		border-bottom-left-radius: 5px;
	}
	tfoot tr:last-child td:last-child {
		border-bottom-right-radius: 5px;
	}
	.invoice.section table {
		width: 100%;
	}
	.invoice.section table td {
		padding: 10px 15px;
	}
	.invoice.section {
		width: 90%;
		text-align: center;
		margin: 0 auto;
	}
	.authorization {
		width: 20%;
		position: absolute;
		bottom: 60px;
		float: right;
	}
	footer{
		position: absolute;
		bottom: 30px;
	}
	.logo-location{
		position: absolute;
		margin-left: 30px;
		top: 10px;
	}
</style>
<body>
<div class="header-banner" style="height: 250px; width: 100%">
	<img alt="" style="width: 100%; height: 250px;"  src="https://techspoteduca.com/uploads/header-inOut.jpg">
</div>
<div class="logo-location">
	<img alt="" style="max-height: 130px"  src="<?php if(isset($logo)) { echo $logo; }  ?>">
</div>
<div class="top-right content">
	<h5><?php if(isset($store_name)) { echo $store_name; }  ?></h5>
	<p><?php if(isset($store_address)) { echo $store_address; }  ?></p>
</div>
<div class="Tax-div">
	<h1><?php if(isset($receipt)) { echo $receipt; }  ?></h1>
</div>
<div class="Invoice-Number">
	<h4>Date:</h4>
	<h4><?php if(isset($date)) { echo $date; }  ?></h4>
</div>
<div class="Bill-to">
	<h4>Opened by:</h4><h4><?php if(isset($opened_by)) { echo $opened_by; }  ?></h4>
	<br>
	<h4>Closed by:</h4><h4><?php if(isset($closed_by)) { echo $closed_by; }  ?></h4>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th style="width: 100%;text-align: center;">Total Sales since last cashout</th>
			<th style="width: 100%;text-align: center;">Cashin Date</th>
			<th style="width: 100%;text-align: center;">Cashout Date</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td style="width: 100%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($total_sales_last_cashout)) { echo $total_sales_last_cashout; }  ?>
			</td>
			<td style="width: 100%;text-align: center;">
				<?php if(isset($cash_in_date)) { echo $cash_in_date; }  ?>
			</td>
			<td style="width: 100%;text-align: center;">
				<?php if(isset($cash_out_date)) { echo $cash_out_date; }  ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th colspan="2" style="width: 100%;text-align: center;">Summary</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td style="width: 50%;text-align: center;">
				Cash Sales
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($credit_card)) { echo $credit_card; }  ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;text-align: center;">
				Credit Card Sales
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($credit_card)) { echo $credit_card; }  ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;text-align: center;">
				Debit Card Sales
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($debit_card)) { echo $debit_card; }  ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;text-align: center;">
				Other Sales
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($other_sales)) { echo $other_sales; }  ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th colspan="2" style="width: 100%;text-align: center;">Open/Closed</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td style="width: 50%;text-align: center;">
				Cash in amount
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($cash_in_amount)) { echo $cash_in_amount; }  ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;text-align: center;">
				Cash Out Amount
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($cash_out_amount)) { echo $cash_out_amount; }  ?>
			</td>
		</tr>
		</tbody>
	</table>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th colspan="2" style="width: 100%;text-align: center;">Sales by employee</th>
		</tr>
		</thead>
		<?php if(isset($sales_by_employee)){
			foreach ($sales_by_employee as $item){
				?>
				<tr>
					<td class="item-stock"><?php if(isset($item['title'])){ echo  $item['title']; } ?></td>
					<td style="text-align: center;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($item['price'])){ echo  $item['price']; } ?></td>
				</tr>
			<?php } }else{ ?>
				<tr>
					<td class="item-stock" colspan="2">No Sales Found</td>
				</tr>
			<?php } ?>
	</table>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th colspan="2" style="width: 100%;text-align: center;">Category Summary</th>
		</tr>
		</thead>
		<?php if(isset($categories)){
			foreach ($categories as $item){
				?>
				<tr>
					<td class="item-stock"><?php if(isset($item['title'])){ echo  $item['title']; } ?></td>
					<td style="text-align: center;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($item['price'])){ echo  $item['price']; } ?></td>
				</tr>
			<?php } }else{ ?>
				<tr>
					<td class="item-stock" colspan="2">No Record Found</td>
				</tr>
			<?php } ?>
	</table>
</div>
<br>
    <!-- Category summires loop -->
	<?php if(isset($categories)){ 
		foreach ($categories as $category){
				?>
		<div class="invoice section">
			<table>
				<thead>
				<tr>
				<th colspan="4" style="width: 100%;text-align: center;"><?php if(isset($category['title'])){ echo  $category['title']; } ?></th>
				</tr>
				</thead>
				<tbody>
				<?php if(isset($category['items'])){
					foreach ($category['items'] as $item){
						?>
						<tr>
							<td class="item-stock"><?php if(isset($item['title'])){ echo  $item['title']; } ?></td>
							<td style="text-align: center;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($item['price'])){ echo  $item['price']; } ?></td>
							<td class="item-stock"><?php if(isset($item['type'])){ echo  $item['type']; } ?></td>
							<td class="item-stock"><?php if(isset($item['customer'])){ echo  $item['customer']; } ?></td>
						</tr>
					<?php } } ?>
				</tbody>

			</table>
		</div>
		<br>

		<?php } ?>				
	<?php } ?>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th colspan="4" style="width: 100%;text-align: center;">Money In/Money Out</th>
		</tr>
		</thead>
		<tbody>
		<?php if(isset($money_items)){
			foreach ($money_items as $item){
				?>
				<tr>
					<td class="item-stock"><?php if(isset($item['title'])){ echo  $item['title']; } ?></td>
					<td style="text-align: center;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($item['price'])){ echo  $item['price']; } ?></td>
					<td class="item-stock"><?php if(isset($item['type'])){ echo  $item['type']; } ?></td>
					<td class="item-stock"><?php if(isset($item['desc'])){ echo  $item['desc']; } ?></td>
				</tr>
			<?php } } ?>
		</tbody>
		<tfoot>
		<tr class="text-offset">
			<td colspan="2"></td>
			<td colspan="1" style="background: #cd2827;color: #fff;">Total</td>
			<td style="background: #cd2827;color: #fff;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($final_total)) { echo $final_total; } ?></td>
		</tr>
		</tfoot>
	</table>
</div>
<br>
<footer>
	<div class="footer" style="height: 80px; width: 100% ">
		<img src="https://techspoteduca.com/uploads/footer.jpg" style="width: 100%;height: 70px; margin-top: 50px;">
	</div>
</footer>
</body>
</html>

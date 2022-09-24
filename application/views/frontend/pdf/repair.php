<!DOCTYPE html>
<html>
<style type="text/css">
	@page {
		margin: 0px 0px 0px 0px !important;
		padding: 0px 0px 0px 0px !important;
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
		top: 165px;
		right: 80px;
		font-size: 29px;
		color: #fff;
		margin-right: 30px;
	}
	.Invoice-Number {
		position: absolute;
		top: 190px;
		color: #fff;
	}
	.Invoice-Number h4 {
		margin: 0;
		margin-left: 60px;
	}
	.Bill-to {
		position: absolute;
		top: 238px;
		color: #fff;
		margin-left: 60px;
		padding-top: 38px;
	}
	.Bill-to h4 {
		padding: 0;
		margin: 0;
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
<div class="header-banner" style="height: 400px; width: 100%">
	<img alt="" style="width: 100%; height: 400px;"  src="https://techspoteduca.com/uploads/header.jpg">
</div>
<div class="logo-location">
	<img alt="" style="max-height: 150px"  src="<?php if(isset($logo)) { echo $logo; }  ?>">
</div>
<div class="top-right content">
	<h5><?php if(isset($store_name)) { echo $store_name; }  ?></h5>
	<p><?php if(isset($store_address)) { echo $store_address; }  ?></p>
</div>
<div class="Tax-div">
	<h1><?php if(isset($receipt)) { echo $receipt; }  ?></h1>
</div>
<div class="Invoice-Number">
	<h4>Repair ID:</h4>
	<h4><?php if(isset($var_invoice_numb)) { echo $var_invoice_numb; }  ?></h4>
</div>
<div class="Bill-to">
	<h4>Customer:</h4>
	<h4><?php if(isset($customer_name)) { echo $customer_name; }  ?></h4>
	<h4><?php if(isset($customer_phone)) { echo $customer_phone; }  ?></h4>
	<div class="address">
		<p><?php if(isset($customer_address)) { echo $customer_address; }  ?></p>
	</div>
</div>
<div class="date">
	<h4>Date:</h4>
	<h5><?php if(isset($var_date)) { echo $var_date; }  ?></h5>
</div>
<div class="costDue">
	<h4>Estimated Cost:</h4>
	<h4><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($final_total)){ echo ($final_total); } ?></h4>
</div>
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
			<th style="width: 50%;text-align: center;">Employee</th>
			<th style="width: 50%;text-align: center;">Device Information</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($var_sales_person)) { echo $var_sales_person; }  ?>
			</td>
			<td style="width: 50%;text-align: center;">
				<?php if(isset($device_information)) { echo $device_information; }  ?>
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
			<th colspan="4" style="width: 50%;text-align: center;">Defective / Working Parts</th>
		</tr>
		</thead>
		<tbody>
		<?php if(isset($items)){
			foreach ($items as $item){
		?>
		<tr>
			<td colspan="4" class="item-stock"><?php if(isset($item['item'])){ echo  $item['item']; } ?></td>
		</tr>
		<?php } } ?>
		</tbody>

		<tfoot>
		<tr class="text-offset">
			<td colspan="4" style="border: none;background: #fff;text-align: left;"><?php if(isset($sales_notes)){ echo 'Notes'; } ?></td>
		</tr>
		<tr class="text-offset">
			<td colspan="2" style="border: none;background: #fff;text-align: left;">
				<?php if(isset($sales_notes)){ echo $sales_notes; } ?>
			</td>
			<td style="background: #cd2827;color: #fff;">Estimated Cost</td>
			<td style="background: #cd2827;color: #fff;"><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($final_total)) { echo $final_total; } ?></td>
		</tr>
		</tfoot>
	</table>
	<div class="authorization">
		<hr>
		<p>Authorized Signature</p>
	</div>
</div>

<footer>
	<div class="footer" style="height: 80px; width: 100% ">
		<img src="https://techspoteduca.com/uploads/footer.jpg" style="width: 100%;height: 70px; margin-top: 50px;">
	</div>
</footer>
</body>
</html>

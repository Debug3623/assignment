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
		top: 190px;
		right: 80px;
		font-size: 15px;
		color: #fff;
		margin-right: 30px;

	}
	.Invoice-Number {
		position: absolute;
		top: 190px;

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

		<?php if(isset($items)){
			foreach ($items as $item){
		?>
<div class="header-banner" style="height: 400px; width: 100%">
	<img alt="" style="width: 100%; height: 400px;"  src="http://localhost/wiggin/uploads/header.jpg">
</div>
<div class="logo-location">
	<img alt="" style="max-height: 150px"  src="<?php if(isset($logo)) { echo $logo; }  ?>">
</div>
<div class="top-right content">
	<h5></h5>
	<p></p>
</div>
<div class="Tax-div">
	<p>Status: <?php if(isset($item->status)) {

	    if($item->status==0) {
            echo 'Processing';
        }
	    if($item->status==1)
        {
            echo 'Completed';
        }
	   }
	?></p>
    <p>Invoice Status:<?php if(isset($item->invoice_status)) {

        if($item->invoice_status==0)
        {
            echo 'New';
        }
        if($item->invoice_status==1){
            echo 'Invoiced';
        }
        if($item->invoice_status==2){
            echo 'Voided';
        }

         } ?></p>
</div>
<div class="Invoice-Number">
	<h4>Quote No: <?php if(isset($item->invoice_id)) { echo $item->invoice_id; }?></h4>
	<h4></h4>
</div>
<div class="Bill-to">
	<h4>Ordered From:  <?php if(isset($item->supplier_name)) { echo $item->supplier_name; }  ?></h4>
    <h4>Customer:  <?php if(isset($item->customer_name)) { echo $item->customer_name; }  ?></h4>
</div>
<div class="date">
	<h4></h4>
    <?php
    $date = date('d F, Y', strtotime($item->date_time));
    ?>
	<h5><?php if(isset($date)) { echo $date; } ?></h5>
</div>
<div class="costDue">
	<h4>Amount Paid:</h4>
	<h4><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($final_total)){ echo ($final_total); } ?></h4>
</div>
        <?php }}?>
<br>
<!--<div class="invoice section">-->
<!--	<table>-->
<!--		<thead>-->
<!--		<tr>-->
<!--			<th style="width: 50%;text-align: center;">Employee</th>-->
<!--			<th style="width: 50%;text-align: center;">Payment Type</th>-->
<!--		</tr>-->
<!--		</thead>-->
<!--		<tbody>-->
<!--		<tr>-->
<!--			<td style="width: 50%;text-align: center;">-->
<!--				--><?php //if(isset($var_sales_person)) { echo $var_sales_person; }  ?>
<!--			</td>-->
<!--			<td style="width: 50%;text-align: center;">-->
<!--				--><?php //if(isset($payment_type)) { echo $payment_type; }  ?>
<!--			</td>-->
<!--		</tr>-->
<!--		</tbody>-->
<!--	</table>-->
<!--</div>-->
<br>
<div class="invoice section">
	<table>
		<thead>
		<tr>
            <th style="width: 50%;text-align: center;">#</th>
			<th style="width: 50%;text-align: center;">Item</th>
			<th style="width: 50%;text-align: center;">Qty</th>
			<th style="width: 50%;text-align: center;">Price</th>
			<th style="width: 50%;text-align: center;">Total</th>
		</tr>
		</thead>
		<tbody>
		<?php if(isset($invoice_item)){
			foreach ($invoice_item as $items){
		?>
		<tr>
            <td style="text-align: center;"><?php $count=1; echo $count++; ?></td>
			<td style="text-align: center;"><?php if(isset($items->product_name)){ echo  $items->product_name; } ?></td>
			<td class="item-qty"><?php if(isset($items->quantity)){ echo  $items->quantity; } ?></td>
			<td class="item-price"><?php if(isset($items->currency)) { echo $items->currency; }  ?><?php if(isset($items->product_price)){ echo  $items->product_price; } ?></td>
            <td class="item-price"><?php if(isset($items->currency)) { echo $items->currency; }  ?><?php if(isset($items->product_price)){ echo $total= $items->product_price * $items->quantity; } ?></td>
		</tr>
		<?php } } ?>
		</tbody>

		<tfoot>
		<tr class="text-offset">
			<td colspan="4">Total</td>
			<td><?php if(isset($items->currency)) { echo $items->currency;; }  ?><?php if(isset($total_amount)){ echo $total_amount->total_amount; } ?></td>
		</tr>
        <tr class="text-offset">
            <td colspan="4">SubTotal</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_amount)){ echo $total_amount->response_amount; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Delivery</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->delivery; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Packaging</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->packages; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Other</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->others; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Margin</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->margin; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">margin cost</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->margin_cost; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">other tax</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->other_tax; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Tax</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->tax; } ?></td>
        </tr>
        <tr class="text-offset">
            <td colspan="4">Discount</td>
            <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->discount; } ?></td>
        </tr>
		<tr class="text-offset">
			<td colspan="2" style="border: none;background: #fff;text-align: left;">Notes</td>
			<td colspan="1"><?php if(isset($tax_desc)) { echo $tax_desc; }  ?></td>
			<td><?php if(isset($currency)) { echo $currency; }  ?><?php if(isset($total_tax)){ echo $total_tax; } ?></td>
		</tr>
		<tr class="text-offset">
			<td colspan="2" style="border: none;background: #fff;text-align: left;">
				<?php if(isset($sales_notes)){ echo $sales_notes; } ?>
			</td>
			<td colspan="1" style="background: #cd2827;color: #fff;">Total Selling price</td>
			<td style="background: #cd2827;color: #fff;"><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)) { echo $total_invoice->selling_price; } ?></td>
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
		<img src="http://localhost/repair/uploads/footer.jpg" style="width: 100%;height: 70px; margin-top: 50px;">
	</div>
</footer>
</body>
</html>




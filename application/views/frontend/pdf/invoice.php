<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
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
.invoice-title h2, .invoice-title h3 {
display: inline-block;
}

.table > tbody > tr > .no-line {
border-top: none;
}

.table > thead > tr > .no-line {
border-bottom: none;
}

.table > tbody > tr > .thick-line {
border-top: 2px solid;
}</style>

<body>
<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2 style="margin-left: 300px">INVOICE</h2>
            <?php if(isset($item)){
                                foreach ($item as $items){
        ?>
        
            <?php }}?>

            </div>
            <hr>

            <div class="row">
                <div class="col-xs-6">
                    <address  style="margin-left: 38px">
                        <strong>Quote No: <?php if(isset($items->invoice_id)) { echo $items->invoice_id; }?></strong><br>
                    Status: <?php if(isset($items->status)) {

                        if($items->status==0) {
                            echo "Processing";
                        }
                        if($items->status==1)
                        {
                            echo "Completed";
                        }
                       }
                    ?><br>
                    Invoice Status:<?php if(isset($items->invoice_status)) {

                    if($items->invoice_status==0)
                    {
                        echo 'New';
                    }
                    if($items->invoice_status==1){
                        echo 'Invoiced';
                    }
                    if($items->invoice_status==2){
                        echo 'Voided';
                    }

                     } ?><br>
                    
                    </address>
                     <br>
                     <address style="float: right;margin-right:45px">
                        <strong>Customer:</strong><br>
                        Name: <?php if(isset($items->customer_name)) { echo $items->customer_name; }  ?><br>
                        Mobile: <?php if(isset($items->mobile)) { echo $items->mobile; }  ?><br>
                        Address: <?php if(isset($items->address)) { echo $items->address; }  ?><br>
                      
                    </address>
                </div>

                <div class="col-xs-6" >
                    <address  style="margin-left: 38px">
                        <strong>Ordered From:</strong><br>
                         Name: <?php if(isset($items->supplier_name)) { echo $items->supplier_name; }  ?><br>
                    
                    </address>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <address>
                      
                  </address>
                </div>
                <div class="col-xs-6">
    
              </div>
            </div>
        </div>
    </div>

</div>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body invoice section" >
                    <div class="table-responsive">
                        <table class="table table-condensed">
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
                                <td><?php if(isset($total_invoice)){ echo $total_invoice->margin; } ?>%</td>
                            </tr>
                            <tr class="text-offset">
                                <td colspan="4">margin cost</td>
                                <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)){ echo $total_invoice->margin_cost; } ?></td>
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
                                <td colspan="4">Total Selling price</td>
                                <td><?php if(isset($items)) { echo $items->user_currency_symbol; }  ?><?php if(isset($total_invoice)) { echo $total_invoice->selling_price; } ?></td>

                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
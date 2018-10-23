<div class="" style="border-radius: 0px;">
<div class="tile-title-w-btn">
<h3 class="title">Transaction report for <?php echo $from ?> - <?php echo $to;?></h3>
</div>
<?php $count = 1;
$totalIncome=0;
$totalExpense=0;
$totalRecievable=0
?>

<table id="transaction_report_table" class="table table-hover table-striped">
        <thead>
            <tr>
            	<th>Sl No</th>
            	<th>Date</th>
                <th>Voucher</th>
				<th>Bill no</th>
				<th>Particulars</th> 
				<th>User</th>             
                <th>Ledger</th>
				<th>Amount</th>
            </tr>
        </thead>
        <thead>
            <tr>
            	<th>INCOME</th>
            	<th></th>
                <th></th>
				<th></th>
				<th></th> 
				<th></th>             
                <th></th>
				<th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $Income as $row) {
        	$totalIncome=$totalIncome+$row['Amount']?>
        	
            <tr>
            	<td><?php echo $count?></td>
				<td><?php echo $row['Added_on']?></td>
                <td><?php echo $row['Voucher_no']?></td>
				<td><?php echo $row['Acc_no']?></td>
				<td><?php echo $row['Naration']?></td>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['Ledger']?></td>
                <td style="text-align: right"><span ><?php echo $row['Amount']?></span></td>
				</tr>
        <?php $count ++;  } ?>
        <tr>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td>Total:</td>
       			<td style="text-align: right"><span ><?php echo $totalIncome;?></span></td>
       		</tr>
        </tbody>
       
       <thead>
            <tr>
            	<th>EXPENSES</th>
            	<th></th>
                <th></th>
				<th></th>
				<th></th> 
				<th></th>             
                <th></th>
				<th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $Expense as $row) {
        	$totalExpense=$totalExpense+$row['Amount']?>
        	
            <tr>
            	<td><?php echo $count?></td>
				<td><?php echo $row['Added_on']?></td>
                <td><?php echo $row['Voucher_no']?></td>
				<td><?php echo $row['Acc_no']?></td>
				<td><?php echo $row['Naration']?></td>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['Ledger']?></td>
                <td style="text-align: right"><span ><?php echo $row['Amount']?></span></td>
				</tr>
        <?php $count ++;  } ?>
        <tr>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td>Total:</td>
       			<td style="text-align: right"><span ><?php echo $totalExpense;?></span></td>
       		</tr>
        </tbody>
    <thead>
            <tr>
            	<th>RECIEVABLES</th>
            	<th></th>
                <th></th>
				<th></th>
				<th></th> 
				<th></th>             
                <th></th>
				<th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $Receivable as $row) {
        	$totalRecievable=$totalRecievable+$row['Amount']?>
        	
            <tr>
            	<td><?php echo $count?></td>
				<td><?php echo $row['Added_on']?></td>
                <td><?php echo $row['Voucher_no']?></td>
				<td><?php echo $row['Acc_no']?></td>
				<td><?php echo $row['Naration']?></td>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['Ledger']?></td>
                <td style="text-align: right"><span ><?php echo $row['Amount']?></span></td>
				</tr>
        <?php $count ++;  } ?>
        <tr>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td>Total:</td>
       			<td style="text-align: right"><span><?php echo $totalRecievable;?></span></td>
       		</tr>
        </tbody>
       <tfoot>
       		
       		<tr>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			<td></td>
       			
       			<td colspan="2"><b>Total Income: </b><br>
			    	<b>Total Expense: </b><br>
			    	<b>IN-EX: </b><br>
			    	<b>Total Receivable: </b></td>
       			<td style="text-align: right">
       			<span ><?php echo $totalIncome;?><br>
			    	<?php echo $totalExpense;?><br>
			    	 <?php echo $totalIncome-$totalExpense;?><br>
			    	<?php echo $totalRecievable;?>
			   </span>
    			</td>
       		</tr>
       </tfoot>
    </table>
   
    
</div>

	
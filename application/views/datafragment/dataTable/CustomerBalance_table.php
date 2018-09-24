<div class="tile-title-w-btn">
<h3 class="title">Balance</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="row invoice-info" style="background: #fff; margin: 0px; padding: 10px; color: #000">
<table id="customerBalanceSheet" class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Particulars</th>
                <th>Ref. No.</th>
				<th>Deposit</th>
				<th>Withdrawal</th>
				<th>Balance</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $result as $row) { ?>
            	<tr>
                  <td><?php echo $row['TransactionDate'];?></td>
                  <td><?php echo $row['Particular'];?></td>
                  <td><?php echo $row['RefNo'];?></td>
                  <td><?php echo $row['Diposit'];?></td>
                  <td><?php echo $row['Withdraw'];?></td>
                  <td><?php echo $row['balance'];?></td>
				</tr>
			<?php } ?>	
        </tbody>
</table>
</div>
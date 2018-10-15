<table id="accTranTable" class="table table-hover table-stripped">
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

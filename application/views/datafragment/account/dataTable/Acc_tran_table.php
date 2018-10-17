<table id="accTranTable" class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Voucher No</th>
                <th>Date</th>
                <th>Particulars</th>
				<th>Amount</th>
				<th>Action</th>
				<th>Print</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $result as $row) { ?>
            	<tr>
            	  <td><?php echo $row['Voucher_no'];?></td>
                  <td><?php echo $row['TransactionDate'];?></td>
                  <td><?php echo $row['Particular'];?></td>
                  
                  <td><?php echo $row['Amount'];?></td>
                  <td><a onclick="customeconfirmationbox('deleteVoucher(\'<?php echo $row['Voucher_no'];?>\')', 'Are you sure?', 'Yes, proceed', 'No, Cancel')" class="btn btn-sm btn-danger">Delete</a></td>
                  <td><a onclick="printVoucher'<?php echo $row['Voucher_no'];?>')" class="btn btn-sm btn-primary">Print</a></td>
				</tr>
			<?php } ?>	
        </tbody>
</table>

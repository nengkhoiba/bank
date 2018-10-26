<table id="verifiedIndiLoan" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Name</th>
                <th>Account No</th>
				 <th>Loan Account No</th>
				 <th>Loan Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $row) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Acc_no'];?></td>
				<td><?php echo $row['Loan_acc_no'];?></td>
				<td><?php echo $row['Loan_name'];?></td>
                <td><button onclick="addDocForm('<?php echo $row['Loan_acc_no'];?>','<?php echo $row['Loan_master_id'];?>')" value="<?php echo $row['Loan_acc_no']?>" class="btn btn-sm btn-success" style="" type="button">Upload Document</button></td>
				</tr>
        <?php $count ++;} ?>
        </tbody>
       
    </table>
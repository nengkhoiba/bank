<table id="verifiedLoan" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Group Loan Acc No</th>
                <th>Group Name</th>
				 <th>Loan Type</th>
				 <th>Loan Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $row) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['Group_loan_acc_no'];?></td>
                <td><?php echo $row['Group_id'];?></td>
				<td><?php echo $row['Loan_master_id'];?></td>
				<td><?php echo $row['Loan_name'];?></td>
                <td><button onclick="LoanGroupSearch(this.value)" value="<?php echo $row['Group_id']?>" class="btn btn-sm btn-success" style="" type="button">View Information</button></td>
				</tr>
        <?php $count ++;} ?>
        </tbody>
       
    </table>
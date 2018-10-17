<table id="loan_history_table" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Loan A/C No.</th>
				<th>Group Name</th>
				<th>Loan Name</th>
				<th>Calculation Type</th>
				<th>Loan Purpose</th>
				<th>Loan Amount</th>
				<th>Action</th>				
            </tr>
        </thead>
        <tbody>
			
        <?php $count = 1; foreach ( $result as $row) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $row['Loan_acc_no'];?></td>
				<td><?php echo $row['Group_id'];?></td>
				<td><?php echo $row['Loan_name'];?></td>
				<td><?php echo $row['Loan_calculation_type'];?></td>
				<td><?php echo $row['Loan_purpose'];?></td>
				<td><?php echo $row['Loan_amount'];?></td>
                <td><button onclick="viewLoanApplicationForm($(this))" style="color:#fff" value="<?php echo $row['ID'];?>" class="btn btn-sm btn-success" type="button">View Application</button></td>
			</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
	
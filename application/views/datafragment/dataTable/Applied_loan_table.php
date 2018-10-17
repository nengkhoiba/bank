<table id="applied_loan_table" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Loan A/C No.</th>
				<th>Account No.</th>
				<th>Customer Name</th>
				<th>Approved Amount</th>
				<th>Approved By</th>
				<th>Approved Date</th>
				<th>Action</th>				
            </tr>
        </thead>
        <tbody>
			
        <?php $count = 1; foreach ( $result as $loan_sanction_data) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $loan_sanction_data['Loan_acc_no'];?></td>
				<td><?php echo $loan_sanction_data['Acc_no'];?></td>
				<td><?php echo $loan_sanction_data['customer_name'];?></td>
				<td><?php echo $loan_sanction_data['Loan_amount'];?></td>
				<td><?php echo $loan_sanction_data['emp_name_approved_by'];?></td>
				<td><?php echo date("d-m-Y h:i:s A", strtotime($loan_sanction_data['Added_on']));?></td>
                <td><button onclick="viewLoanApplicationForm($(this))" style="color:#fff" value="<?php echo $loan_sanction_data['Acc_no'];?>" class="btn btn-sm btn-success" type="button">View Application</button></td>
			</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
	
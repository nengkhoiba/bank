<table id="selected_member_data_table" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
				<th>Address</th>
				<th>District</th>
				<th>Contact No</th>              
                <th>Aadhaar No</th>
				<th>Account No</th>
				<th>Loan Account No</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $mem_data) { ?>
            <tr>
            	<td><?php echo $count?></td>
                <td><?php echo $mem_data['name']?></td>
				<td><?php echo $mem_data['parmanent_address']?></td>
                <td><?php echo $mem_data['district']?></td>                               
				<td><?php echo $mem_data['contact_no']?></td>
				<td><?php echo $mem_data['aadhaar_no']?></td>
				<td><?php echo $mem_data['Acc_no']?></td>
                <td><?php echo $mem_data['Loan_acc']?></td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
	
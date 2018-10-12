<table id="memTable" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl.</th>
                <th>Name</th>
				<th>Add.</th>
				<th>Dist.</th>
				<th>Contact</th>              
                <th>Aadhaar No</th>
				<th>A/c No</th>
				<th>Loan A/c No</th>
				<th>Amnt.</th>
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
                <td>
                <input id="ammount_<?php echo $mem_data['ID']?>" onkeyup="checkedCheckbox($(this))" type="number" placeholder="Enter Amount"></input>
                <input id="loan_acc_no_<?php echo $mem_data['ID']?>" class="loanAccNo" type="checkbox" value="<?php echo $mem_data['Loan_acc'];?>">
                <input id="collected_amount_<?php echo $mem_data['ID']?>" class="amount" type="checkbox" value="">
                </td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
<div class="form-group align-self-end" >
<input id="user_password" style="width: 30%" name="user_password" class="form-control" type="password" placeholder="Enter Password"></input>
<br>
<button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
</div>

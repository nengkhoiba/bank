<table id="loanmaster" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Loan Name</th>
				<th>Loan PC</th>
				<th>Loan PC type</th>
				<th>Tenure type</th>
				<th>Tenure Min.</th>				
                <th>Tenure Max.</th>
				<th>Min. amount</th>
				<th>Max. amount</th>
				<th>Income ledger</th>
				<th>Expense ledger</th>
				<th>Created On</th>
				<th>
					<div class="animated-checkbox">
					<label>
					<input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Delete All</span>
					</label>
					</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $loanmaster_data) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $loanmaster_data['Loan_name'];?></td>
				<td><?php echo $loanmaster_data['Loan_pc'];?></td>
				<td><?php echo $loanmaster_data['Loan_pc_type'];?></td>
				<td><?php echo $loanmaster_data['Tenure_type'];?></td>
				<td><?php echo $loanmaster_data['Tenure_min'];?></td>
				<td><?php echo $loanmaster_data['Tenure_max'];?></td>
				<td><?php echo $loanmaster_data['Min_amount'];?></td>
				<td><?php echo $loanmaster_data['Max_amount'];?></td>
				<td><?php echo $loanmaster_data['Income_ledger'];?></td>
				<td><?php echo $loanmaster_data['Expense_ledger'];?></td>
				<td><?php echo date("d-m-Y h:i:s A", strtotime($loanmaster_data['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $loanmaster_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addLoanmasterform($(this))" value="<?php echo $loanmaster_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
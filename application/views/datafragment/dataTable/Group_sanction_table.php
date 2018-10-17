<table id="loanmaster" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Loan A/C No.</th>
				<th>Group Code</th>
				<th>Group Name</th>
				<th>Approved Amount</th>
				<th>Approved By</th>
				<th>Approved Date</th>
				<th>Action</th>				
                <th>
					<div class="animated-checkbox">
					<label>
					<input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Select All</span>
					</label>
					</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $loan_sanction_data) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $loanmaster_data['Min_amount'];?></td>
				<td><?php echo $loanmaster_data['Max_amount'];?></td>
				<td><?php echo $loanmaster_data['Fine_type'];?></td>
				<td><?php echo $loanmaster_data['Fine_value'];?></td>
				<td><?php echo $loanmaster_data['Buffer_days'];?></td>
				<td><?php echo $loanmaster_data['Loan_calculation_type'];?></td>
				<td><?php echo date("d-m-Y h:i:s A", strtotime($loanmaster_data['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
					<label>
						<input class="checkbox" type="checkbox" value="<?php echo $loanmaster_data['ID'];?>"><span class="label-text"></span>
					</label>
				</div>
            	</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
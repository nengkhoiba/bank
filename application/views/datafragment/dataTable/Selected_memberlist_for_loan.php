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
				<th>
					Action
            	</th>
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
                <td>
				
					<button class="btn btn-sm btn-success" onclick="load_loan_doc_upload_model(<?php ?>)" data-toggle="modal" data-target="#loan_info_upload" type="button" >Upload Info</button>					
    			</td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
	
	<div class="row" style="padding:15px;">
		<div class="col-md-4">
			<label class="control-label">Select Loan type</label>
			<select class="form-control" onchange="searchLoanTypeDetails(this.value);" style="margin-top: 10px;" id="group_Loan_Type_Id" name="LoanTypeId">
			 <!-- Loan Type will add here -->
			</select>
		</div>
	</div>	
	
	<div class="col-md-12">
		<br>
		<div id="loan_details" class="">								 
		</div>
	</div>
	

						
								
								
	
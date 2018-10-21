<?php //echo $result[0]['Loan_name']; echo $result[0]['Loan_pc']; echo $result[0]['pc_type_id']; echo $result[0]['loan_tenure_type_id']; echo $result[0]['Tenure_min']; echo $result[0]['Tenure_max']; echo $result[0]['Min_amount']; echo $result[0]['Max_amount']; echo $result[0]['pc_type_name']; echo $result[0]['tenure_type_name'];
?>

<table  class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Loan Name</th>				
				<th>Loan Calculation</th>
				<th>Loan PC</th>
                <th>Tenure Type</th>
                <th>Tenure Min.</th>
                <th>Tenure Max.</th>
                <th>Min. Amount</th>
                <th>Max. Amount</th>
                <th>Calculation Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $result[0]['Loan_name'];?></td>
				<td><?php echo $result[0]['pc_type_name'];?></td>
                <td><?php echo $result[0]['Loan_pc'];?></td>
				<td><?php echo $result[0]['tenure_type_name'];?></td>
                <td><?php echo $result[0]['Tenure_min'];?></td>
				<td><?php echo $result[0]['Tenure_max'];?></td>
                <td><?php echo $result[0]['Min_amount'];?></td>
				<td><?php echo $result[0]['Max_amount'];?></td>	
				<td><?php echo $result[0]['Loan_calculation_type'];?></td>			
            </tr>
        </tbody>
       
    </table>
	<div class="">
	
	</div>
	<input type="hidden" name="loan_master_id" id="loan_master_id" value="<?php echo $result[0]['ID'];?>"/>
	<input type="hidden" name="isGroup" id="isGroup" value="0"/>
	<input type="hidden" name="loan_fine_type" id="loan_fine_type" value="<?php echo $result[0]['Fine_type'];?>"/>
	<input type="hidden" name="loan_fine_value" id="loan_fine_value" value="<?php echo $result[0]['Fine_value'];?>"/>
	<input type="hidden" name="loan_buffer_days" id="loan_buffer_days" value="<?php echo $result[0]['Buffer_days'];?>"/>
	<input type="hidden" name="loan_calculation_type" id="loan_calculation_type" value="<?php echo $result[0]['Loan_calculation_type'];?>"/>
	<input type="hidden" name="loan_pc" id="loan_pc" value="<?php echo $result[0]['Loan_pc'];?>"/>
	<input type="hidden" name="loan_name" id="loan_name" value="<?php echo $result[0]['Loan_name'];?>"/>
	<input type="hidden" name="loan_pc_master_id" id="loan_pc_master_id" value="<?php echo $result[0]['loan_pc_master_id'];?>"/>
	<input type="hidden" name="tenure_type_master_id" id="tenure_type_master_id" value="<?php echo $result[0]['tenure_type_master_id'];?>"/>
	
							
	<div class="row" style="padding:15px;">
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Loan Amount</label>
								  	<div class="input-group" style="margin-top:10px;">
										<input class="form-control number" id="loan_amount" name="loan_amount" type="text" placeholder="Loan Amount">
									</div>
									<label class="control-label custome_label"><?php echo "( Rs.".$result[0]['Min_amount']." to ".$result[0]['Max_amount']." ) ";?> </label>
								</div>
								
							<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Tenure Interval</label>
									 <select id="loanmaster_tenure_type" name="loanmaster_tenure_type" style="margin-top:10px;" class="form-control" >
										<!-- List of loan tenure type -->
									  </select>
									  <label class="control-label custome_label"></label>
								</div>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Interval value</label>
								  	<div class="input-group" style="margin-top:10px;">
										<input class="form-control number" id="loan_tenure_interval_value" name="loan_tenure_interval_value" type="text" placeholder="Interval value">
									</div>
									<label class="control-label custome_label"></label>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <label class="control-label">Tenure length</label>
								  <input  name="tenure_length" style="margin-top: 10px;"
									class="form-control number"  type="text" id="tenure_length"
									placeholder="Tenure length"></input>
									<label class="control-label custome_label"><?php echo " ( ".$result[0]['Tenure_min']." to ".$result[0]['Tenure_max']." ) ".$result[0]['tenure_type_name'];?> </label>
								</div>
								
								
								<div class="form-group col-md-4 align-self-end">
								  <label class="control-label">Loan Purpose</label>
									<textarea  name="loan_purpose" style="margin-top: 10px;"
										class="form-control "  type="text" rows="1" id="loan_purpose"
										placeholder="Loan Purpose"></textarea>
										<label class="control-label custome_label"></label>
								</div>
								
							
							</div>
						
						
								
								<div class="form-group col-md-12 align-self-end">
								  <button onclick="calculate_loan()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Calculate</button>
								  &nbsp;&nbsp;&nbsp;
								   <button onclick="Save_Loan_Application()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
								  &nbsp;&nbsp;&nbsp;
										  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
								
							
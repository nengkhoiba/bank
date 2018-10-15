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
            </tr>
        </tbody>
       
    </table>
	<div class="">
	
	</div>
	
	<div class="row" style="padding:15px;">
								<div class="form-group col-md-3 align-self-end">
									<label class="control-label">Loan Amount</label>
								  	<div class="input-group" style="margin-top:10px;">
										<div class="input-group-prepend"><span class="input-group-text fa fa-inr"></span></div>
										<input class="form-control number" id="exampleInputAmount" type="text" placeholder="Loan Amount">
										<div class="input-group-append"><span class="input-group-text">.00</span></div>
									</div>
									<label class="control-label custome_label"><?php echo "( Rs.".$result[0]['Min_amount']." to ".$result[0]['Max_amount']." ) ";?> </label>
								</div>
								
							<div class="col-md-3">
									<label class="control-label">Select Loan type</label>
									<select class="form-control" onchange="searchLoanTypeDetails(this.value);" style="margin-top: 10px;" id="individual_Loan_Type_Id" name="LoanTypeId">	<option class="form-control" value="">- Select -</option>
  	<option class="form-control" value="1">first</option>
  	<option class="form-control" value="2">sadsad</option>
  	<option class="form-control" value="3">sadsad</option>
  	<option class="form-control" value="4">Personal loan</option>
  	<option class="form-control" value="5">dasdsad</option>
  	<option class="form-control" value="6">Car Loan</option>
 
  
</select>
								</div>
								
								<div class="form-group col-md-2 align-self-end">
								  <label class="control-label">Tenure length</label>
								  <input  name="shg_member_count" style="margin-top: 10px;"
									class="form-control number"  type="text" id="shg_member_count"
									placeholder="Tenure length"></input>
									<label class="control-label custome_label"><?php echo " ( ".$result[0]['Tenure_min']." to ".$result[0]['Tenure_max']." ) ".$result[0]['tenure_type_name'];?> </label>
								</div>
								
								
								<div class="form-group col-md-4 align-self-end">
								  <label class="control-label">Loan Purpose</label>
									<textarea  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="text" id="shg_member_count"
										placeholder="Loan Purpose"/>
									</input>
								</div>
								
								<div class="col-md-12">
								<br><br>
									<h5>Assets</h5>
									<hr>
								</div>
									
									
									  <div class="">
					<div data-role="dynamic-fields">
						<div class="form-inline">
							<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Asset Name</label>
									  <input  name="asset_name[]" style="margin-top: 10px;"
										class="form-control name"  type="text" placeholder="Asset Name"></input>
									</div>
									<div class="form-group col-md-6 align-self-end">
									  <label class="control-label">Particulars of the properties</label>
									  <input  name="particular_properties[]" style="margin-top: 10px;"
										class="form-control text_number"  type="text" placeholder="Particular of the properties"></input>
									</div>
									<div class="form-group col-md-2 align-self-end">
									  <label class="control-label">Approx. values (in Rs.)</label>
									  <input  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="text" id="shg_member_count"
										placeholder="Tenure length"></input>
									</div>
									
								<div class="form-group col-md-1" style="padding-top: 25px;">
									<button class="btn btn-danger" data-role="remove">
										<span class="fa fa-close"></span>
									</button>
									<button class="btn btn-primary" data-role="add">
										<span class="fa fa-plus"></span>
									</button>
								</div>
						</div>  <!-- /div.form-inline -->
					</div>  <!-- /div[data-role="dynamic-fields"] -->
				</div>  <!-- /div.col-md-12 -->
																	
																	
									<div class="col-md-12">
									<br><br>
										<h5>Guranter</h5>
										<hr>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter Name</label>
									  <input  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="text" id="shg_member_count"
										placeholder="Guranter Name"></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter Aadhaar No.</label>
									  <input  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="text" id="shg_member_count"
										placeholder="Aadhaar No."></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter Photo</label>
									  <input  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="file" id="shg_member_count"></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter ID Proff</label>
									  <input  name="shg_member_count" style="margin-top: 10px;"
										class="form-control number"  type="file" id="shg_member_count"></input>
									</div>
							</div>
						
						
								
								<div class="form-group col-md-12 align-self-end">
								  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Calculate</button>
								  &nbsp;&nbsp;&nbsp;
								   <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
								  &nbsp;&nbsp;&nbsp;
										  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
								
							
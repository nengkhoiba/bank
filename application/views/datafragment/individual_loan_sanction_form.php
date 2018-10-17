  <div class="row" id="individual_loan_sanction_form">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Individual Loan Sanction form</h3>
             <button onclick="removeMasterform('#individual_loan_sanction_form')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
			
		
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasIndiLoansanctionForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Name</label>
                  <input name="loanmaster_loan_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="loanmaster_loan_name"
    				placeholder="Loan Name" Value="<?php echo $result[0]['Loan_amount'];?>"></input>
                </div>
          
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['Loan_acc_no'];?>"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC Type</label>
                  <select id="loanmaster_loan_pc_type" name="loanmaster_loan_pc_type" style="margin-top:10px;" class="form-control" >
                  	<!-- List of loan pc type -->
                  </select>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Type</label>
                  <select id="loanmaster_tenure_type" name="loanmaster_tenure_type" style="margin-top:10px;" class="form-control" >
                  	<!-- List of loan tenure type -->
                  </select>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Min</label>
                  <input name="loanmaster_tenure_min" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="loanmaster_tenure_min"
					placeholder="Loan Tunure Min"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Max</label>
                  <input name="loanmaster_tenure_max" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="loanmaster_tenure_max"
					placeholder="Loan Tunure Max"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Min Amount</label>
                  <input name="loanmaster_min_amount" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="loanmaster_min_amount"
					placeholder="Loan Min Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Max Amount</label>
                  <input name="loanmaster_max_amount" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="loanmaster_max_amount"
					placeholder="Loan Max Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Fine Type</label>
                  <select id="Fine_type" name="Fine_type" style="margin-top:10px;" class="form-control" >
                  		<option value="1">Fixed</option>
                  		<option value="2">PC</option>
                  		<option value="3">Compound</option>
                  </select>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Fine Value</label>
                  <input name="Fine_value" style="margin-top: 10px;"
					class="form-control percentage" type="text" id="Fine_value"
					placeholder="Fine Value"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Buffer days</label>
                  <input name="buffer_day" style="margin-top: 10px;"
					class="form-control number" type="text" id="buffer_day"
					placeholder="Loan collection buffer days"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan calculation type</label>
                  <select id="Loan_type" name="Loan_type" style="margin-top:10px;" class="form-control" >
                  	<option value="1">Flat</option>
                  	<option value="2">Reducing</option>
                  </select>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateLoanmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasLoanmasterForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
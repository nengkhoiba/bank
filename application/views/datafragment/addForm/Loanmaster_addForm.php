<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Loan details</h3>
             <button onclick="removeMasterform('#MasLoanmasterformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasLoanmasterForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Name</label>
                  <input name="loanmaster_loan_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="loanmaster_loan_name"
    				placeholder="Loan Name"></input>
                </div>
          
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC Type</label>
                  <input name="loanmaster_loan_pc_type" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_loan_pc_type"
					placeholder="Loan PC Type"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Type</label>
                  <input name="loanmaster_tenure_type" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_tenure_type"
					placeholder="Loan Tunure Type"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Min</label>
                  <input name="loanmaster_tenure_min" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_tenure_min"
					placeholder="Loan Tunure Min"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Max</label>
                  <input name="loanmaster_tenure_max" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_tenure_max"
					placeholder="Loan Tunure Max"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Min Amount</label>
                  <input name="loanmaster_min_amount" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_min_amount"
					placeholder="Loan Min Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Max Amount</label>
                  <input name="loanmaster_max_amount" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_max_amount"
					placeholder="Loan Max Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Income Ledger</label>
                  <input name="loanmaster_income_ledger" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_income_ledger"
					placeholder="Income Ledger"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Expense Ledger</label>
                  <input name="loanmaster_expense_ledger" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_expense_ledger"
					placeholder="Expense Ledger"></input>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addLoanmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasLoanmasterForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasLoanmasterformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 

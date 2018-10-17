  
  
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
            <input id="loan_app_id" name="loan_app_id" type="hidden" value="<?php echo $result[0]['ID'];?>">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Customer Name</label>
                  <input name="loanmaster_loan_name" style="margin-top: 10px;"
    				class="form-control name disabled" readonly type="text" id="loanmaster_loan_name"
    				placeholder="Loan Name" Value="<?php echo $result[0]['customer_name'];?>"></input>
                </div>
				
				 <div class="form-group col-md-3 align-self-end">
                  <label class="control-label">Account No.</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['Acc_no'];?>"></input>
                </div>
				 <div class="form-group col-md-3 align-self-end">
                  <label class="control-label">Loan Account No.</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['Loan_acc_no'];?>"></input>
                </div>
				<div class="form-group col-md-2">
				 <label class="control-label">Customer Photo</label>
					<img id="photo" width="100%" class="img-responsive pull-right" style="padding: 5px" src="<?php  echo $result[0]['customer_photo'];?>">
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC.</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['Loan_pc'];?>"></input>
                </div>
				<div class="form-group col-md-3 align-self-end">
                  <label class="control-label">Loan Name</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['loan_name'];?>"></input>
                </div>
				<div class="form-group col-md-3 align-self-end">
                  <label class="control-label">Loan Tenure</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo $result[0]['Loan_tenure_length']." ( ".$result[0]['tenure_name']." ) ";?>"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Approved Date</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control  disabled" readonly type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC" Value="<?php echo date("d-m-Y h:i:s A", strtotime($result[0]['approved_date'])) ;?>"></input>
                </div>
				
				
				
				
				<div class="form-group col-md-3 align-self-end">
                  <label class="control-label">Payment Mode</label>
					<select  onchange="check_value(this.value);" name="payment_mode" style="margin-top:10px;" class="form-control" id="payment_mode" >

                  	</select>
                </div>
				
				
				<div class="form-group col-md-3 align-self-end" id="cheque_box" style="visibility:hidden;"  >
                  <label class="control-label">Cheque No.</label>
                  <input name="cheque_no" style="margin-top: 10px;"
					class="form-control text_number" type="text" id="cheque_no"
					placeholder="Cheque No."></input>
                </div>
				
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addSanctionDetails()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                  &nbsp;&nbsp;&nbsp;
		          <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#individual_loan_sanction_form')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
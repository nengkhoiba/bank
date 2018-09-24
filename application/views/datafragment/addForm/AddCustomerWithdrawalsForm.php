<div class="tile-title-w-btn">
<h3 class="title">Withdrawals Form</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="invoice-info" style="background: #fff; margin: 0px; padding: 10px; color: #000">
<div class="row">
<div class="col-6">
  <?php echo form_open_multipart('',array('id'=>'CustomerWithdrawlsForm','class'=>'row'))?>
<input id="customer_account_no" value="<?php echo $result[0]['accNo'];?>" name="customer_account_no" type="hidden">
<input id="customer_withdrawals_tranId_hidden" name="customer_withdrawals_tranId_hidden" type="hidden">
<div class="form-group col-md-12 align-self-end">
  <label class="control-label">Withdrawals Amount</label>
  	<input name="customer_withdrawals_amount" style="margin-top: 10px;"
class="form-control number" type="text" id="customer_withdrawals_amount"
	placeholder="Withdrawals Amount"></input>
</div>
<div class="form-group col-md-12 align-self-end">
  <label class="control-label">Narration</label>
  	<textarea name="customer_withdrawals_narration" style="margin-top: 10px;"
class="form-control address" id="customer_withdrawals_narration"
	placeholder="Narration"></textarea>
</div>
	<div class="form-group col-md-12 align-self-end">
          <button id="submitBtn" onclick="customeconfirmationbox('addCustomerWithdrawals()','Are you sure?','Yes, Withdraws it!', 'No, cancel plz!')" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<button id="resetBtn" class="btn btn-sm btn-secondary" onclick="resetAllFormValue('#CustomerWithdrawlsForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
</div>            
<?php echo form_close() ?>
</div>
<div class="col-6">
<b> Account Number : </b><span id="customer_acc_no"><?php echo $result[0]['accNo'];?></span><br><br>
<b> Transaction ID : </b><span id="customer_withdrawals_tranId"></span><br>
  <b> Voucher Number : </b><span id="customer_voucher_no">N/A</span><br>
    <b> Balance : </b><span id="customer_balance">N/A</span> 
</div>
</div>
<br>

</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validation.js"></script>
<?php echo form_open_multipart('',array('id'=>'CustomerWithdrawlsForm','class'=>'row'))?>
<input id="postType" value="<?php echo $result[0]['ID'];?>" name="postType" type="hidden">
<div class="form-group col-md-6 align-self-end">
  <label class="control-label">Withdrawals Amount</label>
  	<input name="customer_withdrawals_amount" style="margin-top: 10px;"
class="form-control number" type="text" id="customer_withdrawals_amount"
	placeholder="Withdrawals Amount"></input>
</div>
<div class="form-group col-md-6 align-self-end">
  <label class="control-label">Narration</label>
  	<input name="customer_withdrawals_narration" style="margin-top: 10px;"
class="form-control name" type="text" id="customer_deposite_narration"
	placeholder="Narration"></input>
</div>
	<div class="form-group col-md-4 align-self-end">
          <button onclick="addCustomerWithdrawals()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerWithdrawlsForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
</div>            
<?php echo form_close() ?>
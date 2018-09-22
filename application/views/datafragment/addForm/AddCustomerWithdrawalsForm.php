<div class="tile-title-w-btn">
<h3 class="title">Withdrawals Form</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="invoice-info" style="background: #fff; margin: 0px; padding: 10px; color: #000">
<div class="row">
<div class="col-6">
  <b> Transaction ID : </b><span id="customer_account_no">RD87191212</span> 
</div>
</div>
<br>
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
</div>
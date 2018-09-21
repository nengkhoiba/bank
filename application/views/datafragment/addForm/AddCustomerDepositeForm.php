<?php echo form_open_multipart('',array('id'=>'CustomerDepositeForm','class'=>'row'))?>
<input id="postType" value="<?php echo $result[0]['ID'];?>" name="postType" type="hidden">
<div class="form-group col-md-6 align-self-end">
  <label class="control-label">Deposite Amount</label>
  	<input name="customer_deposite_amount" style="margin-top: 10px;"
class="form-control number" type="text" id="customer_deposite_amount"
	placeholder="Deposite Amount"></input>
</div>
<div class="form-group col-md-6 align-self-end">
  <label class="control-label">Narration</label>
  	<input name="customer_deposite_narration" style="margin-top: 10px;"
class="form-control name" type="text" id="customer_deposite_narration"
	placeholder="Narration"></input>
</div>
	<div class="form-group col-md-4 align-self-end">
          <button onclick="addCustomerDeposite()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerDepositeForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
</div>            
<?php echo form_close() ?>
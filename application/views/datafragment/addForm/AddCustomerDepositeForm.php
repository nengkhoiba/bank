<div class="tile-title-w-btn">
<h3 class="title">Deposite Form</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="invoice-info" style="background: #fff; margin: 0px; padding: 10px; color: #000">
<div class="row">
<div class="col-6">
  <b> Transaction ID : </b><span id="customer_account_no">RD87191212</span> 
</div>
<div class="col-6">
  <b> Transaction Type : </b><span id="customer_account_no">R</span>
</div>
</div>
<br>
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
</div>
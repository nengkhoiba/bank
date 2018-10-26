<?php echo form_open_multipart('',array('id'=>'CustomerLoanDocUploadForm','class'=>'row', 'style'=>'display:none'))?>
<input id="loanAccNo" name="loanAccNo" type="hidden">
<input id="loanMasterId" name="loanMasterId" type="hidden">
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Select Document Type</label>
  <select id="customer_loan_doc_type" name="customer_loan_doc_type" style="margin-top:10px;" class="form-control" >
<!-- List of document type -->
  	</select>
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Remark</label>
  <input class="form-control" id="customer_loan_doc_remark" name="customer_loan_doc_remark" style="margin-top: 10px;" type="text"></input>
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Select File</label>
  <input class="form-control" onchange="imagetoBase64(this)" id="file"
	style="margin-top: 10px;" type="file"></input> <input
	type="hidden" name="fileUpload" id="fileUpload">
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label"></label>
  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/img/NoImage.png">
</div>
	
<div class="form-group col-md-4 align-self-end">
  <button onclick="updateCustomerLoanDoc()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerLoanDocUploadForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#CustomerLoanDocUploadForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</div>            
<?php echo form_close() ?>
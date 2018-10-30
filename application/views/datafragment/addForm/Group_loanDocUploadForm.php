<?php echo form_open_multipart('',array('id'=>'CustomerLoanDocUploadForm_Grp','class'=>'row', 'style'=>'display:none'))?>
<input id="loanAccNo_Grp" name="loanAccNo_Grp" type="hidden">
<input id="loanMasterId_Grp" name="loanMasterId_Grp" type="hidden">
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Select Document Type</label>
  <select id="customer_loan_doc_type_Grp" name="customer_loan_doc_type_Grp" style="margin-top:10px;" class="form-control" >
<!-- List of document type -->
  	</select>
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Remark</label>
  <input class="form-control" id="customer_loan_doc_remark_Grp" name="customer_loan_doc_remark_Grp" style="margin-top: 10px;" type="text"></input>
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
  <button onclick="updateCustomerLoanDoc_Grp()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerLoanDocUploadForm_Grp')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#CustomerLoanDocUploadForm_Grp')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</div>            
<?php echo form_close() ?>
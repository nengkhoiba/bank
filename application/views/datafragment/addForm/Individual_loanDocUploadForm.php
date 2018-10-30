<?php echo form_open_multipart('',array('id'=>'CustomerLoanDocUploadForm_Indi','class'=>'row', 'style'=>'display:none'))?>
<input id="loanAccNo_Indi" name="loanAccNo_Indi" type="hidden">
<input id="loanMasterId_Indi" name="loanMasterId_Indi" type="hidden">
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Select Document Type</label>
  <select id="customer_loan_doc_type_Indi" name="customer_loan_doc_type_Indi" style="margin-top:10px;" class="form-control" >
<!-- List of document type -->
  	</select>
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Remark</label>
  <input class="form-control" id="customer_loan_doc_remark_Indi" name="customer_loan_doc_remark_Indi" style="margin-top: 10px;" type="text"></input>
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label">Select File</label>
  <input class="form-control" onchange="imagetoBase64_Indi(this)" id="file_Indi"
	style="margin-top: 10px;" type="file"></input> <input
	type="hidden" name="fileUpload_Indi" id="fileUpload_Indi">
</div>
<div class="form-group col-md-3 align-self-end">
  <label class="control-label"></label>
  <img id="imgThumb_Indi" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/img/NoImage.png">
</div>
	
<div class="form-group col-md-4 align-self-end">
  <button onclick="updateCustomerLoanDoc_Indi()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerLoanDocUploadForm_Indi')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
&nbsp;&nbsp;&nbsp;
<a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#CustomerLoanDocUploadForm_Indi')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</div>            
<?php echo form_close() ?>

<script>
function imagetoBase64_Indi(element)
{
var file=element.files[0];
var size=element.files[0].size;

//File type & size check start
var fileName = document.getElementById("file_Indi").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
if (extFile=="png" || extFile=="jpg" || extFile=="jpeg" || extFile=="pdf")
{
  if(size > 2000000)
  {
  document.getElementById('file_Indi').value=null;
  document.getElementById('imgThumb_Indi').src=null;
  var msg=' Please select another one. (Maximum file size is 2 MB)'
   SetWarningMessageBox('warning', msg);
  throw new Error();
  }
}
else
{
  document.getElementById('file_Indi').value=null;
  SetWarningMessageBox('warning', 'Only png/jpg/jpeg/pdf files are allowed!');
    throw new Error();
}
//File type & size check end

var reader=new FileReader();
reader.onloadend=function()
  {
  $('#fileUpload_Indi').val(reader.result);
  $('#imgThumb_Indi').attr("src",reader.result);
  $('#fileUploadName_Indi').val(element.files[0].name); 
  }
  reader.readAsDataURL(file);
} 
</script>
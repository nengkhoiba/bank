<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Membership</h3>
             <button onclick="removeMasterform('#MasMemformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasMemForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="member_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input name="member_dob" style="margin-top: 10px;"
					class="form-control" type="text" id="member_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Sex</label>
                  <select id="member_gender" name="member_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">Male</option>
                  	<option class="form-control" value="2">Female</option>
                  	<option class="form-control" value="3">Other</option>
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_aadhaar" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Husband Name/Father Name</label>
                  	<input name="member_husband" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_husband"
    				placeholder="Husband Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_address" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_address"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
                  	<input name="member_rural" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_rural"
    				placeholder="Rural"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Urban</label>
                  	<input name="member_urban" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_urban"
    				placeholder="Urban"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  	<input name="member_district" style="margin-top: 10px;"
					class="form-control" type="text" id="member_district"
					placeholder="District"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_contact" style="margin-top: 10px;"
					class="form-control" type="text" id="member_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank A/C Number (if any)</label>
                  <input name="member_bankaccount" style="margin-top: 10px;"
					class="form-control" type="text" id="member_bankaccount"
					placeholder="Bank Account Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Branch</label>
                  <input name="member_bankbranch" style="margin-top: 10px;"
					class="form-control" type="text" id="member_bankbranch"
					placeholder="Bank Branch"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Work/Business/Profession</label>
                  <input name="member_work" style="margin-top: 10px;"
					class="form-control" type="text" id="member_work"
					placeholder="Work/Business/Profession"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Nominee</label>
                  <input name="member_nominee" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nominee"
					placeholder="Nominee"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_nomineeaadhaar" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeaadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_nomineeaddress" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeaddress"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
                  	<input name="member_nomineerural" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineerural"
    				placeholder="Rural"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Urban</label>
                  	<input name="member_nomineeurban" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeurban"
    				placeholder="Urban"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  	<input name="member_nomineedistrict" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nomineedistrict"
					placeholder="District"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_nomineecontact" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nomineecontact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Passport</label>
                  <input class="form-control" onchange="imagetoBase64(this)" id="file"
					style="margin-top: 10px;" type="file"></input> <input
					type="hidden" name="fileUpload" id="fileUpload"> <input
					type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label"></label>
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/img/NoImage.png">
                </div>
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addMem()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MasMemForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasMemformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>

<script>
$(document).ready(function (){
var date = new Date();
date.setDate(date.getDate()-1);            

// allow to pick future date
    // $('#employee_dob').datepicker({
    // format: "dd/mm/yyyy"
    // });
// allow to pick future date

var FromEndDate = new Date();
$(function(){
$('#member_dob').datepicker({
format: 'mm-dd-yyyy',
endDate: FromEndDate, 
autoclose: true
});
});
});
</script>
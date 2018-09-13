<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Membership</h3>
             <button onclick="removeMasterform('#MasMemformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasMemForms','class'=>'row'))?>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="member_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="member_name"
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
                        <!-- list of  gender -->
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_aadhaar" maxlength="12" onfocusout="checkAadhaar($(this))" style="margin-top: 10px;"
    				class="form-control number" type="text" id="member_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Husband Name/Father Name</label>
                  	<input name="member_husband" style="margin-top: 10px;"
    				class="form-control name" type="text" id="member_husband"
    				placeholder="Husband Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_address" style="margin-top: 10px;"
    				class="form-control address" type="text" id="member_address"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
    			  <input onclick="ruralurban($(this))" checked class="pull-right" type="radio" value="1" name="rural_urban">
    			  <input name="member_rural" value="1" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_rural"
    				placeholder="Rural"></input>
    			  <br>
    			  <label class="control-label">Urban</label>
                  <input onclick="ruralurban($(this))" class="pull-right" type="radio" value="2" name="rural_urban">
                  <input name="member_urban" value="0" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_urban"
    				placeholder="Rural"></input>
                </div>
                
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <select id="member_district" name="member_district" style="margin-top:10px;" class="form-control" >
                        <!-- List of district -->
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_contact" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Account (if any)</label>
                  <span style="margin-left: 2rem">Yes <input onclick="bank($(this))" id="isbank" type="radio" checked value="1" name="isbank"></span>
                  <span class="pull-right">No <input onclick="bank($(this))" type="radio" value="2" name="isbank"></span>
                </div>
                <div id="bankAccountNo" class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank A/C Number (if any)</label>
                  <input name="member_bankaccount" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_bankaccount"
					placeholder="Bank Account Number"></input>
                </div>
                <div id="bankBranchName" class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Branch</label>
                  <input name="member_bankbranch" style="margin-top: 10px;"
					class="form-control name" type="text" id="member_bankbranch"
					placeholder="Bank Branch"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Work/Business/Profession</label>
                  <input name="member_work" style="margin-top: 10px;"
					class="form-control name" type="text" id="member_work"
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
    				class="form-control number" type="text" id="member_nomineeaadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_nomineeaddress" style="margin-top: 10px;"
    				class="form-control address" type="text" id="member_nomineeaddress"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
    			  <input onclick="nomineeruralurban($(this))" checked class="pull-right" type="radio" value="1" name="nominee_rural_urban">
    			  <input name="member_nomineerural" value="1" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_nomineerural"
    				placeholder="Rural"></input>
    			  <br>
    			  <label class="control-label">Urban</label>
                  <input onclick="nomineeruralurban($(this))" class="pull-right" type="radio" value="2" name="nominee_rural_urban">
                  <input name="member_nomineeurban" value="0" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_nomineeurban"
    				placeholder="Rural"></input>
                </div>
                
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <select id="member_nomineedistrict" name="member_nomineedistrict" style="margin-top:10px;" class="form-control" >
                        <!-- List of district -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_nomineecontact" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_nomineecontact"
					placeholder="Contact Number"></input>
                </div>
              
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addMem()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasMemForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasMemformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
               <?php echo form_close() ?>
            </div>
          </div>
        </div>
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 
<script>
function ruralurban($radio){
	$value =  $radio.val();
if ($value == 1)
	{
	$("#member_rural").val(1);
	$("#member_urban").val(0)
	}
else
	{
	$("#member_rural").val(0);
	$("#member_urban").val(1)
	}
}

function nomineeruralurban($radio){
	$value =  $radio.val();
if ($value == 1)
	{
	$("#member_nomineerural").val(1);
	$("#member_nomineeurban").val(0)
	}
else
	{
	$("#member_nomineerural").val(0);
	$("#member_nomineeurban").val(1)
	}
}

function bank($radio){
	$value =  $radio.val();
if ($value == 1)
	{
	$('#bankAccountNo').show();
	$('#bankBranchName').show();
	}
else
	{
	$('#bankAccountNo').hide();
	$('#bankBranchName').hide();
	}
}


function checkAadhaar($btn){  
	$reqestId =  $btn.val(); 
	if ($reqestId == '')
    {
	SetWarningMessageBox('warning', 'Aadhaar No. is mandatory!');		           
    }
	else
	{ 
	var url = '<?php echo base_url();?>index.php/data_controller/checkAadhaar';
	StartInsideLoading();
	$.ajax({
		  type: "post",
		  url: url,
		  cache: false,    
		  data: {reqId:$reqestId},
		  dataType: 'json',
		  success: function(response){   
		  try{  	 
			   if (response.success)
	           {
			   SetWarningMessageBox('warning', response.msg);
	           $('#member_aadhaar').val('');
	           $('#member_aadhaar').focus();		           
	           } else
	           { 
	               SetSucessMessageBox('success', response.msg);
	           }
		 StopInsideLoading();
		  }catch(e) {  
			  SetWarningMessageBox('warning', e);
			  StopInsideLoading();
		  }  
		  },
		  error: function(){      
			  SetWarningMessageBox('warning', 'Error while request..');
			  StopInsideLoading();
		  }
		 });
}
}

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
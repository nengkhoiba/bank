<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Update Member</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasMemformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="MemFormUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="mem_id" id="mem_id_upt" value="<?php echo $row['ID'];?>">
		<input type="hidden" name="previous_mem_image" id="previous_mem_image" value="<?php echo $row['image'];?>">
		                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="member_name" value="<?php echo $row['name'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input name="member_dob" value="<?php echo $row['dob'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Sex</label>
                  <select id="member_gender" name="member_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($row['sex'] == 1) echo "selected";?> class="form-control" value="1">Male</option>
                  	<option <?php if($row['sex'] == 2) echo "selected";?> class="form-control" value="2">Female</option>
                  	<option <?php if($row['sex'] == 3) echo "selected";?> class="form-control" value="3">Other</option>
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_aadhaar" value="<?php echo $row['aadhaar_no'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Husband Name/Father Name</label>
                  	<input name="member_husband" value="<?php echo $row['husband_name'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_husband"
    				placeholder="Husband Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_address" value="<?php echo $row['parmanent_address'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_address"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
                  	<input name="member_rural" value="<?php echo $row['rural'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_rural"
    				placeholder="Rural"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Urban</label>
                  	<input name="member_urban" value="<?php echo $row['urban'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_urban"
    				placeholder="Urban"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  	<input name="member_district" value="<?php echo $row['district'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_district"
					placeholder="District"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_contact" value="<?php echo $row['contact_no'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank A/C Number (if any)</label>
                  <input name="member_bankaccount" value="<?php echo $row['bank_ac_no'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_bankaccount"
					placeholder="Bank Account Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Branch</label>
                  <input name="member_bankbranch" value="<?php echo $row['bank_branch'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_bankbranch"
					placeholder="Bank Branch"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Work/Business/Profession</label>
                  <input name="member_work" value="<?php echo $row['work'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_work"
					placeholder="Work/Business/Profession"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Nominee</label>
                  <input name="member_nominee" value="<?php echo $row['nominee_name'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nominee"
					placeholder="Nominee"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_nomineeaadhaar" value="<?php echo $row['nominee_aadhaar_no'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeaadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_nomineeaddress" value="<?php echo $row['nominee_permanent_address'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeaddress"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
                  	<input name="member_nomineerural" value="<?php echo $row['nominee_rural'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineerural"
    				placeholder="Rural"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Urban</label>
                  	<input name="member_nomineeurban" value="<?php echo $row['nominee_urban'];?>" style="margin-top: 10px;"
    				class="form-control" type="text" id="member_nomineeurban"
    				placeholder="Urban"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  	<input name="member_nomineedistrict" value="<?php echo $row['nominee_district'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nomineedistrict"
					placeholder="District"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_nomineecontact" value="<?php echo $row['nominee_contact_no'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nomineecontact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Passport</label>
                  <input value="" class="form-control" onchange="imagetoBase64(this)" id="file"
					style="margin-top: 10px;" type="file"></input> <input
					type="hidden" name="fileUpload" id="fileUpload"> <input
					type="hidden" name="fileUploadName" id="fileUploadName">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label"></label>
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/upload/member/<?php echo $row['image'];?>">
                </div>
               
		                 
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateMem()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MemFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasMemformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>   
<script> 
function loadCountry()
{ 
  var url = "<?php echo site_url('index.php/data_controller/loadCountry'); ?>"; 
  StartInsideLoading();
  $.ajax({
    type: "post",
    url: url,
    cache: false,   
    dataType: 'json', 
    success: function(response){ 
    try{  
      if (response.success)
         { 
        $('#employee_country').html(response.html);              
         } else
         { 
             SetWarningMessageBox('warning', response.msg);
            
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
loadCountry();


function loadState($select){  
	$reqestId =  $select.val(); 
	var url = '<?php echo base_url();?>index.php/data_controller/loadState';
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
				 $('#employee_state').html(response.html);
	           } else
	           { 
	               SetWarningMessageBox('warning', response.msg);
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

function loadCity($select){  
	$reqestId =  $select.val(); 
	var url = '<?php echo base_url();?>index.php/data_controller/loadCity';
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
				 $('#employee_city').html(response.html);
	           } else
	           { 
	               SetWarningMessageBox('warning', response.msg);
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
$('#employee_dob').datepicker({
format: 'mm-dd-yyyy',
endDate: FromEndDate, 
autoclose: true
});
});
});
</script> 
        
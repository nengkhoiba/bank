<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Update Employee</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasEmpformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="EmpFormUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="emp_id" id="emp_id_upt" value="<?php echo $row['ID'];?>">
		<input type="hidden" name="previous_emp_image" id="previous_emp_image" value="<?php echo $row['image'];?>">
		                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <input value="<?php echo $row['name'];?>" name="employee_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input value="<?php echo $row['address'];?>" name="employee_address" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_address"
    				placeholder="Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Country</label>
                  	<select onchange="loadState($(this))" id="employee_country" name="employee_country" style="margin-top:10px;" class="form-control" >
                        <!-- List of country -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">State</label>
                  	<select onchange="loadCity($(this))" id="employee_state" name="employee_state" style="margin-top:10px;" class="form-control" >
                  	     <option class="form-control" value="">- Select -</option>
                  	     <!-- List of state -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Cities</label>
                  	<select id="employee_city" name="employee_city" style="margin-top:10px;" class="form-control" >
                  	     <option class="form-control" value="">- Select -</option>
                  	     <!-- List of state -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <input value="<?php echo $row['district'];?>" name="employee_district" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_district"
					placeholder="District"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Pincode</label>
                  <input value="<?php echo $row['pincode'];?>" name="employee_pincode" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_pincode"
					placeholder="Pin Code"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation</label>
                  <input value="<?php echo $row['designation'];?>" name="employee_designation" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_designation"
					placeholder="Designation"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Gender</label>
                  <select id="employee_gender" name="employee_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($row['gender'] == 1) echo "selected";?> class="form-control" value="1">Male</option>
                  	<option <?php if($row['gender'] == 2) echo "selected";?> class="form-control" value="2">Female</option>
                  	<option <?php if($row['gender'] == 3) echo "selected";?> class="form-control" value="3">Other</option>
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input value="<?php echo $row['dob'];?>" name="employee_dob" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Qualification</label>
                  <input value="<?php echo $row['qualification'];?>" name="employee_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_qualification"
					placeholder="Qualification"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Martial Status</label>
                  <select id="employee_martial_status" name="employee_martial_status" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($row['martial_status'] == 1) echo "selected";?> class="form-control" value="1">Single</option>
                  	<option <?php if($row['martial_status'] == 2) echo "selected";?> class="form-control" value="2">Married</option>
                  	<option <?php if($row['martial_status'] == 3) echo "selected";?> class="form-control" value="3">Divorce</option>
                  	<option <?php if($row['martial_status'] == 4) echo "selected";?> class="form-control" value="4">Widow</option>
                  	</select>
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
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/upload/employee/<?php echo $row['image'];?>">
                </div>
               
		                 
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateEmp()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#EmpFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasEmpformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
        
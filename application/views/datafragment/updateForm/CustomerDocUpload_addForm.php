<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add Document</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasMemformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="MemFormUpdate">
		<?php  foreach ($result as $row)   { ?>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Customer ID</label>
                  <input name="customer_id" disabled value="<?php echo $row['ID'];?>" style="margin-top: 10px;"
    				class="form-control name" type="text" id="customer_id"
    				placeholder="Customer ID"></input>
                </div>
		        <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="customer_name" disabled value="<?php echo $row['name'];?>" style="margin-top: 10px;"
    				class="form-control name" type="text" id="customer_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  	<input name="customer_address" disabled value="<?php echo $row['parmanent_address'];?>" style="margin-top: 10px;"
    				class="form-control address" type="text" id="customer_address"
    				placeholder="Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="customer_contact" disabled value="<?php echo $row['contact_no'];?>" style="margin-top: 10px;"
					class="form-control number" type="text" id="customer_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Sex</label>
                  <input name="customer_sex" disabled value="<?php echo $row['sex'];?>" style="margin-top: 10px;"
    				class="form-control name" type="text" id="customer_sex"
    				placeholder="Sex"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="customer_aadhaar" disabled value="<?php echo $row['aadhaar_no'];?>" style="margin-top: 10px;"
    				class="form-control number" type="text" id="customer_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <input name="customer_district" disabled value="<?php echo $row['district'];?>" style="margin-top: 10px;"
    				class="form-control number" type="text" id="customer_district"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Document Type</label>
                  <select id="member_gender" name="member_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">Photo</option>
                  	<option class="form-control" value="2">PAN</option>
                  	<option class="form-control" value="3">Aadhaar</option>
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select File Type</label>
                  <select id="member_gender" name="member_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">JPG/JPEG</option>
                  	<option class="form-control" value="2">PDF</option>
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select File</label>
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
		                  <button onclick="updateMem()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MemFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasMemformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
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

function loadDistrict()
{ 
  var url = "<?php echo site_url('index.php/data_controller/loadDistrict'); ?>"; 
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
        $('#member_district').html(response.html); 
        $('#member_nomineedistrict').html(response.html);             
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
loadDistrict();

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
        
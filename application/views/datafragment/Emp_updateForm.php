<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Update Employee</h3>
             <button class="close"  href="" onclick="removeMasterEmpform()" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="EmpFormUpdate">
		<?php  foreach ($result as $emp_data)   { ?>
		<input type="hidden" name="emp_id" id="emp_id_upt" value="<?php echo $emp_data['ID'];?>">
		<input type="hidden" name="previous_emp_image" id="previous_emp_image" value="<?php echo $emp_data['image'];?>">
		                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <input value="<?php echo $emp_data['name'];?>" name="employee_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input value="<?php echo $emp_data['address'];?>" name="employee_address" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_address"
    				placeholder="Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <select id="employee_district" name="employee_district" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($emp_data['district'] == 1) echo "selected";?> class="form-control" value="1">Imphal West</option>
                  	<option <?php if($emp_data['district'] == 2) echo "selected";?> class="form-control" value="2">Imphal East</option>
                  	<option <?php if($emp_data['district'] == 3) echo "selected";?> class="form-control" value="3">Senapati</option>
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Pincode</label>
                  <input value="<?php echo $emp_data['pincode'];?>" name="employee_pincode" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_pincode"
					placeholder="Pin Code"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation</label>
                  <input value="<?php echo $emp_data['designation'];?>" name="employee_designation" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_designation"
					placeholder="Designation"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Gender</label>
                  <select id="employee_gender" name="employee_gender" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($emp_data['gender'] == 1) echo "selected";?> class="form-control" value="1">Male</option>
                  	<option <?php if($emp_data['gender'] == 2) echo "selected";?> class="form-control" value="2">Female</option>
                  	<option <?php if($emp_data['gender'] == 3) echo "selected";?> class="form-control" value="3">Other</option>
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input value="<?php echo $emp_data['dob'];?>" name="employee_dob" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Qualification</label>
                  <input value="<?php echo $emp_data['qualification'];?>" name="employee_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_qualification"
					placeholder="Qualification"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Martial Status</label>
                  <select id="employee_martial_status" name="employee_martial_status" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option <?php if($emp_data['martial_status'] == 1) echo "selected";?> class="form-control" value="1">Single</option>
                  	<option <?php if($emp_data['martial_status'] == 2) echo "selected";?> class="form-control" value="2">Married</option>
                  	<option <?php if($emp_data['martial_status'] == 3) echo "selected";?> class="form-control" value="3">Divorce</option>
                  	<option <?php if($emp_data['martial_status'] == 4) echo "selected";?> class="form-control" value="4">Widow</option>
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
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/upload/employee/<?php echo $emp_data['image'];?>">
                </div>
               
		                 
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateEmp()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#EmpFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterEmpform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>    
        
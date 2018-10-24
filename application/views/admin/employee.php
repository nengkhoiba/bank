	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Employee Registration</li>
        </ul>
		</div>
		<p class="bs-component">	
              <a onclick="addEmpform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
              <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('emp','loadEmp()')">Delete</button>
          </p>
        
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Employee</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasEmpForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <input name="employee_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input name="employee_address" style="margin-top: 10px;"
    				class="form-control" type="text" id="employee_address"
    				placeholder="Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Country</label>
                  	<select onchange="loadState(this.value)" id="employee_country" name="employee_country" style="margin-top:10px;" class="form-control" >
                        <!-- List of country -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">State</label>
                  	<select onchange="loadCity(this.value)" id="employee_state" name="employee_state" style="margin-top:10px;" class="form-control" >
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
                  <select id="employee_district" name="employee_district" style="margin-top:10px;" class="form-control" >
                  	<!-- list of  district -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Pincode</label>
                  <input name="employee_pincode" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_pincode"
					placeholder="Pin Code"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation</label>
                  <select id="employee_designation" name="employee_designation" style="margin-top:10px;" class="form-control" >
                  	<!-- list of  designation -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Gender</label>
                  <select id="employee_gender" name="employee_gender" style="margin-top:10px;" class="form-control" >
                  	<!-- list of  gender -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input name="employee_dob" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Qualification</label>
                  <input name="employee_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_qualification"
					placeholder="Qualification"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Martial Status</label>
                  <select id="employee_martial_status" name="employee_martial_status" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">Single</option>
                  	<option class="form-control" value="2">Married</option>
                  	<option class="form-control" value="3">Divorce</option>
                  	<option class="form-control" value="4">Widow</option>
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch</label>
                  <select id="employee_branch" name="employee_branch" style="margin-top:10px;" class="form-control" >
                  	<!-- list of  branch -->
                  	</select>
                </div>
               
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateEmp()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasEmpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
        	
          <div class="tile">
          
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="employee_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    function loadEmp()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadEmp'); ?>"; 
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
            $('#employee_table').html(response.html);
              $('#emp').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    loadEmp();
    
   
    function addEmpform($btn){
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#employee_name').val('');
    		$('#employee_address').val('');
    		loadCountry();
    		loadState(0);
    		loadCity(0);
    		loadDropDown('','district','#employee_district');
			$('#employee_pincode').val('');
			loadDropDown('','designation','#employee_designation');
			loadDropDown('','gender_master','#employee_gender');
			$('#employee_dob').val('');
			$('#employee_qualification').val('');
			$('#employee_martial_status').val('');
			loadDropDown('','branch','#employee_branch');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{  
    	var url = '<?php echo base_url();?>index.php/data_controller/EditEmp';
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
    				   $('#postType').val(response.json[0].ID);
    				   	$('#employee_name').val(response.json[0].Name);
    		    		$('#employee_address').val(response.json[0].address);
    		    		$('#employee_country').val(response.json[0].country);

    		    		loadState(response.json[0].country); 
//     		    		creating drop down list by sending country ID

    		    		$('#employee_state').val(response.json[0].state);
//     		    		selected previous state ID value
    		    		
    		    		loadCity(response.json[0].state);
//     		    		creating drop down list by sending state ID

    		    		$('#employee_city').val(response.json[0].city);
//     		    		selected previous city ID value
    		    		
    		    		loadDropDown(response.json[0].district,'district','#employee_district');
    					$('#employee_pincode').val(response.json[0].pincode);
    					loadDropDown(response.json[0].designation,'designation','#employee_designation');
    					loadDropDown(response.json[0].gender,'gender_master','#employee_gender');
    					$('#employee_dob').val(response.json[0].dob);
    					$('#employee_qualification').val(response.json[0].qualification);
    					$('#employee_martial_status').val(response.json[0].martial_status);
    					loadDropDown(response.json[0].Branch_id,'branch','#employee_branch');
    		        	$('#formContainer').show();
    		        	$(window).scrollTop(0);
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
    } 

    
    function updateEmp(){  
    	if ($('#employee_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#employee_name').focus();
            return;
        }
        if ($('#employee_address').val().trim() == '') {
            SetWarningMessageBox('warning', 'Address is mandatory!');
            $('#employee_address').focus();
            return;
        }
        if ($('#employee_country').val().trim() == '') {
            SetWarningMessageBox('warning', 'Country is mandatory!');
            $('#employee_country').focus();
            return;
        }
        if ($('#employee_state').val().trim() == '') {
            SetWarningMessageBox('warning', 'State is mandatory!');
            $('#employee_state').focus();
            return;
        }
        if ($('#employee_city').val().trim() == '') {
            SetWarningMessageBox('warning', 'City is mandatory!');
            $('#employee_city').focus();
            return;
        }
        if ($('#employee_district').val().trim() == '') {
            SetWarningMessageBox('warning', 'District is mandatory!');
            $('#employee_district').focus();
            return;
        }
        if ($('#employee_pincode').val().trim() == '') {
            SetWarningMessageBox('warning', 'Pincode is mandatory!');
            $('#employee_pincode').focus();
            return;
        }
        if ($('#employee_designation').val().trim() == '') {
            SetWarningMessageBox('warning', 'Designation is mandatory!');
            $('#employee_designation').focus();
            return;
        }
        if ($('#employee_gender').val().trim() == '') {
            SetWarningMessageBox('warning', 'Gender is mandatory!');
            $('#employee_gender').focus();
            return;
        }
        if ($('#employee_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#employee_dob').focus();
            return;
        }
        if ($('#employee_qualification').val().trim() == '') {
            SetWarningMessageBox('warning', 'Qualification is mandatory!');
            $('#employee_qualification').focus();
            return;
        }
        if ($('#employee_martial_status').val().trim() == '') {
            SetWarningMessageBox('warning', 'Martial Status is mandatory!');
            $('#employee_martial_status').focus();
            return;
        }
        if ($('#employee_branch').val().trim() == '') {
            SetWarningMessageBox('warning', 'Branch Name is mandatory!');
            $('#employee_branch').focus();
            return;
        }
        

        var formData = $('form#MasEmpForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateEmp';
        StartInsideLoading();
		 $.ajax({
		  type: "post",
		  url: url,
		  cache: false,    
		  data: dataString,
		  dataType: 'json',
		  success: function(response){   
		  try{  	
			   if (response.success)
	           { 
				   SetSucessMessageBox('Success', response.msg);
				   $('#formContainer').hide();
				   loadEmp();
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

    function loadCountry()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadCountry'); ?>"; 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false,   
        dataType: 'json', 
        async: false,
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


    function loadState($reqestId){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/loadState';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {reqId:$reqestId},
    		  dataType: 'json',
    		  async: false,
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           { 	
    				 $('#employee_state').html(response.html);
    				 loadCity(0);
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

    function loadCity($reqestId){
    	var url = '<?php echo base_url();?>index.php/data_controller/loadCity';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {reqId:$reqestId},
    		  dataType: 'json',
    		  async: false,
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
    
       </body>
</html>
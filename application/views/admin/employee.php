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
              <a onclick="addEmpform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
              <button class="btn btn-sm btn-danger" type="button" onclick="deleteEmp()">Delete</button>
          </p>
        
      </div>
      
      <div class="row" id="MasEmpformColap">
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
        	
          <div class="tile">
          <div class="row">
              <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <input name="employee_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_name"
					placeholder="Name"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input name="employee_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="employee_address"
					placeholder="Address"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Disignation</label>
                  <select id="employee_martial_status" name="employee_designation" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">Admin</option>
                  	<option class="form-control" value="2">Cassier</option>
                  	<option class="form-control" value="3">Operator</option>
                  	<option class="form-control" value="4">Cleark</option>
                  	</select>
                </div>
          </div>
          <div class="row">
          	<div class="col-md-12" align="center">
          	 <a onclick="searchs();" style="color:#fff" align="center" class="btn btn-sm btn-success">Search</a>
			</div>
          </div>
         
          <br>
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
    function searchs()
    { 
    	loadEmp();
    }
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
              $('#emp').DataTable();
              
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
    
      
    function addEmp(){  
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
        if ($('#fileUpload').val().trim() == '') {
            SetWarningMessageBox('warning', 'Image is mandatory!');
            $('#file').focus();
            return;
        }
        
        var formData = $('form#MasEmpForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addEmp';
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
           $('#MasEmpformColap').empty(); 
           loadEmp();
           $('#emp').DataTable();
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


    function addEmpform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddEmpform';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			 //  var result = jQuery.parseJSON(data);
    			   if (response.success)
    	           { 	
    				 $('#MasEmpformColap').html(response.html);
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

      
    function editEmp($btn){  
    	$reqestId =  $btn.val(); 
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
    				 $('#MasEmpformColap').html(response.html);
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
    function removeMasterEmpform(){ 
    	$('#MasEmpformColap').empty();
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
        

        var formData = $('form#EmpFormUpdate').serializeObject();
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
				   $('#MasEmpformColap').empty(); 
				   loadEmp();
				   $('#emp').DataTable();
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
    function deleteEmp(){  

       // Checking all category data are deleted
    	if (!$( ".checkbox" ).length) {
    		SetWarningMessageBox('warning', 'No Item left  to Delete !!!'); 
    		return;
    	}
    	
    	var selected_value = []; // initialize empty array 
    	if ($('.checkbox:checked').length == 0 )
        {
    		SetWarningMessageBox('warning', 'Please select Item to Delete !!!');
    		return;
	    } else {
	    	$(".checkbox:checked").each(function(){
	              selected_value.push($(this).val());
	          });
	    }	
    	var url = '<?php echo base_url();?>index.php/data_controller/RemoveEmp';
    	var dataString = JSON.stringify(selected_value);
    swal({
      title: "Are you sure?",
      //text: "You will not be able to recover this imaginary file!",
      //type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, Delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: true,
      closeOnCancel: true
      }, function(isConfirm) {
      if (isConfirm) {
      StartInsideLoading();  
        	$.ajax({
      		  type: "post",
      		  url: url,
      		  cache: false,    
      		  data: {dataArr:dataString},
      		  dataType: 'json',
      		  success: function(response){   
      		  try{  	
      			   if (response.success)
      	           { 
      				   SetSucessMessageBox('Success', response.msg);
      				   loadEmp();
      				   $('#Emp').DataTable();
      	           } else
      	           { 
      	               SetWarningMessageBox('warning', response.msg);
      	               //StopInsideLoading();
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
      }); 
    } 
</script>
    
       </body>
</html>
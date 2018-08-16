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
              <a onclick="addRoleform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
              <button class="btn btn-sm btn-danger" type="button" onclick="deleteEmp()">Delete</button>
          </p>
        
      </div>
      
      <div class="row" id="MasRoleformColap">
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="role_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadRole()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadRole'); ?>"; 
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
            $('#role_table').html(response.html);
              $('#role').DataTable();
              
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
    
      loadRole();
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


    function addRoleform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddRoleform';
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
    				 $('#MasRoleformColap').html(response.html);
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
    function removeMasterRoleform(){ 
    	$('#MasRoleformColap').empty();
    }
    function updateEmp(){  
    	if ($('#role_title').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Title is mandatory !');
            $('#role_title').focus();
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
	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Membership Form</li>
        </ul>
		</div>
		<p class="bs-component">	
              <a onclick="addMemform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
              <button class="btn btn-sm btn-danger" type="button" onclick="deleteMem()">Delete</button>
          </p>
        
      </div>
      
      <div class="row" id="MasMemformColap">
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
        	
          <div class="tile">
          <div class="row">
              <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <input name="member_qualification" style="margin-top: 10px;"
					class="form-control" type="text" id="member_name"
					placeholder="Name"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input name="member_address" style="margin-top: 10px;"
					class="form-control" type="text" id="member_address"
					placeholder="Address"></input>
                </div>
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Group</label>
                  <select id="member_group" name="member_group" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">SHG1</option>
                  	<option class="form-control" value="2">SHG2</option>
                  	<option class="form-control" value="3">SHG3</option>
                  	<option class="form-control" value="4">SHG4</option>
                  	</select>
                </div>
          </div>
          <div class="row">
          	<div class="col-md-12" align="center">
          	 <a onclick="loadMem();" style="color:#fff" align="center" class="btn btn-sm btn-success">Search</a>
			</div>
          </div>
         
          <br>
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="member_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
    
    function loadMem()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadMem'); ?>"; 
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
            $('#member_table').html(response.html);
              $('#Mem').DataTable();
              
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
    
      
    function addMem(){  
    	if ($('#member_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#member_name').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_gender').val().trim() == '') {
            SetWarningMessageBox('warning', 'Sex is mandatory!');
            $('#member_gender').focus();
            return;
        }
        if ($('#member_aadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Aadhaar No. is mandatory!');
            $('#member_aadhaar').focus();
            return;
        }
        if ($('#member_husband').val().trim() == '') {
            SetWarningMessageBox('warning', 'Husband Name is mandatory!');
            $('#member_husband').focus();
            return;
        }
        if ($('#member_address').val().trim() == '') {
            SetWarningMessageBox('warning', 'Address is mandatory!');
            $('#member_address').focus();
            return;
        }
        if ($('#member_rural').val().trim() == '') {
            SetWarningMessageBox('warning', 'Rural is mandatory!');
            $('#member_rural').focus();
            return;
        }
        if ($('#member_urban').val().trim() == '') {
            SetWarningMessageBox('warning', 'Urban is mandatory!');
            $('#member_urban').focus();
            return;
        }
        if ($('#member_district').val().trim() == '') {
            SetWarningMessageBox('warning', 'District is mandatory!');
            $('#member_district').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_contact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Contact No. is mandatory!');
            $('#member_contact').focus();
            return;
        }
        if ($('#member_bankaccount').val().trim() == '') {
            SetWarningMessageBox('warning', 'Account No. is mandatory!');
            $('#member_bankaccount').focus();
            return;
        }
        if ($('#member_bankbranch').val().trim() == '') {
            SetWarningMessageBox('warning', 'Branch Name is mandatory!');
            $('#member_bankbranch').focus();
            return;
        }
        if ($('#member_work').val().trim() == '') {
            SetWarningMessageBox('warning', 'Work Name is mandatory!');
            $('#member_work').focus();
            return;
        }
        if ($('#member_nominee').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Name is mandatory!');
            $('#member_nominee').focus();
            return;
        }
        if ($('#member_nomineeaadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Aadhaar No. is mandatory!');
            $('#member_nomineeaadhaar').focus();
            return;
        }
        if ($('#member_nomineeaddress').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Address is mandatory!');
            $('#member_nomineeaddress').focus();
            return;
        }
        if ($('#member_nomineerural').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Rural is mandatory!');
            $('#member_nomineerural').focus();
            return;
        }
        if ($('#member_nomineeurban').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Urban is mandatory!');
            $('#member_nomineeurban').focus();
            return;
        }
        if ($('#member_nomineedistrict').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee District is mandatory!');
            $('#member_nomineedistrict').focus();
            return;
        }
        if ($('#member_nomineecontact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Contact No. is mandatory!');
            $('#member_nomineecontact').focus();
            return;
        }
        if ($('#fileUpload').val().trim() == '') {
            SetWarningMessageBox('warning', 'Image is mandatory!');
            $('#file').focus();
            return;
        }
        
        var formData = $('form#MasMemForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addMem';
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
           $('#MasMemformColap').empty(); 
           loadMem();
           $('#Mem').DataTable();
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


    function addMemform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddMemform';
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
    				 $('#MasMemformColap').html(response.html);
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

      
    function editMem($btn){ 
        
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/EditMemForm';
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
    				 $('#MasMemformColap').html(response.html);
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
    
    function updateMem(){  
    	if ($('#member_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#member_name').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_gender').val().trim() == '') {
            SetWarningMessageBox('warning', 'Sex is mandatory!');
            $('#member_gender').focus();
            return;
        }
        if ($('#member_aadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Aadhaar No. is mandatory!');
            $('#member_aadhaar').focus();
            return;
        }
        if ($('#member_husband').val().trim() == '') {
            SetWarningMessageBox('warning', 'Husband Name is mandatory!');
            $('#member_husband').focus();
            return;
        }
        if ($('#member_address').val().trim() == '') {
            SetWarningMessageBox('warning', 'Address is mandatory!');
            $('#member_address').focus();
            return;
        }
        if ($('#member_rural').val().trim() == '') {
            SetWarningMessageBox('warning', 'Rural is mandatory!');
            $('#member_rural').focus();
            return;
        }
        if ($('#member_urban').val().trim() == '') {
            SetWarningMessageBox('warning', 'Urban is mandatory!');
            $('#member_urban').focus();
            return;
        }
        if ($('#member_district').val().trim() == '') {
            SetWarningMessageBox('warning', 'District is mandatory!');
            $('#member_district').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_contact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Contact No. is mandatory!');
            $('#member_contact').focus();
            return;
        }
        if ($('#member_bankaccount').val().trim() == '') {
            SetWarningMessageBox('warning', 'Account No. is mandatory!');
            $('#member_bankaccount').focus();
            return;
        }
        if ($('#member_bankbranch').val().trim() == '') {
            SetWarningMessageBox('warning', 'Branch Name is mandatory!');
            $('#member_bankbranch').focus();
            return;
        }
        if ($('#member_work').val().trim() == '') {
            SetWarningMessageBox('warning', 'Work Name is mandatory!');
            $('#member_work').focus();
            return;
        }
        if ($('#member_nominee').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Name is mandatory!');
            $('#member_nominee').focus();
            return;
        }
        if ($('#member_nomineeaadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Aadhaar No. is mandatory!');
            $('#member_nomineeaadhaar').focus();
            return;
        }
        if ($('#member_nomineeaddress').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Address is mandatory!');
            $('#member_nomineeaddress').focus();
            return;
        }
        if ($('#member_nomineerural').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Rural is mandatory!');
            $('#member_nomineerural').focus();
            return;
        }
        if ($('#member_nomineeurban').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Urban is mandatory!');
            $('#member_nomineeurban').focus();
            return;
        }
        if ($('#member_nomineedistrict').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee District is mandatory!');
            $('#member_nomineedistrict').focus();
            return;
        }
        if ($('#member_nomineecontact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Contact No. is mandatory!');
            $('#member_nomineecontact').focus();
            return;
        }
        

        var formData = $('form#MemFormUpdate').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateMem';
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
				   $('#MasMemformColap').empty(); 
				   loadMem();
				   $('#Mem').DataTable();
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
    function deleteMem(){  

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
    	var url = '<?php echo base_url();?>index.php/data_controller/RemoveMem';
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
      				   loadMem();
      				   $('#Mem').DataTable();
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
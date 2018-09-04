	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer Document Upload</li>
        </ul>
		</div>
      </div>
      
      <div class="row" id="MasCustumerDocUploadformColap">
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
        	
          <div class="tile">
           
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="customer_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
    
    function loadCustomer()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadCustomerDocUpload'); ?>"; 
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
            $('#customer_table').html(response.html);
              $('#customer').DataTable();
              
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
    loadCustomer();  
    
      
    function addDoc($btn){ 
        
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/AddCustomerDocUploadForm';
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
    				 $('#MasCustumerDocUploadformColap').html(response.html);
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
    
</script>
    
       </body>
</html>
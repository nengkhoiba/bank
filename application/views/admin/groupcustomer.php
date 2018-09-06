	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Master</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addLoanmasterform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('load_master','loadLoanmaster()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="MasLoanmasterformColap">
      </div>
     
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="loanmaster_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadLoanmaster()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadLoanmaster'); ?>"; 
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
            $('#loanmaster_table').html(response.html);
              $('#loanmaster').DataTable();
              
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
    
      loadLoanmaster();
    function addLoanmaster(){  
    	if ($('#loanmaster_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan name is mandatory !');
            $('#loanmaster_name').focus();
            return;
        }
		if ($('#loanmaster_pc').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan PC is mandatory !');
            $('#loanmaster_pc').focus();
            return;
        }
		if ($('#loanmaster_pc_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan PC type is mandatory !');
            $('#loanmaster_pc_type').focus();
            return;
        }
		
			if ($('#loanmaster_tenure_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Tenure type is mandatory !');
            $('#loanmaster_tenure_type').focus();
            return;
        }
			if ($('#loanmaster_tenure_min').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan tenure Min amount is mandatory !');
            $('#loanmaster_tenure_min').focus();
            return;
        }
			if ($('#loanmaster_tenure_max').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan tenure Max amount is mandatory !');
            $('#loanmaster_tenure_max').focus();
            return;
        }
			if ($('#loanmaster_min_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Min amount is mandatory !');
            $('#loanmaster_min_amount').focus();
            return;
        }
			if ($('#loanmaster_max_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Max amount is mandatory !');
            $('#loanmaster_max_amount').focus();
            return;
        }
       
        
        var formData = $('form#MasLoanmasterForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addBranch';
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
           $('#MasBranchformColap').empty(); 
           loadBranch();
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


    function addBranchform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddBranchform';
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
    				 $('#MasBranchformColap').html(response.html);
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

      
    function editBranch($btn){  
    	$reqestId =  $btn.val(); 
    	var url = '<?php echo base_url();?>index.php/data_controller/EditBranch';
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
    				 $('#MasBranchformColap').html(response.html);
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
   
    function updateBranch(){  
    	if ($('#branch_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Branch name is mandatory !');
            $('#branch_name').focus();
            return;
        }
			if ($('#branch_code').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Branch code is mandatory !');
            $('#branch_code').focus();
            return;
        }
			if ($('#branch_address').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Branch address is mandatory !');
            $('#branch_address').focus();
            return;
        }
       

        var formData = $('form#BranchFormUpdate').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateBranch';
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
				   $('#MasBranchformColap').empty(); 
				   loadBranch();
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
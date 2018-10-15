	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Account Mapping</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addAccountGrpform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('account_group','loadAccountGrp()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Account Mapping</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasAccountGrpForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Mapping Code</label>
                  <input name="accountGrp_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="accountGrp_name"
    				placeholder="Group Name"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name</label>
                  <select id="accountGrp_under" name="accountGrp_under" style="margin-top:10px;" class="form-control" >
                        <!-- List of account group under -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Credit</label>
                  <select id="accountGrp_nature" name="accountGrp_nature" style="margin-top:10px;" class="form-control" >
                  	<!-- List of account group nature -->
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Debit</label>
                  <select id="accountGrp_nature" name="accountGrp_nature" style="margin-top:10px;" class="form-control" >
                  	<!-- List of account group nature -->
                  </select>
                </div>           
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateAccountGrp()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasAccountGrpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="accountgrp_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadAccountGrp()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountGrp'); ?>"; 
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
            $('#accountgrp_table').html(response.html);
              $('#accountgrp').DataTable();
              
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
    loadAccountGrp();
      
    function addAccountGrpform($btn){  
    	$reqestId =  $btn.val(); 
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#accountGrp_name').val('');
    		$('#accountGrp_under').val('');
    		$('#accountGrp_nature').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{
    	var url = '<?php echo base_url();?>index.php/account_controller/EditAccountGrp';
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
    					$('#accountGrp_name').val(response.json[0].Group_name);
    					$('#accountGrp_under').val(response.json[0].Group_under);
    					$('#accountGrp_nature').val(response.json[0].Group_nature);
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
   
    function updateAccountGrp(){  
    	if ($('#accountGrp_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Group name is mandatory !');
            $('#accountGrp_name').focus();
            return;
        }
		if ($('#accountGrp_under').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Group under is mandatory !');
            $('#accountGrp_under').focus();
            return;
        }
		if ($('#accountGrp_nature').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Group nature is mandatory !');
            $('#accountGrp_nature').focus();
            return;
        }
       
        

        var formData = $('form#MasAccountGrpForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/account_controller/updateAccountGrp';
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
				   loadAccountGrp();
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

    function loadAccountGrpUnder()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountGrpUnder'); ?>"; 
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
            $('#accountGrp_under').html(response.html);              
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
    loadAccountGrpUnder();

    function loadAccountGrpNature()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountGrpNature'); ?>"; 
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
            $('#accountGrp_nature').html(response.html);              
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
    loadAccountGrpNature();
     
</script>
    
       </body>
</html>
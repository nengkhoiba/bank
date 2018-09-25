	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User Master</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addUserform($(this))" value="0" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('designation','loadDesignnation()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display:none;">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update User</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasUserForms','class'=>'row'))?>
            	<input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Employee</label>
                  <select onchange="createUserName($(this))" id="user_list" name="user_list" style="margin-top:10px;" class="form-control" >
                        <!-- list of employee -->
                  </select>
                </div>
                
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Username</label>
                  <input name="user_name" style="margin-top: 10px;"
    				class="form-control name" readonly type="text" id="user_name"
    				placeholder=""></input>
                </div>
                
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Role</label>
                  <select id="role_list" name="role_list" style="margin-top:10px;" class="form-control" >
                        <!-- list of role -->
                  </select>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="UpdateUser()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasUserForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="user_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
    	
   
    function loadUser()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadUser'); ?>"; 
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
            $('#user_table').html(response.html);
		//	$('#design').DataTable({dom: 'lBfrtip', buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']});
			$('#user').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});              
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
    loadUser();


    function addUserform($btn){  
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		loadDropDown('','emp','#user_list');
    		loadDropDown('','role','#role_list');
    		$('#user_name').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{
    	var url = '<?php echo base_url();?>index.php/data_controller/EditUser';
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
						loadDropDown(response.json[0].emp_id,'emp','#user_list');
			    		loadDropDown(response.json[0].role_id,'role','#role_list');
			    		$('#user_name').val(response.json[0].username);
    				    $('#formContainer').show();
    				    $(window).scrollTop(0);
    	           } 
    	           else
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
    

    function UpdateUser(){ 
    	if ($('#user_list').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select Employee is mandatory !');
            $('#user_list').focus();
            return;
        }
		if ($('#role_list').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select Role is mandatory !');
            $('#role_list').focus();
            return;
        }
       
        var formData = $('form#MasUserForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/UpdateUser';
        
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
           loadUser();
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

      
    function createUserName($select){  
    	$reqestId =  $select.val(); 
    	var url = '<?php echo base_url();?>index.php/data_controller/createUserName';
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
    				 $('#user_name').val(response.userName);
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
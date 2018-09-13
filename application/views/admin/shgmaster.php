	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">SHG Master</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="loadShgmasterForm($(this))" value="0" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('shg_master','loadShgmaster()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display:none;">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update SHG details</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasShgmasterForms','class'=>'row'))?>
            	<input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">SHG Code</label>
                  <input id="shg_code" name="shg_code" style="margin-top: 10px;"
    				class="form-control name" type="text" id="shg_code"
    				placeholder="SHG Code"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">SHG Name</label>
                  <input id="shg_name" name="shg_name" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="shg_name"
    				placeholder="SHG Name"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  <input id="shg_address" name="shg_address" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="shg_address"
    				placeholder="Address"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact No.</label>
                  <input id="contact_no" name="contact_no" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="contact_no"
    				placeholder="Contact No."></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Area</label>
                  <input id="shg_area" name="shg_area" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="shg_area"
    				placeholder="SHG Area"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Remark</label>
                  <input id="shg_remark" name="shg_remark" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="shg_remark"
    				placeholder="SHG Remark"></input>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasShgmasterForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="shgmaster_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
    	
   
    function loadShgmaster()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadShgmaster'); ?>"; 
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
            $('#Shgmaster_table').html(response.html);
              $('#shgmaster').DataTable();
              
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
    loadShgmaster();


    function loadShgmasterForm($formType){  
    	$reqestId =  $formType.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#deg_title').val('');
    		$('#deg_desc').val('');
        	$('#formContainer').show();
        }
    	else
    	{
    	var url = '<?php echo base_url();?>index.php/data_controller/EditDesign';
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
						$('#deg_title').val(response.json[0].title);
						$('#deg_desc').val(response.json[0].description);
					
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
    

    function UpdateDesignation(){ 
    	if ($('#deg_title').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Title is mandatory !');
            $('#deg_title').focus();
            return;
        }
		if ($('#deg_desc').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Description is mandatory !');
            $('#deg_desc').focus();
            return;
        }
       
        var formData = $('form#MasDesignForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/UpdateDesignation';
        
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
           loadDesignnation();
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
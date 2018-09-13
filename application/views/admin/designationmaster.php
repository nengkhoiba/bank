	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Designation Manager</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="loadDesignationForm($(this))" value="0" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('designation','loadDesignnation()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display:none;">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Designation</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasDesignForms','class'=>'row'))?>
            	<input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation Title</label>
                  <input id="deg_title" name="design_title" style="margin-top: 10px;"
    				class="form-control name" type="text" id="design_title"
    				placeholder="Designation Title"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation Description</label>
                  <textarea id="deg_desc" name="design_description" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="design_description"
    				placeholder="Description"></textarea>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="UpdateDesignation()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasDesignForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="design_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
    	
   
    function loadDesignnation()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadDesign'); ?>"; 
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
            $('#design_table').html(response.html);
              $('#design').DataTable();
              
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
    loadDesignnation();


    function loadDesignationForm($formType){  
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
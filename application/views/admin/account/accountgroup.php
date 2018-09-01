	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Account Group</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addAccountGrpform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteAccountGrp()">Delete</button>
        </p>
      </div>
      
      <div class="row" id="MasAccountGrpformColap">
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
      var url = "<?php echo site_url('index.php/data_controller/loadAccountGrp'); ?>"; 
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
    
      loadDesign();
    function addDesign(){  
    	if ($('#design_title').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Title is mandatory !');
            $('#design_title').focus();
            return;
        }
		if ($('#design_description').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Description is mandatory !');
            $('#design_description').focus();
            return;
        }
       
        
        var formData = $('form#MasDesignForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addDesign';
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
           $('#MasDesignformColap').empty(); 
           loadDesign();
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


    function addAccountGrpform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddAccountGrp';
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
    				 $('#MasDesignformColap').html(response.html);
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

      
    function editDesign($btn){  
    	$reqestId =  $btn.val(); 
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
    				 $('#MasDesignformColap').html(response.html);
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
   
    function updateDesign(){  
    	if ($('#design_title').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Title is mandatory !');
            $('#design_title').focus();
            return;
        }
       
        

        var formData = $('form#DesignFormUpdate').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateDesign';
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
				   $('#MasDesignformColap').empty(); 
				   loadDesign();
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
    function deleteDesign(){  

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
    	var url = '<?php echo base_url();?>index.php/data_controller/RemoveDesign';
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
      				   loadDesign();
      				   $('#design').DataTable();
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
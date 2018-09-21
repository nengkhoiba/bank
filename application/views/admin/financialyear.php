	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Financial Year</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addFinancialform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('financial_year','loadFinancial()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Financial Year</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
             <?php echo form_open_multipart('',array('id'=>'MasFinancialForms','class'=>'row'))?>
             <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Financial Year Title</label>
                  <input name="financial_title" style="margin-top: 10px;"
    				class="form-control name" type="text" id="financial_title"
    				placeholder="Financial Year Title"></input>
                </div>
          
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Start date</label>
                  <input name="financial_start" style="margin-top: 10px;"
					class="form-control" type="text" id="financial_start"
					placeholder="Financial start date"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">End date</label>
                  <input name="financial_end" style="margin-top: 10px;"
					class="form-control" type="text" id="financial_end"
					placeholder="Financial end date"></input>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateFinancial()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasFinancialForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="financial_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadFinancial()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadFinancial'); ?>"; 
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
            $('#financial_table').html(response.html);
              $('#financial').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
      loadFinancial();
    
    function addFinancialform($btn){  
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#financial_title').val('');
    		$('#financial_start').val('');
    		$('#financial_end').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{ 
    	var url = '<?php echo base_url();?>index.php/data_controller/EditFinancial';
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
    					$('#financial_title').val(response.json[0].Financial_year);
    					$('#financial_start').val(response.json[0].Start_date);
    					$('#financial_end').val(response.json[0].End_date);
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
   
    function updateFinancial(){  
    	if ($('#financial_title').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Title is mandatory !');
            $('#financial_title').focus();
            return;
        }
			if ($('#financial_start').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Financial start date is mandatory !');
            $('#financial_start').focus();
            return;
        }
			if ($('#financial_end').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Financial end date is mandatory !');
            $('#financial_end').focus();
            return;
        }
       

        var formData = $('form#MasFinancialForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateFinancial';
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
				   loadFinancial();
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

    $(document).ready(function (){
    	var date = new Date();
    	date.setDate(date.getDate()-1);            

    	// allow to pick future date
    	    // $('#employee_dob').datepicker({
    	    // format: "dd/mm/yyyy"
    	    // });
    	// allow to pick future date

    	var FromEndDate = new Date();
    	$(function(){
    	$('#financial_start').datepicker({
    	format: 'dd-mm-yyyy',
    	//endDate: FromEndDate, 
    	autoclose: true
    	});
    	$('#financial_end').datepicker({
    	format: 'dd-mm-yyyy',
    	//endDate: FromEndDate, 
    	autoclose: true
    	});
    	});
    	});

</script>
    
       </body>
</html>
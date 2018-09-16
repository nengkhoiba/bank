	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer Profile</li>
        </ul>
		</div>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Customer Profile</h3>
             <button class="close"  href="" onclick="removeMasterform('#formContainer')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
           
		    </div>
          </div>
        </div> 
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
    
    function loadCustomerProfile()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadCustomerProfile'); ?>"; 
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
    loadCustomerProfile();  
    
      
    function viewCustomerProfile($btn){   
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/ViewCustomerProfile';
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
                     $(window).scrollTop(0);
                     $('#formContainer').show();
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
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
              <div class="row invoice-info">
                <div class="col-6">
                <b>Customer ID : <span id="customer_ID"></span><br><br></b>
                    <b><address>Name : </b><span id="customer_Name"></span><br>
                    <b>Date of Birth : </b><span id="customer_dob"></span><br>
                    <b>Gender : </b><span id="customer_gender"></span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"></span><br>
                    <b>Husband/Father Name :</b><span id="customer_husband"></span><br>
                   <b> Permanent Address : </b><span id="customer_address"></span></address>
                </div>
                <div class="col-6">
                <b>Order Detail </b><br><br>
                  <b>Order ID : </b><?php echo 'Qty';?><br>
                  <b>Date : </b><?php echo 'Qty'; ?><br>
                  <b>Order Status : </b><span style="color:blue;"><?php echo 'Qty';?></span><br> 
                  <b>Returned Reason : </b><span style="color:black;"><?php echo 'Qty';?></span><br> 
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Shipping Charge</th>
                        <th>Subtotal ( <img src="http://i.stack.imgur.com/nGbfO.png" width="8" height="10"> )</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo 'Qty';?></td>
                        <td><?php echo 'Item';?></td>
                        <td><?php echo 'Price';?></td>
                        <td><?php echo 'Shipping Charge';?></td>
                        <td><?php echo 'Subtotal';?></td>
                      </tr>
                      <tr>
                        <td><?php echo 'Qty';?></td>
                        <td><?php echo 'Item';?></td>
                        <td><?php echo 'Price';?></td>
                        <td><?php echo 'Shipping Charge';?></td>
                        <td><?php echo 'Subtotal';?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
		<hr> 
    <form class="row" id="OrdersFormsUpdate">
                    <div class="form-group col-md-8 align-self-end" id='Btn_area_verify' style="visibility: visible; display:block;">
                      <button onclick="updateOrders(2)" class="btn btn-success" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Verified</button>
                      &nbsp;&nbsp;&nbsp;
                      <button onclick="updateOrders(6)" class="btn btn-danger" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reject Order</button>
                    </div>
                    <div class="col-4 text-right">
                      <button class="btn btn-primary" onclick="printDiv('printarea')"><i class="fa fa-print"></i> Print</button>
                      <a class="btn btn-primary icon-btn" href="<?php echo site_url() . 'Data_controller/save_pdf_download?req=' .base64_encode('ID'); ?>" target="_blank"><i class="fa fa-file"></i>PDF</a>
                  </div>        
		</form>
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
    				 $('#customer_ID').html(response.json[0].ID);
    				 $('#customer_Name').html(response.json[0].name);
    				 $('#customer_dob').html(response.json[0].dob);
    				 $('#customer_gender').html(response.json[0].sex);
    				 $('#customer_aadhaar').html(response.json[0].aadhaar_no);
    				 $('#customer_husband').html(response.json[0].husband_name);
    				 $('#customer_address').html(response.json[0].parmanent_address);
    				 
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
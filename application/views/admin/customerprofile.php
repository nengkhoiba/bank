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
                <div class="col-4">
                <b>Customer ID : <span id="customer_ID"></span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"></span><br>
                    <b>Date of Birth : </b><span id="customer_dob"></span><br>
                    <b>Gender : </b><span id="customer_gender"></span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"></span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"></span><br>
                    <b> Permanent Address : </b><span id="customer_address"></span><br>
                    <b>Rural : </b><input id="customer_rural" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"></span><br>
                   <b> Contact No. : </b><span id="customer_contact"></span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"></span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"></span><br>
                  <b>Branch : </b><span id="customer_bank_branch"></span>
                </div>
                <div class="col-4">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"></span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"></span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"></span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"></span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"></span> 
                </div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Document Type</th>
                        <th>File Type</th>
                        <th>Uploaded By</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo '1';?></td>
                        <td>Photo</td>
                        <td><?php echo 'application/pdf';?></td>
                        <td><?php echo 'Admin';?></td>
                        <td><?php echo '12/08/2018';?></td>
                        <td><button onclick="updateOrders(2)" class="btn btn-sm btn-danger" type="button">View</button></td>
                      </tr>
                      <tr>
                        <td><?php echo '2';?></td>
                        <td>PAN</td>
                        <td><?php echo 'application/jpg';?></td>
                        <td><?php echo 'Admin';?></td>
                        <td><?php echo '12/08/2018';?></td>
                        <td><button onclick="updateOrders(2)" class="btn btn-sm btn-danger" type="button">View</button></td>
                      </tr>
                      <tr>
                        <td><?php echo '2';?></td>
                        <td>Aadhaar</td>
                        <td><?php echo 'application/jpg';?></td>
                        <td><?php echo 'Admin';?></td>
                        <td><?php echo '12/08/2018';?></td>
                        <td><button onclick="updateOrders(2)" class="btn btn-sm btn-danger" type="button">View</button></td>
                      </tr>
                      <tr>
                        <td><?php echo '2';?></td>
                        <td>Voter</td>
                        <td><?php echo 'application/jpg';?></td>
                        <td><?php echo 'Admin';?></td>
                        <td><?php echo '12/08/2018';?></td>
                        <td><button onclick="updateOrders(2)" class="btn btn-sm btn-danger" type="button">View</button></td>
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
    				 $('#customer_name').html(response.json[0].name);
    				 $('#customer_dob').html(response.json[0].dob);
    				 $('#customer_gender').html(response.json[0].sex);
    				 $('#customer_aadhaar').html(response.json[0].aadhaar_no);
    				 $('#customer_husband').html(response.json[0].husband_name);
    				 $('#customer_address').html(response.json[0].parmanent_address);

    				 $('#customer_rural').attr('checked', false);
    				 $('#customer_urban').attr('checked', false);
    				 if(response.json[0].rural == 1)
        			 {$('#customer_rural').attr('checked', true);}
    				 if(response.json[0].urban == 1)
        			 {$('#customer_urban').attr('checked', true);}
        			 
    				 $('#customer_district').html(response.json[0].district);
    				 $('#customer_contact').html(response.json[0].contact_no);
    				 $('#customer_work').html(response.json[0].work);
    				 $('#customer_bank_ac_no').html(response.json[0].bank_ac_no);
    				 $('#customer_bank_branch').html(response.json[0].bank_branch);

    				 $('#customer_nominee_name').html(response.json[0].nominee_name);
    				 $('#customer_nominee_aadhaar_no').html(response.json[0].nominee_aadhaar_no);
    				 $('#customer_nominee_address').html(response.json[0].nominee_permanent_address);

    				 $('#customer_nominee_rural').attr('checked', false);
    				 $('#customer_nominee_urban').attr('checked', false);
    				 if(response.json[0].nominee_rural == 1)
        			 {$('#customer_nominee_rural').attr('checked', true);}
    				 if(response.json[0].nominee_urban == 1)
        			 {$('#customer_nominee_urban').attr('checked', true);}
    				 $('#customer_nominee_district').html(response.json[0].nominee_district);
    				 $('#customer_nominee_contact').html(response.json[0].nominee_contact_no);

    		
    				 $.each(response.json1, function (index, value) {
    				        console.log(response.json1);
    				    });
    				 
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
	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer Deposite</li>
          <li class="breadcrumb-item"></li>
          </ul>
        </div>
		<div class="app-search" style="padding: 0px; margin-right: -30px">
		<input onkeyup="runAutoComplete(this.value)" class="app-search__input search_input input-lg" autocomplete="off" name="searchkeyword" id="searchfield" type="text" placeholder="Account Name/Account Number" >
		<button class="app-search__button search_input_btn"><i class="fa fa-search"></i></button>

		</div>
      
      </div>
      
       <div class="row" id="formContainer">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-title-w-btn">
              <h3 class="title">Customer Profile</h3>
             <button class="close"  href="" onclick="removeMasterform('#formContainer')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <div class="row invoice-info" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
                <div class="col-4">
                <b>Customer ID : <span id="customer_ID"></span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"></span><br>
                    <b>Date of Birth : </b><span id="customer_dob"></span><br>
                    <b>Gender : </b><span id="customer_gender"></span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"></span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"></span><br>
                    <b> Permanent Address : </b><span id="customer_address"></span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"></span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"></span><br><br><br>
                  <b> Account Number : </b><span id="customer_account_no"></span><br>
                  <b> Account Status : </b><span id="customer_account_status"></span> 
                </div>
              </div>
            </div> 
            <br>
            <div class="row"> 
              	<div class="col-md-4">
                	<div id="" class="tile-body">
                	<div class="row" style="margin-bottom: 12px">
                    	<div class="col-md-6">
                    	<button id="DepositeBtn" onclick="addCustomerDepositeForm($(this))" value="40" style="width: 100%" class="btn btn-sm btn-success" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-down"></i>Deposite</button>
                    	</div>                    	 
                    	<div class="col-md-6">
                    	<button id="WithdrawalsBtn" onclick="addCustomerWithdrawalsForm($(this))" value="40" style="width: 100%" class="btn btn-sm btn-success" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-up"></i>Withdrawals</button>
                    	</div> 
                	</div>
                	<div class="row" style="margin-bottom: 12px">
                    	<div class="col-md-6">
                    	<button onclick="" style="width: 100%" class="btn btn-sm btn-success" type="button"><i class="fa fa-fw fa-lg fa-address-card"></i>Passbook</button>
                    	</div> 
                    	<div class="col-md-6">
                    	<button onclick="" style="width: 100%" class="btn btn-sm btn-success" type="button"><i class="fa fa-fw fa-lg fa-bars"></i>Balance</button>
                    	</div>
                	</div>
                	</div>
                </div>
                <div class="col-md-8">
                	<div  class="tile-body">
                	<div id="customer_form" class="alert alert-info" style="border-radius: 0px" align="left">
  					 No preview found !!
					</div>
					</div>
                </div>
            </div>
             
          </div>
        </div>
         </div>
  
     
<!--      <div class="row"> -->
<!--         <div class="col-md-12"> -->
<!--         	<div class="tile"> -->
<!--         	<div class="row">  -->
<!--               	<div class="col-md-12"> -->
<!--                 	<div id="customer_table" class="tile-body"> -->
<!--                 	<div class="alert alert-info" align="center"> -->
<!--   					<strong></strong> No record(s) found. -->
<!-- 					</div> -->
<!-- 					</div> -->
<!--                 </div> -->
<!--             </div> -->
<!--           	</div> -->
<!--         </div> -->
<!--       </div> -->
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
    
    function loadCustomerAddDeposite()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadCustomerAddDeposite'); ?>"; 
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
              $('#customer').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
      
    function addCustomerDepositeForm($btn){   
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/addCustomerDepositeForm';
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
    				   $('#customer_form').html(response.html);
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

    function addCustomerWithdrawalsForm($btn){   
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/addCustomerWithdrawalsForm';
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
    				   $('#customer_form').html(response.html);
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
    
    function updateCustomerDoc(){  
    	if ($('#customer_doc_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Document type is mandatory !');
            $('#customer_doc_type').focus();
            return;
        }
        if ($('#file').val().trim() == '') {
            SetWarningMessageBox('warning', 'File is mandatory!');
            $('#file').focus();
            return;
        }
               

        var formData = $('form#CustomerDocUploadForm').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateCustomerDoc';
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
				   $('#customer_doc_type').val('');
				   $('#file').val('');
				   $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
				   $('#formContainer').hide(); 
				   loadCustomer();
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

    function loadAccountLedger()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountLedgerDropDown'); ?>"; 
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
            $('#customer_deposite_ledger_head').html(response.html);              
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

    function runAutoComplete(query){
    	 $('#searchfield').typeahead({
    		 items: 10,
    		    source: function(request, response) {
    		        $.ajax({
    		            url: "<?php echo site_url('index.php/data_controller/searchByKeyword?q='); ?>"+query,
    		            method:"GET",
    		            dataType: "json",
    		            success: function (data) {
    		                response(data);
    		            }
    		        });
    		    },
    		    afterSelect:function(item){ loadData(item.id)},
    		  displayText: function(item){ return item.value+"<"+item.id+">";}
    	 });
    	 
        }
 function loadData(accNo){
		alert(accNo);
	 }
    
</script>
    
       </body>
</html>
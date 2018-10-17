	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer</li>
          </ul>
        </div>
     </div>
      
       <div class="row" id="formContainer">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-title-w-btn">
              <h3 class="title">Information</h3>
             <div class="app-search" style="padding: 0px; margin-right: 0px">
		<input onkeyup="runAutoComplete(this.value)" onfocus="resetValue()" class="search_input" autocomplete="off" name="searchkeyword" id="searchfield" type="text" placeholder="Type Account Name/Number" >
		</div>
            </div>
            <div class="tile-body">
            <div class="row invoice-info" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
                <div class="col-4">
                	<b>Customer ID : <span id="customer_ID"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Date of Birth : </b><span id="customer_dob"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Gender : </b><span id="customer_gender"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b> Permanent Address : </b><span id="customer_address">_ _ _ _ _ _ _ _ _ _ _</span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"> _ _ _ _ _  </span><br>
                   <b> Contact No. : </b><span id="customer_contact"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"> _ _ _ _ _ _ _ _ _ _ _ </span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Branch : </b><span id="customer_bank_branch"> _ _ _ _ _ _ _ _ _ _ _ </span>
                </div>
                <div class="col-4">
                <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo base_url();?>assets/img/profile.png">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"> _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"> _ _ _ _ _  </span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br>
                  <b> Account Number : </b><span id="customer_account_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b> Account Status : </b><span id="customer_account_status"> _ _ _ _ _ _ _ _ _ _ _ </span> 
                </div>
              </div>
            </div> 
            <br>
            <div class="row"> 
              	<div class="col-md-3">
                	<div id="" class="tile-body">
                	<div class="row btnDiv" style="">
                    	<div class="col-md-6">
                    	<button id="DepositeBtn" disabled onclick="addCustomerDepositeForm($(this))" style="width: 100%; font-size: .7rem !important" class="btn btn-xm btn-success" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-down"></i>Deposite</button>
                    	</div>                    	 
                    	<div class="col-md-6">
                    	<button id="WithdrawalsBtn" disabled onclick="addCustomerWithdrawalsForm($(this))" style="width: 100%; font-size: .7rem !important" class="btn btn-xm btn-success" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-up"></i>Withdrawals</button>
                    	</div> <div class="col-md-6">
                    	<button id="PassbookBtn" disabled onclick="addPassbookPreview($(this))" style="width: 100%; font-size: .7rem !important" class="btn btn-xm btn-success" type="button"><i class="fa fa-fw fa-lg fa-address-card"></i>Passbook</button>
                    	</div> 
                    	<div class="col-md-6">
                    	<button id="BalanceBtn" disabled onclick="addBalanceForm($(this))" style="width: 100%; font-size: .7rem !important" class="btn btn-xm btn-success" type="button"><i class="fa fa-fw fa-lg fa-bars"></i>Balance</button>
                    	</div>
                    	<div class="col-md-6">
                    	<button id="StatementBtn" disabled onclick="addStatementForm($(this))" style="width: 100%; font-size: .7rem !important" class="btn btn-xm btn-success" type="button"><i class="fa fa-fw fa-lg fa-bars"></i>Statement</button>
                    	</div>
                    	</div>
                	
                	</div>
                </div>
                <div class="col-md-9">
                	<div  class="tile-body">
                	<div id="customer_form" class="alert alert-success" style="border-radius: 0px; display: none">
  					 
					</div>
					</div>
                </div>
            </div>
             
          </div>
        </div>
         </div>
 
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
    
     
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
        	            	
    				   $('#customer_form').show();
    				   $('#customer_form').html(response.html);
    				   var currentdate = new Date(); 
    				   var datetime = "TRN<?php echo $this->session->userdata('userId');?>" + currentdate.getDate() + ""
    				                + (currentdate.getMonth()+1)  + "" 
    				                + currentdate.getFullYear() + ""  
    				                + currentdate.getHours() + ""  
    				                + currentdate.getMinutes() + "" 
    				                + currentdate.getSeconds() + ""
    				                + currentdate.getMilliseconds();
    				   $('#customer_deposit_tranId').html(datetime);
    				   $('#customer_deposit_tranId_hidden').val(datetime);
    				   
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
    				   $('#customer_form').show();
    				   $('#customer_form').html(response.html);
    				   var currentdate = new Date(); 
    				   var datetime = "TRN<?php echo $this->session->userdata('userId');?>" + currentdate.getDate() + ""
    				                + (currentdate.getMonth()+1)  + "" 
    				                + currentdate.getFullYear() + ""  
    				                + currentdate.getHours() + ""  
    				                + currentdate.getMinutes() + "" 
    				                + currentdate.getSeconds() + ""
    				                + currentdate.getMilliseconds();
    				   $('#customer_withdrawals_tranId').html(datetime);
    				   $('#customer_withdrawals_tranId_hidden').val(datetime);
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

    function addPassbookPreview($btn){   
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/addPassbookPreview';
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
    				   $('#customer_form').show();
    				   $('#customer_form').html(response.html);
//     				   $('#passbook_customer_account_no').val(response.json[0].accNo);
//     				   $('#passbook_customer_name').val(response.json[0].name);
//     				   $('#passbook_customer_husband').val(response.json[0].husband_name);
//     				   $('#passbook_customer_address').val(response.json[0].parmanent_address);
//     				   $('#passbook_customer_district').val(response.json[0].district);
//     				   $('#passbook_customer_contact').val(response.json[0].contact_no);
//    				   $('#passbook_branch_name').val('Head Office');
//     				   $('#passbook_branch_code').val('01');
//     				   $('#passbook_customer_date_of_reg').val('12/09/2018');
//     				   $('#passbook_date_of_issue').val('22/10/2018');
//     				   $('#passbook_office_email').val('affordinservices@gmail.com');
//     				   $('#passbook_sposored_by').val('PUNSHIUKAL CONSULTANCY PRIVATE LIMITED');
//     				   $('#passbook_office_cin_no').val('U74999MN2018PTC13662');
//     				   $('#passbook_office_address').val('Uripok Kangchup Road, Near Over Bridge, Imphal - 795001');
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

    function addBalanceForm($btn){   
    	$reqestId =  $btn.val();  
    	var url = '<?php echo base_url();?>index.php/data_controller/addBalanceForm';
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
    				   $('#customer_form').show();
    				   $('#customer_form').html(response.html);
    				   $('#customerBalanceSheet').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
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
    
    function addCustomerDeposite(){  
    	if ($('#customer_deposite_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Deposite Amount is mandatory !');
            $('#customer_deposite_amount').focus();
            return;
        }
        if ($('#customer_deposite_narration').val().trim() == '') {
            SetWarningMessageBox('warning', 'Narration is mandatory!');
            $('#customer_deposite_narration').focus();
            return;
        }
               

        var formData = $('form#CustomerDepositeForm').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addCustomerDeposite';
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
				   $('#customer_voucher_no').html(response.voucherNo);
				   $('#customer_deposite_amount').attr('disabled',true);
				   $('#customer_deposite_narration').attr('disabled',true);
				   $('#submitBtn').attr('disabled',true);
				   $('#resetBtn').attr('disabled',true);
				   $('#customer_balance').html(response.Balance);
				  
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

    function addCustomerWithdrawals(){  
    	if ($('#customer_withdrawals_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Withdrawals Amount is mandatory !');
            $('#customer_withdrawals_amount').focus();
            return;
        }
        if ($('#customer_withdrawals_narration').val().trim() == '') {
            SetWarningMessageBox('warning', 'Narration is mandatory!');
            $('#customer_withdrawals_narration').focus();
            return;
        }
               

        var formData = $('form#CustomerWithdrawlsForm').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addCustomerWithdrawals';
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
				   $('#customer_voucher_no').html(response.voucherNo);
				   $('#customer_withdrawals_amount').attr('disabled',true);
				   $('#customer_withdrawals_narration').attr('disabled',true);
				   $('#submitBtn').attr('disabled',true);
				   $('#resetBtn').attr('disabled',true);
				   $('#customer_balance').html(response.Balance);
				  
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
//     		   autoselect:true,
    		  afterSelect:function(item){ loadSearchData(item.id)},
    		  displayText: function(item){ return item.value+ "<"+item.id+">";}
    	 });
    	 
        }

 function loadSearchData(accNo){
	$reqestId =  accNo;  
 	var url = '<?php echo base_url();?>index.php/data_controller/loadSearchData';
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
 				 $('#searchfield').val('');  
 				 $('#photo').attr('src',response.json[0].photo);
 				 $('#customer_ID').html(response.json[0].Cus_id);
 				 $('#customer_account_status').html(response.json[0].accStatus);
 				 $('#customer_account_no').html(response.json[0].accNo);
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

 				 $('#DepositeBtn').val(response.json[0].Cus_id).attr('disabled',false);
 				 $('#WithdrawalsBtn').val(response.json[0].Cus_id).attr('disabled',false);
 				 $('#PassbookBtn').val(response.json[0].Cus_id).attr('disabled',false);
				 $('#BalanceBtn').val(response.json[0].accNo).attr('disabled',false);
 				 
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

 function resetValue ()
 	{
	 $('#searchfield').val('');

	 	 $('#photo').attr('src',base_url+"assets/img/profile.png");
		 $('#customer_ID').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_account_status').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_account_no').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_name').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_dob').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_gender').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_aadhaar').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_husband').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_address').html(' _ _ _ _ _ _ _ _ _ _ _ ');

		 $('#customer_rural').attr('checked', false);
		 $('#customer_urban').attr('checked', false);
		 
		 $('#customer_district').html(' _ _ _ _ _ _ ');
		 $('#customer_contact').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_work').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_bank_ac_no').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_bank_branch').html(' _ _ _ _ _ _ _ _ _ _ _ ');

		 $('#customer_nominee_name').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_nominee_aadhaar_no').html(' _ _ _ _ _ _ _ _ _ _ _ ');
		 $('#customer_nominee_address').html(' _ _ _ _ _ _ _ _ _ _ ');

		 $('#customer_nominee_rural').attr('checked', false);
		 $('#customer_nominee_urban').attr('checked', false);
		 
		 $('#customer_nominee_district').html(' _ _ _ _ _ _ ');
		 $('#customer_nominee_contact').html(' _ _ _ _ _ _ _ _ _ _ _ ');
	 
    	 $('#DepositeBtn').val('').attr('disabled',true);
    	 $('#WithdrawalsBtn').val('').attr('disabled',true);
    	 $('#PassbookBtn').val('').attr('disabled',true);
    	 $('#BalanceBtn').val('').attr('disabled',true);
    	 $('#customer_form').hide();
	 }

 function printDiv(divID) {
	 $("#"+divID).print({
			addGlobalStyles : true,
			stylesheet : null,
			rejectWindow : false,
			noPrintSelector : ".no-print",
			iframe : true,
			append : null,
			prepend : null


			});
	}    
</script>
    
       </body>
</html>
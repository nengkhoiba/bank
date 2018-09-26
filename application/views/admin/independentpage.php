	<?php $this->load->view('global/header');?>
    
       <div class="row" id="formContainer" style="margin-top: 45px">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile" style="margin: 25px">
          <div class="tile-title-w-btn">
              <h3 class="title">Customer Information</h3>
             <div class="app-search" style="padding: 0px; margin-right: 0px">
		<input onkeyup="runAutoComplete(this.value)" onfocus="resetValue()" class="search_input" autocomplete="off" name="searchkeyword" id="searchfield" type="text" placeholder="Type Account Name/Number" >
		</div>
            </div>
            <div class="tile-body">
            <div class="invoice-info" style="background: #fff; margin: 0px; color: #000">
				<div class="row" id="passbook" style="padding : 10px" >
                <div class="col-4">
                	<b>Customer ID : <span id="customer_ID"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"> <?php echo $result[0]['name'];?> </span><br>
                    <b>Date of Birth : </b><span id="customer_dob"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Gender : </b><span id="customer_gender"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"> <?php echo $result[0]['husband_name'];?> </span><br>
                    <b> Permanent Address : </b><span id="customer_address"> <?php echo $result[0]['parmanent_address'];?> </span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"> <?php echo $result[0]['district'];?>  </span><br>
                   <b> Contact No. : </b><span id="customer_contact"><?php echo $result[0]['contact_no'];?> </span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"> _ _ _ _ _ _ _ _ _ _ _ </span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Branch : </b><span id="customer_bank_branch"> _ _ _ _ _ _ _ _ _ _ _ </span>
                </div>
                <div class="col-4">
                <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo $result[0]['photo'];?>">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"> _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"> _ _ _ _ _  </span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br>
                  <b> Account Number : </b><span id="customer_account_no"> <?php echo $result[0]['accNo'];?> </span><br>
                  <b> Account Status : </b><span id="customer_account_status"> _ _ _ _ _ _ _ _ _ _ _ </span> 
                </div>
                </div>
                <div class="form-group col-md-12 align-self-end" style="padding-top: 0px">
                  <button onclick="printDiv('passbook')" class="btn btn-xm btn-danger" type="button"><i class="fa fa-fw fa-lg fa-print"></i>Print</button>
                  </div>
              </div>
            </div> 
             
          </div>
        </div>
         </div>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">

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
	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
		<div class="app-title">
			<div>
			<ul class="app-breadcrumb breadcrumb">
			  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			  <li class="breadcrumb-item">Transaction Report</li>
			</ul>
			</div>
		</div>
      
		
			<div class="clearix"></div>
				<div class="tile">
					<div class="tile-body">
						<br>
							<h5>Transaction Report</h5>
						<br>
						 
						<div class="row col-md-12">
						<?php echo form_open_multipart('',array('id'=>'TranReportForm','class'=>'row'))?>	
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Branch</label>
								<select class="form-control" style="margin-top: 10px;" name="branch_list" id="branch_list">
								<!-- Branch list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Ledger</label>
								<select class="form-control" style="margin-top: 10px;" name="account_ledger" id="account_ledger">
								<!-- Ledger list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Voucher Type</label>
								<select class="form-control" style="margin-top: 10px;" name="voucher_type" id="voucher_type">
									<option class="form-control" value="">- Select -</option>
                  					<option class="form-control" value="P">Payment</option>
                  					<option class="form-control" value="R">Received</option>
                  					<option class="form-control" value="C">Contra</option>
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">User</label>
								<select class="form-control" style="margin-top: 10px;" name="user_name" id="user_name">
								<!-- User list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Account Status</label>
								<select class="form-control" style="margin-top: 10px;" name="acc_status" id="acc_status">
									<option value="">- Select -</option>
									<option value="0">OPEN</option>
									<option value="1">CLOSED</option>
									<option value="3">ALL</option>
								</select>
							</div>
							
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Date from</label>
								<input style="margin-top: 10px;" class="form-control" type="date" name="from_date" id="from_date" placeholder="Select to date">
							</div>
							
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Date to</label>
								<input style="margin-top: 10px;" class="form-control" type="date" name="to_date" id="to_date" placeholder="Select to date">
							</div>
							<div class="form-group col-md-3 align-self-end">
                  <button onclick="SearchReport()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
                  &nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#TranReportForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;<a id="btn_print" class="btn btn-sm btn-secondary" href="#" onclick="printReport()"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>
                </div>
							<?php echo form_close() ?> 
						</div>
						
					</div>
				</div>
			<div class="row">
		        <div class="col-md-12">
		          <div class="tile">
		          <div class="row"> 
		              	<div class="col-md-12">
		                	<div id="report_table" class="tile-body"></div>
		                </div>
		            </div>
		          </div>
		        </div>
		      </div>
		
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
	loadDropDown('','branch','#branch_list');
	loadDropDown('','emp','#user_name');   

	function loadLedger()
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
            $('#account_ledger').html(response.html);             
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
    loadLedger(); 
	
	
    function SearchReport()
    { 
    	
    	var formData = $('form#TranReportForm').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/account_controller/getTransactionReport';
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
        		$('#report_table').html(response.html);
        		$('#transaction_report_table').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});             
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
        $('#from_date').datepicker({
        format: "yyyy-mm-dd",
        autoclose:true
        });
    // allow to pick future date

    var FromEndDate = new Date();
    $(function(){
    $('#to_date').datepicker({
    format: 'yyyy-mm-dd',
    
	autoclose: true
    });
    });
    });
   function printReport(){
		
			$("#report_table").print({
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
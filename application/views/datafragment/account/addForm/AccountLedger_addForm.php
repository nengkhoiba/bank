		<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Account Ledger</h3>
             <button onclick="removeMasterform('#MasAccountLedgerformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasAccountLedgerForms','class'=>'row'))?>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Ledger Name</label>
                  <input name="accountLedger_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="accountLedger_name"
    				placeholder="Ledger Name"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Under Account Group</label>
                  <select id="accountLedger_grpUnder" name="accountLedger_grpUnder" style="margin-top:10px;" class="form-control" >
                        <!-- List of account group -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Opening Balance</label>
                  <input name="accountLedger_open" style="margin-top: 10px;"
    				class="form-control number" type="text" id="accountLedger_open"
    				placeholder="Opening Balance"></input>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addAccountLedger()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasAccountLedgerForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasAccountLedgerformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
 
<script src="<?php echo base_url();?>assets/js/validation.js"></script>       
<script type="text/javascript">
function loadAccountGrpUnder()
{ 
  var url = "<?php echo site_url('index.php/data_controller/loadAccountGrpUnder'); ?>"; 
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
        $('#accountLedger_grpUnder').html(response.html);              
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
loadAccountGrpUnder();

</script>


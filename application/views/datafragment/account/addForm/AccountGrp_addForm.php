		<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Account Group</h3>
             <button onclick="removeMasterform('#MasAccountGrpformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasAccountGrpForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Group Name</label>
                  <input name="accountGrp_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="accountGrp_name"
    				placeholder="Group Name"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Group Under</label>
                  <select id="accountGrp_under" name="accountGrp_under" style="margin-top:10px;" class="form-control" >
                        <!-- List of country -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Group Nature</label>
                  <select id="accountGrp_nature" name="accountGrp_nature" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">Liability</option>
                  </select>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addAccountGrp()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MasAccountGrpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasAccountGrpformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        
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
        $('#accountGrp_under').html(response.html);              
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


<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Financial Year</h3>
             <button onclick="removeMasterform('#MasFinancialformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasFinancialForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Financial Year Title</label>
                  <input name="financial_title" style="margin-top: 10px;"
    				class="form-control" type="text" id="financial_title"
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
                  <button onclick="addFinancial()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MasFinancialForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasFinancialformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>

<script>

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
<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Financial Year Update</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasFinancialformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'FinancialFormUpdate','class'=>'row'))?>
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="financial_id" id="financial_id_upt" value="<?php echo $row['ID'];?>">
		
			<div class="form-group col-md-4 align-self-end">
				<label class="control-label">Financial Year Title</label>
				<input value="<?php echo $row['Financial_year'];?>" name="financial_title" style="margin-top: 10px;"	class="form-control name" type="text" id="financial_title" placeholder="Financial Year Title"></input>
			</div>
			
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Start date</label>
                  <input name="financial_start" value="<?php echo date("d-m-Y", strtotime($row['Start_date']));?>" style="margin-top: 10px;"
					class="form-control" type="text" id="financial_start"
					placeholder="Financial start date"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">End date</label>
                  <input name="financial_end" value="<?php echo date("d-m-Y", strtotime($row['End_date']));?>" style="margin-top: 10px;"
					class="form-control" type="text" id="financial_end"
					placeholder="Financial end date"></input>
                </div>
				
               
         
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateFinancial()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#FinancialFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasFinancialformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              <?php echo form_close() ?>
		           </div>
          </div>
        </div>   
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 
		

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
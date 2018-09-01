<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Account Group Name Update</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasAccountGrpformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="AccountGrpFormUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="accountGrp_id" id="accountGrp_id_upt" value="<?php echo $row['ID'];?>">
		
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Group Name</label>
                  <input name="accountGrp_name" value="<?php echo $row['Group_name'];?>" style="margin-top: 10px;"
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
		                  <button onclick="updateAccountGrp()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#AccountGrpFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasAccountGrpformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>   

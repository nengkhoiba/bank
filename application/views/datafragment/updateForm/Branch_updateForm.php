<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title"> Branch Update</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasBranchformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="BranchFormUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="branch_id" id="branch_id_upt" value="<?php echo $row['ID'];?>">
		
			<div class="form-group col-md-4 align-self-end">
				<label class="control-label">Branch Name</label>
				<input value="<?php echo $row['Branch_name'];?>" name="branch_name" style="margin-top: 10px;"	class="form-control" type="text" id="branch_name" placeholder="Branch Name"></input>
			</div>
			
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch Code</label>
                  <input name="branch_code" value="<?php echo $row['Branch_code'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="branch_code"
					placeholder="Branch Code"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch Address</label>
                  <input name="branch_address" value="<?php echo $row['Branch_address'];?>" style="margin-top: 10px;"
					class="form-control" type="text" id="branch_address"
					placeholder="Branch Address"></input>
                </div>
				
               
         
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateBranch()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#BranchFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasBranchformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>   

		
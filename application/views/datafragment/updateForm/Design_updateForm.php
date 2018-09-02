<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Designation Update</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasDesignformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="DesignFormUpdate">
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="design_id" id="design_id_upt" value="<?php echo $row['ID'];?>">
		
			<div class="form-group col-md-4 align-self-end">
				<label class="control-label">Designation Title</label>
				<input value="<?php echo $row['title'];?>" name="design_title" style="margin-top: 10px;"	class="form-control name" type="text" id="design_title" placeholder="Designation Title"></input>
			</div>
			
			<div class="form-group col-md-4 align-self-end">
				<label class="control-label">Description</label>
				<textarea  name="design_description" rows="1" style="margin-top: 10px;"	class="form-control name" type="text" id="design_description" placeholder="Description"><?php echo $row['description'];?></textarea>
			</div>
               
         
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateDesign()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#DesignFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasDesignformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>   
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 
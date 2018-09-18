
        <?php  foreach ( $result as $row) { ?>
           
           <input type="hidden" name="roleId[]" value="<?php echo $row['Role'];?>"/>     
                		
      	<?php if($row['IsDropDown']==0 && $row['PageCategory']==0){?>
      	 <li>      	
					<span style="padding: 0px 15px;">		 
					<?php echo $row['Page_title'];?>
					</span>	
					<div  class="animated-checkbox  pull-right" style="display: inline-block;">
						<label>
							<input name="pageCheckBox[]" class="checkbox" type="checkbox" <?php if($row['pageEnable']>0){echo "checked";}?>  value="<?php echo $row['ID']?>"><span class="label-text"></span>
						</label>
					</div>
			      	 		
            </li>
      	<?php }else if($row['IsDropDown']==1 && $row['PageCategory']==0){?>
      	 <li>
      	 		<span style="padding: 0px ;">
      			<a href="#"><?php echo $row['Page_title'];?>
      			</span>	
				
				<div  class="animated-checkbox pull-right" style="display: inline-block;">
              	<label>
                <input name="pageCheckBox[]" class="checkbox" type="checkbox" <?php if($row['pageEnable']>0){echo "checked";}?> value="<?php echo $row['ID']?>"><span class="label-text"></span>
              	</label>
            	</div>
            	</a>
            
			</li>
			 <ul>
		      	<?php  foreach ($result as $rows){
		      		
						if($row['ID']==$rows['PageCategory']){
							?>
							
				      			<li>
								<span style="padding: 0px ;">
								<?php echo $rows['Page_title'];?>
				      			</span>
								<div  class="animated-checkbox pull-right" style="display: inline-block;">
				              	<label>
				                <input name="pageCheckBox[]" class="checkbox" <?php if($rows['pageEnable']>0){echo "checked";}?>  type="checkbox" value="<?php echo $rows['ID']?>"><span class="label-text"></span>
				              	</label>
				            	</div>
				             </li>
				         
							<?php
						}
						
					}?>
				</ul>
		   <?php }?>
               

        <?php } ?>
       
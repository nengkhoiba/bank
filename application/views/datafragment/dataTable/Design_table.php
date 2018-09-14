<table id="design" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Name</th>
				 <th>Description</th>
                <th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Select all</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $design_data) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $design_data['Name'];?></td>
				<td><?php echo $design_data['description'];?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $design_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addDesignationform($(this))" value="<?php echo $design_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++;} ?>
        </tbody>
       
    </table>
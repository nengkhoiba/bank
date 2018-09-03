<table id="branch" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Branch Name</th>
				<th>Branch Code</th>
				<th>Branch Address</th>
				<th>Created on</th>				
                <th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text"></span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $branch_data) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $branch_data['Branch_name'];?></td>
				<td><?php echo $branch_data['Branch_code'];?></td>
				<td><?php echo $branch_data['Branch_address'];?></td>
				
				<td><?php echo date("d-m-Y h:i:s A", strtotime($branch_data['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $branch_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="editBranch($(this))" value="<?php echo $branch_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
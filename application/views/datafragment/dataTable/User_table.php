<table id="user" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Employee Name</th>
                <th>Username</th>
				 <th>Role</th>
				 <th>Status</th>
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
        <?php $count = 1; foreach ( $result as $row) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['emp_id'];?></td>
                <td><?php echo $row['username'];?></td>
				<td><?php echo $row['role_id'];?></td>
				<td><?php if($row['isActive'] == 1){echo '<span style="">Active</span>';} else{echo '<span style="">Deactive</span>';};?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addUserform($(this))" value="<?php echo $row['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++;} ?>
        </tbody>
       
    </table>
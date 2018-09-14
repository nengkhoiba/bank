<table id="accountgrp" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Group Name</th>
                <th>Group Under</th>
                <th>Group Nature</th>
                <th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Delete All</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $accountGrp_data) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $accountGrp_data['Group_name'];?></td>
                <td><?php echo $accountGrp_data['Group_under'];?></td>
                <td><?php echo $accountGrp_data['Group_nature'];?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $accountGrp_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addAccountGrpform($(this))" value="<?php echo $accountGrp_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
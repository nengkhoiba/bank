<table id="selected_member_data_table" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Sex</th>               
                <th>Aadhaar No</th>
                <th>District</th>
				<th>Action</th>
                <th>
				<div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Select All</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $mem_data) { ?>
            <tr>
            	<td><?php echo $count?></td>
                <td><?php echo $mem_data['name']?></td>
                <td><?php echo $mem_data['parmanent_address']?></td>
                <td><?php echo $mem_data['contact_no']?></td>
                <td><?php echo $mem_data['sex']?></td>
                <td><?php echo $mem_data['aadhaar_no']?></td>
                <td><?php echo $mem_data['district']?></td>
				<td> 
					<a onclick="loadMember_list_group()"  style="color:#fff" class="btn btn-sm btn-success">View profile</a>
				</td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
					<label>
						<input class="checkbox" type="checkbox" value="<?php echo $mem_data['ID']?>"/><span class="label-text"></span>
					</label>
            	</div>
            		 
				</td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
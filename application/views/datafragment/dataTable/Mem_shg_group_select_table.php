<table id="manageshg" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>SHG Code</th>
				<th>SHG Name</th>
				<th>Address</th>
				<th>Area</th>	
				<th>Max Member </th>				
                <th>Branch ID</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $shgmaster_data) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $shgmaster_data['Group_code'];?></td>
				<td><?php echo $shgmaster_data['Group_name'];?></td>
				<td><?php echo $shgmaster_data['Address'];?></td>
				<td><?php echo $shgmaster_data['Area'];?></td>
				<td><?php echo $shgmaster_data['Member_count'];?></td>
				<td><?php echo $shgmaster_data['Branch_id'];?></td>
				<td> 
					<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal" type="button" oMnclick="showGroupModel(<?php echo $shgmaster_data['ID'];?>)">View member</button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
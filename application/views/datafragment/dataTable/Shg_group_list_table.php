<table id="shg_group_table" class="table table-hover">
        <thead>
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
				  <a onclick="LoadSelected_memberlist()"  style="color:#fff" class="btn btn-sm btn-danger">View member</a>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
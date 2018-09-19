<table id="shgmaster" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>SHG Code</th>
				<th>SHG Name</th>
				<th>Address</th>
				<th>Area</th>	
				<th>Max Member </th>				
                <th>Branch ID</th>
                <th>Remark</th>
				<th>Created On</th>
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
        <?php $count = 1; foreach ( $result as $shgmaster_data) { ?>
            <tr>
				<td><?php echo $count;?></td>
				<td><?php echo $shgmaster_data['Group_code'];?></td>
				<td><?php echo $shgmaster_data['Group_name'];?></td>
				<td><?php echo $shgmaster_data['Address'];?></td>
				<td><?php echo $shgmaster_data['Area'];?></td>
				<td><?php echo $shgmaster_data['Member_count'];?></td>
				<td><?php echo $shgmaster_data['Branch_id'];?></td>
				<td><?php echo $shgmaster_data['Extra'];?></td>
				<td><?php echo date("d-m-Y h:i:s A", strtotime($shgmaster_data['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $shgmaster_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addShgmasterform($(this))" value="<?php echo $shgmaster_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
<table id="customer" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Sex</th>               
                <th>Aadhaar No</th>
                <th>District</th>
                <th>Upload</th>
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
            	<button onclick="addDocForm($(this))" value="<?php echo $mem_data['ID']?>"  class="btn btn-sm btn-success" type="button">Upload Document</button>
            	
				</td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
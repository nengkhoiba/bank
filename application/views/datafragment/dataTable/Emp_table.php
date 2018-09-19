<table id="emp" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Designation</th>
               
                <th>Date of Birth</th>
                <th>Qualification</th>
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
        <?php $count = 1; foreach ( $result as $emp_data) { ?>
            <tr>
            	<td><?php echo $count?></td>
                <td><?php echo $emp_data['name']?></td>
                <td><?php echo $emp_data['address']?></td>
                <td><?php echo $emp_data['pincode']?></td>
                <td><?php echo $emp_data['designation']?></td>
                <td><?php echo $emp_data['dob']?></td>
                <td><?php echo $emp_data['qualification']?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $emp_data['ID']?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addEmpform($(this))" value="<?php echo $emp_data['ID']?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++;} ?>
        </tbody>
       
    </table>
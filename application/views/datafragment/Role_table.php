<table id="role" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Name</th>
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
        <?php foreach ( $result as $role_data) { ?>
            <tr>
                <td><?php echo $role_data['ID']?></td>
                <td><?php echo $role_data['role']?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $role_data['ID']?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="editEmp($(this))" value="<?php echo $role_data['ID']?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php } ?>
        </tbody>
       
    </table>
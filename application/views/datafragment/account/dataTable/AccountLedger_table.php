<table id="accountledger" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Sl. No.</th>
                <th>Ledger Name</th>
                <th>Under Account Group</th>
                <th>Opening Balance</th>
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
        <?php $count = 1; foreach ( $result as $accountLedger_data) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $accountLedger_data['Ledger'];?></td>
                <td><?php echo $accountLedger_data['Group_ID'];?></td>
                <td><?php echo $accountLedger_data['Open_balance'];?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $accountLedger_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="editAccountLedger($(this))" value="<?php echo $accountLedger_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
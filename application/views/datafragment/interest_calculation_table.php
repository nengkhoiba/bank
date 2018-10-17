
		
		<div class="col-md-12">
			<div class="col-md-6">
				Name: Nengkhoiba Chungkham<br>
				Address: Brahmapur Chungkham Leikai<br>
				LAN: LAIMP00009772678
			</div>
			<div class="col-md-6">
				Loan Amount: ₹ <?php echo $loan['principle'];?><br>
			    Interest:<?php echo $loan['int'];?><br>
				EMI: ₹ <?php echo $loan['emi'];?>
				
			</div>
		
		</div>
		
		
		
		    <table class="table table-bordered">
		        <tr>
		            <th>
		                Sl
		            </th>
		             <th>
		               Opening balance
		            </th>
		            <th>
		               Principle
		            </th>
		             <th>
		                Interest
		            </th>
		             <th>
		                Emi
		            </th> 
		            <th>
		                Payment date
		            </th> 
		            <th>
		              Closing balance
		            </th> 
		        </tr>
		        
		        <?php foreach ($loan['details'] as $row){?>
		        <tr>
		        	<td>
		        		<?php echo $row['sl'];?>
		        	</td>
		        	<td>
		        		₹ <?php echo $row['opening'];?>
		        	</td>
		        	<td>
		        		₹ <?php echo $row['principal'];?>
		        	</td>
		        	<td>
		        		₹ <?php echo $row['interest'];?>
		        	</td>
		        	<td>
		        		₹ <?php echo $row['emi'];?>
		        	</td>
		        	<td>
		        		<?php echo $row['date'];?>
		        	</td>
		        	<td>
		        		₹<?php echo $row['closing'];?>
		        	</td>
		        	
		        </tr>
		        <?php }?>
		        
		        <tfoot>
		        	<tr>
		        		<td>
		        			
		        		</td>
		        		<td>
		        		</td>
		        		<td>
		        		</td>
		        		<td>
		        		₹<?php echo $loan['totalInterest'];?>
		        		</td>
		        		<td>
		        		₹<?php echo $loan['totalWithprincipal'];?>
		        		</td>
		        		<td>
		        		</td>
		        		<td>
		        		</td>
		        	</tr>
		        </tfoot>
		     
		    </table>
	
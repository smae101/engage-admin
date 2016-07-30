<?php foreach($Abstract as $Abs){ ?>
	<div class="modal fade" id="<?=$Abs['Id_Thesis']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content" style="font-size:14px;">
	            <div class="modal-header panel-red">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           			<div class="text-center">
           				<?php if($Abs['Call_Location'] == 'T.'){?>
           					<b> Thesis </b>
           				<?php }else{?>
           					<b> Reseach Journal</b>
           				<?php }?>
           			</div>
	               	<table style="font-size:14px;">
	               		<tr>
	               			<td valign="top" width="20%">Call Number</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<td valign="top">
	               				<?php if(empty($Abs['Call_Location']) || empty($Abs['Call_DeweyExtend']) || empty($Abs['Call_ClassNum'])) { ?>
	               					<font color="yellow">On Process</font>
	               				<?php } else { ?>
	                                <b><?php echo $Abs['Call_Location']."<br>"
	                                .$Abs['Call_Dewey'].".".$Abs['Call_DeweyExtend']."<br>"
	                                .$Abs['Call_ClassNum']."<br>"
	                                .$Abs['Call_Year']."&nbsp;".$Abs['Call_Copy'];?></b>
                            	<?php } ?>
                            </td>
	               			<!-- <td valign="top"><b><?php echo $Abs['']; ?></b></td> -->
	               		</tr>
	               		<tr>
	               			<td valign="top">Accession Num</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<?php if(empty($Abs['Accession_Number'])) { ?>
	               				<td valign="top"><font color="yellow">On Process</font></td>
	               			<?php } else { ?>
	               				<td valign="top"><b><?php echo $Abs['Accession_Number']; ?></b></td>
	               			<?php } ?>
	               		</tr>
						<?php if($Abs['Call_Location'] == 'T.'){?>
		               		<tr>
		               			<td valign="top">Thesis Number</td>
		               			<td valign="top">&nbsp;:&nbsp;</td>
		               			<td valign="top"><b><?php echo $Abs['Book_Number']; ?></b></td>
		               		</tr>
           				<?php }else{?>
           					<tr>
		               			<td valign="top">Volume Number</td>
		               			<td valign="top">&nbsp;:&nbsp;</td>
		               			<td valign="top"><b><?php echo $Abs['Volume_Number']; ?></b></td>
		               		</tr>
		               		<tr>
		               			<td valign="top">Issue Number</td>
		               			<td valign="top">&nbsp;:&nbsp;</td>
		               			<td valign="top"><b><?php echo $Abs['Issue_Number']; ?></b>&nbsp;&nbsp;
		               				<?php if ($Abs['Regular']== 1 ){echo "Regular";}
		               					else {echo "Irregular";
		               				}?>
		               			</td>
		               		</tr>
           				<?php }?>
	               		<tr>
	               			<td valign="top">Title</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<td valign="top"><b><?php echo $Abs['Title']; ?></b></td>
	               		</tr>
	               		<tr>
	               			<td valign="top">Author/s</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<td valign="top"><b>
	               				<?php foreach ($this->thesis_main->getAuthor($Abs['Id_Thesis']) as $author) {
			                        echo $author['Name'];?><br>
			                   	<?php } ?></b>
                   			</td>
	               		</tr>
	               		<tr>
	               			<td valign="top">Adviser/s</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<td valign="top"><b>
	               				<?php foreach ($this->thesis_main->getAdviser($Abs['Id_Thesis']) as $author) {
			                        echo $author['Name'];?><br>
			                   	<?php } ?></b>
                   			</td>
	               		</tr>
	               		<tr>
	               			<td valign="top">Status</td>
	               			<td valign="top">&nbsp;:&nbsp;</td>
	               			<td valign="top"><?php if($Abs['Status'] == "Pending"){ ?>
	                            <span class="label label-warning"><?php echo $Abs['Status']; ?></span>
	                            <?php }else if($Abs['Status'] == "Available"){ ?>
	                            <span class="label label-success"><?php echo $Abs['Status']; ?></span>
	                            <?php }else{ ?>
	                            <span class="label label-info"><?php echo $Abs['Status']; ?></span>
	                        <?php } ?></td>
	               			<!-- <td valign="top"><b><?php echo $Abs['Book_Number']; ?></b></td> -->
	               		</tr>
	               	</table>
	            </div>
	            <div class="modal-body" style="font-size:14px;">
	                <?php echo $Abs['Description']; ?>
	            </div>
	            <div class="modal-footer">
	            	<span style="float:left;">Printed : <b><?php echo $Abs['Published_Month']." ".$Abs['Published_Year']; ?></b></span>
	                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	                <!-- <button type="button">View PDF File</button> -->
	                <?php if($Abs['File']!=null){?>
	                	<a  class="btn btn-danger" href="<?php echo base_url("assets/swf")."/".$Abs['File'];?>" target="_blank" >View PDF</a>
	            	<?php }
	            	else { ?>
	            		<fieldset disabled>
                            <button type="submit" class="btn btn-danger">PDF File Not Available</button>
                        </fieldset>
	            	<?php } ?>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
<?php } ?>
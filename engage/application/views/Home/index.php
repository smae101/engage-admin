<?php
    $this->load->helper('text');
?>
<!--  <iframe src="http://docs.google.com/gview?url=<?php echo base_url("assets/pdf")."/117955fb6e40239a0.pdf"; ?>&embedded=true"  width="800px" height="2100px" frameborder="0">
</iframe> -->
<!-- <iframe class="noprint" src="assets/pdf/1117955fb6e40239a0.pdf#toolbar=0" width="800px" height="2100px"></iframe> -->
<!-- <embed class="noprint" src="assets/pdf/1117955fb6e40239a0.pdf" width="800px" height="2100px"> -->
<style>
td{
    text-align:left;
}
</style>
<div class = "container-fluid container-main" id="main">
    <div class="panel panel-default z-depth-1 top-depth" style=" ">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-hover table-home" style="font-size:12px;" id="dataTables-example">
                    <thead class="heading">
                    <tr class="table-data" align="center">
                        <th hidden="hidden">Id</th>
                        <th hidden="hidden">Call Number</th>
                        <th hidden="hidden">Accession Number</th>
                        <th hidden="hidden">Subject</th>
                        <th hidden="hidden">Keywords</th>
                        <th style="vertical-align:middle;text-align:center;width:10%;">Thesis Num</th>
                        <th style="vertical-align:middle;text-align:center;width:18%;">Title</th>
                        <th style="vertical-align:middle;text-align:center;width:18%;">Author/s</th>
                        <th style="vertical-align:middle;text-align:center;">Department</th>
                        <th style="vertical-align:middle;text-align:center;">Adviser</th>
                        <th style="vertical-align:middle;text-align:center;">Month</th>
                        <th style="vertical-align:middle;text-align:center;">Year</th>
                        <!-- <th style="vertical-align:middle;text-align:center;width:12%;">Abstract</th> -->
                        <th style="vertical-align:middle;text-align:center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Abstract as $Abs){ ?>
                            <tr class="tr_table" align="center" data-toggle="modal" data-target="<?php echo '#'.$Abs['Id_Thesis'];?>" style="cursor:pointer;">
                                <td hidden="hidden"><?php echo $Abs['Id_Thesis']; ?></td>
                                <td hidden="hidden">
                                        <?php echo $Abs['Call_Location']."<br>"
                                        .$Abs['Call_Dewey'].".".$Abs['Call_DeweyExtend']."<br>"
                                        .$Abs['Call_ClassNum']."<br>"
                                        .$Abs['Call_Year']."&nbsp;".$Abs['Call_Copy'];?></b>
                                </td>
                                <td hidden="hidden"><?php echo $Abs['Accession_Number']; ?></td>
                                <td hidden="hidden">
                                    <?php foreach ($this->thesis_main->getSubject($Abs['Id_Thesis']) as $subject) {
                                        echo $subject['Subject'];?><br>
                                    <?php } ?></b>
                                </td>
                                <td hidden="hidden">
                                    <?php foreach ($this->thesis_main->getKeyword($Abs['Id_Thesis']) as $key) {
                                        echo $key['Keyword'];?><br>
                                    <?php } ?></b>
                                </td>
                                <td class="text-left"><?php echo $Abs['Book_Number'];?></td>
                                <td class=""><?php echo $Abs['Title']; ?></td>
                                <td class="">
                                    <?php foreach ($this->thesis_main->getAuthor($Abs['Id_Thesis']) as $author) {
                                        echo $author['Name'];?><br>
                                    <?php } ?>
                                </td>
                                <td class=""><?php echo $Abs['Department']; ?></td>
                                <td class="">
                                    <?php foreach ($this->thesis_main->getAdviser($Abs['Id_Thesis']) as $adviser) {
                                        echo $adviser['Name'];?><br>
                                    <?php } ?>
                                </td>
                                <td class=""><?php echo $Abs['Published_Month']; ?></td>
                                <td class=""><?php echo $Abs['Published_Year']; ?></td>
                                <!-- <td class=""><?php echo word_limiter($Abs['Description'],10); ?></td> -->
                                <td class=""><?php if ($Abs['Status'] == 'Available') {
                                    echo '<b class="green-text">Available</b>';
                                }else{
                                    echo '<b class="red-text">'.$Abs['Status'].'</b>';
                                    } ?></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>

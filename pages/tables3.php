<?php
include "sidepanel.php";
?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="forms3.php" method="POST">
                    <button type="submit" class="btn btn-danger btn-circle btn-lg" style="float:right;margin:30px 20px 0px 0px;" name="addbtn">
                        <i class="fa  fa-users"></i></button></form>
                        <a href="export_pdf3.php"><button type="button" class="btn btn-primary" style="float:right;margin:40px 20px 0px 0px;">
                            <i class="fa fa-print"></i> Download as PDF</button></a>
                        <a href="export_excel3.php"><button type="button" class="btn btn-primary" style="float:right;margin:40px 20px 0px 0px;">
                            <i class="fa fa-table"></i> Download as Excelsheet</button></a>
                        <h1 class="page-header">Manage Customers</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                if(strpos($url, 'error=success_add') !== false){?>
                    <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   New customer added successfully.
                                                </div>
                <?php }
                elseif(strpos($url, 'error=success_edit') !== false){?>
                <div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                   Customer edited successfully.
                                                </div>
                <?php }?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DataTables Advanced Tables
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">


                                <div class="dataTable_wrapper">

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <col width="130">
                                   
                                        <thead>
                                            <tr>
                                                  <th>Customer Name</th>
                                                  <th>ERP code</th>
                                                  <th>Contact Number</th>
                                                  <th>Company Name</th>
                                                  <th>Payment</th>
                                                  <th>Status</th>
                                                  <th>Details</th>
                                                  <th>Edit</th>
                                                  <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `customer_table`";
                                            $result = $conn->query($sql);
                                            while($row=$result->fetch_assoc()){?>

                                        <tr class="odd gradeX">
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['erp_code'];?></td>
                                                <td><?php echo $row['contact_number'];?></td>
                                                <td><?php echo $row['company_name'];?></td>
                                                <td><?php
                                                if($row['payment_type'] == 0){
                                                    echo 'Cash';
                                                } else {
                                                    echo 'Credit';
                                                }?></td><td><?php
                                                if($row['status'] == 1){
                                                    echo 'Active';
                                                } else {
                                                    echo 'Inactive';
                                                }?></td>
                                                <td class="center">
                                                      <form action="forms3.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['id']?>" name="detailid">
                                                      <button type="submit" class="btn btn-outline btn-success" name="detailbtn">Details</button>
                                                      </form>
                                                  </td>
                                                  <td class="center">
                                                      <form action="forms3.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['id']?>" name="editid">
                                                      <button type="submit" class="btn btn-outline btn-success" name="editbtn">Edit</button>
                                                      </form>
                                                  </td>
                                                  <td class="center">
                                                      <form action="delete_user.php" method="POST">
                                                      <input type="hidden" value="<?php echo $row['id']?>" name="deleteid">
                                                      <button type="submit" onclick="return confirm_delete()" class="btn btn-outline btn-danger" name="deletebtn_customer">Delete</button>
                                                    </form>
                                                </td>
                                       </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive
                                <div class="well">
                                    <h4>DataTables Usage Information</h4>
                                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                </div>-->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
            function confirm_delete(){
                var result = confirm("Want to delete?");
            if (result) {
                return true;
            } else {
                return false;
            }
            }
        </script>
        

    </body>
</html>
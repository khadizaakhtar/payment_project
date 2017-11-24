<?php include('admin_header.php'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <form  action="<?php echo BASE_URL; ?>admin_controller/csv_export" method="post">
                <div class="widget-body">
                    <button class="pull-right" name="export"><i class="fa fa-file-excel-o"></i>Export</button>
                </div>
            </form>
            <div class="widget-body">
                <table class="dataTables_wrapper form-inline table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                             <th>Organisation name</th>
                            <th>First name</th>
                            <th>Surname</th>
                            <th>Position</th>
                            <th>Tel</th>
                            <th>Email</th> 
                            <th>Membership level</th>
                            <th>Status</th>
                            <th>Renewal date</th>
                            <!--<th>Status</th>--> 
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($result);
//                        exit;
                        foreach ($result as $member) {
                            // $t=$require[2];
                            // $town=  unserialize($t);
                            // echo '<pre>';
                            //print_r($member);
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $member['organisation_name']; ?></a></td>
                                <td><a href="#"><?php echo $member['firstname']; ?></a></td>
                                <td><a href="#"><?php echo $member['surname']; ?></a></td>
                                <td><a href="#"><?php echo $member['position']; ?></a></td>
                                <td><a href="#"><?php echo $member['telephone']; ?></a></td>
                                <td><a href="#"><?php echo $member['email']; ?></a></td>
                                <td><a href="#"><?php echo $member['membership_level']; ?></a></td>
                                
                                <td><span class="label label-warning label-mini"> <?php
                                        if ($member['status'] == 1) {

                                            echo 'Active';
                                        } else {
                                            echo 'Inactive';
                                        }
                                        ?></span>
                                </td>
                                <td><a href="#"><?php echo $member['renewaldate']; ?></a></td>



                             
                                <td> 
                                    <a title="view details" href="<?php echo BASE_URL; ?>admin_controller/view_details_member/<?php echo $member['userid']; ?>"><button class="btn btn-success"><i class="icon-eye-open"></i></button></a>
                                    <a title="edit member" href="<?php echo BASE_URL; ?>admin_controller/admin_edit_member/<?php echo $member['userid']; ?>"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this" class="delete"  href="<?php echo BASE_URL; ?>admin_controller/admin_delete_member/<?php echo $member['userid']; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

<!--         <form action="<?php // echo BASE_URL;      ?>admin_controller/csv_export" method="post">
                <div class="widget-body">
                    <h3>Export CSV file </h3>  
                    <h4>Click here</h4>
                    <button name="export">Export</button>
                </div>
            </form>-->
        </div>
    </div>           
</div>
<script>
    $('body').delegate('.delete', 'click', function () {

        var $thisLayoutBtn = jQuery(this);
        var $href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "This user will be deleted",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function (isConfirm) {
//				  if (isConfirm) {
//					   window.location.href = $href;
//                                          
//				  } else {
//					  
//				  }

                if (isConfirm) {

                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location.href = $href;
                } else {
                    // swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }

        return false;
    });
</script>


<?php include('admin_footer.php'); ?>
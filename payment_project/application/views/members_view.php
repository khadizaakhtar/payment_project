<!DOCTYPE html>
<html lang="en">
    <?php include('project_header.php'); ?>
    <style>
        .col-md-6 img {
            height: 50px;
            width: 50px;
        }
        td, th {
            padding: 8px;
        }
        .main-content {
            background-color: #fff;
            border: 1px solid #dde1e6;
            min-height: 500px;
            margin-top: 30px;
            padding: 20px 30px 30px 25px;
        }
    </style>
    <body>
        <div id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="menu-list">
                            <li class="home"><a href="#">Home</a></li>
                            <li class="active">Search Properties</li>
                        </ol>
                    </div>
                </div>              
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-content">
                            <h3 class="content-title">REQUIREMENTS</h3>
                            <form method="post" >
                                <ul class="user-list">
                                    <li>
                                        <div data-example-id="contextual-table" class="bs-example">
					   <div class="table-body">
					   <table class="table" >
                                                <thead>
                                                     <?php
                                                    foreach ($result as $v_info) {
                                                        $date=$v_info['createddate'];
                                                        $formatted_date = date('m/d/Y', strtotime($date));
                                                        $rndate=$v_info['renewaldate'];
                                                        $renewaldate= date('m/d/Y', strtotime($rndate));
                                                        ?>
                                                      <tr class="danger">
                                                        <td>Date</td>
                                                         <td><?php echo $formatted_date;?></td>
                                                      </tr>  
                                                      <tr>
                                                        <td>Organization name</td>
                                                         <td><?php echo $v_info['organisation_name'];?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>First name</td>
                                                         <td><?php echo $v_info['firstname'];?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Surname</td>
                                                         <td><?php echo $v_info['surname'];?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Position</td>
                                                          <td><?php echo $v_info['position'];?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Tel</td>
                                                        <td><?php echo $v_info['telephone'];?></td>
                                                       </tr>
                                                       <tr>
                                                        <td>Email</td>
                                                          <td><?php echo $v_info['email'];?></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Membership level</td>
                                                         <td><?php if($v_info['membership_level']=='premium_amount'){ 
                                                        echo 'Premium';}
                                                               else{echo 'Associate';}
                                                         ?></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Status</td>
                                                          <td>
                                                              <?php 
                                                              if($v_info['status']==0){
                                                                  echo 'Inactive';   
                                                              }
                                                              else{
                                                                  echo 'Active';
                                                              }                                                            
                                                              ?>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                        <td>Renewal date</td>
                                                         <td><?php echo $renewaldate;?></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Action</td>  
                                                         <td><a href="<?php echo BASE_URL; ?>user_controller/edit_members/<?php echo $v_info['userid']; ?>">Edit</a>
                                                             | <a data-toggle="modal" data-target="#myModal" href="<?php echo BASE_URL; ?>user_controller/details_members/<?php echo $v_info['userid']; ?>">View Details</a>
                                                             | <a href="<?php echo BASE_URL; ?>user_controller/renew_members/<?php echo $v_info['userid']; ?>">Renew</a>
                                                         </td>
                                                       </tr>
                                                         <?php } ?>
                                                </thead>
                                            </table>  
					 </div>
                                        <div data-example-id="contextual-table" class="bs-example">
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                     Modal content
                                                    <div class="modal-content">
                                                        <table class="table">
                                                            <tr class="danger">
                                                                
                                                            </tr>
                                                        </table>

<!--                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>-->
                                                    </div>     
                                                </div>
                                                </div>
                                            </div>
                                         </li><!-- user list --> 
                                           </ul>

                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <nav>
                                                            <?php if (isset($total_pg) && $total_pg > 1) { ?>
                                                                <ul class="pagination">
                                                                    <li>
                                                                        <a href="#" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                    <?php for ($i = 1; $i <= $total_pg; $i++) { ?>
                                                                        <li><a href="<?php echo BASE_URL . 'admin_controller/search_requirements/?search=' . $_GET['search'] . '&page=' . $i; ?>"><?php echo $i; ?></a></li>
                                                                    <?php } ?>
                                                                    <li>
                                                                        <a href="#" aria-label="Next">
                                                                            <span aria-hidden="true">&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            <?php } ?>
                                                        </nav>
                                                    </div>

                                                </div>
                                                </form>


                                                <br style="clear:both"/>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                       <?php include('project_footer.php'); ?>
                                        </body>
                                        </html>

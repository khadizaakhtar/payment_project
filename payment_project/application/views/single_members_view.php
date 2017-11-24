<div class="main-content">
    <h3 class="content-title">MEMBERS</h3>
    <form method="post" >
        <ul class="user-list">
            <li>
                <div data-example-id="contextual-table" class="bs-example">
                    <div class="table-body">
                        <table id="example" class="table" >
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
                                        <td><?php echo $formatted_date; ?></td>
                                    </tr>  
                                    <tr>
                                        <td>Organization name</td>
                                        <td><?php echo $v_info['organisation_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>First name</td>
                                        <td><?php echo $v_info['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $v_info['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td><?php echo $v_info['position']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tel</td>
                                        <td><?php echo $v_info['telephone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $v_info['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Membership level</td>
                                        <td><?php if($v_info['membership_level']=='premium_amount'){ 
                                                        echo 'Premium';}
                                                  else{ echo 'Accoiate';  } ?>
                                           </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td> <?php 
                                       if($v_info['status']==0){
                                          echo 'Inactive';   
                                              }
                                         else{
                                         echo 'Active';
                                           }                                                            
                                          ?></td>
                                    </tr>
                                    <tr>
                                        <td>Renewal date</td>
                                        <td><?php echo $renewaldate; ?></td>
                                    </tr>
                                     <tr><td><h3>Secondary Contact:</h3></td><td></td></tr> 
                                    <tr>
                                        <td>First name:</td>
                                        <td><?php echo $v_info['sec_firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname:</td>
                                        <td><?php echo $v_info['sec_surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Position:</td>
                                        <td><?php echo $v_info['sec_position']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tel:</td>
                                        <td><?php echo $v_info['sec_telephone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $v_info['sec_email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Turnover Year:</td>
                                        <td><?php echo $v_info['turnover_year']; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Turnover Amount:</td>
                                        <td><?php echo $v_info['turnover_amount']; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Projected budget:</td>
                                        <td><?php echo $v_info['projected_budget']; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Postcode:</td>
                                        <td><?php echo $v_info['postcode']; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Young People:</td>
                                        <td><?php echo $v_info['youngpeople']; ?></td>
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

<script>
    $('#example').dataTable({
        "paging": true,
        "lengthMenu": [[100, 1000, 10000], [100, 1000, 10000]]
    });

</script>

</body>
</html>


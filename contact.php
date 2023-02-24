<?php 
session_start();
include_once "layouts/header.php";


?>


      <div class="contact2 text-dark" style="background-image:url(img/map.jpg);height: 400px;" id="contact">
        <div class="container">
          <div class="row contact-container">
            <div class="col-lg-12">
              <div class="card card-shadow border-0 mb-4">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="contact-box p-4">
                      <div class="row">
                        <div class="col-lg-8">
                          <h4 class="title">Contact Us</h4>
                        </div>
                        <!-- <?php if($loggedin){ ?>
                          <div class="col-lg-4">
                            <div class="icon-badge-container mx-1" style="padding-left: 167px;">
                              <a href="#" data-toggle="modal" data-target="#adminReply"><i class="far fa-envelope icon-badge-icon"></i></a>
                              <div class="icon-badge"><b><span id="totalMessage">0</span></b></div>
                            </div>
                          </div>
                        <?php } ?> -->
                      </div>
                      <!-- <?php
                          $passSql = "SELECT * FROM users WHERE id='$userId'"; 
                          $passResult = mysqli_query($conn, $passSql);
                          $passRow=mysqli_fetch_assoc($passResult);
                          $email = $passRow['email'];
                          $phone = $passRow['phone'];
                          
                      ?> -->
                      <form action="partials/_manageContactUs.php" method="POST">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <b><label for="email">Email:</label></b>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon">+91</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="basic-addon" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" value="<?php echo $phone ?>">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <b><label for="orderId">Order Id:</label></b>
                              <input class="form-control" type="text" id="orderId" name="orderId" placeholder="Order Id" value="0">
                              <small id="orderIdHelp" class="form-text text-muted">If your problem is not related to the order(order id = 0).</small>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <b><label for="password">Password:</label></b>
                              <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" placeholder="Enter Your Password" required data-toggle="password">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group  mt-3">
                                <textarea class="form-control" id="message" name="message" rows="2" required minlength="6" placeholder="How May We Help You ?"></textarea>
                            </div>
                          </div>
                          <!-- <?php if($loggedin){ ?>
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3"><span> SUBMIT NOW <i class="ti-arrow-right"></i></span></button>
                              <button type="button" class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history"><span> HISTORY <i class="ti-arrow-right"></i></span></button>
                            </div>
                          <?php }else { ?>
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-danger-gradiant mt-3 text-white border-0 py-2 px-3" disabled><span> SUBMIT NOW <i class="ti-arrow-right"></i></span></button>
                              <small class="form-text text-muted">First login to Contct with Us.</small>
                            </div>
                          <?php } ?> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Message Modal -->
      <div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="adminReply">Admin Reply</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="messagebd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Reply Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <!-- <?php 
                    $sql = "SELECT * FROM `contactreply` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }
                    echo '<script>document.getElementById("totalMessage").innerHTML = "' .$count. '";</script>';
                    if($count==0) {
                      ?><script> document.getElementById("messagebd").innerHTML = '<div class="my-1">you have not recieve any message.</div>';</script> <?php
                    }
                ?> -->
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>

      <!-- history Modal -->
      <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="history">Your Sent Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="bd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Order Id</th>
                        <th>Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <!-- <?php 
                    $sql = "SELECT * FROM `contact` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $orderId = $row['orderId'];
                        $message = $row['message'];
                        $datetime = $row['time'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$orderId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }                
                    if($count==0) {
                      ?><script> document.getElementById("bd").innerHTML = '<div class="my-1">you have not contacted us.</div>';</script> <?php
                    }    
                ?> -->
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>

    <?php
    include_once 'layouts/footer.php';


    ?>



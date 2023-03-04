<?php
include_once 'layouts/header.php';
include_once 'controller/contact_controller.php';



?>


<div class="container-fluid" id='empty'>	
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead">
                        <tr>
                            <th>နံပါတ်</th>
                            <th>စားသုံးသူနံပါတ်</th>
                            <th>အီးမေးလ်</th>
                            <th>ဖုန်းနံပါတ်</th>
                            <th>မတ်ဆေ့</th>
                            <th>ရက်စွဲ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contactsController = new ContactController();
                        $contacts = $contactsController->getContacts();
                            $count = 0;
                            foreach ($contacts as $row){
                                $contactId = $row['id'];
                                $userId = $row['user_id'];
                                $email = $row['email'];
                                $phoneNo = $row['phone_number'];
                                $message = $row['message'];
                                $time = $row['time'];
                                $count++;

                                echo '<tr>
                                        <td>' .$contactId. '</td>
                                        <td>' .$userId. '</td>
                                        <td>' .$email. '</td>
                                        <td>' .$phoneNo. '</td>
                                        <td>' .$message. '</td>
                                        <td>' .$time. '</td>
                                    </tr>';
                            }
  
                        ?>
                        
                    </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>




    <?php
        require 'layouts/footer.php';

    ?>
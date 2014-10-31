<p>You have received a new query from <b><?php echo $fName; ?></b> (<?php echo $email; ?> - <?php echo $contact; ?>) on Nestle Professionals website. <br/>Please login into the admin panel to access complete details.</p><br />
<table border="1" cellspacing="5px" cellpadding="5" class="dataTable" id="myTable">
   <tr>
      <th  style="text-align:center;"><b>First Name</b></th>
      <th  style="text-align:center;"><b>Last Name</b></th>
      <th  style="text-align:center;"><b>E-mail<b></th>
      <th  style="text-align:center;"><b>Company<b></th>
      <th  style="text-align:center;"><b>City<b></th>
      <th  style="text-align:center;"><b>Contact<b></th>
      <th  style="text-align:center;"><b>Address<b></th>
      <th  style="text-align:center;"><b>Comments<b></th>
      <th  style="text-align:center;"><b>Business / Vending Machine<b></th>
      <?php if(!empty($brand)){ ?><th  style="text-align:center;"><b>Brand<b></th> <?php } ?>
   </tr>
   <tbody style="text-align:center;">
      <tr>
         <td><?php echo $fName; ?></td>
         <td><?php echo $lName; ?></td>
         <td><?php echo $email; ?></td>
         <td><?php echo $company; ?></td>
         <td><?php echo $city; ?></td>
         <td><?php echo $contact; ?></td>
         <td><?php echo $address; ?></td>
         <td><?php echo $comments; ?></td>
         <td><?php echo $business; ?></td>
         <?php if(!empty($brand)){ ?><td><?php echo $brand; ?></td> <?php } ?>
      </tr>
   </tbody>
</table>

<p><b>You have recieved a new order in Nestle Pure Life. </b></p>
<table border="0" cellspacing="1px" cellpadding="0" class="dataTable" id="myTable">
  <th style="text-align:center;"> 
    <tr>
      <td width="25%" style="text-align:center;"><b>Name</b></td>
      <td width="25%" style="text-align:center;"><b>E-mail<b></td>
      <td width="30%" style="text-align:center;"><b>Phone No<b></td>
      <td width="25%" style="text-align:center;"><b>Date<b></td>
    </tr>
  </th>
  <tbody style="text-align:center;">
  <tr>
  <?php 
 	if ($created_date > 0) 
	{ 
	 $created_date = date('F j, Y, g:i a',strtotime($created_date)); 
	} else { 
	 $created_date = 'N/A';
	}
  ?>
  	<td><?php echo $name; ?></td>
	<td><?php echo $email_address; ?></td>
	<td><?php echo $phone_no; ?></td>
	<td><?php echo $created_date;?></td>
  </tr>
 </tbody>
</table>
<table cellpadding="0" cellspacing="0" border="1" width="100%" id="example">
   <tr class="tbl_top_heading">
      <th><b>Query #</b></th>
      <th><b>Date</b></th>
      <th><b>Product Name</b></th>
      <th><b>Category Name</b></th>
      <th><b>Brand Name</b></th>
      <th><b>Customer Name</b></th>
      <th><b>Email</b></th>
      <th><b>Contact #</b></th>
      <th><b>City</b></th>
      <th><b>Address</b></th>
      <th><b>Comments</b></th>
   </tr>
   <?php 
      if($this->session->userdata('export') == 'SingleQuery'){
      	 if ($row->created_at > 0) 
      	{ 
      	  $created_date = date('F j, Y, g:i a',strtotime($row->created_at)); 
      	} else { 
      	 $created_date = 'N/A';
          }
      	 
      	 ?>
   <tr>
      <td>  <?php if($row->id){ echo $row->id; } ?> </td>
      <td>  <?php if($created_date){ echo $created_date; } ?> </td>
      <td> <?php if($row->productTitle){ echo $row->productTitle; } ?> </td>
      <td> <?php if($row->category_name){ echo $row->category_name; } ?> </td>
      <td> <?php if($row->brandName && !$row->brand_name){ echo $row->brandName; }else{ echo $row->brand_name; } ?> </td>
      <td>  <?php if($row->first_name){ echo $row->first_name.' '.$row->last_name; } ?> </td>
      <td> <?php if($row->email){ echo $row->email; } ?> </td>
      <td> <?php if($row->phone){ echo $row->phone; } ?> </td>
      <td> <?php if($row->city){ echo $row->city; } ?> </td>
      <td> <?php if($row->address){ echo $row->address; } ?> </td>
      <td> <?php if($row->note){ echo $row->note; } ?> </td>
   </tr>
   <?php }else{
      foreach ($results->result() as $row ) 
      {
      	if ($row->created_at > 0) 
      	{ 
      	  $created_date = date('F j, Y, g:i a',strtotime($row->created_at)); 
      	} else { 
      	  $created_date = 'N/A';
      	} ?>
   <tr>
      <td>  <?php if($row->id){ echo $row->id; } ?> </td>
      <td>  <?php if($created_date){ echo $created_date; } ?> </td>
      <td> <?php if($row->productTitle){ echo $row->productTitle; } ?> </td>
      <td> <?php if($row->brandName){ echo $row->brandName; } ?> </td>
      <td>  <?php if($row->first_name){ echo $row->first_name.' '.$row->last_name; } ?> </td>
      <td> <?php if($row->email){ echo $row->email; } ?> </td>
      <td> <?php if($row->phone){ echo $row->phone; } ?> </td>
      <td> <?php if($row->city){ echo $row->city; } ?> </td>
      <td> <?php if($row->address){ echo $row->address; } ?> </td>
      <td> <?php if($row->note){ echo $row->note; } ?> </td>
   </tr>
   <?php } 
      } ?>
</table>
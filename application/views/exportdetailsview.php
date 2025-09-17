<body>
<form action="<?php echo base_url();?>Welcome/exportdetailsviews" method="post">
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Source</th>
                    <th>Destination </th>
                    <th>Date</th>
                    <th>Recepient Name</th>
                    <th>Recepient Address </th>
                    <th>Recepient Contact</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>District </th>
                    <th>City </th>
                    <th>contact </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->productcategory;?></td>
                    <td><?php echo $row->productname;?></td>
                    <td><?php echo $row->productquantity;?></td>
                    <td><?php echo $row->source;?></td>
                    <td><?php echo $row->destination;?></td>
                    <td><?php echo $row->date;?></td>
                    <td><?php echo $row->recepientname;?></td>
                    <td><?php echo $row->recepientaddress;?></td>
                    <td><?php echo $row->recepientcontact;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->address;?></td>
                    <td><?php echo $row->pincode;?></td>
                    <td><?php echo $row->district;?></td>
                    <td><?php echo $row->city;?></td>
                    <td><?php echo $row->contact;?></td>
                    
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>

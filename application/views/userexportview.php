<body>
<form action="<?php echo base_url();?>Welcome/exportdetailsviews" method="post">
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Ship Name</th>
                    <th>Source</th>
                    <th>Destination </th>
                    <th>Date</th>
                    <th>Recepient Name</th>
                    <th>Recepient Address </th>
                    <th>Recepient Contact</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->productcategory;?></td>
                    <td><?php echo $row->productname;?></td>
                    <td><?php echo $row->productquantity;?></td>
                    <td><?php echo $row->shipname;?></td>
                    <td><?php echo $row->source;?></td>
                    <td><?php echo $row->destination;?></td>
                    <td><?php echo $row->date;?></td>
                    <td><?php echo $row->recepientname;?></td>
                    <td><?php echo $row->recepientaddress;?></td>
                    <td><?php echo $row->recepientcontact;?></td>
                    <?php if($row->paystatus == 1) { ?> 
                      <td> Paid
                       <?php } else { ?>
                      <!-- <a href="<?php echo base_url();?>Welcome//<?php echo $row->id;?>"class='btn btn-success'>pay</a><td> -->
                        not paid
                       <?php } ?>

                       <?php if($row->cancel_status==1){?>
                        <td>Cancelled
                          <?php } else { ?>
                      <td><a href="<?php echo base_url();?>Welcome/cancelstatus/<?php echo $row->id;?>"class='btn btn-danger'>cancel</a></td>  
                     <?php } ?>
                     <td><a href="<?php echo base_url();?>Welcome/complaints/<?php echo $row->id;?>/<?php echo $row->exportid;?>"class='btn btn-warning'>Complaints</a></td>
                     <?php if($row->cancel_status==1){?>
                        <td>Refunded
                          <?php } else { ?>
                      <td></td>  
                     <?php } ?>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>
                          




<body>
<form action="<?php echo base_url();?>Welcome/shiporders" method="post">
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Source</th>
                    <th>Destination </th>
                    <th>Date</th>
                    <th>Recepient Name</th>
                    <th>Recepient Address </th>
                    <th>Recepient Contact</th>
                    <!-- <th>Status</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->productname;?></td>
                    <td><?php echo $row->productquantity;?></td>
                    <td><?php echo $row->source;?></td>
                    <td><?php echo $row->destination;?></td>
                    <td><?php echo $row->date;?></td>
                    <td><?php echo $row->recepientname;?></td>
                    <td><?php echo $row->recepientaddress;?></td>
                    <td><?php echo $row->recepientcontact;?></td>


                       <?php if($row->cancel_status==1){?>
                        <td>Cancelled
                          <?php } else { ?>
                      <td></td>  
                     <?php } ?>
                  </tr>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>
                          




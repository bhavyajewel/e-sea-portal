<body>
  
<table class="table table-stripped" >
                  <thead>
                  <tr>
                    <th>Ship Category</th>
                    <th>Ship Name</th>
                    <th>Source</th>
                    <th>Destination </th>
                    <th>Ship Details</th>
                    <th>Ship Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->shipcategory;?></td>
                    <td><?php echo $row->shipname;?></td>
                    <td><?php echo $row->source;?></td>
                    <td><?php echo $row->destination;?></td>
                    <td><?php echo $row->shipdetails;?></td>
                    <td><a href="<?php echo base_url();?>Welcome/shiporders/<?php echo $row->id;?>"class='btn btn-success'>Export Order</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/ship_edit_view/<?php echo $row->id;?>"class='btn btn-success'>Edit</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/ship_delete/<?php echo $row->id;?>"class='btn btn-danger'>Delete</a></td>
                    <td><a href="<?php echo base_url();?>Welcome/complaintsview/<?php echo $row->id;?>"class='btn btn-warning'>Complaints</a></td>
                    <!-- <td><a href="<?php echo base_url();?>Welcome/refunds/<?php echo $row->i;?>"class='btn btn-warning'>Refund</a></td> -->

                  </tr>
                  <?php } ?>
                  </tbody>
                </table>

                </body>

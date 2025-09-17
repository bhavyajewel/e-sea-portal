<body>
  
<table class="table table-stripped" >
                  <thead>
                  <tr>
                  <th>Tender Category</th>
                    <th>Tender Name</th>
                    <th>Tender Details</th>
                    <th>Amount</th>
                    <th>Last date for apply</th>
                    <th>date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                  <td><?php echo $row->tendercategory;?></td>
                    <td><?php echo $row->tendername;?></td>
                    <td><?php echo $row->tenderdetails;?></td>
                    <td><?php echo $row->amount;?></td>
                    <td><?php echo $row->lastdate;?></td>
                    <td><?php echo $row->date;?></td>
                    <td><a href="<?php echo base_url();?>Welcome/tenderapplynow/<?php echo $row->id;?>"class='btn btn-success'>Apply now</a></td>
                    <!-- <td><a href="<?php echo base_url();?>Welcome/tenderapproval/<?php echo $row->id;?>"class='btn btn-success'>approve</a><td> -->
                    <!-- <td><a href="<?php echo base_url();?>Welcome/tender_delete/<?php echo $row->id;?>"class='btn btn-danger'>Cancel</a></td> -->
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>

                </body>

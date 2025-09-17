<body>
    <!-- <form action="">
    <tr><td>Export</td><td><input type="text" name="search" ></td></tr>
    <tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
    </form> -->
  
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Complaint</th>
                    <th>Upload image</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->subject;?></td>
                    <td><?php echo $row->complaints;?></td>
                    <td><?php echo $row->image;?></td>
                    <?php if($row->refund_status==1){?>
                        <td>refunded
                          <?php } else { ?>
                            <td><a href="<?php echo base_url();?>Welcome/refunds/<?php echo $row->id;?>/<?php echo $row->exportid;?>"class='btn btn-warning'>Refund</a></td>
 
                     <?php } ?>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>

                </body>

<body>
  
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>news</th>
                    <th>current date</th>
                    <!-- <th>state</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->news;?></td>
                    <td><?php echo $row->currentdate;?></td>
                    <!-- <td><a href="<?php echo base_url();?>Welcome/newsupdation_dataview/<?php echo $row->id;?>"class='btn btn-success'>Update</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/newsreject/<?php echo $row->id;?>"class='btn btn-danger'>Delete</a></td>   -->
                  </tr>
                  <?php } ?>
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>news</th>
                    <th>current date</th>
                  
                   
                  </tr>
                  </tfoot> -->
                </table>

                </body>

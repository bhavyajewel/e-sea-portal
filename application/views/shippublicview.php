<body>
    <form action="">
    <tr><td>Export</td><td><input type="text" name="search" ></td></tr>
    <tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
    </form>
  
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Ship Category</th>
                    <th>Ship Name</th>
                    <th>Source</th>
                    <th>Destination </th>
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
                    <!-- <td><a href="<?php echo base_url();?>Welcome/ship_edit_view/<?php echo $row->id;?>"class='btn btn-success'>Edit</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/ship_delete/<?php echo $row->id;?>"class='btn btn-danger'>Delete</a></td> -->
                    <td><a href="<?php echo base_url();?>Welcome/shipupdation_dataview/<?php echo $row->id;?>"class='btn btn-danger'>Export</a></td>

                  </tr>
                  <?php } ?>
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Ship Category</th>
                    <th>Ship Name</th>
                    <th>Source</th>
                    <th>Destination </th>
                    <th>Ship Details</th>
                  </tr>
                  </tfoot> -->
                </table>

                </body>

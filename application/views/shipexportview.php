<body>
<form action="<?php echo base_url();?>Welcome/shipexportview" method="post">
    <tr><td>Export</td><td><input type="text" name="search" ></td></tr>
    <tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
    </form>
    <?php if ($search_message == '' ) { ?>
        <div class="center-container">
            <p><?php echo $search_message; ?></p>
    </div>
        <?php }
        else { ?>
  
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
                    <td><a href="<?php echo base_url();?>Welcome/exports/<?php echo $row->id;?>"class='btn btn-primary'>Export</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/shipexportedit_view/<?php echo $row->id;?>"class='btn btn-success'>Edit</a></td>
                    <td><a href="<?php echo base_url();?>Welcome/export_delete/<?php echo $row->id;?>"class='btn btn-danger'>Cancel</a></td>
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
            <?php } ?>
                </body>

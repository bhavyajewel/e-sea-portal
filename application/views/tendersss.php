<body>
<form action="<?php echo base_url();?>Welcome/tenderviewapply" method="post">
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Contact </th>
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->contact;?></td>
                    <td><?php echo $row->amount;?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>

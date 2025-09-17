<body>
<form action="<?php echo base_url();?>Welcome/candidateapplyview" method="post">
<table class="table table-stripped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Contact</th> 
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->contact;?></td>

                    <td><a href="<?php echo base_url();?>Welcome/interviewform/<?php echo $row->apid;?>"class='btn btn-warning'>Interview</a><td>

                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>

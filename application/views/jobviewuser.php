<body>
  
<table class="table table-stripped" >
                  <thead>
                  <tr>
                    <th>Job Category</th>
                    <th>Job Name</th>
                    <th>Job details</th>
                    <th>Qualifications </th>
                    <th>last date for apply</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($dis as $row)
                    { ?>
  
                  <tr>
                    <td><?php echo $row->jobcategory;?></td>
                    <td><?php echo $row->jobname;?></td>
                    <td><?php echo $row->jobdetails;?></td>
                    <td><?php echo $row->qualification;?></td>
                    <td><?php echo $row->lastdateforapply;?></td>
                    
                    <td><a href="<?php echo base_url();?>Welcome/jobapplynow/<?php echo $row->jobid;?>"class='btn btn-success'>Apply</a><td>
                    <!-- <td><a href="<?php echo base_url();?>Welcome//<?php echo $row->jobid;?>"class='btn btn-warning'>Interview Schedule</a><td> -->

            

                  </tr>
                  <?php } ?>
                  </tbody>
                </table>

                </body>
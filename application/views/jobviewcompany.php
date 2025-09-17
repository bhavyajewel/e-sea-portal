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
                    
                    <td><a href="<?php echo base_url();?>Welcome/candidateapplyview/<?php echo $row->jobid;?>"class='btn btn-warning'>View Applied Candidates</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/jobupdation_comview/<?php echo $row->jobid;?>"class='btn btn-primary'>EDIT</a><td>
                    <td><a href="<?php echo base_url();?>Welcome/jobdeletecompany/<?php echo $row->jobid;?>"class='btn btn-danger'>DELETE</a><td>
                    <!-- <td><a href="<?php echo base_url();?>Welcome/interviewform/<?php echo $row->id;?>"class='btn btn-warning'>Interview</a><td> -->

            

                  </tr>
                  <?php } ?>
                  </tbody>
                </table>

                </body>
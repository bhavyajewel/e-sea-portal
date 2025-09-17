<body>
  
<table class="table table-stripped" >
                  <thead>
                  <tr>
                  <th>Tender Category</th>
                  <th>Tender Name</th>
                  <th>Tender Details</th>
                  <th>Amount</th>
                  <th>Status</th>
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
                    <?php if($row->approve_status==0){?>
                        <td>Pending
                          <?php } elseif($row->approve_status==1){ ?>
                            <td>Approved
                            <?php } elseif($row->approve_status==2){ ?>
                            <td>Reject

                      <td></td>  
                     <?php } ?>
                    
                   
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </body>

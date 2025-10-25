<body>
  
 <table class="table table-striped">
   <thead class="thead-dark">
     <tr>
       <th>Job Category</th>
       <th>Job Name</th>
       <th>Job Description</th>
       <th>Qualifications</th>
       <th>Last Date to Apply</th>
       <th>Apply</th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($dis as $row) { ?>
       <tr>
         <td><?php echo $row->jobcategory; ?></td>
         <td><?php echo $row->jobname; ?></td>
         <td><?php echo $row->jobdetails; ?></td>
         <td><?php echo $row->qualification; ?></td>
         <td><?php echo $row->lastdateforapply; ?></td>
         <td>
           <button 
             type="button" 
             class="btn btn-success btn-sm"
             data-toggle="modal" 
             data-target="#applyModal_<?php echo $row->jobid; ?>"
             data-bs-toggle="modal"
             data-bs-target="#applyModal_<?php echo $row->jobid; ?>"
           >
             Apply
           </button>
         </td>
       </tr>

       <tr>
         <td colspan="6">
           <div class="modal fade" id="applyModal_<?php echo $row->jobid; ?>" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel_<?php echo $row->jobid; ?>" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="applyModalLabel_<?php echo $row->jobid; ?>">Apply for: <?php echo $row->jobname; ?></h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div class="mb-3">
                     <h6 class="mb-1">Job Description</h6>
                     <p class="mb-0"><?php echo $row->jobdetails; ?></p>
                   </div>
                   <div class="mb-3">
                     <h6 class="mb-1">Qualifications</h6>
                     <p class="mb-0"><?php echo $row->qualification; ?></p>
                   </div>

                   <form class="apply-form" action="<?php echo base_url(); ?>Welcome/jobapplynow/<?php echo $row->jobid; ?>" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                       <label for="cover_<?php echo $row->jobid; ?>">Short Description</label>
                       <textarea id="cover_<?php echo $row->jobid; ?>" name="description" class="form-control" rows="3" placeholder="Write a brief description or cover letter (optional)"></textarea>
                     </div>
                     <div class="form-group">
                       <label for="cv_<?php echo $row->jobid; ?>">Upload CV (PDF only)</label>
                       <input type="file" id="cv_<?php echo $row->jobid; ?>" name="cv" class="form-control-file" accept="application/pdf" required />
                       <small class="form-text text-muted">Max size as per site policy. Only .pdf files are allowed.</small>
                     </div>
                     <div class="text-right">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-primary">Submit Application</button>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
         </td>
       </tr>
     <?php } ?>
   </tbody>
 </table>

 <script>
   (function() {
     function isPdf(file) {
       if (!file) return false;
       const nameOk = (file.name || '').toLowerCase().endsWith('.pdf');
       const typeOk = (file.type || '') === 'application/pdf';
       return nameOk || typeOk;
     }

     var forms = document.querySelectorAll('form.apply-form');
     Array.prototype.forEach.call(forms, function(form) {
       form.addEventListener('submit', function(e) {
         var fileInput = form.querySelector('input[type="file"][name="cv"]');
         var file = fileInput && fileInput.files && fileInput.files[0];
         if (!isPdf(file)) {
           e.preventDefault();
           alert('Please upload your CV as a PDF file only.');
           return false;
         }
       });
     });
   })();
 </script>

 </body>
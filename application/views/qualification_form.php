<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Qualification</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>user/css/bootstrap.css">
  <style>
    .card { max-width: 800px; margin: 30px auto; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    .card-header { padding: 16px 20px; border-bottom: 1px solid #e5e7eb; font-weight: 600; font-size: 18px; }
    .card-body { padding: 20px; }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">Add Qualification Details</div>
    <div class="card-body">
      <form method="post" action="<?php echo base_url(); ?>Welcome/qualification_save">
        <div class="form-group">
          <label for="qualification">Qualification</label>
          <input type="text" class="form-control" id="qualification" name="qualification" placeholder="e.g., B.Tech, MCA" required>
        </div>
        <div class="form-group">
          <label for="skills">Skills (comma-separated)</label>
          <textarea class="form-control" id="skills" name="skills" rows="2" placeholder="e.g., Python, Machine Learning, Data Analysis"></textarea>
        </div>
        <div class="form-group">
          <label for="experience">Experience (years)</label>
          <input type="number" min="0" class="form-control" id="experience" name="experience" placeholder="e.g., 2" required>
        </div>
        <div class="form-group">
          <label for="domain">Preferred Domain</label>
          <input type="text" class="form-control" id="domain" name="domain" placeholder="e.g., Data Science" required>
        </div>
        <div class="mt-3">
          <a href="<?php echo base_url(); ?>Welcome/user" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

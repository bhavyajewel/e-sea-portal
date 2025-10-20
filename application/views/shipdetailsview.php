<body>
<style>
  .panel { border:1px solid #edf1f5; border-radius:14px; background:#fff; box-shadow:0 10px 24px rgba(6,36,67,.08); overflow:hidden; }
  .panel-hd { padding:14px 16px; border-bottom:1px solid #edf1f5; font-weight:700; display:flex; align-items:center; justify-content:space-between; }
  .panel-bd { padding:0; }
  .table-modern { width:100%; border-collapse:collapse; }
  .table-modern th, .table-modern td { padding:12px 14px; border-bottom:1px solid #edf1f5; vertical-align:top; }
  .table-modern thead th { font-size:.9rem; color:#475569; background:#f8fafc; }
  .actions a { margin-right:8px; }
  body.dark .panel { background:#0f172a; border-color:#0b1220; }
  body.dark .panel-hd { border-color:#0b1220; color:#e5e7eb; }
  body.dark .table-modern thead th { background:#0b1220; color:#cbd5e1; }
  body.dark .table-modern td, body.dark .table-modern th { border-color:#0b1220; color:#e5e7eb; }
</style>

<div class="panel">
  <div class="panel-hd">Ships</div>
  <div class="panel-bd">
    <table class="table-modern">
      <thead>
        <tr>
          <th>Category</th>
          <th>Name</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Details</th>
          <th>Actions</th>
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
          <td class="actions">
            <a href="<?php echo base_url();?>Welcome/shiporders/<?php echo $row->id;?>" class="btn btn-sm btn-primary">Export Order</a>
            <a href="<?php echo base_url();?>Welcome/ship_edit_view/<?php echo $row->id;?>" class="btn btn-sm btn-outline-secondary">Edit</a>
            <a href="<?php echo base_url();?>Welcome/ship_delete/<?php echo $row->id;?>" class="btn btn-sm btn-danger">Delete</a>
            <a href="<?php echo base_url();?>Welcome/complaintsview/<?php echo $row->id;?>" class="btn btn-sm btn-warning">Complaints</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</body>

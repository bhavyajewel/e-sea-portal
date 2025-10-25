<body>
<style>
  .page-wrap { padding: 12px; }
  .panel { border:1px solid #edf1f5; border-radius:14px; background:#fff; box-shadow:0 10px 24px rgba(6,36,67,.08); overflow:hidden; }
  .panel-hd { padding:16px 18px; border-bottom:1px solid #edf1f5; display:flex; align-items:center; justify-content:space-between; }
  .panel-title { margin:0; font-weight:700; letter-spacing:.2px; }
  .panel-sub { margin:0; color:#64748b; font-size:.9rem; }
  .panel-bd { padding:0; }
  .table-responsive { width:100%; overflow:auto; }
  .table-modern { width:100%; border-collapse:separate; border-spacing:0; }
  .table-modern th, .table-modern td { padding:12px 14px; border-bottom:1px solid #edf1f5; vertical-align:top; }
  .table-modern thead th { font-size:.88rem; color:#475569; background:#f8fafc; position:sticky; top:0; z-index:1; }
  .badge { display:inline-block; padding:.25rem .5rem; font-size:.75rem; border-radius:999px; background:#eef2ff; color:#3730a3; }
  .actions a { margin-right:8px; }
  .truncate { max-width: 360px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  /* Dark mode support */
  body.dark .panel { background:#0f172a; border-color:#0b1220; }
  body.dark .panel-hd { border-color:#0b1220; }
  body.dark .panel-title { color:#e5e7eb; }
  body.dark .panel-sub { color:#94a3b8; }
  body.dark .table-modern thead th { background:#0b1220; color:#cbd5e1; }
  body.dark .table-modern td, body.dark .table-modern th { border-color:#0b1220; color:#e5e7eb; }
  body.dark .badge { background:#1e293b; color:#cbd5e1; }
</style>

<div class="page-wrap">
  <div class="panel">
    <div class="panel-hd">
      <div>
        <h5 class="panel-title">Ships</h5>
        <p class="panel-sub">Overview of all registered vessels</p>
      </div>
    </div>
    <div class="panel-bd">
      <div class="table-responsive">
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
            <?php foreach ($dis as $row) { ?>
            <tr>
              <td><span class="badge"><?php echo $row->shipcategory; ?></span></td>
              <td><?php echo $row->shipname; ?></td>
              <td><?php echo $row->source; ?></td>
              <td><?php echo $row->destination; ?></td>
              <td class="truncate" title="<?php echo htmlspecialchars($row->shipdetails, ENT_QUOTES); ?>"><?php echo $row->shipdetails; ?></td>
              <td class="actions">
                <a href="<?php echo base_url(); ?>Welcome/shiporders/<?php echo $row->id; ?>" class="btn btn-sm btn-primary">Export Order</a>
                <a href="<?php echo base_url(); ?>Welcome/ship_edit_view/<?php echo $row->id; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                <a href="<?php echo base_url(); ?>Welcome/ship_delete/<?php echo $row->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="<?php echo base_url(); ?>Welcome/complaintsview/<?php echo $row->id; ?>" class="btn btn-sm btn-warning">Complaints</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>

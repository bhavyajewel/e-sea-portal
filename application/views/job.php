<style>
  .card { border:1px solid #edf1f5; border-radius:16px; background:rgba(255,255,255,.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); box-shadow:0 18px 40px rgba(6,36,67,.12); overflow:hidden; }
  .card-hd { padding:16px 20px; border-bottom:1px solid #edf1f5; display:flex; align-items:center; gap:10px; font-weight:800; }
  .card-bd { padding:22px; }
  .layout { max-width: 1100px; margin: -60px auto 40px; display:grid; grid-template-columns: 260px 1fr; gap:18px; padding: 0 16px; }
  .side { position: relative; }
  .side .sticky { position: sticky; top: 90px; }
  .side .nav { border:1px solid #edf1f5; border-radius:14px; background:rgba(255,255,255,.7); backdrop-filter: blur(8px); padding:10px; box-shadow:0 10px 24px rgba(6,36,67,.08); }
  .side .nav a { display:block; padding:10px 12px; border-radius:10px; color:#0b1d36; text-decoration:none; font-weight:600; }
  .side .nav a.active, .side .nav a:hover { background:#f1f5fb; color:#0d6efd; }
  .preview { margin-top:14px; padding:14px; border:1px solid #edf1f5; border-radius:14px; background:rgba(255,255,255,.7); backdrop-filter: blur(8px); box-shadow:0 10px 24px rgba(6,36,67,.08); }
  .preview h4 { margin:0 0 8px; font-weight:800; }
  /* single full-page background */
  .page-bg { position:relative; padding: 30px 0 40px; background: linear-gradient(180deg, rgba(247,249,252,0.95), rgba(247,249,252,0.95)), url('<?php echo base_url(); ?>user/images/ship5.jpg') center/cover fixed no-repeat; }
  .grid { display:grid; grid-template-columns: 1fr 1fr; gap:16px; }
  .grid-1 { display:grid; grid-template-columns: 1fr; gap:16px; }
  label { font-weight:600; color:#0b1d36; margin-bottom:6px; display:block; }
  .muted { color:#64748b; font-size:.9rem; }
  .help { font-size:.85rem; color:#6b7280; }
  textarea.form-control { min-height: 110px; }
  .row { display:flex; gap:12px; }
  .row > div { flex:1; }
  .actions { display:flex; justify-content:flex-end; gap:10px; margin-top:16px; }
  body.dark .card { background:rgba(15,23,42,.7); border-color:#0b1220; }
  body.dark .card-hd { border-color:#0b1220; color:#e5e7eb; }
  body.dark label { color:#e5e7eb; }
  body.dark .muted, body.dark .help { color:#9fb3c8; }
  body.dark .page-bg { background: linear-gradient(180deg, rgba(11,18,32,0.92), rgba(11,18,32,0.92)), url('<?php echo base_url(); ?>user/images/ship5.jpg') center/cover fixed no-repeat; }
  body.dark .side .nav, body.dark .preview { background:rgba(15,23,42,.7); border-color:#0b1220; }
  body.dark .side .nav a { color:#e5e7eb; }
  body.dark .side .nav a.active, body.dark .side .nav a:hover { background:#1f2a3b; color:#93c5fd; }
  @media (max-width:720px){ .grid{ grid-template-columns:1fr;} }
  @media (max-width:960px){ .layout{ grid-template-columns: 1fr; } .side .sticky{ position:static; top:auto; } }
</style>

<div class="page-bg">
  <div class="layout">
    <aside class="side">
      <div class="sticky">
        <nav class="nav">
          <a href="#overview" class="active">Overview</a>
          <a href="#requirements">Requirements</a>
          <a href="#deadline">Deadline</a>
        </nav>
        <div class="preview">
          <h4 id="p_title">Job Title</h4>
          <div class="muted" id="p_category">Category • —</div>
          <div class="muted" id="p_qual">Qualification • —</div>
          <div class="muted" id="p_deadline">Last date • —</div>
          <div class="muted">Time left • <span id="p_timeleft">—</span></div>
        </div>
      </div>
    </aside>
    <main>
      <div class="card">
      <div class="card-hd"><i class="fas fa-briefcase"></i> Create Job Posting</div>
      <div class="card-bd">
        <form action="<?php echo base_url();?>Welcome/jobdetails" method="post">
          <input type="hidden" name="hide" value="">

      <h5 id="overview" class="mb-3">Overview</h5>
      <div class="grid">
        <div>
          <label for="jobcategory">Job Category</label>
          <select id="jobcategory" name="jobcategory" class="form-control" required>
            <option value="">Select</option>
            <option>Captain</option>
            <option>Marine Engineer</option>
            <option>Deckhand</option>
            <option>Engineer</option>
            <option>Cruise Staff Department</option>
            <option>Activities Coordinator</option>
            <option>Chief Engineer</option>
            <option>Chief Mate</option>
            <option>Logistics</option>
            <option>Officer</option>
            <option>Chef</option>
            <option>Mechanics</option>
            <option>Entertainment and guest programmes</option>
            <option>Crane drivers</option>
            <option>Terminal Operators</option>
            <option>Cleaning</option>
            <option>HR Post</option>
            <option>IT engineers</option>
          </select>
        </div>
        <div>
          <label for="jobname">Job Title</label>
          <input id="jobname" type="text" name="jobname" class="form-control" placeholder="e.g., Port Operations Executive" required>
        </div>
      </div>

      <h5 id="requirements" class="mt-3 mb-2">Requirements</h5>
      <div class="grid">
        <div>
          <label for="age_min">Age Range (optional)</label>
          <div class="row">
            <div><input id="age_min" type="number" name="age_min" class="form-control" placeholder="Min"></div>
            <div><input id="age_max" type="number" name="age_max" class="form-control" placeholder="Max"></div>
          </div>
          <div class="help">If specified, this will be shown to candidates.</div>
        </div>
        <div>
          <label for="qualification">Qualification</label>
          <select id="qualification" name="qualification" class="form-control" required>
            <option value="">Select</option>
            <option>Tenth Passed</option>
            <option>+2 pass</option>
            <option>Degree</option>
            <option>Post Graduate</option>
            <option>Engineering</option>
            <option>Diploma</option>
            <option>Others</option>
          </select>
        </div>
      </div>

      <h5 class="mt-3 mb-2">Job Description</h5>
      <div class="grid-1">
        <div>
          <label for="jobdetails">Job Description</label>
          <textarea id="jobdetails" name="jobdetails" class="form-control" placeholder="Key responsibilities, shift, location, required skills…" required></textarea>
        </div>
      </div>

      <h5 id="deadline" class="mt-3 mb-2">Deadline</h5>
      <div class="grid">
        <div>
          <label for="lastdate">Last date to apply</label>
          <input id="lastdate" type="date" name="lastdateforapply" class="form-control" required>
          <div id="deadlineHint" class="help">Select a deadline to show time left.</div>
        </div>
        <div>
          <label>Time left</label>
          <div id="timeLeft" class="muted">—</div>
        </div>
      </div>

      <div class="actions">
        <a href="<?php echo base_url(); ?>Welcome/jobviewcompany" class="btn btn-outline-secondary">Cancel</a>
        <input type="submit" value="Publish Job" class="btn btn-success">
      </div>
        </form>
      </div>
      </div>
    </main>
  </div>
</div>

<script>
  (function(){
    var dateEl = document.getElementById('lastdate');
    var out = document.getElementById('timeLeft');
    var titleEl = document.getElementById('jobname');
    var catEl = document.getElementById('jobcategory');
    var qualEl = document.getElementById('qualification');
    var pTitle = document.getElementById('p_title');
    var pCat = document.getElementById('p_category');
    var pQual = document.getElementById('p_qual');
    var pDeadline = document.getElementById('p_deadline');
    var pTime = document.getElementById('p_timeleft');
    function render(){
      if(!dateEl || !dateEl.value){ out.textContent = '—'; return; }
      try{
        var end = new Date(dateEl.value + 'T23:59:59');
        var now = new Date();
        var diff = end - now;
        if(diff <= 0){ out.textContent = 'Closed'; return; }
        var d=Math.floor(diff/86400000), h=Math.floor((diff%86400000)/3600000), m=Math.floor((diff%3600000)/60000);
        out.textContent = d+'d '+h+'h '+m+'m';
        if(pTime) pTime.textContent = out.textContent;
        if(pDeadline) pDeadline.textContent = 'Last date • '+dateEl.value;
      }catch(e){ out.textContent = '—'; }
    }
    function renderMeta(){
      if(pTitle) pTitle.textContent = titleEl && titleEl.value ? titleEl.value : 'Job Title';
      if(pCat) pCat.textContent = 'Category • ' + (catEl && catEl.value ? catEl.value : '—');
      if(pQual) pQual.textContent = 'Qualification • ' + (qualEl && qualEl.value ? qualEl.value : '—');
    }
    // sidebar active link on scroll
    var links = document.querySelectorAll('.side .nav a');
    function setActive(){
      var y = window.scrollY + 120;
      ['overview','requirements','deadline'].forEach(function(id, idx){
        var el = document.getElementById(id);
        if(!el) return;
        var rect = el.getBoundingClientRect();
        var top = rect.top + window.scrollY;
        var bottom = top + rect.height + 80;
        var link = links[idx];
        if(y >= top && y < bottom){ links.forEach(a=>a.classList.remove('active')); if(link) link.classList.add('active'); }
      });
    }
    links.forEach(function(a){ a.addEventListener('click', function(e){ e.preventDefault(); var t = document.querySelector(this.getAttribute('href')); if(t){ window.scrollTo({ top: t.offsetTop - 80, behavior:'smooth' }); } }); });
    window.addEventListener('scroll', setActive);

    if(dateEl){ dateEl.addEventListener('change', render); setInterval(render, 60000); }
    if(titleEl) titleEl.addEventListener('input', renderMeta);
    if(catEl) catEl.addEventListener('change', renderMeta);
    if(qualEl) qualEl.addEventListener('change', renderMeta);
    renderMeta();
  })();
</script>
<!-- <h2>SHIP DETAILS ADDING</h2> -->
<br><br>
<div class="ship-hero-wrapper">
  <div class="ship-hero">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
      <h2 class="hero-title">Add Ship Details</h2>
      <p class="hero-subtitle">Provide accurate information about your vessel for scheduling and operations.</p>
    </div>
  </div>
</div>

<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">
          <form action="<?php echo base_url(); ?>Welcome/shipdetailsprocess" method="post">
            <div class="form-group mb-3">
              <label for="shipcategory">Ship Category</label>
              <select id="shipcategory" name="shipcategory" class="form-control">
                <option>Select</option>
                <option>Cargo Carriers</option>
                <option>Passenger Carriers</option>
                <option>Industrial Ships</option>
                <option>Service Vessels</option>
                <option>Non commercial</option>
                <option>Ferries</option>
                <option>Tankers</option>
                <option>Container ships</option>
                <option>Barge-carrying ships</option>
                <option>Dry bulk ships</option>
                <option>Roll-on ships</option>
                <option>Roll-off ships</option>
                <option>Cruise ships</option>
                <option>General ships</option>
              </select>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 mb-3">
                <label for="shipname">Ship Name</label>
                <input type="text" id="shipname" name="shipname" class="form-control" placeholder="Enter ship name">
              </div>
              <div class="form-group col-md-6 mb-3">
                <label for="source">Source</label>
                <input type="text" id="source" name="source" class="form-control" placeholder="Enter source port">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 mb-3">
                <label for="destination">Destination</label>
                <input type="text" id="destination" name="destination" class="form-control" placeholder="Enter destination port">
              </div>
              <div class="form-group col-md-6 mb-3">
                <label>&nbsp;</label>
                <div class="d-flex align-items-end h-100">
                  <span class="text-muted small">Ensure port names match official listings.</span>
                </div>
              </div>
            </div>

            <div class="form-group mb-4">
              <label for="shipdetails">Ship Details</label>
              <textarea id="shipdetails" name="shipdetails" class="form-control" rows="4" placeholder="Type specifications, capacity, notes..."></textarea>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .ship-hero { position: relative; height: 260px; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('<?php echo base_url('assets/images/ship-hero.jpg'); ?>'); }
  .ship-hero .hero-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.45), rgba(0,0,0,0.55)); }
  .ship-hero .hero-content { position: relative; z-index: 1; color: #fff; padding-top: 64px; }
  .hero-title { font-weight: 600; letter-spacing: .3px; }
  .hero-subtitle { opacity: .9; }
  .card .form-control::placeholder { color: #98a2ad; }
  .card { border-radius: .75rem; }
</style>

<br><br>

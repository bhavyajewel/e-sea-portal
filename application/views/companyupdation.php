<!-- <h2>COMPANY UPDATION FORM</h2> -->
<br><br>
<div class="bg-dark-gradient min-vh-100 py-5">
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-xl bg-dark text-light border-0 card-elevated">
        <div class="card-header bg-dark text-light border-0 d-flex flex-column align-items-start">
          <h4 class="mb-1 fw-semibold">Update Company Profile</h4>
          <small class="text-secondary">Keep your company information up-to-date</small>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url(); ?>Welcome/companyupdation" method="post">
            <input type="hidden" name="hide" value="<?php echo $id ?>">
            <?php foreach ($views as $row) { ?>

            <div class="form-group mb-3">
              <label for="name" class="text-secondary">Name</label>
              <input type="text" id="name" name="name" class="form-control bg-dark text-light border-secondary input-elevated" value="<?php echo $row->name; ?>" placeholder="Enter company name">
              <small class="form-text text-secondary">Your registered company or brand name.</small>
            </div>

            <div class="form-group mb-3">
              <label for="address" class="text-secondary">Address</label>
              <textarea id="address" name="address" class="form-control bg-dark text-light border-secondary input-elevated" rows="3" placeholder="Enter address"><?php echo $row->address; ?></textarea>
              <small class="form-text text-secondary">Full address including street, city and PIN.</small>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 mb-3">
                <label for="state" class="text-secondary">State</label>
                <select id="state" name="state" class="form-control bg-dark text-light border-secondary input-elevated">
                  <option value="">Select State</option>
                  <option value="ANDHRA PRADESH" <?php echo ($row->state=='ANDHRA PRADESH'?'selected':''); ?>>ANDHRA PRADESH</option>
                  <option value="ARUNACHAL PRADESH" <?php echo ($row->state=='ARUNACHAL PRADESH'?'selected':''); ?>>ARUNACHAL PRADESH</option>
                  <option value="BIHAR" <?php echo ($row->state=='BIHAR'?'selected':''); ?>>BIHAR</option>
                  <option value="CHATTISGARH" <?php echo ($row->state=='CHATTISGARH'?'selected':''); ?>>CHATTISGARH</option>
                  <option value="GOA" <?php echo ($row->state=='GOA'?'selected':''); ?>>GOA</option>
                  <option value="GUJARAT" <?php echo ($row->state=='GUJARAT'?'selected':''); ?>>GUJARAT</option>
                  <option value="HARYANA" <?php echo ($row->state=='HARYANA'?'selected':''); ?>>HARYANA</option>
                  <option value="JHARKHAND" <?php echo ($row->state=='JHARKHAND'?'selected':''); ?>>JHARKHAND</option>
                  <option value="KARNATAKA" <?php echo ($row->state=='KARNATAKA'?'selected':''); ?>>KARNATAKA</option>
                  <option value="KERALA" <?php echo ($row->state=='KERALA'?'selected':''); ?>>KERALA</option>
                  <option value="MADHYA PRADESH" <?php echo ($row->state=='MADHYA PRADESH'?'selected':''); ?>>MADHYA PRADESH</option>
                  <option value="PUNJAB" <?php echo ($row->state=='PUNJAB'?'selected':''); ?>>PUNJAB</option>
                  <option value="TAMILNADU" <?php echo ($row->state=='TAMILNADU'?'selected':''); ?>>TAMILNADU</option>
                  <option value="WEST BENGAL" <?php echo ($row->state=='WEST BENGAL'?'selected':''); ?>>WEST BENGAL</option>
                </select>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label for="district" class="text-secondary">District</label>
                <select id="district" name="district" class="form-control bg-dark text-light border-secondary input-elevated">
                  <option value="">Select District</option>
                  <option value="Thiruvananthapuram" <?php echo ($row->district=='Thiruvananthapuram'?'selected':''); ?>>Thiruvananthapuram</option>
                  <option value="Kollam" <?php echo ($row->district=='Kollam'?'selected':''); ?>>Kollam</option>
                  <option value="Pathanamthitta" <?php echo ($row->district=='Pathanamthitta'?'selected':''); ?>>Pathanamthitta</option>
                  <option value="Alappuzha" <?php echo ($row->district=='Alappuzha'?'selected':''); ?>>Alappuzha</option>
                  <option value="Kottayam" <?php echo ($row->district=='Kottayam'?'selected':''); ?>>Kottayam</option>
                  <option value="Idukki" <?php echo ($row->district=='Idukki'?'selected':''); ?>>Idukki</option>
                  <option value="Ernakulam" <?php echo ($row->district=='Ernakulam'?'selected':''); ?>>Ernakulam</option>
                  <option value="Trissufr" <?php echo ($row->district=='Trissufr'?'selected':''); ?>>Trissufr</option>
                  <option value="Palakad" <?php echo ($row->district=='Palakad'?'selected':''); ?>>Palakad</option>
                  <option value="Malapuram" <?php echo ($row->district=='Malapuram'?'selected':''); ?>>Malapuram</option>
                  <option value="Kozhikode" <?php echo ($row->district=='Kozhikode'?'selected':''); ?>>Kozhikode</option>
                  <option value="Wayanad" <?php echo ($row->district=='Wayanad'?'selected':''); ?>>Wayanad</option>
                  <option value="Kannur" <?php echo ($row->district=='Kannur'?'selected':''); ?>>Kannur</option>
                  <option value="Kasargode" <?php echo ($row->district=='Kasargode'?'selected':''); ?>>Kasargode</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 mb-3">
                <label for="contact" class="text-secondary">Contact</label>
                <input type="text" id="contact" name="contact" class="form-control bg-dark text-light border-secondary input-elevated" value="<?php echo $row->contact; ?>" placeholder="Enter contact number">
                <small class="form-text text-secondary">Include country code if applicable.</small>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label for="email" class="text-secondary">Email</label>
                <input type="email" id="email" name="email" class="form-control bg-dark text-light border-secondary input-elevated" value="<?php echo $row->email; ?>" placeholder="Enter email address">
              </div>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-outline-light btn-glow">Update</button>
            </div>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>

<style>
  .card.bg-dark .form-control::placeholder { color: #9aa0a6; }
  .card.bg-dark select.form-control option { background-color: #212529; color: #e9ecef; }
  .card.bg-dark .text-secondary { color: #aab0b6 !important; }
  .card.bg-dark { border-radius: 0.75rem; }
  .card.bg-dark .card-header { font-weight: 600; }
  .bg-dark-gradient { background: radial-gradient(1200px 600px at 10% -10%, #1f2630 0%, #0d1117 60%, #0b0f14 100%); }
  .card-elevated { position: relative; }
  .card-elevated::before { content: ""; position: absolute; inset: 0; border-radius: 0.75rem; padding: 1px; background: linear-gradient(135deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02)); -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0); -webkit-mask-composite: xor; mask-composite: exclude; pointer-events: none; }
  .input-elevated { box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08); }
  .btn-glow { box-shadow: 0 0 0 0 rgba(255,255,255,0.35); transition: box-shadow .2s ease; }
  .btn-glow:hover { box-shadow: 0 0 0.75rem 0.25rem rgba(255,255,255,0.12); }
</style>
</div>
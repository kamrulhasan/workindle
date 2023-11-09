
<div class="strap_section">
  <div class="container pb-5">

    <h1 class="pageTitle"></h1>
    <div class="row">
      <div class="col-md-6">
        <!-- https://www.maps.ie/create-google-map/ -->
        <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=dottapara,%20Tongi+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure acres/hectares on map</a></iframe></div>
      </div>

      <div class="col-md-6">
        <h2 class="pb-2">Quick Contact Form</h2>
        <form class="form-horizontal" id="add_form" action="<?php echo site_url();?>contact" method="post" enctype="multipart/form-data">

          <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label text-end">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control required" name="name" id="name" value="">
            </div>
          </div>        

          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label text-end">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control required email" name="email" id="email" value="">
            </div>
          </div>
        

          <div class="mb-3 row">
            <label for="message" class="col-sm-2 col-form-label text-end">Message</label>
            <div class="col-sm-10">
              <textarea name="message" class="form-control" id="message" rows="6"></textarea>
            </div>
          </div>

          

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-end"></label>
            <div class="col-sm-5">
              <input type="hidden" name="add_contact" value="add_contact" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>

    </div>
    
  </div>
</div>
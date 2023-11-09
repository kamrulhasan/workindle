 <nav class="navbar navbar-expand-md navbar-dark bg-dark55" aria-label="Fourth navbar example">
    <div class="container">
      <a class="navbar-brand d-flex align-items-cente" href="<?php echo site_url(); ?>">
        <!--<img style="height: 40px;" src="<?php echo base_url(); ?>assets/img/logo/logo.png">-->
        <img style="height: 40px; margin-right: 10px;" src="<?php echo base_url(); ?>assets/img/logo/main_logo.png">
        <h2 class="mainlogoColor mb-0 pb-0"> Giobaba.com </h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav ml-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link mainlogoColor" aria-current="page" href="<?php echo site_url(); ?>">Home</a>
          </li>
          
        
            
          

          <li class="nav-item">
              
              <a class="nav-link" href="<?php echo site_url(); ?>candidates">Talents</a>
             <?php /*
             <a class="nav-link" href="<?php echo site_url(); ?>talents">Talents</a>
             */ ?>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url(); ?>registration">Registration</a>
          </li>
          
          
          <?php if($this->session->userdata('manpower_id')): ?>
            <li class="nav-item">
                <a class="nav-link " href="<?php echo site_url(); ?>profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(); ?>auth/logout">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
                <?php /*
                <a class="nav-link" href="<?php echo site_url(); ?>auth">Login</a>
                */?>
            </li>
          <?php endif; ?>  
          
        </ul>
      </div>
    </div>
  </nav>
<?php $site_config = get_site_config('home'); ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url(); ?>admin">
        <img style="height: 40px;" src="<?php echo base_url(); ?>assets/img/logo/<?php echo $site_config->logo; ?>">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">         

          <?php if($this->session->userdata('user_id')): ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo site_url(); ?>admin/manpowers">Man Powers</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo site_url(); ?>admin/companies">Companies</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Configuration</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown04"> 
                <li class="nav-item">
                  <a class="dropdown-item" href="<?php echo site_url(); ?>admin/site_configs">Site Configs</a>
                </li>
                <li class="nav-item">
                  <a class="dropdown-item" href="<?php echo site_url(); ?>admin/site_configs/media">Media Configs</a>
                </li>
                
                <li class="nav-item">
                  <a class="dropdown-item" href="<?php echo site_url(); ?>admin/site_configs/article_config">Article Config</a>
                </li>

              </ul>
            </li>
          <?php endif; ?>

          <?php if($this->session->userdata('user_id')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>admin/auth/logout">Logout</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>admin/auth">Login</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
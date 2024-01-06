<?php  
require_once  __DIR__.'/partials/header.php';
?>
<div class="grey-bg container-fluid" id="layoutSidenav_content" style="margin-left: 20px;">
<section id="minimal-statistics">
<div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <a href="#!" class="card-content-admin">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>278</h3>
                  <span>New Posts</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
       <a href="#!"  class="card-content-admin">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-speech warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>156</h3>
                  <span>New Comments</span>
                </div>
              </div>
            </div>
          </div>
        </div>
       </a> 
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
       <a href="<?php echo ROOT_URL . '/Admin/calcRevenue' ?>"  class="card-content-admin">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-graph success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>64.89 %</h3>
                  <span>Revenue</span>
                </div>
              </div>
            </div>
          </div>
        </div>
       </a>
      </div>
        <div class="col-xl-3 col-sm-6 col-12">
         <a href="#!"  class="card-content-admin">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success">156</h3>
                  <span>New Clients</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-user success font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </a>
  
</section>
</div>


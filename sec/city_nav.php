<div class="container fixed-top">
<!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-transparent" style="background-color: #000;">
    <!-- Left navbar links -->
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <img src="assets/img/logo.png" alt="logo" style="height:40px; width:100px;">
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li>
        <a class="nav-link" href="index.php">
            <i class="fa fa-home text-light" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-exclamation-triangle text-light" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right bg-transparent">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item text-light" style="background-color:#000;">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h6 class="dropdown-item-title">
                  Malaba Roadblock
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h6>
                <p class="text-sm">0.6345098, 0.76482983</p>
                <p class="text-sm">This is an Emergency!!!</p>
                <p class="text-sm text-muted" style="font-size:11px;"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item text-light" style="background-color:#000;">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h6 class="dropdown-item-title">
                  Uplands
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h6>
                <p class="text-sm">0.6742198, 0.9082983</p>
                <p class="text-sm">This is an Emergency!!!</p>
                <p class="text-sm text-muted" style="font-size:11px;"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer text-info">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown w-100">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="text-light fa fa-bell" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-light" style="background-color:#000;">
          <span class="dropdown-item dropdown-header text-info">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item bg-transparent text-info">
            <i class="text-light fa fa-envelope mr-2"></i>new messages <span class="badge badge-transparent" style="border: 1px solid red;">9</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item bg-transparent text-info">
            <i class="text-light fa fa-comments mr-2" float-right></i> new comments <span class="badge badge-transparent" style="border: 1px solid red;">9</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item bg-transparent text-info">
            <i class="text-light fa fa-file mr-2"></i> new reports  <span class=" float-right badge badge-transparent" style="border: 1px solid red;">2</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer text-info">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-toggle="dropdown" data-slide="true" href="#" role="button"><i
            class=" text-light fa fa-th-large" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="background-color: #000;">
          <div class="dropdown-divider"></div>
          <center><img src="<?php echo $image;?>" alt="profile" style="height: 50px; width: 50px; border-radius: 50%;"></center>
          <a href="#" class="dropdown-item  bg-transparent text-info">
            <p class="text-center"><?php echo $username;?></p>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item bg-transparent text-info">
            <form method="GET" action="city_logout.php">
              <button class="btn bg-transparent text-light border-info w-100">Logout</button>
            </form>
            </a>
        <br>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  </div>
  <br><br><br>

<div class="container">
<!-- Navbar -->
  <nav class="fixed-top navbar navbar-expand navbar-transparent w-100" style="background-color: #0d0214;">
    <!-- Left navbar links -->
    <!-- SEARCH FORM -->
    <ul>
      <div class="form-inline rw-words rw-words-2">
            <span>E-SS</span>
            <span>Protect 🔰</span>
            <span>Secure 💂</span>
            <span>Save 💕</span>
            <span>Pray 🙏</span>
      </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto navbar-right">
      
    <li class="nav-item dropdown w-100">
        <a class="nav-link" href="my_circle.php">
          <i class="text-light fa fa-users" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
      </li>

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

      <li class="nav-item dropdown w-100">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="text-light fa fa-th-large" style="text-shadow: 0px 0px 10px yellow;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-light" style="background-color:#000;">
          <span class="dropdown-item dropdown-header text-info"><center><img src="upload/<?php echo $image; ?>" alt="user" style="height: 50px; width: 50px; border-radius: 50%"></center></span>
          <a href="#" class="dropdown-item bg-transparent text-info text-center">
            <?php echo $username; ?></span>
          </a>
          <hr class="bg-light">
            <div class="container">
              <div class="row">
                <div class="col-6 dropdown-item" style="background-color: #000;">
                  <a href="user.php">
                    <button class="btn bg-transparent text-light border-info"><i class="fa fa-eye"></i></button>
                  </a>            
                </div>
                <div class="col-6 dropdown-item" style="background-color: #000;">
                  <a href="#">
                    <form method="GET" action="../city_logout.php">
                      <button class="btn bg-transparent text-light border-info"><i class="fa fa-power-off"></i></button>
                    </form>
                  </a>            
                </div>
              </div>
            </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  </div>
  <br><br>

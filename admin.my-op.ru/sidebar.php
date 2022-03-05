    <section class="sidebar">
      <!-- Sidebar user panel -- >
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Топорков Дмитрий</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form --
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        
        <li>
          <a href="id<? echo $_SESSION['owner_id'];?>">
            <i class="fa fa-th"></i> <span>Новости</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">new</small>
            </span>
          </a>
        </li>




        <li>
          <a href="albums<? echo $_SESSION['owner_id'];?>">
            <i class="fa fa-calendar"></i> <span>Альбомы</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="groups<? echo $_SESSION['owner_id'];?>">
            <i class="fa fa-calendar"></i> <span>Группы</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		
        <li>
          <a href="frends<? echo $_SESSION['owner_id'];?>">
            <i class="fa fa-calendar"></i> <span>Друзья</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>		
		
		
        <li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Сообщения</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">1</small>
            </span>
          </a>
        </li>
        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Настройки</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
    </section>
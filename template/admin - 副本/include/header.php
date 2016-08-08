<div id="navbar" class="navbar navbar-default ace-save-state">
  <div class="navbar-container ace-save-state" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
      <span class="sr-only">Toggle sidebar</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="navbar-header pull-left">
      <a href="index.html" class="navbar-brand">
        <small>
          <i class="fa fa-paper-plane"></i>
          Jungley
        </small>
      </a>
    </div>
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">
        <li class="purple dropdown-modal">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="ace-icon fa fa-bell icon-animated-bell"></i>
            <span class="badge badge-important">1</span>
          </a>
          <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
            <li class="dropdown-header">
              <i class="ace-icon fa fa-exclamation-triangle"></i>
              1 条消息
            </li>
            <li class="dropdown-content">
              <ul class="dropdown-menu dropdown-navbar navbar-pink">
                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                        新评论
                      </span>
                      <span class="pull-right badge badge-info">+12</span>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="light-blue dropdown-modal">
          <a data-toggle="dropdown" href="#" class="dropdown-toggle">
            <img class="nav-user-photo" src="/template/assets/images/avatars/user.jpg" alt="Jason's Photo" />
            <span class="user-info">
              <small>Welcome,</small>
              Jason
            </span>
            <i class="ace-icon fa fa-caret-down"></i>
          </a>
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li>
              <a href="#">
                <i class="ace-icon fa fa-cog"></i>
                设置
              </a>
            </li>
            <li>
              <a href="profile.html">
                <i class="ace-icon fa fa-user"></i>
                用户信息
              </a>
            </li>
            <li>
              <a href="#">
                <i class="ace-icon fa fa-cog"></i>
                修改密码
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?=site_url('sso/signout')?>">
                <i class="ace-icon fa fa-power-off"></i>
                登出
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /.navbar-container -->
</div>
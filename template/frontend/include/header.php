<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">下拉导航</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Jungley</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">首页</a></li>
        <li><a href="http://www.jungley.net/index/category/1">博客</a></li>
        <li><a href="http://www.jungley.net/index/wiki/1">前端wiki</a></li>
        <li><a href="http://www.jungley.net/index/page/2">关于</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">wiklog</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=site_url('sso/signin')?>">登录</a></li>
        <li><a href="<?=site_url('sso/signup')?>">注册</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
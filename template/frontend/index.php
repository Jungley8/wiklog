<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/meta');?>
</head>
<body>

  <div class="container-fluid app">
    <!-- Fixed navbar -->
    <?php $this->load->view('frontend/include/header');?>


    <div class="row">

      <main class="col-xs-9 col-sm-9 col-md-9 col-lg-9 main-content">
        <?php foreach ($articles as $value): ?>
          <article class="post">
            <header class="post-head page-header">
              <h1 class="post-title">
                <a href="<?=site_url('index/article/' . $value['id'])?>"><?=$value['title']?></a>
              </h1>
              <div class="post-meta">
                <span class="glyphicon glyphicon-th-list"></span>
                栏目：<a href="<?=site_url('index/category/' . $value['id'])?>" class="post-category"><?=$categories[$value['parent_id']]['title']?></a>
                <span class="glyphicon glyphicon-time"></span>
                <?=$users[$value['user_id']]['name']?>
                <time class="post-date" title="" datetime="">时间：<?=date("Y年m月d日", $value['publish_at'])?> </time>
              </div>
            </header>
            <div class="post-content">
              <?=$value['description']?>
            </div>
            <footer class="post-footer clearfix">
              <div class="pull-left">
                <span class="glyphicon glyphicon-tags"></span>
                <span class="post-tags"><?=tagstohtml($value['tags'])?></span>
              </div>
              <div class="post-permalink pull-right">
                <a href="<?=site_url('index/article/' . $value['id'])?>" class="btn btn-primary">阅读全文</a>
              </div>
            </footer>
          </article>
        <?php endforeach?>
      </main>

      <aside class="col-xs-3 col-sm-3 col-md-3 col-lg-3 sidebar">

        <div class="panel panel-info categories">
          <div class="panel-heading">分类</div>
          <div class="panel-body">
            <div class="list-group">
              <a href="" class="list-group-item">栏目<span class="badge">14</span></a>
              <a href="" class="list-group-item">栏目<span class="badge">14</span></a>
              <a href="" class="list-group-item">栏目<span class="badge">14</span></a>
              <a href="" class="list-group-item">栏目<span class="badge">14</span></a>
              <a href="" class="list-group-item">栏目<span class="badge">14</span></a>
            </div>
          </div>
        </div>

        <div class="panel panel-info categories">
          <div class="panel-heading">广告</div>
          <div class="panel-body">
          </div>
        </div>

        <div class="panel panel-info categories">
          <div class="panel-heading">wiki</div>
          <div class="panel-body">
            <div class="list-group">
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
            </div>
          </div>
        </div>



        <div class="panel panel-info categories">
          <div class="panel-heading">友情链接</div>
          <div class="panel-body">
            <div class="list-group">
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
              <a href="" class="list-group-item">栏目</a>
            </div>
          </div>
        </div>

      </aside>
    </div>

<?php $this->load->view('frontend/include/footer');?>
  </div>


</body>
</html>
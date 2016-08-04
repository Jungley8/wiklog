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
        <!-- <?php var_dump($article)?> -->
        <div class="blog-post">
          <h1 class="blog-post-title"><?=$article['title']?></h1>
          <p class="blog-post-meta">时间：<?=date("Y年m月d日", $article['publish_at'])?> by <?=$users[$article['user_id']]['name']?> at <a href="<?=site_url('index/category/' . $article['id'])?>" class="post-category"><?=$categories[$article['parent_id']]['title']?></a></p>

          <?=$article['content']?>
        </div><!-- /.blog-post -->
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
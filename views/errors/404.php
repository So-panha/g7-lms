<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>error</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<?php 
// Find to link of btn back of error page
  $link;
  if(!empty($_SESSION['user'])){
    $link = '/';
  }else{
    $link = '/login';
  }
?>
<body class="bg-dark">
  <div class="container my-5">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <section class="border border-white rounded my-5 p-5">
      <div class="d-flex">
        <div class="row text-white">
          <div class="row"></div>
          <h1 style="font-size: 60px;font-family:'Times New Roman', Times, serif;font-weight:bold;">Page Not Found</h1>
          <p>We can't seem to find the page you're looking for. Please check the URL for any typos.</p>
          <ul class="list-group">
            <li class="list-group-item bg-dark border border-white col-3"><a href="<?= $link ?>"><- Go to Homepage</a></li>
          </ul>
        </div>
        <div class="row">
          <div class="row"></div>
          <div class="row"></div>
          <div class="row"></div>
          <div><img class="image" style="width: 100%; height:100%;" src="../../assets/images/error_page.png" alt=""></div>
        </div>
      </div>
  </div>
  </section>
  </div>
</body>

</html>
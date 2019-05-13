<?php 
session_start();
include('includes/config.php');

    ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Portal | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Custom styles for this template -->
    <!-- <link href="css/modern-business.css" rel="stylesheet"> -->

  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/header.php');?>
  <!-- jumbotron -->
  <div id="background">
    <div class="jumbotron">
      <h1 class="font-julius">YOGYAKARTA</h1>
      <p class="font-gochi">Where The Culture Is Calling</p>
      <p><a href="#" class="btn btn-default" role="button">EXPLORE</a></p>
    </div>
  </div>
  <!-- jumbotron -->
    <!-- container atas -->
    <div id="home">
    <div class="isi">
      <div class="container atas">
        <h1 class="font-gochi">The Culture of Indonesia</h1>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="glyphicon glyphicon-map-marker"></i>
            <h3>STRATEGIC</h3>
            <p class="text-justify"><strong>Lorem Ipsum</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="glyphicon glyphicon-tree-conifer"></i>
            <h3>CLIMATE</h3>
            <p class="text-justify"><strong>Lorem Ipsum</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="glyphicon glyphicon-camera"></i>
            <h3>EXOTIC</h3>
            <p class="text-justify"><strong>Lorem Ipsum</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container atas -->

  <!-- container bawah -->
  <!-- <div class="container bawah">
    <h1>The Culture of Indonesia</h1>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/gambar-1-A.jpg" width="200px">
        <h3>STRATEGIC</h3>
        <p class="text-center"><strong>Lorem Ipsum</strong>is simply dummy text of the printing and typesetting industry.</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/gambar-1-B.jpg" width="200px">
        <h3>CLIMATE</h3>
        <p class="text-center"><strong>Lorem Ipsum</strong>is simply dummy text of the printing and typesetting industry.</p>
      </div><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/gambar-1-C.jpg" width="200px">
        <h3>EXOTIC</h3>
        <p class="text-center"><strong>Lorem Ipsum</strong>is simply dummy text of the printing and typesetting industry.</p>
      </div>
    </div>
  </div> -->
  <!-- container bawah -->
    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
        <h1 class="text-center font-gochi">Destinations</h1>
          <!-- Blog Post -->
<?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <div class="thumbnail">
            <div class="image-thumb" style="background-image:url(admin/postimages/<?php echo htmlentities($row['PostImage']);?>)"></div>
            <div class="caption">
              <h3 class="card-title font-courgette"><?php echo htmlentities($row['posttitle']);?></h3>
                 <p class="text-justify">Category : <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
       
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities($row['postingdate']);?>
           
            </div>
          </div>
        </div>

<?php } ?>
       

      


        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
      <?php include('includes/footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>

 
</head>
  </body>

</html>

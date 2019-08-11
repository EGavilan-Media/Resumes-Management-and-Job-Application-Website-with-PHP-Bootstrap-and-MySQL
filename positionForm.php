<?php 
  session_start();
  if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Position - Resume Management System</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger text-light" href="#page-top">EGM Job Application</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-strong="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-light" href="resumesManagement.php">Resumes Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-light" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Position Section -->
  <section class="page-section" id="apply">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Position Information</h2>
          <hr class="divider my-4">
          <div class="text-left">
            <form id="frmPosition">
              <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                <i class="fa fa-exclamation-triangle"></i>
                  Please check in on some of the fields below.
                <button type="button" class="close" data-dismiss="alert" aria-strong="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">                  
                  Information successfully updated!
                <button type="button" class="close" data-dismiss="alert" aria-strong="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="form-group">
                <strong for="exampleInputEmail1">Position Name <i class="text-danger">*</i></strong>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter position name" maxlength="50">
                <div id="name_error_message" class="text-danger"></div>
              </div>
              <div class="form-group">
                <strong>Description <i class="text-danger">*</i></strong>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter position description" maxlength="1000" rows="7"></textarea>
                <div id="description_error_message" class="text-danger"></div>
              </div> 
              <div class="form-group">
                <strong>Requirement <i class="text-danger">*</i></strong>
                <textarea type="text" class="form-control" id="requirement" name="requirement" placeholder="Enter position requirement" maxlength="1000" rows="7"></textarea>
                <div id="requirement_error_message" class="text-danger"></div>
              </div>
              <button type="button" id="submit" class="btn btn-primary btn-block">SAVE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5 fixed-bottom">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - EGMedia</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
<?php 
  }else{
    header("location:login.html");
  }
 ?>
<script>
  $(function() {

      getPosition();

      $('#submit').click(function(){
        submit();
      });

      var error_name = false;
      var error_description = false;
      var error_requirement = false;


      $("#name").focusout(function() {
          check_name();
      });
      $("#description").focusout(function() {
          check_description();
      });
      $("#requirement").focusout(function() {
          check_requirement();
      });

      function check_name() {

          if ($.trim($('#name').val()) == '') {
              $("#name_error_message").html("Input is blank!");
              $("#name_error_message").show();
              error_name = true;
          } else {
              $("#name_error_message").hide();
          }
      }

      function check_description() {

          if ($.trim($('#description').val()) == '') {
              $("#description_error_message").html("Input is blank!");
              $("#description_error_message").show();
              error_description = true;
          } else {
              $("#description_error_message").hide();
          }
      }

      function check_requirement() {

          if ($.trim($('#requirement').val()) == '') {
              $("#requirement_error_message").html("Input is blank!");
              $("#requirement_error_message").show();
              error_requirement = true;
          } else {
              $("#requirement_error_message").hide();
          }
      }

      function submit(){

      error_name = false;
      error_description = false;
      error_requirement = false;

      check_name();
      check_description();
      check_requirement();


      if (error_name == false && error_description == false && error_requirement == false) {

      data=$('#frmPosition').serialize();

        $.ajax({
          type:"POST",
          data:data,
          url:"positionUpdate.php",
          success:function(data){
          if(data==1){
            $("#alert_sucess_message").show();
            $("#alert_error_message").hide();
        }else{
            $("#alert_sucess_message").hide();
            $("#alert_error_message").show();
            }
          }
        });
        return false; 
        } else {
          $("#alert_sucess_message").hide();
          $("#alert_error_message").show();
          return false;
          }
        }
      });

    function getPosition(){
      $.ajax({
        type:"POST",
        data:"",
        url:"getPosition.php",
        success:function(data){
          data=jQuery.parseJSON(data);
          $('#name').val(data['position_name']); 
          $('#description').val(data['position_description']);
          $('#requirement').val(data['position_requirement']);  
        }
      });
    }
</script>
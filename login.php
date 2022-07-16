<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>LIPRO</b> - C</a>
    </div>
    <div class="card-body">

      
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="myForm" method="post"> 
        <?php if(isset($_GET['login'])) : ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
          Please login first
        </div>
        <?php endif; ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            
          </div>
          
        
      </form>

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/form-validate.js"></script>

<script>
  $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      $.ajax({
        url: 'ceklogin.php',
        type: 'POST',
        dataType: 'JSON',
        data: 
        {
          username: $("input[name=username]").val(),
          password: $("input[name=password]").val()
        },
        success: function(){
          location.href = "index.php"
        },
        error: function(xhr, text, msg) {
          $(document).Toasts('create', {
              class: 'bg-danger',
              title: 'Login Failed',
              subtitle: 'Subtitle',
              body: 'Incorrect username'
            });
        }
      });


      
        // $.getJSON("ceklogin.php", function(data){
        //   const code = JSON.parse(data);

        //   if(data.status == "user"){
        //     $(document).Toasts('create', {
        //       class: 'bg-danger',
        //       title: 'Login Failed',
        //       subtitle: 'Subtitle',
        //       body: 'Incorrect username'
        //     });
        //   }

        //   else if(data.status == "pass"){
        //     $(document).Toasts('create', {
        //       class: 'bg-danger',
        //       title: 'Login Failed',
        //       subtitle: 'Subtitle',
        //       body: 'Incorrect password'
        //     });
        //   }

        //   else {
        //     windows.location.href = "index.php"
        //   }
        // });
      }
    });
        
  
  $('#myForm').validate({
    rules: {
      username: {
        required: true,
        
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      username: {
        required: "Please enter a email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  
});
  
    

</script>
</body>
</html>

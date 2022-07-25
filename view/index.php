<?php include('head.php'); ?>

<body style="background-image: url(img/pilates_02.png); background-size: cover; background-repeat: repeat">
  <section class="login">
    <div class="logo">
      <img src="img/logo.png" alt="logo" />
    </div>
    <form action="/login-post" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">EMAIL</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
      </div>
      <div class="mt-5 mb-3 text-center">
        <button type="submit" class="btn-custom">LOGIN</button>
      </div>
    </form>
      <?php include('templates/message.php'); ?>
  </section>

<?php include('footer.php'); ?>

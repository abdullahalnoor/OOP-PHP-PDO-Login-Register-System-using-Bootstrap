<?php 
  include 'inc/navbar.php';
  Session::checkSession();
  include "lib/User.php";
  $user = new User();
 
?>


 
 <div class="container main-body">
  <div class="row">
   <div class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-default">
     <div class="panel-heading text-info">
      User Table
      <div class="">
       <?php 
        $name = Session::get('loginmsg');
        if (isset($name)) {
         echo $name;
        }
        Session::set('loginmsg',NULL);
       ?>
      </div>
     </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Action</th>
       </tr>
       <tr>
        <td><?php echo Session::get('name'); ?></td>
        <td><?php echo Session::get('username'); ?></td>
        <td><?php echo Session::get('email'); ?></td>
        <td></td>
       </tr>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>

 <!-- footer -->
 <?php include 'inc/footer.php'; ?>

 <!-- Script File -->
 <?php include"inc/_js.php"; ?>
</body>
</html>
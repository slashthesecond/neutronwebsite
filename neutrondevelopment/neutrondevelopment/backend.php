<?php session_start(); ?>

<?php include('connect.php'); ?>

  <?php $query = ("select * from comments");
        $result = mysqli_query($db, $query);
        ?>

 <!DOCTYPE html>
 <html>
      <head>
           <title>Neutron Backend</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">

      </head>
      <body style="background-color:#f9f9f9">
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="backend.html">Neutron Back End</a>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Front End</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link"><?php echo $_SESSION['staffname']; ?> </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

              <div class="container">
                <br />
                <div class="table-responsive">
                     <table id="comments" class="table table-striped table-bordered">
                          <thead>
                               <tr>
                                    <td>Comment ID</td>
                                    <td>Customer Name</td>
                                    <td>Customer Email</td>
                                    <td>Comment</td>
                               </tr>
                          </thead>

<?php

while ($row = mysqli_fetch_assoc($result))
{ echo '
                               <tr>
                                    <td>'.$row["commentID"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["comment"].'</td>
                               </tr>
                               ';
                          }?>
                     </table>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#comments').DataTable();
 });
 </script>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "you are logout";
    header('location:login.php');
}
if (isset($_POST['submit'])) {
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "login";


    $con = mysqli_connect($server, $username, $password, $db);

    if (!$con) {
        die(" not connected with sql : " . mysqli_connect_error());
    } else {
    }
    $note = $_POST['note'];
    $description = $_POST['description'];


    $SQL = "insert into notes( note, description) values('$note', '$description')";

    $iquery1 = mysqli_query($con, $SQL);
} else {
?>

<?php
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <title>TO-Do App</title>
    <style>
        h1 {
            background-color: #F5F5B3;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- <nav class="navbar navbar-dark bg-primary"></nav> -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NOTES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    
                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" style="color: #fbfeff; border:2px solid white;">Search</button>
                    <button class="btn btn-outline-success" type="submit" style="color: #fbfeff; border:2px solid white ;"><a href="logout.php" style="color: #fbfeff;">Logout</a> </button>
                </form>
            </div>
        </div>
    </nav>
    <h1>hello, <?php echo $_SESSION['username']; ?> </h1>
    <div class="container my-5">
        <h3>Add Note :-</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note title</label>
                <input type="text" class="form-control" required name="note" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>

            <label for="floatingTextarea">Note description</label>
            <textarea class="form-control" placeholder="" required name="description" id="floatingTextarea"></textarea>

            <button type="submit" name="submit" class="btn btn-primary my-2">Add Note</button>
        </form>
    </div>
    <div class="container my-3">
    
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
         include 'db.php';
        $sql = "select * from  `notes`";
        $result = mysqli_query($con, $sql);
        $id=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$id+1;
           echo" <tr>
            <th scope='row'>".$id."</th>
            <td>" . $row['note'] . "</td>
            <td>" . $row['description']."</td>
            <td>    <textarea > </textarea>
            </td>
        </tr>";
            
        }

        ?>

            </tbody>
        </table>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
 
</script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
   
</body>

</html>
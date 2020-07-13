<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SRH Associates</title>
	<link rel="icon" href="Images/SRH.png" type="image/gif">
    <link rel="stylesheet" href="css/bootstrap.css">


    <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light top-bar">
    <a class="navbar-brand" href="home.html"><img src="Images/Logo.png" style="width: 100px; height: 100px;"></a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-4">
                <button class="btn mb-2" type="button" data-toggle="modal" data-target="#create-admin">Create admin</button>
            </li>
            <li class="nav-item mr-4">
                <button class="btn mb-2" type="button" data-toggle="modal" data-target="#reply">
                    <a style="color: #000; text-decoration: none;" href="home.html">Logout</a>
                </button>
            </li>
        </ul>
    </div>
</nav>
<hr>

<div class="modal fade" role="dialog" id="create-admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create Admin</h3>
                <button type="button" class="close" data-dismiss="modal">&times</button>
            </div>
            <div class="modal-body">
                <form action="admin_creation.php" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Create" name="create_admin">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <a class="navbar-brand">
        <h1>SRH Admin Panel</h1>
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <button class="btn mb-2" type="button" data-toggle="modal" data-target="#add-notif">Add an Update</button>
        </li>
    </ul>
</nav>


<div class="modal fade" role="dialog" id="add-notif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Update</h3>
                <button type="button" class="close" data-dismiss="modal">&times</button>
            </div>
            <div class="modal-body">
                <form action="add_notif.php" method="post">
                    <div class="form-group">
                        <label>Heading</label>
                        <input type="text" class="form-control" name="heading" placeholder="Heading" required>
                    </div>
                    <div class="form-group">
                        <label>Update</label>
                        <input type="text" class="form-control" name="update" placeholder="update text" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="addnot" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<hr>



        <?php

        $conn=new mysqli("localhost","root","","client_database");
        $sql = "select * from admin";
        $result = $conn->query($sql);

        echo "<table id=\"contact\" class=\"table table-striped\">
            <h3>Contact Requests</h3>
            <tr>
                <th>Serial</th>
                <th>Post Date</th>
                <th>Post Time</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Query</th>
                <th>Details</th>
                <th>Replied</th>
            </tr>";

        if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                <th>".$row["serial"]."</th>
                <th>".$row["date"]."</th>
                <th>".$row["time"]."</th>
                <th>".$row["name"]."</th>
                <th>".$row["contact"]."</th>
                <th>".$row["email"]."</th>
                <th>".$row["query"]."</th>
                <th>".$row["details"]."</th>
                <th>".$row["replied"]."</th>
            </tr>";
        }
    }


    echo "<tbody>";
        ?>

        <?php

        $conn=new mysqli("localhost","root","","client_database");
        $sql = "select * from updates";
        $result = $conn->query($sql);

        echo "<table id=\"contact\" class=\"table table-striped\">
            <h3>Updates</h3>
            <tr>
                <th>Heading</th>
                <th>Content</th>
                <th>Date</th>
                <th>Time</th>
            </tr>";

        if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                <th>".$row["heading"]."</th>
                <th>".$row["content"]."</th>
                <th>".$row["date"]."</th>
                <th>".$row["time"]."</th>
            </tr>";
        }
    }


    echo "<tbody>";
        ?>

</body>

</html>
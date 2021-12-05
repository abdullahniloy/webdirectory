<?php
    session_start();
    include ('navigation.php');
    
    $date= date('Y-m-d', strtotime('-300 days'));
    $conn=connect();
    $sql= "SELECT * from products WHERE updated_at>'$date'";
    $prod= $conn->query($sql);

    $sql= "SELECT COUNT(*) as products FROM products";
    $total_products= mysqli_fetch_assoc($conn->query($sql));

    $sql= "SELECT SUM(bought) as total_bought FROM products";
    $total_bought= mysqli_fetch_assoc($conn->query($sql));

    $sql= "SELECT SUM(sold) as total_sold FROM products";
    $total_sold= mysqli_fetch_assoc($conn->query($sql));

    $stock_available= $total_bought['total_bought']-$total_sold['total_sold'];
?>

<html>

<head>
    <title>Dashboard</title>
    
</head>
<body>
<div class="row" style="padding-top: 40px;">
    <div class="leftcolumn">
        <div class="row">
            <section style="padding-left: 20px; padding-right: 20px;">
                <div class="col-sm-3">
                    <div class="card card-green">
                        <h3 style="text-align: center">Total Products </h3>
                        <h2 style="color: #282828; text-align: center; "><?php echo $total_products['products'] ?></h2>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-yellow" >
                        <h3 style="text-align: center">Products Bought </h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $total_bought['total_bought'] ?></h2>
                    </div>
                </div>
                <div class="col-sm-3 " >
                    <div class="card card-blue" >
                        <h3 style="text-align: center">Products Sold </h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $total_sold['total_sold'] ?></h2>
                    </div>
                </div>
                <div class="col-sm-3" >
                    <div class="card card-red" >
                        <h3 style="text-align: center">Available Stock </h3>
                        <h2 style="color: #282828; text-align: center;"><?php echo $stock_available ?></h2>
                    </div>
                </div>
            </section>
        </div>
        <div class="card" >
            <div class="table_container">
                <h1 style="text-align: center;">Products Table</h1>
                <div class="table-responsive">
                    <table class="table table-dark" id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" style="text-align: center">
                        <thead class="thead-light">
                        <tr>
                            <th data-field="date" data-filter-control="select" data-sortable="true" style="text-align: center">Product Name</th>
                            <th data-field="examen" data-filter-control="select" data-sortable="true" style="text-align: center"> Bought</th>
                            <th data-field="note" data-sortable="true" style="text-align: center">Sold</th>
                            <th data-field="note" data-sortable="true" style="text-align: center">Available in Stock</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(mysqli_num_rows($prod)>0){
                                while($row= mysqli_fetch_assoc($prod)){
                                    $stock= $row['bought']-$row['sold'];
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";

                                    echo "<td>".$row['bought']."</td>";

                                    echo "<td>".$row['sold']."</td>";

                                    echo "<td>".$stock."</td>";
                                }
                            }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="rightcolumn">
        <div class="card  text-center" >
            <h2>About User</h2>
            <div class="fakeimg" style="">Image</div>
            <p>Some Text</p>
        </div>
        <div class="card text-center">
            <h2>Owners Info</h2>
            <p>Some text..</p>
        </div>
    </div>
</div><br><br>

<?php include('footer.php')?>

</body>
</html>
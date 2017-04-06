<div class="container">
    <h2>Lisamine/Kustutamine</h2>
    <form action="lisaKustuta.php" class="form-horizontal" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Eesnimi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="name" placeholder="Sisesta eesnimi">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Perenimi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="lastName" placeholder="Sisesta perenimi">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Sünniaasta:</label>
                   <?php
                        echo '<select name="date">';
                        for ($i=1; $i<32; $i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        echo '</select>';
                        echo '<select name="month">';
                        for ($i=1; $i<13; $i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        echo '</select>';
                        echo '<select name="year">';
                        for ($i=2017; $i>1899; $i--){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        echo '</select>';
                   ?>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php
$data = new database();
if(isset($_POST['name']) && isset($_POST['lastName'])){
    $data->insertMember($_POST['name'], $_POST['lastName'], $_POST['date'], $_POST['month'], $_POST['year']);
}
?>
<div class="container">
    <h2>Grupikaaslased</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Eesnimi</th>
            <th>Perenimi</th>
            <th>Sünniaasta</th>
            <th>Pilt</th>
            <th>Sisestamise aeg</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = array();
        $data = new database();
        $result = $data->getAllMembers();
        for ($i=0; $i<count($result); $i++){
            echo '<tr>';
            echo '<td>'.$result[$i][0].'</td>';
            echo '<td>'.$result[$i][1].'</td>';
            echo '<td>'.$result[$i][2].'</td>';
            echo '<td>'.$result[$i][3].'</td>';
            echo '<td>'.$result[$i][4].'</td>';
            echo '<td>'.$result[$i][5].'</td>';
            echo '<td><a href="lisaKustuta.php?id='.$result[$i][0].'">Kustuta</a></td>';
            echo '</tr>';
        }
        if(isset($_GET['id'])){
            $data->deleteMember($_GET['id']);
        }
        ?>
        </tbody>
    </table>
</div>

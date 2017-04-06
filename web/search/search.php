<div class="container">
    <h2>Grupikaaslased</h2>
    <form action="otsing.php" method="get">
        <div>
            <input class="form-control" type="text" placeholder="Otsi" name="search">

        </div>
    </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Eesnimi</th>
            <th>Perenimi</th>
            <th>Sünniaasta</th>
            <th>Pilt</th>
            <th>Sisestamise aeg</th>
        </tr>
        </thead>
        <tbody>
        <tbody>
        <?php
        $result = array();
        $data = new database();
        if(!isset($_GET['search'])){
            $result = $data->getAllMembers();
        }else{
            $result = $data->searchMember($_GET['search']);
        }
        for ($i=0; $i<count($result); $i++){
            echo '<tr>';
            echo '<td>'.$result[$i][0].'</td>';
            echo '<td>'.$result[$i][1].'</td>';
            echo '<td>'.$result[$i][2].'</td>';
            echo '<td>'.$result[$i][3].'</td>';
            echo '<td>'.$result[$i][4].'</td>';
            echo '<td>'.$result[$i][5].'</td>';
            echo '</tr>';
        }

        ?>
        </tbody>
    </table>



</div>
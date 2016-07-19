<!DOCTYPE html>
<html>
    <head>
        <title>Contato</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <?php
        require_once './login.php';
        error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
        $db_server = mysql_connect($db_hostname,$db_username,$db_password);
        if (!$db_server) {
                die("Unable to connect to MySQL: " . mysql_error());
           }
                mysql_select_db($db_database)or die("Unable to select database: " . mysql_error());
                $nome = $_POST['nome'];
                $sobrenome =  $_POST['sobrenome'];
                $rg = $_POST['rg'];
                
                $query = "insert into pessoas (nome_pessoa,sobrenome_pessoa,rg_pessoa)values('$nome','$sobrenome','$rg')";
                if($_POST['nome']!="" && $_POST['sobrenome']!="" && $_POST['rg']!="" ){
                    $result = mysql_query($query);
                }else {$result = true;}
                $result2 = mysql_query("select * from pessoas"); // segunda query
                
                if (!$result) die ("Database access failed: " . mysql_error());
                
                mysql_close($db_server);
                
                
        
    
    ?>   
    
    <body>
        <div class="container"><div id="" class="row">
            <div id="" class="col-lg-12">
                <form action="contatos.php" method="POST">
                                        <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo "";?>">
                        <label for="nome">Sobrenome:</label>
                        <input type="text" name="sobrenome" id="nome" class="form-control" value="<?php echo "";?>">
                        <label for="rg">RG:</label> 
                        <input type="number" name="rg" id="rg" class="form-control" value="<?php echo "";?>">
                     </div>
                    
                    <input type="submit" class="btn btn-info" id="register">
                </form>   
                
                <hr>
                <table class="table table-striped">
                    <tr>
                        <td>Nome:</td>
                        <td>Sobrenome:</td>
                        <td>RG:</td>
                    </tr>
                    <?php
                        for($i=0;$i<mysql_num_rows($result2);$i++){
                         $row = mysql_fetch_row($result2);   
                        echo '<tr>';    
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo '</tr>';
                    }
                    mysql_close($db_server);
                ?>
                    
                </table>
                
                
                
        </div>
        </div>

    </body>
</html>





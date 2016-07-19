<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
        
        <style>
        
        *{
            border : 1px black;
        }
           
            
        </style>
        
    </head>
    <body>
        <?php 
            
            error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
            require_once './login.php';
            
            $db_server = mysql_connect($db_hostname, $db_username, $db_password);
            
            if (!$db_server) {
                die("Unable to connect to MySQL: " . mysql_error());
                }
                
                mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
                
                // conexao feita
                $campo = $_POST["campo"];
                echo $campo;
                switch ($campo){
                    case 1: $campo ="nome_curso";
                        break;
                    case 2: $campo = "descricao";
                        break;
                    case 3: $campo = "carga";
                        break;
                    case 4: $campo = "totaulas";
                        break;
                    case 5 : $campo = "ano";
                        break;
                    default: $campo = "nome_curso";
                }
                
                
                
                
                $pesq = isset($_POST["pesquisa"])?$_POST["pesquisa"]:"0000";
              
                $query="SELECT * FROM cursos where $campo like '%$pesq%'"; 
                $result = mysql_query("$query");
                $rows = mysql_num_rows($result);
                if (!$result) die ("Database access failed: " . mysql_error());
                
                
                
               
                
?>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form class="form-horizontal" action="index.php" method="post">
                        <div class="form-group">
                            <select name="campo" id="" class="form-control">
                                <option value="1">Nome do Curso</option>
                                <option value="2">Descricao</option>
                                <option value="3">Carga Horaria</option>
                                <option value="4">Qtd. de Aulas</option>
                                <option value="5">Ano</option>
                            </select>
                            <label for="pesquisa">Pesquisar:
                            <input class="form-control"id="pesquisa" type="text" name="pesquisa">
                            </label>
                            
                            <input class="btn btn-success " type="submit" value="pesquisar">
                     
                        </div>
                        
                       
                    </form>    
                    <table class=" table table-striped">
                         <tr>
                             <td>Nome</td>
                             <td>Descrição</td>
                             <td>Carga</td>
                             <td>Qtd. Aulas</td>
                             <td>Ano</td>
                         </tr>
                <?php
                    
                
                for($i=0;$i<$rows;$i++){
                    $row = mysql_fetch_row($result);
                    
                    echo "<tr>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                }
                
                ?>
                </table> 
                </div>
                
                
            </div>
        </div>  
        <pre>
                <?php
                    
                    print_r($row);
                    
                ?>
    
    </body>
</html>



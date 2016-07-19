<?php
$prod = " leite";
$preco = 4.5;
$frase = "essa variave receve um texto gigante e para ser tratado com php";
echo strlen(ltrim($prod))."<br>";
echo str_word_count($frase);


/*

 * funcao printf | print_r | strlen | trim | ltrim | rtrim | str_word_count | 
 * 
 * 
 *  */

mysql_connect();
mysql_select_db($frase);
mysql_query($frase);
mysql_result($result, $row);
mysql_num_rows($result);
mysql_fetch_row;



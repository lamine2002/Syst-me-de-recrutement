<?php
$pass = "passer";
$passhash = password_hash($pass, PASSWORD_DEFAULT);
if(password_verify('passer', $passhash)){
    echo "C'est le bon mot de passe <br>";
    echo $passhash;
}else{
    echo "C'est pas le bon mot de passe <br>";
    echo $passhash;
}
?>
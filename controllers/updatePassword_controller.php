<?php

    $hostname = "127.0.0.1";
    $hostuser = "root";
    $hostpass = "";
    $database= "univa";

    $connection = mysqli_connect($hostname,$hostuser,$hostpass,$database);

    if ($connection) {
        $sqlquery = "SELECT * FROM users";
        $result = mysqli_query($connection,$sqlquery);
        //var_dump($result);
        if (mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result)){
                $user_email = $_GET['user_email'];
                $user_old_password = $_GET['userold_password'];
                $user_password = $_GET['user_password'];
                $user_id = $row['id'];
                if ($row['email'] == $user_email && $row['password']== $user_old_password) {

                    $sqlUpdateQuery = "UPDATE users SET password= $user_password WHERE id= $user_id";

                    if (mysqli_query($connection,$sqlUpdateQuery)) {
                        echo "Contraseña actualizada exitosamente!";
                      } else {
                        echo "No se actualizo la contraseña";
                      }
                    
                } else {
                }
                
            }
        } else {
            echo "Empty table";
        }
        
    } else {
        echo "You're not connected";
    }
    

?>
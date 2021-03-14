<?php

$errors = array();

/* -------------------------------------------------------------- */
/* Function for Remove escapes special
  /* characters in a string for use in an SQL statement
  /*-------------------------------------------------------------- */

function real_escape($str) {
    global $con;
    $escape = mysqli_real_escape_string($con, $str);
    return $escape;
}

/* -------------------------------------------------------------- */
/* Function for Remove html characters
  /*-------------------------------------------------------------- */

function remove_junk($str) {
    $str = nl2br($str);
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
}

/* -------------------------------------------------------------- */
/* Function for Uppercase first character
  /*-------------------------------------------------------------- */

function first_character($str) {
    $val = str_replace('-', " ", $str);
    $val = ucfirst($val);
    return $val;
}

/* -------------------------------------------------------------- */
/* Function for Checking input fields not empty
  /*-------------------------------------------------------------- */

function validate_fields($var) {
    global $errors;
    foreach ($var as $field) {
        $val = remove_junk($_POST[$field]);
        if (isset($val) && $val == '') {
            $errors = $field . " No puede estar en blanco.";
            return $errors;
        }
    }
}

/* -------------------------------------------------------------- */
/* Function for Display Session Message
  Ex echo displayt_msg($message);
  /*-------------------------------------------------------------- */

function display_msg($msg = '') {
    $output = array();
    if (!empty($msg)) {
        foreach ($msg as $key => $value) {
            $output = "<div class=\"alert alert-{$key}\">";
            $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
            $output .= remove_junk(first_character($value));
            $output .= "</div>";
        }
        return $output;
    } else {
        return "";
    }
}

/* -------------------------------------------------------------- */
/* Function for redirect
  /*-------------------------------------------------------------- */

function redirect($url, $permanent = false) {
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

/* -------------------------------------------------------------- */
/* Function for Readable date time
  /*-------------------------------------------------------------- */

function read_date($str) {
    if ($str)
        return date('d/m/Y g:i:s a', strtotime($str));
    else
        return null;
}
function limiteFecha(){
    $fecha_actual = date("Y-m-d");
    $fechaLimite = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 

    return    $fechaLimite;

}
/* -------------------------------------------------------------- */
/* Function for  Readable Make date time
  /*-------------------------------------------------------------- */

function get_date() {
    return strftime("%Y-%m-%d", time());
}

function make_date() {
    return strftime("%Y-%m-%d %H:%M:%S", time());
}

function getMonth() {
    return strftime("%m", time());
}

function getYear() {
    return strftime("%Y", time());
}

/* -------------------------------------------------------------- */
/* Function for  Readable date time
  /*-------------------------------------------------------------- */

function count_id() {
    static $count = 1;
    return $count++;
}

/* -------------------------------------------------------------- */
/* Function for Creting random string
  /*-------------------------------------------------------------- */

function randString($length = 5) {
    $str = '';
    $cha = "0123456789abcdefghijklmnopqrstuvwxyz";

    for ($x = 0; $x < $length; $x++)
        $str .= $cha[mt_rand(0, strlen($cha))];
    return $str;
}

function removeJunk($str) {
    $str = nl2br($str);
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
}

function numberCOP($número) {
    return number_format($número);
}

function generateToken() {
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
}

function validaPassword($var1, $var2) {
    if (strcmp($var1, $var2) !== 0) {
        return false;
    } else {
        return true;
    }
}

function converterMonth($mes) {
    $resultado = "";

    if ($mes == "01") {
        $resultado = "ENERO";
    }
    if ($mes == "02") {
        $resultado = "FEBRERO";
    }
    if ($mes == "03") {
        $resultado = "MARZO";
    }
    if ($mes == "04") {
        $resultado = "ABRIL";
    }
    if ($mes == "05") {
        $resultado = "MAYO";
    }
    if ($mes == "06") {
        $resultado = "JUNIO";
    }
    if ($mes == "07") {
        $resultado = "JULIO";
    }
    if ($mes == "08") {
        $resultado = "AGOSTO";
    }
    if ($mes == "09") {
        $resultado = "SEPTIEMBRE";
    }
    if ($mes == "10") {
        $resultado = "OCTUBRE";
    }
    if ($mes == "11") {
        $resultado = "NOVIEMBRE";
    }
    if ($mes == "12") {
        $resultado = "DICIEMBRE";
    }


    return $resultado;
}

function enviarEmail($email, $nombre, $asunto, $cuerpo) {

    require_once 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //Modificar
    $mail->Host = 'smtp.gmail.com'; //Modificar
    $mail->Port = 587; //Modificar

    $mail->Username = 'ventaflores.ecomerce@gmail.com'; //Modificar
    $mail->Password = 'capullosfloristeria'; //Modificar

    $mail->setFrom('ventaflores.ecomerce@gmail.com', 'Floristeria Capullos'); //Modificar
    $mail->addAddress($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;
    $mail->IsHTML(true);

    if ($mail->send()) {
        return true;
        echo "<script type='text/javascript'>
    console.log(" . $mail->ErrorInfo . ");
   
     </script>";
    } else {
        return false;
        echo "<script type='text/javascript'>
   console.log(" . $mail->ErrorInfo . ");
  
    </script>";
    }
}

function validatePermition($tipo) {
    //1 -> no igual
    //o ->1 si
    $acceso = 1;
    if (strcmp($tipo, "SUPER") !== 0) {
        $acceso = 0;
    }
    if (strcmp($tipo, "ADMINISTRADOR") !== 0) {
        $acceso = 0;
    }
    if (strcmp($tipo, "CLIENTE") !== 0) {
        $acceso = 1;
    }
    return $acceso;
}

function validateStatus($status) {
    //1 -> no igal
    //o ->1 si
    $acceso = 1;
    if (strcmp($status, "ACTIVE") !== 0) {
        $acceso = 0;
    }

    return $acceso;
}

?>

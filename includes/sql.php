<?php
  require_once('load.php');

  function find_all($table) {
    global $db;
    if(tableExists($table))
    {
      return find_by_sql("SELECT * FROM ".$db->escape($table));
    }
 }
 function current_user()
{
  static $current_user;
  global $db;
  if (!$current_user) {
    if (isset($_SESSION['user_id'])) :
      $user_id = intval($_SESSION['user_id']);
      $current_user = find_by_id('users', $user_id);
    endif;
  }
  return $current_user;
}
function find_by_id($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_users='{$db->escape($id)}'");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
 function tableExists($table){
    global $db;
    $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
        if($table_exit) {
          if($db->num_rows($table_exit) > 0)
                return true;
           else
                return false;
        }
    }
 function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
  return $result_set;
}

function allCategories()
{
  global $db;
  $sql  = " SELECT * FROM category  ORDER BY  id_category DESC";
  return find_by_sql($sql);
}
function allOccasionss()
{
  global $db;
  $sql  = "SELECT * FROM occasions  ORDER BY  id_ocaciones DESC";
  return find_by_sql($sql);
}

function allProducts($limite)
{
  global $db;
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions order by id_product DESC limit ".$limite;
  return find_by_sql($sql);
}
function allProductsAdmin()
{
  global $db;

$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions  order by id_product DESC";
  return find_by_sql($sql);
}


function allProducts2($limite1,$limite2)
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
/* $sql  = "SELECT product.id_product,
 product.namep,
     product.image_product,
     product.description,
     product.price,
     category.name,
     product.status,
     product.offer
FROM product INNER JOIN category ON product.category=category.id_category;";*/
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions order by id_product DESC limit ".$limite1.",".$limite2;
  return find_by_sql($sql);
}
function searchProduct($id_product)
{
  global $db;
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions WHERE  id_product =".$id_product;
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}
function countProducts()
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
 $sql  = "SELECT count(*) as total FROM  product; ";
 $result = $db->query($sql);
 return ($db->fetch_assoc($result));
}

function countUsersClientes()
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
 $sql  = "SELECT count(*) as total FROM  users WHERE type ='CLIENTE'";
 $result = $db->query($sql);
 return ($db->fetch_assoc($result));
}


function users($id)
{
  global $db;
  $sql  = " SELECT * FROM users  WHERE  id_users = '$id'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


function usersAdmin()
{
  global $db;
  $sql  = " SELECT * FROM users WHERE type = 'ADMINISTRADOR'";
  return find_by_sql($sql);
}

function usersEmail($email)
{
  global $db;
  $sql  = "SELECT count(email) as total FROM  users WHERE email = '$email'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


function buttonProductOrderDesc($limite)
{
  global $db;
  $sql  = "SELECT * FROM product   order by id_product DESC limit ".$limite;
  return find_by_sql($sql);
}
function allOccasionsByCategory()
{
  global $db;
  $sql  = "SELECT * FROM occasions o INNER JOIN category c ON o.category=c.id_category ";
  return find_by_sql($sql);
}
function allProductsSearch($busqueda)
{
  global $db;
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions
WHERE  
p.namep  LIKE '%".$busqueda."%' OR
    p.description  LIKE '%".$busqueda."%' OR
    p.price LIKE '%".$busqueda."%' OR
    c.name LIKE '%".$busqueda."%' OR
    p.status LIKE '%".$busqueda."%' OR
    p.offer LIKE '%".$busqueda."%' OR
    o.name_ocaciones LIKE '%".$busqueda."%' OR
c.name LIKE '%".$busqueda."%'  
 order by id_product DESC" ;
 $result = $db->query($sql);
 return ($result);
}
function productByOccassions($busqueda)
{
  global $db;
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions 
WHERE  

    o.name_ocaciones LIKE '%".$busqueda."%' 

 order by id_product DESC limit 3 ;" ;
 $result = $db->query($sql);
 return ($result);
}
function productForOccassions($name)
{
  global $db;
$sql ="SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    p.offer,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions 
WHERE  
   o.name_ocaciones = '".$name."'
 order by id_product DESC ;";
 $result = $db->query($sql);
 return ($result);
}
function existOccasions($name)
{
  global $db;
  $sql  = "SELECT count(*) as total FROM  occasions WHERE name_ocaciones = '$name'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}
function existProduct($id)
{
  global $db;
  $sql  = "SELECT count(*) as total FROM  product WHERE id_product = '$id'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}


function authenticate($email = '', $password = '')
{
  global $db;
  $email = $db->escape($email);
  $password = $db->escape($password);
  // $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $sql  = sprintf("SELECT id_users,password FROM users WHERE email ='".$email."' LIMIT 1");
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user['id_users'];
    }
  }
  return false;
}
function updateLastLogIn($user_id)
{
  global $db;
  $date = make_date();
  $sql = "UPDATE users SET last_login='{$date}' WHERE id_users ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
}

function typeUser($id)
{
  global $db;
$sql ="SELECT type FROM users WHERE id_users = '".$id."' ";
$result = $db->query($sql);
return ($db->fetch_assoc($result));
}

function page_require_tipo($require_level)
{
  global $session;
  global $db;
  $sql = "SELECT type FROM users WHERE   type = '$require_level'";
  $result = $db->query($sql);
  return ($db->fetch_assoc($result));
}

<?php
  require_once('load.php');

  function find_all($table) {
    global $db;
    if(tableExists($table))
    {
      return find_by_sql("SELECT * FROM ".$db->escape($table));
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
  $sql  = " SELECT * FROM category  ORDER BY  id DESC";
  return find_by_sql($sql);
}

function allProducts()
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
 $sql  = "SELECT product.idproduct,
 product.namep,
     product.image_product,
     product.description,
     product.price,
     category.name,
     product.status,
     product.offer
FROM product INNER JOIN category ON product.category=category.id;";
  return find_by_sql($sql);
}

function countProducts()
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
 $sql  = "SELECT count(*) as total FROM  product; ";
 $result = $db->query($sql);
 return ($db->fetch_assoc($result));
}

function countUsers()
{
  global $db;
 // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
 $sql  = "SELECT count(*) as total FROM  users";
 $result = $db->query($sql);
 return ($db->fetch_assoc($result));
}


function users($id)
{
  global $db;
  $sql  = " SELECT * FROM users  WHERE  idusers = '$id'";
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
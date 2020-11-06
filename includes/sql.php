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
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions order by id_product DESC limit ".$limite;
  return find_by_sql($sql);
}
function allProductsAdmin()
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

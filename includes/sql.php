<?php

require_once('load.php');

function find_all($table) {
    global $db;
    if (tableExists($table)) {
        return find_by_sql("SELECT * FROM " . $db->escape($table));
    }
}

function current_user() {
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

function find_by_id($table, $id) {
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

function tableExists($table) {
    global $db;
    $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->escape($table) . '"');
    if ($table_exit) {
        if ($db->num_rows($table_exit) > 0)
            return true;
        else
            return false;
    }
}

function find_by_sql($sql) {
    global $db;
    $result = $db->query($sql);
    $result_set = $db->while_loop($result);
    return $result_set;
}

function allCategories() {
    global $db;
    $sql = " SELECT * FROM category  WHERE status = 'ACTIVE' ORDER BY  id_category DESC";
    return find_by_sql($sql);
}

function allCategoriesAdmin() {
    global $db;
    $sql = " SELECT * FROM category  ORDER BY  id_category DESC";
    return find_by_sql($sql);
}

function allCountry() {
    global $db;
    $sql = " SELECT * FROM country ";
    return find_by_sql($sql);
}

function lastOrders() {
    global $db;
    $sql = "SELECT * from orders ORDER by  id_orders DESC LIMIT 1";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function lastSoldProduct() {
    global $db;
    $sql = "SELECT * from sold_products ORDER by  id_soldProduct DESC LIMIT 1";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function allCity() {
    global $db;
    $sql = " SELECT * FROM city ";
    return find_by_sql($sql);
}

function allState() {
    global $db;
    $sql = " SELECT * FROM state ";
    return find_by_sql($sql);
}

function allStateActive() {
    global $db;
    $sql = " SELECT * FROM state WHERE status = 'ACTIVE' ";
    return find_by_sql($sql);
}

function ordersSearch($order) {
    global $db;
    $sql = " SELECT * FROM orders  WHERE order_code = '$order'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function allOccasionss() {
    global $db;
    $sql = "SELECT * FROM occasions  ORDER BY  id_ocaciones DESC";
    return find_by_sql($sql);
}

function allShippingCity() {
    global $db;

    $sql = "SELECT c.name_country,
s.name_state,
 cc.name_city
FROM country c INNER JOIN state s ON c.id=s.country_id
INNER JOIN city cc  ON s.id = cc.state_id  ; ";
    return find_by_sql($sql);
}

function allProducts($limite) {
    global $db;
    $sql = "SELECT p.id_product,
    p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
    FROM product p INNER JOIN category c ON p.category=c.id_category 
    INNER JOIN occasions o  ON o.id_ocaciones = p.occasions  WHERE p.status = 'ACTIVE' 
    order by id_product DESC limit " . $limite;
    return find_by_sql($sql);
}

function allProductsAdmin() {
    global $db;

    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions WHERE additions ='NO' order by id_product DESC";
    return find_by_sql($sql);
}

function allAditionsAdmin() {
    global $db;

    $sql = "SELECT * FROM product   where additions = 'SI'  order by id_product DESC";
    return find_by_sql($sql);
}

function productByAdditions() {
    global $db;

    $sql = "SELECT * FROM product   where additions = 'SI'  order by id_product DESC";
    return find_by_sql($sql);
}

function searchProductByAdditions($id) {
    global $db;

    $sql = "SELECT * FROM product   where additions = 'SI' AND id_product = '" . $id . "'  order by id_product DESC";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function allProducts2($limite1, $limite2) {
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
      FROM product INNER JOIN category ON product.category=category.id_category;"; */
    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions  WHERE p.status = 'ACTIVE' order by id_product DESC limit " . $limite1 . "," . $limite2;
    return find_by_sql($sql);
}

        function searchProduct($id_product) {
            global $db;
            $sql = "SELECT p.id_product,
            p.namep,
            p.image_product,
            p.description,
            p.price,
            c.name,
            p.status,
            p.secondary_sentences,
            o.name_ocaciones
            FROM product p INNER JOIN category c ON p.category=c.id_category 
            INNER JOIN occasions o  ON o.id_ocaciones = p.occasions WHERE  id_product =" . $id_product;
            $result = $db->query($sql);
            return ($db->fetch_assoc($result));
        }

    function searchProductCarrito($id_product) {
        global $db;
        $sql = "SELECT *
        FROM product where  id_product =" . $id_product;
        $result = $db->query($sql);
        return ($db->fetch_assoc($result));
    }

function historyShopping($id_user) {
    global $db;
    $sql = "SELECT  p.id_product,
    p.namep,
        p.image_product,
        p.description,
        p.price,
         p.secondary_sentences,
        s.id_shipping,
        s.note,
        s.country,
        s.state,
        s.city,
        s.address1,
        s.address2,
        s.names,
        s.phone,
        s.request_status,
        s.from,
        s.for,
        s.message,
        o.date,
        o.quantity,
        o.subtotal,
        o.amount,
        o.order_code,
        o.status,
        o.payment_method 
        FROM product p INNER JOIN orders o  on p.id_product  = o.id_product INNER JOIN  shipping s  on s.id_orders = o.id_orders AND s.id_user =" . $id_user . " ORDER BY s.id_orders DESC";
    return find_by_sql($sql);
}

function historyShoppingPending() {
    global $db;
    $sql = "SELECT  p.id_product,
    p.namep,
        p.image_product,
        p.description,
        p.price,
       
        p.additions,
         p.secondary_sentences,
        s.id_shipping,
        s.note,
        s.country,
        s.state,
        s.city,
        s.address1,
        s.address2,
        s.names,
        s.phone,
        s.request_status,
        s.from,
        s.for,
        s.message,
        o.date,
        o.quantity,
        o.subtotal,
        o.amount,
        o.order_code,
        o.status,
        o.payment_method ,
        o.bank
        FROM product p INNER JOIN orders o  on p.id_product  = o.id_product INNER JOIN  shipping s  on s.id_orders = o.id_orders AND  s.request_status = 'PENDIENTE' order by s.id_shipping  DESC";
    return find_by_sql($sql);
}

function historyShoppingCompleted() {
    global $db;
    $sql = "SELECT  p.id_product,
    p.namep,
        p.image_product,
        p.description,
        p.price,
         p.secondary_sentences,
         p.additions,
        s.id_shipping,
        s.note,
        s.country,
        s.state,
        s.city,
        s.address1,
        s.address2,
        s.names,
        s.phone,
        s.date_complete,
        s.request_status,
        s.from,
        s.for,
        s.message,
        o.date,
        o.quantity,
        o.subtotal,
        o.amount,
        o.order_code,
        o.status,
        o.payment_method ,
        o.bank
        FROM product p INNER JOIN orders o  on p.id_product  = o.id_product INNER JOIN  shipping s  on s.id_orders = o.id_orders AND  s.request_status = 'COMPLETADO'";
    return find_by_sql($sql);
}

function countProducts() {
    global $db;
    // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
    $sql = "SELECT count(*) as total FROM  product; ";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function countSoldProducts() {
    global $db;
    // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
    $sql = "SELECT COUNT(*) as total FROM sold_products;";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function countShippingStatus($dato2) {
    global $db;
    // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
    $sql = "SELECT COUNT(*) as total  FROM shipping where request_status = '$dato2'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function totalSoldProducts() {
    global $db;
    // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
    $sql = "SELECT SUM(total)  as total FROM sold_products";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function countUsersClientes() {
    global $db;
    // $sql  = " SELECT  * FROM product INNER JOIN category  WHERE product.category = category.id;";
    $sql = "SELECT count(*) as total FROM  users WHERE type ='CLIENTE'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function users($id) {
    global $db;
    $sql = " SELECT * FROM users  WHERE  id_users = '$id'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function gainMonth($mes) {
    global $db;
    $año = getYear();
    $sql = " SELECT * FROM sold_products s INNER JOIN product p  on p.id_product  = s.id_product WHERE mes = '$mes' and año= '$año' order by s.id_soldProduct DESC";
    return find_by_sql($sql);
}

function gainMonthYear($mes, $año) {
    global $db;
    $sql = " SELECT * FROM sold_products s INNER JOIN product p  on p.id_product  = s.id_product WHERE mes = '$mes' AND año='$año'";
    return find_by_sql($sql);
}

function gainYear($año) {
    global $db;
    $sql = " SELECT * FROM sold_products s INNER JOIN product p  on p.id_product  = s.id_product WHERE año='$año'";
    return find_by_sql($sql);
}

function gainProduct($product) {
    global $db;
    $sql = "SELECT * FROM sold_products s INNER JOIN product p  on p.id_product  = s.id_product WHERE s.id_product=" . $product;
    return find_by_sql($sql);
}

function gainMonths($mes) {
    global $db;
    $año = getYear();
    $sql = "SELECT mes, sum(total) as total FROM sold_products  WHERE mes = '$mes' and año = '" . $año . "'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function manageData() {
    global $db;
    $sql = "SELECT * FROM company_configuration";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function usersAdmin() {
    global $db;
    $sql = " SELECT * FROM users WHERE type = 'ADMINISTRADOR'";
    return find_by_sql($sql);
}

function usersEmail($email) {
    global $db;
    $sql = "SELECT count(email) as total FROM  users WHERE email = '$email'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function allEmail($email) {
    global $db;
    $sql = "SELECT id_users, name, surname FROM  users WHERE email = '$email'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function buttonProductOrderDesc($limite) {
    global $db;
    $sql = "SELECT * FROM product   order by id_product DESC limit " . $limite;
    return find_by_sql($sql);
}

function generaTokenPass($user_id) {
    global $db;
    $token = generateToken();
    $db->query("UPDATE users SET token_password = '" . $token . "', password_request = '1' WHERE id_users ='" . $user_id . "'");

    return $token;
}

function allOccasionsByCategory() {
    global $db;
    $sql = "SELECT * FROM occasions o INNER JOIN category c ON o.category=c.id_category ";
    //$sql  = "SELECT o.id_ocaciones,o.name_ocaciones , c.name FROM occasions o INNER JOIN category c ON o.category=c.id_category ; ";
    $result = $db->query($sql);
    return ($result);
}

function allOccasions() {
    global $db;
    $sql = "SELECT * FROM occasions  WHERE status = 'ACTIVE'";
    return find_by_sql($sql);
}

function stateSearch($id) {
    global $db;
    $sql = "SELECT  * FROM state WHERE id = '$id'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function allProductsSearch($busqueda) {
    global $db;
    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,

    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions
WHERE  
p.namep  LIKE '%" . $busqueda . "%' OR
    p.description  LIKE '%" . $busqueda . "%' OR
    p.price LIKE '%" . $busqueda . "%' OR
    c.name LIKE '%" . $busqueda . "%' OR
    p.status LIKE '%" . $busqueda . "%' OR
 
    o.name_ocaciones LIKE '%" . $busqueda . "%' OR
c.name LIKE '%" . $busqueda . "%'  
 order by id_product DESC";
    $result = $db->query($sql);
    return ($result);
}

function productByOccassions($busqueda) {
    global $db;
    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions 
WHERE  

    o.name_ocaciones LIKE '%" . $busqueda . "%' 

 order by id_product DESC limit 3 ;";
    $result = $db->query($sql);
    return ($result);
}

function productForOccassions($name) {
    global $db;
    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions 
WHERE  
   o.name_ocaciones = '" . $name . "' OR p.secondary_sentences  LIKE '%" . $name . "%'
 order by id_product DESC ;";
    $result = $db->query($sql);
    return ($result);
}

function productForCategory($name) {
    global $db;
    $sql = "SELECT p.id_product,
p.namep,
    p.image_product,
    p.description,
    p.price,
    c.name,
    p.status,
    o.name_ocaciones
FROM product p INNER JOIN category c ON p.category=c.id_category 
INNER JOIN occasions o  ON o.id_ocaciones = p.occasions 
WHERE  
   c.name = '" . $name . "'
 order by id_product DESC ;";
    $result = $db->query($sql);
    return ($result);
}

function existOccasions($name) {
    global $db;
    $sql = "SELECT count(*) as total FROM  occasions WHERE name_ocaciones = '$name'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function existCategory($name) {
    global $db;
    $sql = "SELECT count(*) as total FROM  category WHERE name = '$name'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function existProduct($id) {
    global $db;
    $sql = "SELECT count(*) as total FROM  product WHERE id_product = '$id'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function verificaTokenPass($user_id, $token) {
    global $db;
    $sql = "SELECT count(*) as total  FROM users where id_users = '$user_id' AND token_password ='$token' AND password_request=1 ";
    $result = $db->query($sql);
    $num = $db->fetch_assoc($result);
    if ($num['total'] >= 1) {
        return true;
    } else {
        return false;
    }
}

    function authenticate($email = '', $password = '') {
        global $db;
        $email = $db->escape($email);
        $password = $db->escape($password);
        $sql = sprintf("SELECT id_users,password FROM users WHERE email ='" . $email . "' LIMIT 1");
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

function updateLastLogIn($user_id) {
    global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id_users ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
}

function typeUser($id) {
    global $db;
    $sql = "SELECT type FROM users WHERE id_users = '" . $id . "' ";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

function page_require_tipo($id) {
    global $session;
    global $db;
    $sql = "SELECT type FROM users WHERE   id_users = '$id'";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
}

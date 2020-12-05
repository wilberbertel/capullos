<?php
$user = current_user();
if (!$session->isUserLoggedIn(true) || validatePermition($user['type']) == 0 || validateStatus($user['status']) == 0) {
    redirect('../index.php', false);
}
?>
<?php if ($session->isUserLoggedIn(true)) : ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="Assets/images/avatar.png" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><?php echo $user['name'], $user['surname'] ?></p>
                <p class="app-sidebar__user-designation"><?php echo $user['type'] ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li><a class="app-menu__item" href="products.php"><i class="app-menu__icon fa fa-archive" aria-hidden="true"></i><span class="app-menu__label">Productos</span></a></li>
            <li><a class="app-menu__item" href=""><i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i><span class="app-menu__label">Pedidos</span></a></li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt" aria-hidden="true"></i><span class="app-menu__label"> Categorias / Ocaciones </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="categories.php"><i class="icon fa fa-circle-o"></i>Configurar Categorias</a></li>
                    <li><a class="treeview-item" href="occasions.php"><i class="icon fa fa-circle-o"></i>Configurar Ocaciones</a></li>
                </ul>
            </li>

            <?php
            if ($user['type'] == "SUPER") {
                ?>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span class="app-menu__label"> Configurar usuarios </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="users.php"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                        <li><a class="treeview-item" href="config_users.php"><i class="icon fa fa-circle-o"></i> Configurar usuarios</a></li>
                    </ul>
                </li>
            <?php } ?>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt" aria-hidden="true"></i><span class="app-menu__label"> Pais,Municipio,Ciudad de envio </span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="shipping_city.php"><i class="icon fa fa-circle-o"></i>Agregar pais,municipio,ciudad</a></li>
                    <li><a class="treeview-item" href="country.php"><i class="icon fa fa-circle-o"></i>Lista de pais</a></li>  
                    <li><a class="treeview-item" href="state.php"><i class="icon fa fa-circle-o"></i>Lista de Municipios</a></li>  
                    <li><a class="treeview-item" href="city.php"><i class="icon fa fa-circle-o"></i>Lista de ciudades</a></li>
                </ul>
            </li>
            <li><a class="app-menu__item" href=""><i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i><span class="app-menu__label">Logout</span></a></li>
        </ul>
    </aside>
<?php endif; ?>
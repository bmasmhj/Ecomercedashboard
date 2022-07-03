<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.php">LPMS</a>
        </div>
        <div class="sidebar-user">
        <div class="sidebar-user-picture">  
        </div>
        <div class="sidebar-user-details">
            <div class="user-name"><?php echo $name?></div>
            <div class="user-role">
                Admin
            </div>
        </div>
        </div>
        <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class='<?= ($activePage == 'index') ? 'active':''; ?>'> <a href="index.php"><i class="ion ion-speedometer"></i><span>Dashboard</span></a></li>
        <li  class='<?= ($activePage == 'setting') ? 'active':''; ?>'><a href="setting.php"><i class="ion ion-gear-a"></i> Setting </a></li>
        <li class="menu-header">Records</li>
        <li  class='<?= ($activePage == 'categories') ? 'active':''; ?>'><a href="categories.php"><i class="ion ion-clipboard"></i> Categories </a></li>
        <li  class='<?= ($activePage == 'product') ? 'active':''; ?>'><a href="product.php"><i class="ion ion-bag"></i> Products</a></li>
        <li  class='<?= ($activePage == 'orders') ? 'active':''; ?>'><a href="orders.php"><i class="ion ion-cube"></i> Orders </a></li>


        <li class="menu-header">User</li>
        <li  class='<?= ($activePage == 'user') ? 'active':''; ?>'><a href="user.php"><i class="ion ion-person"></i> Users </a></li>

        <li  class='<?= ($activePage == 'contacts') ? 'active':''; ?>'>
                <a href="contacts.php"><i class="ion ion-android-mail"></i> </i><span>Contacts</span></a>
        </li>
        <li  class='<?= ($activePage == 'subscriber') ? 'active':''; ?>'>
                <a href="subscriber.php"><i class="ion ion-android-mail"></i> </i><span>Subscribers</span></a>
        </li>
    </aside>
 </div>
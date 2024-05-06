
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
      <?php if(!empty($_SESSION['_user']['photo_name'])) : ?>
              <img style="height: 40px;width: 40px;" src="<?php echo _ADMIN_URL . "/uploads/users/" . $_SESSION['_user']['photo_name']; ?>" alt="image" class="app-sidebar__user-avatar">
          <?php else: ?>
              <img style="height: 40px;width: 40px;"class="app-sidebar__user-avatar" src="<?php echo admin_url();?>/images/me.jpg" alt="User Image">
          <?php endif; ?>
      <div>
        <p class="app-sidebar__user-name"><?php echo $_SESSION['_user']['full_name']; ?></p>
        <p class="app-sidebar__user-designation"></p>
      </div>
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item active" href="<?php echo admin_url();?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?php echo admin_url();?>/pages/users.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item" href="<?php echo admin_url();?>/pages/brands.php"><i class="app-menu__icon fa fa-hand-o-right"></i><span class="app-menu__label">Brands</span></a></li>
        <li><a class="app-menu__item" href="<?php echo admin_url();?>/pages/products.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item" href="<?php echo admin_url();?>/pages/customers.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Customers</span></a></li>
        <li><a class="app-menu__item" href="<?php echo admin_url();?>/pages/orders.php"><i class="app-menu__icon fa fa-first-order"></i><span class="app-menu__label">Orders</span></a></li>
    </ul>
  </aside>
  
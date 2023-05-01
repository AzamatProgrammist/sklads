<?php 
  include 'config.php';
  $categories = $category->getCategories();
 ?>
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="/public/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="/sklads" class="nav-link"><i data-feather="monitor"></i><span>Skladlar</span></a>
            </li>
            <li class="dropdown">
              <a href="/users" class="nav-link"><i data-feather="monitor"></i><span>Users</span></a>
            </li>
            <li class="dropdown">
              <a href="/products" class="nav-link"><i data-feather="monitor"></i><span>Products</span></a>
            </li>
            <li class="menu-header">Categories product</li>
            <?php foreach ($categories as $category) { ?>
            <li class="dropdown">
              <a href="/" class="nav-link"><i data-father="monitor"></i><span><?php echo $category['category']; ?></span></a>
            </li>
          <?php } ?>
          </ul>
        </aside>
      </div>
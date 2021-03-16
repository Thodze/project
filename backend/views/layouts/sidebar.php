<?php
    use yii\helpers\Url;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= Url::to(['/']) ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Project</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= Yii::$app->controller->id == 'site' ? 'active' : '' ?> ">
        <a class="nav-link" href="<?= Url::to(['/']) ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Employees -->
    <li class="nav-item <?= Yii::$app->controller->id == 'employees' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= Url::to(['/employees']) ?>">
            <i class="fas fa-users"></i>
            <span>Employees</span></a>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item <?= Yii::$app->controller->id == 'orders' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= Url::to(['/orders']) ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span></a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item <?= Yii::$app->controller->id == 'products' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= Url::to(['/products']) ?>">
            <i class="fas fa-book-reader"></i>
            <span>Products</span></a>
    </li>

    <!-- Nav Item - Categories -->
    <li class="nav-item <?= Yii::$app->controller->id == 'categories' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= Url::to(['/categories']) ?>">
            <i class="far fa-list-alt"></i>
            <span>Categories</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Danh mục sản phẩm</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php
                getPCats();
            ?>
        </ul>
    </div>
</div>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Phân loại</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">
            <?php
                getCat();
            ?>
        </ul>
    </div>
</div>
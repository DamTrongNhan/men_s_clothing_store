<?php
$category = new category();
$showCategory = $category->list_category();
?>
<div data-id="category-list" class="container__body__content category-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Category list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="category-list-table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$showCategory) {
                    echo "<h3 class=' bg-warning p-2 rounded mb-3'>List loại sản phẩm trống!</h3>";
                } else
                    foreach ($showCategory as $cateItem) {
                ?>
                    <tr class="Cate">
                        <td class="idCate ">
                            <?php
                            echo $cateItem['catId'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo  $cateItem['catName'];
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-edit-cate">Edit</button>
                            <button class="btn btn-danger  btn-del-cate">Delete</button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
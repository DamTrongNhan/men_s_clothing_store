<div data-id="product-add" class="container__body__content product-add tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Add New Product
        </p>
    </div>
    <div class='container__body__content__content'>
        <div class="product">
            <form class="d-flex justify-content-center align-items-center flex-column" action="" enctype="multipart/form-data">
                <table class="product-table">
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Name Product</label>
                        </td>
                        <td>
                            <input id="input-name-product" name="" type="text" class="container__body__content__content__input" placeholder="Nhập tên sản phẩm tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <?php
                            $categoryUseForProduct = new category();
                            $catNameUseForProduct = $categoryUseForProduct->list_category();
                            ?>
                            <select id="select-cate-product" name="select" class="form-control">
                                <option disabled selected>Select Category</option>
                                <?php
                                if ($catNameUseForProduct) {
                                    foreach ($catNameUseForProduct as $item) {
                                ?>
                                        <option value="<?php echo $item['catId'] ?>"><?php echo $item['catName']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea id="pro-des" class="pro-des"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input id="input-price-product" name="" type="text" class="container__body__content__content__input" placeholder="Nhập giá sản phẩm tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="size" class=" mb-3">Số lượng Size S (Quần, áo,..)</label>
                        <td>
                            <input type="number" min="0" id="sizeS" name="size" class="form-control">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="size" class=" mb-3">Số lượng Size M (Quần, áo,..)</label>
                        <td>
                            <input type="number" min="0" id="sizeM" name="size" class="form-control">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="size" class=" mb-3">Số lượng Size L (Quần, áo,..)</label>
                        <td>
                            <input type="number" min="0" id="sizeL" name="size" class="form-control">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="size" class=" mb-3">Số lượng Size XL (Quần, áo,..)</label>
                        <td>
                            <input type="number" min="0" id="sizeXL" name="size" class="form-control">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="size" class=" mb-3">Số lượng loại hàng không size (Phụ kiện Accessories) </label>
                        <td>
                            <input type="number" min="0" id="quantityAnother" name="size" class="form-control">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input id="pro-img" type="file" />
                        </td>
                    </tr>
                </table>
                <button type="submit" id="btn-addProduct" name="" class="w-100 container__body__content__content__btn btn btn-primary mt-3">
                    Add
                </button>
            </form>
        </div>
    </div>
</div>
<h1>Thêm sản phẩm</h1>

<div>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 200px;" class="form-outline" data-mdb-input-init>
            <input type="number" min="1" value="1" id="countColumn" class="form-control" />
            <label class="form-label" for="countColumn">Số lượng sản phẩm</label>
        </div>
        <div>
            <button id="btnAdd" type="button" class="btn btn-primary" data-mdb-ripple-init>Thêm sản phẩm</button>
        </div>
    </div>
    <div id="products" style="margin-top: 30px;"></div>
</div>
<script>
    const products = document.getElementById('products');
    const countColumn = document.getElementById('countColumn');
    countColumn.addEventListener('input', function() {
        products.innerHTML = "";
        for (let i = 0; i < this.value; i++) {
            const itemAddProduct = document.createElement('div');
            itemAddProduct.classList.add('itemAddProduct');
            itemAddProduct.style.width = '100%';
            itemAddProduct.innerHTML = `
                <div>
                    <div>
                        <label for="imgUpload${i}">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <input type="file" name="imgUpload" id="imgUpload${i}" hidden multiple>
                    </div>
                    <div class="image-preview" id="imagePreview${i}"></div>
                    <div>
                        <input type="text" class="ProductName" name="ProductName" placeholder="Tên sản phẩm">
                    </div>
                    <div>
                        <label for="price">Giá cơ bản</label>
                        <input type="text" class="ProductPrice" name="ProductPrice" id="price">
                    </div>
                </div>
                <div>
                    <select name="category">
                        <option>Chọn danh mục</option>
                    </select>
                    <select name="category_Detail">
                        <option>Chọn danh mục con</option>
                    </select>
                    <select name="category_Detail_Product">
                        <option>Chọn chi tiết danh mục</option>
                     </select>
                </div>
                <div>
                    <label for="size">Kích cỡ</label>
                    <select class="sizeChoice" name="sizeChoice"></select>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>Kích cỡ</tr>
                            <tr>Giá Tùy chọn</tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            `;

            products.appendChild(itemAddProduct);

        }
        $.ajax({
            type: "GET",
            url: "http://<?php echo $_SERVER['HTTP_HOST'] ?>/PNJSHOP/Category/GetCategory/",
            dataType: "json",
            success: function(response) {
                const category = document.querySelectorAll("select[name='category']");
                category.forEach(element => {
                    const parent = element.parentElement.parentElement;
                    const childNode = parent.querySelector("select[name='category']");
                    response.data.forEach(data => {
                        const option = document.createElement('option');
                        option.value = data.CATEGORYID;
                        option.innerHTML = data.CATEGORYNAME;
                        childNode.appendChild(option);
                    })
                })

            }
        });
        $.ajax({
            type: "GET",
            url: "http://<?php echo $_SERVER['HTTP_HOST'] ?>/PNJSHOP/Size/GetSize/",
            dataType: "json",
            success: function(response) {
                const sizes = document.querySelectorAll("select[name='sizeChoice']");
                sizes.forEach(element => {
                    const parent = element.parentElement.parentElement;
                    const childNode = parent.querySelector("select[name='sizeChoice']");
                    response.data.forEach(data => {
                        const option = document.createElement('option');
                        option.value = data.SIZEID;
                        option.innerHTML = data.DESCRIPTION_SIZE;
                        childNode.appendChild(option);
                    })
                })

            }
        });
        const Category = document.querySelectorAll("select[name='category']");
        Category.forEach(element => {
            element.addEventListener('change', (e) => {
                $.ajax({
                    type: "GET",
                    url: `http://<?php echo $_SERVER['HTTP_HOST'] ?>/PNJSHOP/Category/GetCategoryDetail/${e.target.value}`,
                    dataType: "json",
                    success: function(response) {
                        const parent = element.parentElement.parentElement;
                        const childNode = parent.querySelector("select[name='category_Detail']");
                        childNode.innerHTML = "";
                        response.data.forEach(data => {
                            const option = document.createElement('option');
                            option.value = data.CATEGORY_ATTRIBUTEID;
                            option.innerHTML = data.CATEGORY_ATTRIBUTENAME;
                            childNode.appendChild(option);
                        })

                    }
                });
            })
        })
        const Category_Detail = document.querySelectorAll("select[name='category_Detail']");
        Category_Detail.forEach(element => {
            element.addEventListener('change', (e) => {
                console.log(e.target.value);
                $.ajax({
                    type: "GET",
                    url: `http://<?php echo $_SERVER['HTTP_HOST'] ?>/PNJSHOP/Category/GetCategoryDetail_Product/${e.target.value}`,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.data);
                        const parent = element.parentElement.parentElement;
                        const childNode = parent.querySelector("select[name='category_Detail_Product']");
                        childNode.innerHTML = "";
                        response.data.forEach(data => {
                            const option = document.createElement('option');
                            option.value = data.CATEGORY_ATTRIBUTES_DETAILID;
                            option.innerHTML = data.CATEGORY_ATTRIBUTES_DETAILNAME;
                            childNode.appendChild(option);
                        })

                    }
                });
            })
        })
        const allSelects = document.querySelectorAll('.sizeChoice');
        allSelects.forEach((select, index) => {
            select.addEventListener("change", (e) => {
                const parent = select.parentElement.parentElement;
                const bodyTable = parent.querySelector("tbody");
                console.log(bodyTable);
                const tr = document.createElement("tr");
                tr.innerHTML = `
                        <td>Kích cỡ 
                            <input type="text" value="${select.value}" readonly name="Size" id="">
                        </td>
                        <td>
                            <input type="number" name="priceSize" id="">
                        </td>

            `
                bodyTable.appendChild(tr);
            })
        });
    });
    const btn = document.querySelector("#btnAdd");
    btn.addEventListener("click", () => {
        const productName = document.querySelectorAll(".ProductName");
        const price = document.querySelectorAll(".ProductPrice");
        const detail = document.querySelectorAll("select[name=category_Detail_Product]");
        const products = [];
        productName.forEach((name, index) => {
            const sizes = [];
            const productNameValue = name.value.trim();
            const priceValue = price[index].value.trim();
            const detailCategory = detail[index].value;
            console.log(detail);
            const sizeParent = name.parentElement.parentElement.parentElement;
            const trs = sizeParent.querySelectorAll("tbody tr");
            trs.forEach(tr => {
                const input = tr.querySelectorAll("input");
                sizes.push({
                    sizeName: input[0].value,
                    sizePrice: input[1].value,
                })
            })
            if (productNameValue !== '' && priceValue !== '') {
                products.push({
                    ProductName: productNameValue,
                    ProductPrice: priceValue,
                    ProductCategoryDetail: detailCategory,
                    Sizes: sizes
                });
            }
        });
        console.log(products);
    });
</script>
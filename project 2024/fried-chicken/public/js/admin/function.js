//sử lý show danh mục
function showSubcategories(parentId) {
    // Gửi AJAX request để lấy danh mục con
    $.ajax({
        url: `/category/subcategories/${parentId}`,
        method: "GET",
        success: function (data) {
            let tbody = $("#subcategoriesTable tbody");
            tbody.empty();
            if (data.length > 0) {
                data.forEach(function (subcategory, index) {
                    tbody.append(`
                            <tr>
                                <th scope="row">${index + 1}</th>
                                <td>${subcategory.name}</td>
                                <td>${subcategory.slug}</td>
                                <td>${subcategory.desc ?? ""}</td>
                            </tr>
                        `);
                });
            } else {
                tbody.append(
                    `<tr><td colspan="4">Không có danh mục con nào</td></tr>`
                );
            }
        },
    });
}

// Update this part of the JavaScript code
$(document).ready(function () {
    $(".btn-edit-user").on("click", function(){
        var userId = $(this).data("id");
        var userName = $(this).data("name");
        var userEmail = $(this).data("email");
        var userRoles = $(this).data("roles");
         // Chuyển đổi chuỗi JSON thành mảng (nếu chưa)
    if (typeof userRoles === "string") {
        userRoles = JSON.parse(userRoles);
    }

        console.log('Infomation user:', userId, userName, userEmail, userRoles);
        // Đưa dữ liệu vào modal
        $('#editUserModal input[name="user_id"]').val(userId);
        $('#editUserModal input[name="name"]').val(userName);
        $('#editUserModal input[name="email"]').val(userEmail);
        $('#editUserModal select[name="role_id[]"]').val(userRoles).trigger('change');    
        // Hiển thị modal
        $("#editUserModal").modal("show");
    });
    $(".btn-edit-page").on("click", function(){
        var pageId = $(this).data("id");
        var pageTitle = $(this).data("title");
        var pageContent = $(this).data("content");
        var pageStatus = $(this).data("status");

        console.log("Infomation page", pageId, pageTitle, pageContent, pageStatus);

        $('#editPageModal input[name="page_id"]').val(pageId);
        $('#editPageModal input[name="title"]').val(pageTitle);
        $('#editPageModal input[name="content"]').val(pageContent);
        $('#editPageModal select[name="status"]').val(pageStatus);    
        
        var formAction = baseUrl + "/admin/page/update/" + pageId;
        $("#editPageModal").attr("action", formAction);

        $("#editPageModal").modal("show");

    });
    // Bắt sự kiện click vào nút Edit
    $(".btn-edit-category-post").on("click", function () {
        var categoryId = $(this).data("id");
        var categoryName = $(this).data("name");
        var categoryDesc = $(this).data("desc");
        
        var categoryParentId = $(this).data("parent_id");

        // Điền dữ liệu vào modal
        $("#editCategoryModal #edit_name").val(categoryName);
        $("#editCategoryModal #edit_parent_id").val(categoryParentId);

        // Dynamically build the form action with the base URL and category ID
        var formAction = baseUrl + "/category/post/update/" + categoryId;
        $("#editCategoryForm").attr("action", formAction);

        if (tinymce.get("mytextarea")) {
            tinymce.get("mytextarea").setContent(categoryDesc);
        } else {
            console.log("TinyMCE editor has not been initialized.");
        }
        // Hiển thị modal
        $("#editCategoryModal").modal("show");
    });

    $(".btn-edit-category-product").on("click", function () {
        var categoryId = $(this).data("id");
        var categoryName = $(this).data("name");
        var categoryDesc = $(this).data("desc");
        var categoryParentId = $(this).data("parent_id");

        // Điền dữ liệu vào modal
        $("#editCategoryModal #edit_name").val(categoryName);
        $("#editCategoryModal #edit_desc").val(categoryDesc);
        $("#editCategoryModal #edit_parent_id").val(categoryParentId);
        tinymce.remove("#mytextareaEditCategoryProduct"); 
        tinymce.init({
            selector: "#mytextareaEditCategoryProduct",
            height: 200,
            setup: function (editor) {
                editor.on('init', function () {
                    editor.setContent(categoryDesc); // Set nội dung TinyMCE khi mở modal
                });
            }
        });
        // Dynamically build the form action with the base URL and category ID
        var formAction = baseUrl + "/category/product/update/" + categoryId;
        $("#editCategoryForm").attr("action", formAction);

        // Hiển thị modal
        $("#editCategoryModal").modal("show");
    });

    // Bắt sự kiện click vào nút Edit cho bài viết
    $(".btn-edit-post").on("click", function () {
        var postId = $(this).data("id");
        var postTitle = $(this).data("title");
        var postNote = $(this).data("note");
        var postContent = $(this).data("content");
        var postCategory = $(this).data("category-id");
        var postStatus = $(this).data("status");
        let imageUrl = $(this).data("image");
        console.log("Post content",postId, postTitle, postContent, postCategory, postStatus, imageUrl);
        
        $('#editPostModal input[name="post_id"]').val(postId);
        $('#editPostModal input[name="title"]').val(postTitle);
        $('#editPostModal input[name="note"]').val(postNote);
        $('#editPostModal select[name="category_id"]').val(postCategory);
        $('#editPostModal input[name="status"]').val(postStatus);
        // Set TinyMCE
        tinymce.remove("#mytextareaEditPost"); 
        tinymce.init({
            selector: "#mytextareaEditPost",
            height: 200,
            setup: function (editor) {
                editor.on('init', function () {
                    editor.setContent(postContent); // Set nội dung TinyMCE khi mở modal
                });
            }
        });

        // Hiển thị ảnh hiện tại nếu có
        if (imageUrl) {
            $("#current_image").attr("src", imageUrl).show();
        } else {
            $("#current_image").hide();
        }

        //Set status radio button
        if (postStatus === "published") {
            $("#status_published").prop("checked", true);
        } else {
            $("#status_pending").prop("checked", true);
        }

        // Set TinyMCE
        if (tinymce.get("mytextarea")) {
            tinymce.get("mytextarea").setContent(postContent);
        } else {
            console.log("TinyMCE editor has not been initialized.");
        }
        // Hiển thị modal bài viết
        $("#editPostModal").modal("show");
    });

    $(".btn-edit-product").on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var desc = $(this).data("desc");
        var details = $(this).data("details");
        var price = $(this).data("price");
        var stockQuantity = $(this).data("stock-quantity");
        var isFeatured = $(this).data("is-featured");
        var productStatus = $(this).data("product-status");
        var categoryId = $(this).data("category-id");

        $('#editProductModal input[name="id"]').val(id);
        $('#editProductModal input[name="name"]').val(name);
        $('#editProductModal input[name="desc"]').val(desc);
        $('#editProductModal input[name="price"]').val(price);
        $('#editProductModal input[name="stock_quantity"]').val(stockQuantity);
        $('#editProductModal select[name="is_featured"]').val(isFeatured);
        $('#editProductModal select[name="product_status"]').val(productStatus);
        $('#editProductModal select[name="category_id"]').val(categoryId);

        // Set TinyMCE
        tinymce.remove("#mytextareaEditProduct");
        tinymce.init({
            selector: "#mytextareaEditProduct",
            height: 300,
            setup: function (editor) {
                editor.on('init', function () {
                    editor.setContent(details); 
                });
            }
        });

        const productImages = JSON.parse(this.getAttribute("data-images")); //chuỗi JSON -> mảng
        const imageContainer = document.querySelector(
            "#editProductModal .image-container"
        );
        imageContainer.innerHTML = "";

        productImages.forEach((imageUrl) => {
            const imgElement = document.createElement("img");
            imgElement.src = "http://localhost/project-2024/wind-e-commerce/website/public/" + imageUrl;
            imgElement.style.width = "100px";
            imgElement.style.height = "auto";
            imgElement.style.margin = "5px";
            imageContainer.appendChild(imgElement);
        });
        $("#editProductModal").modal("show");
    });

    $(".btn-edit-order").on("click", function () {
        var id = $(this).data("id");
        var fullname = $(this).data("name");
        var phone = $(this).data("phone");
        var address = $(this).data("address");
        var status = $(this).data("status");

        console.log("Data edit order", id, fullname, phone, address, status);

        $('#updateOrderModal input[name="order_id"]').val(id);
        $('#updateOrderModal input[name="fullname"]').val(fullname);
        $('#updateOrderModal input[name="phone_number"]').val(phone);
        $('#updateOrderModal input[name="address"]').val(address);
        $('#updateOrderModal select[name="status"]').val(status);

        $("#updateOrderModal").modal("show");
    });

    $(".btn-edit-customer").on("click", function () {
        var id = $(this).data("id");
        var fullname = $(this).data("fullname");
        var phone = $(this).data("phone");
        var address = $(this).data("address");
        var status = $(this).data("status");
        var email = $(this).data("email");

        console.log("Data edit customer", id, fullname, phone, address, status);

        $('#editCustomerModal input[name="customer_id"]').val(id);
        $('#editCustomerModal input[name="fullname"]').val(fullname);
        $('#editCustomerModal input[name="phone_number"]').val(phone);
        $('#editCustomerModal input[name="address"]').val(address);
        $('#editCustomerModal select[name="status"]').val(status);
        $('#editCustomerModal input[name="email"]').val(email);

        $("#editCustomerModal").modal("show");
    });
});

function submitForm(actionType) {
    const form = document.getElementById('mainForm');
    if (actionType === 'apply') {
        form.action = "{{ url('admin/product/action') }}";
    } else if (actionType === 'edit') {
        // Đặt URL cho hành động edit nếu cần
    }
    form.submit();
}


// Khi người dùng nhấn vào nút upload
$("#upload-btn").on("click", function () {
    $("#fileManagerModal").modal("show");
});

// Cấu hình TinyMCE (nếu bạn cần dùng thêm các tính năng khác)
tinymce.init({
    selector: "textarea", // hoặc textarea của bạn
    plugins: "image",
    toolbar: "image",
    file_picker_callback: function (callback, value, meta) {
        let cmsURL =
            "/laravel-filemanager?editor=" + meta.fieldname + "&type=Images";

        tinymce.activeEditor.windowManager.openUrl({
            url: cmsURL,
            title: "Quản lý hình ảnh",
            width: 800,
            height: 600,
            onMessage: (api, message) => {
                callback(message.content);
            },
        });
    },
});

// save images
document.querySelectorAll(".file-item").forEach((item) => {
    item.addEventListener("click", function () {
        const imageUrl = this.getAttribute("data-image-url"); 
        const fileName = this.getAttribute("data-file-name");
        const fileSize = this.getAttribute("data-file-size"); 

        //select image change
        selectImage(imageUrl, fileName, fileSize);
    });
});

//list images
document.getElementById("images").addEventListener("change", function (event) {
    const imagePreview = document.getElementById("image-preview");
    imagePreview.innerHTML = ""; // delete image after

    Array.from(event.target.files).forEach((file) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.style.maxWidth = "150px";
            img.style.marginRight = "10px";
            imagePreview.appendChild(img); // add image-preview
        };
        reader.readAsDataURL(file);
    });
});




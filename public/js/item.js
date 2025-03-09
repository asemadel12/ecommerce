function updateItem(id) {
    if (id) {
        let formData = new FormData($("#edit_form_item" + id)[0]);
        formData.append("product_name", $("#edit_product_name" + id).val());
        formData.append("product_description", $("#edit_product_description" + id).val());
        formData.append("category", $("#edit_category" + id).val());
        formData.append("quantity", $("#edit_quantity" + id).val());
        formData.append("price", $("#edit_price" + id).val());

        let imageFile = $("#edit_image" + id)[0].files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }

        formData.append("_method", "PUT"); // Laravel needs this to handle PUT requests

        $.ajax({
            url: "/api/admin/items/" + id, // Correct the URL to match the route
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success)
                    updateSuccessFeedback(response, id);
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                if (xhr.status == 404 || xhr.status == 500) {
                    $("#modal-feedback-msg" + id).html(`<p>${errors}</p>`).removeClass('d-none alert-success').addClass('alert-danger');
                }
                else {
                    let errorMessages = '';
                    for (let field in errors) {
                        errors[field].forEach(function (error) {
                            errorMessages += `<p>${error}</p>`;
                        });
                    }
                    $("#modal-feedback-msg" + id).html(errorMessages).removeClass('alert-success d-none').addClass('alert-danger');
                }
            }
        });
    }
}
function updateSuccessFeedback(response, itemId = null) {
    $("#modal-feedback-msg" + itemId).removeClass('alert-danger d-none').addClass('alert-success');
    $("#modal-feedback-msg" + itemId).html(response.success);
    setTimeout(() => {
        $("#modal-feedback-msg" + itemId).addClass('d-none');
    }, 3000);
    updateItemDataInGrid(itemId);
}
function updateItemDataInGrid(itemId) {
    $("#grid-item-name" + itemId).html($("#edit_product_name" + itemId).val());
    $("#grid-item-description" + itemId).html($("#edit_product_description" + itemId).val());
    $("#grid-item-category_name" + itemId).html($("#edit_category" + itemId).find(":selected").text());
    $("#grid-item-quantity" + itemId).html($("#edit_quantity" + itemId).val());
    $("#grid-item-price" + itemId).html($("#edit_price" + itemId).val());
    // $("#grid-item-image" + itemId).html($("#edit_product_name" + itemId).val());
}
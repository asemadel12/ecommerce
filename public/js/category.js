function editCategory(id) {
    if (id) {
        $("#edit-form-messages-container" + id).empty();
        let categoryId = id;
        let categoryName = $("#category_name_edit" + id).val();
        let formData = new FormData($("#edit_form_category" + id)[0]);
        formData.append("category_name", categoryName);
        let imageFile = $("#edit_image" + id)[0].files[0];
        if (imageFile) {
            formData.append("image", imageFile);
        }
        formData.append("_method", "put");

        let apiUrl = "/api/admin/categories/" + categoryId;
        $.ajax({
            url: apiUrl,
            type: "POST", // Laravel will recognize it as PUT due to _method
            data: formData,
            contentType: false, // Must be false for FormData
            processData: false, // Prevent jQuery from processing FormData
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") // Correct CSRF token
            },
            success: function (response) {
                if (response.success) {
                    $("#edit-form-messages-container" + id).html(`<p>${response.success}</p>`).removeClass('text-danger').addClass('text-success');
                    updateInfoInPage(id, categoryName);
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                if (xhr.status == 404) {
                    $("#edit-form-messages-container" + id).html(`<p>${errors}</p>`).removeClass('text-success').addClass('text-danger');
                }
                else {
                    console.log(errors);

                    let errorMessages = '';
                    for (let field in errors) {
                        errors[field].forEach(function (error) {
                            errorMessages += `<p>${error}</p>`;
                        });
                    }
                    $("#edit-form-messages-container" + id).html(errorMessages).removeClass('text-success').addClass('text-danger');
                }
            }
        });
    }
}
function updateInfoInPage(id, categoryName) {
    $("#table-category-name" + id).text(categoryName)
}
function deleteCategory(id) {
    if (id) {
        let apiUrl = "/api/admin/categories/" + id;
        $.ajax({
            url: apiUrl,
            type: "DELETE",
            data: JSON.stringify({ categoryId: id }),
            headers: {
                "X-CSRF-TOKEN": $("input[name='__token']").attr("content")
            },
            success: function (response) {
                if (response.success) {
                    $("#delete-category-msg").removeClass('d-none alert-danger').addClass('alert-success');
                    $("#delete-category-msg").html(response.success);
                    $("#table-category-row-" + id).remove();
                    setTimeout(() => {
                        $("#delete-category-msg").addClass('d-none');
                    }, 3500);
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $("#delete-category-msg").html(`<p>${errors}</p>`).removeClass('text-success d-none alert-success').addClass('text-danger alert-danger');
                }
            }
        });
    }
}
document.addEventListener('DOMContentLoaded', function () {
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    dropdownElementList.map(function (dropdownToggleEl) {
        new bootstrap.Dropdown(dropdownToggleEl);
    });
});
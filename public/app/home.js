console.log("first3");
var formModal = $("#formModal");
var titleFormModal = $("#titleModal");
var isEdit = false;
var idEdit = 0;

const table = async () => {
    $("#tableData").dataTable().fnDestroy();
    await $("#tableData").DataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [],
        ordering: true,
        ajax: {
            url: "table",
        },
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        columns: [
            { data: "id", visible: false },
            { data: "code" },
            { data: "title" },
            { data: "description" },
            { data: "action", className: "text-center" },
        ],
    });
    $(".dataTables_filter input[type=search]").attr(
        "placeholder",
        "Type to filter..."
    );
};

const addData = () => {
    titleFormModal.html("Create");
    formModal.modal("show");
};

const viewModal = async (id) => {
    $("#viewModal").modal("show");
    await $.ajax({
        type: "get",
        url: "find",
        data: { id: id },
        success: function (response) {
            if (response.code == "00") {
                $("#viewTitle").html(response.data.title);
                $("#viewDescription").html(response.data.description);
            } else {
                console.log(response.message);
            }
        },
    });
};

const updateModal = async (id) => {
    isEdit = true;
    idEdit = id;
    titleFormModal.html("Update");
    $("#formModal").modal("show");
    await $.ajax({
        type: "get",
        url: "find",
        data: { id: id, isEdit: isEdit },
        success: function (response) {
            $("#formTitle").val(response.data.title);
            $("#formDescription").val(response.data.description);
        },
    });
};

const deleteData = async (id) => {
    Swal.fire({
        title: "Confirmation",
        text: "Are you sure want to delete this data?",
        icon: "warning",
        showCancelButton: true,
        reverseButtons: true,
    }).then(async (result) => {
        if (result.isConfirmed) {
            await $.ajax({
                type: "post",
                url: "delete",
                data: { id: id },
                success: function (response) {
                    if (response.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                        });
                        reset();
                        table();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                        });
                    }
                },
            });
        }
    });
};

const closeModal = () => {
    reset();
    formModal.modal("hide");
};

$("#saveButton").on("click", () => {
    Swal.fire({
        title: "Confirmation",
        text: isEdit
            ? "Are you sure want to edit this data?"
            : "Are you sure want to save this data?",
        icon: "warning",
        showCancelButton: true,
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: isEdit ? "update" : "insert",
                data: {
                    title: $("#formTitle").val(),
                    description: $("#formDescription").val(),
                    id: idEdit,
                },
                success: (res) => {
                    if (res.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: res.message,
                            icon: "success",
                        });
                        closeModal();
                        reset();
                        table();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: res.message,
                            icon: "error",
                        });
                    }
                },
                error: (error) => {
                    console.log(error);
                    Swal.fire({
                        title: "Error",
                        text: error,
                        icon: "error",
                    });
                },
            });
        }
    });
});

const reset = () => {
    $("#formTitle").val("");
    $("#formDescription").val("");
    isEdit = false;
    idEdit = 0;
};

table();

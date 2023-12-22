var idEdit;

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
            url: "output-table",
        },
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100, "All"],
        ],
        columns: [
            { data: "id", visible: false },
            { data: "ganjil" },
            { data: "genap" },
            { data: "action", className: "text-center" },
        ],
    });
    $(".dataTables_filter input[type=search]").attr(
        "placeholder",
        "Type to filter..."
    );
};

const updateModal = async (id) => {
    idEdit = id;
    $("#formModal").modal("show");
    await $.ajax({
        type: "get",
        url: "output-find",
        data: { id: id },
        success: function (response) {
            $("#formNoHp").val(response.data.no_hp);
        },
    });
};

const deleteData = async (id) => {
    Swal.fire({
        title: "Confirmation",
        text: "Are you sure want to save this data?",
        icon: "warning",
        showCancelButton: true,
        reverseButtons: true,
    }).then(async (result) => {
        if (result.isConfirmed) {
            await $.ajax({
                type: "post",
                url: "output-delete",
                data: { id: id },
                success: function (response) {
                    if (response.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                        });
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

$("#saveButton").on("click", () => {
    Swal.fire({
        title: "Confirmation",
        text: "Are you sure want to save this data?",
        icon: "warning",
        showCancelButton: true,
        reverseButtons: true,
    }).then(async (result) => {
        if (result.isConfirmed) {
            await $.ajax({
                type: "post",
                url: "output-update",
                data: { id: idEdit, noHp: $("#formNoHp").val() },
                success: function (response) {
                    if (response.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                        });
                        closeModal();
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
});

const reset = () => {
    idEdit = 0;
    $("#formNoHpm").val("");
};

const closeModal = () => {
    $("#formModal").modal("hide");
};

table();

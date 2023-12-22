const selectProvider = async () => {
    await $.ajax({
        type: "get",
        url: "get-provider",
        success: (res) => {
            if (res.code == "00") {
                $("#selectProvider").empty();
                $("#selectProvider").append(`
                <option disabled selected>SELECT PROVIDER</option>
                `);
                for (let data of res.data) {
                    $("#selectProvider").append(`
                    <option value="${data.id}">${data.name}</option>
                    `);
                }
            }
        },
    });
};

selectProvider();

$("#saveManual").on("click", () => {
    console.log("manual");
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
                url: "insert-manual",
                data: {
                    no_hp: $("#noHp").val(),
                    provider: $("#selectProvider").val(),
                },
                success: function (response) {
                    if (response.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                        });
                        reset();
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

$("#saveAuto").on("click", () => {
    console.log("auto");
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
                url: "insert-auto",
                success: function (response) {
                    if (response.code == "00") {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                        });
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
    $("#noHp").val("");
    $("#selectProvider").val("");
};

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// $(document).on({
//     ajaxStart: () => {
//         $("#loadingScreen").css("display", "flex");
//     },
//     ajaxStop: () => {
//         $("#loadingScreen").css("display", "none");
//     },
//     ajaxError: (error) => {
//         $("#loadingScreen").css("display", "none");
//         Swal.fire({
//             title: "Error",
//             text: error,
//             icon: "error",
//         });
//     },
// });

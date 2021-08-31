//sweetelaert delete data
$(document).on("click", ".btn-hapus", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      document.forms["actionformdelete"].submit();
    }
  });
});

//sweetalert cancel button
$(document).on("click", ".btn-cancel", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");
  Swal.fire({
    title: "Buang perubahan?",
    showCancelButton: true,
    confirmButtonText: `Buang`,
    confirmButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

//bulma cancel notification
document.addEventListener("DOMContentLoaded", () => {
  (document.querySelectorAll(".notification .delete") || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener("click", () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});

// $(function () {
//   $("select").selectize();
// });

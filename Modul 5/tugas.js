$(document).ready(function () {
  // Efek fade-in saat halaman dimuat
  $(".gallery img").fadeTo(100, 1);
  // Menampilkan gambar dalam modal saat gambar diklik
  $(".gallery img").click(function () {
    var src = $(this).attr("src");
    $(".modal img").attr("src", src);
    $(".modal").fadeIn();
  });
  // Menutup modal saat tombol "Close" diklik
  $(".modal .close").click(function () {
    $(".modal").fadeOut();
  });
  // Menutup modal saat area di luar gambar diklik
  $(".modal").click(function (event) {
    if (event.target === this) {
      $(this).fadeOut();
    }
  });
});

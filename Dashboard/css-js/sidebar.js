$(document).ready(function () {
    // Load default halaman pertama kali
    $("#main-content").load("dashboard.php");

    // Event klik sidebar
    $(document).on("click", ".nav-link", function (e) {
        e.preventDefault();

        // Ambil URL dari href
        var page = $(this).attr("href");

        console.log("Memuat halaman:", page);

        // Kosongkan & load halaman baru
        $("#main-content").fadeOut(200, function () {
            $(this).html(""); // Hapus isi sebelum load
            $(this).load(page, function (response, status, xhr) {
                if (status === "error") {
                    console.log("Gagal memuat halaman:", xhr.statusText);
                } else {
                    console.log("✅ Halaman berhasil dimuat:", page);
                }
                $(this).fadeIn(200);
            });
        });

        // Ubah status menu active
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
});

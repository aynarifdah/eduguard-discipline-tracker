$(document).ready(function () {
    $.ajaxSetup({ cache: false });

    function loadPage(page) {
        console.log("Memuat halaman:", page);
        $("#main-content").fadeOut(200, function () {
            $(this).html(""); // Kosongkan sebelum load
            $(this).load(page, function (response, status, xhr) {
                if (status === "error") {
                    console.log("Gagal memuat halaman:", xhr.statusText);
                } else {
                    console.log("✅ Halaman berhasil dimuat:", page);
    
                    // Jika halaman yang dimuat adalah "data_pelanggaran.html", jalankan ulang script
                    if (page.includes("data_pelanggaran.php")) {
                        console.log("🔄 Memuat ulang event listener SP...");
                        $.getScript("../css-js/sp.js"); // Load ulang script
                    }
                }
                $(this).fadeIn(200);
            });
        });
    }
    
    
    // Load halaman pertama kali
    loadPage("data_pelanggaran.php");

    $(document).on("click", ".nav-link", function (e) {
        e.preventDefault();
        let page = $(this).attr("href") + "?_=" + new Date().getTime();
        loadPage(page);

        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
});

// === PASANG ULANG EVENT LISTENER SP === //
function loadSPEvents() {
    console.log("Menjalankan ulang event SP...");

    // EVENT LISTENER UNTUK DROPDOWN SP
    $(document).off("change", ".sp-dropdown").on("change", ".sp-dropdown", function () {
        let siswaId = $(this).data("id");
        let btn = $(`.sp-btn[data-id="${siswaId}"]`);
        btn.prop("disabled", $(this).val() === "");
        console.log(`SP dipilih untuk siswa ID ${siswaId}, tombol diaktifkan.`);
    });

    // EVENT LISTENER UNTUK TOMBOL KIRIM SP
    $(document).off("click", ".sp-btn").on("click", ".sp-btn", function () {
        let siswaId = $(this).data("id");
        let dropdown = $(`.sp-dropdown[data-id="${siswaId}"]`);
        let spJenis = dropdown.val();

        if (spJenis) {
            alert(`Surat ${spJenis} dikirim ke Siswa ID ${siswaId}!`);
            dropdown.prop("disabled", true);
            $(this).prop("disabled", true);
        }
    });
}

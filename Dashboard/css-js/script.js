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
    
                    
                    if (page.includes("dashboard.php")) {
                        console.log("🔄 Memuat ulang event listener SP...");
                        $.getScript("../css-js/sp.js"); // Load ulang script
                    }
                }
                $(this).fadeIn(200);
            });
        });
    }
    
    
    // Load halaman pertama kali
    loadPage("dashboard.php");

    $(document).on("click", ".nav-link", function (e) {
        e.preventDefault();
        let page = $(this).attr("href") + "?_=" + new Date().getTime();
        loadPage(page);

        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
});



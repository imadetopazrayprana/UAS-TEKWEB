//side bar animasi
$(document).ready(function () {
    let sidebar = $("#sidebar");

    // Menambahkan transisi ke sidebar
    sidebar.css({
        transition: "margin-left 0.3s ease",
    });

    $("#toggleBtn").click(function () {
        if (
            sidebar.css("margin-left") === "0px" ||
            sidebar.css("margin-left") === "auto"
        ) {
            sidebar.css("margin-left", "-250px");
            $("#toggleIcon").removeClass("bi-list").addClass("bi-x");
        } else {
            sidebar.css("margin-left", "0");
            $("#toggleIcon").removeClass("bi-x").addClass("bi-list");
        }
    });
});

//memunculkan konten sesuai menu yang dipilih
$(document).ready(function () {
    // Sembunyikan semua konten dan tampilkan hanya konten home
    $(".container").hide(); // Sembunyikan semua konten
    $("#home").show(); // Tampilkan konten home

    // Menambahkan transisi ke sidebar
    let sidebar = $("#sidebar");
    sidebar.css({
        transition: "margin-left 0.3s ease",
    });

    $("#toggleBtn").click(function () {
        if (
            sidebar.css("margin-left") === "0px" ||
            sidebar.css("margin-left") === "auto"
        ) {
            sidebar.css("margin-left", "-250px");
            $("#toggleIcon").removeClass("bi-list").addClass("bi-x");
        } else {
            sidebar.css("margin-left", "0");
            $("#toggleIcon").removeClass("bi-x").addClass("bi-list");
        }
    });

    // Menangani klik pada menu
    $(".nav-link").click(function (e) {
        e.preventDefault(); // Mencegah perilaku default link
        let target = $(this).attr("href"); // Ambil href dari link yang diklik

        // Sembunyikan semua konten
        $(".container").hide();
        // Tampilkan konten yang sesuai
        $(target).show();
    });
});

$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault(); // Mencegah perilaku default form

        // Ambil nilai dari input
        let username = $("#username").val();
        let password = $("#password").val();
    });
});

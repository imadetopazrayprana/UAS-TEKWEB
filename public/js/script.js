$(document).ready(function () {
    $(".btn-lg").hover(
        function () {
            // mouse enter
            $(this).css({
                transform: "scale(1.1)",
                transition: "0.3s",
            });
        },
        function () {
            // mouse leave
            $(this).css({
                transform: "scale(1)",
            });
        }
    );
});

// animasi hover
$(document).ready(function () {
    $(".custom-hover").hover(
        function () {
            $(this).css({
                "background-color": "#f8f9fa", // Warna saat hover
                "box-shadow": "0px 4px 8px rgba(0,0,0,0.2)", // Efek bayangan saat hover
                transform: "scale(1.05)", // Memperbesar sedikit saat hover
                transition: "all 0.3s ease-in-out", // Animasi halus
            });
        },
        function () {
            $(this).css({
                "background-color": "white", // Kembali ke warna awal
                "box-shadow": "0px 2px 4px rgba(0,0,0,0.1)", // Kembali ke bayangan awal
                transform: "scale(1)", // Kembali ke ukuran normal
            });
        }
    );
});

// animasi tombol di program
$(document).ready(function () {
    $(".btn-toggle").click(function () {
        var descContainer = $(this).prev(".deskripsi-container");

        if (descContainer.is(":visible")) {
            descContainer.animate(
                { height: "0px", opacity: 0 },
                400,
                function () {
                    $(this).hide();
                }
            );
            $(this).text("Selengkapnya");
        } else {
            descContainer.css({ height: "auto", opacity: 1 }).show();
            var descHeight = descContainer.outerHeight();
            descContainer
                .hide()
                .css({ height: "0px", opacity: 0 })
                .show()
                .animate({ height: descHeight + "px", opacity: 1 }, 400);
            $(this).text("Sembunyikan");
        }
    });

    $(".btn-toggle").hover(
        function () {
            $(this).css({
                transform: "scale(1.1)",
                transition: "0.3s",
            });
        },
        function () {
            $(this).css({
                transform: "scale(1)",
            });
        }
    );
});

// rating
$(document).ready(function () {
    $(".rating input").hide();

    $(".rating label").css({
        "font-size": "2rem",
        color: "#ccc",
        cursor: "pointer",
        margin: "0 5px",
    });

    $(".rating input").change(function () {
        let selectedRating = $(this).val();

        $(".rating label").css("color", "#ccc");

        $(".rating input").each(function () {
            if ($(this).val() <= selectedRating) {
                $(this).next("label").css("color", "gold");
            }
        });
    });

    $(".rating label").hover(
        function () {
            let hoverRating =
                $(this).prev("input").val() ||
                $(this).attr("for").replace("star", "");
            $(".rating label").css("color", "#ccc");
            $(".rating input").each(function () {
                if ($(this).val() <= hoverRating) {
                    $(this).next("label").css("color", "gold");
                }
            });
        },
        function () {
            $(".rating input:checked").trigger("change");
        }
    );
});

// rating
$(document).ready(function () {
    let selectedRating = 0;

    $(".rating label").click(function () {
        selectedRating = $(this).prev().val();
    });

    $("#ulasanForm").submit(function (event) {
        event.preventDefault();

        let nama = $("#nama").val();
        let institusi = $("#institusi").val();
        let email = $("#email").val();
        let testimonial = $("#testimonial").val();

        if (!nama || !email || !testimonial) {
            alert("Harap isi semua bidang yang wajib!");
            return;
        }

        if (selectedRating == 0) {
            alert("Silakan beri rating terlebih dahulu!");
            return;
        }

        let bintangHTML = "";
        for (let i = 1; i <= 5; i++) {
            if (i <= selectedRating) {
                bintangHTML += `<span style="color: gold; font-size: 1.5rem;">★</span>`;
            } else {
                bintangHTML += `<span style="color: gold; font-size: 1.5rem;">☆</span>`;
            }
        }

        let ulasanSlide = `
          <div class="swiper-slide">
            <div class="card p-3 my-2">
                <h5>${nama} ${institusi ? `(${institusi})` : ""}</h5>
                <h6 class="text-muted"><strong>Email:</strong> ${email}</h6>
                <div>${bintangHTML}</div>
                <h6 class="mt-2">${testimonial}</h6>
            </div>
          </div>
        `;

        // Tambahin ke swiper
        if (typeof swiper !== "undefined") {
            swiper.appendSlide(ulasanSlide);
        } else {
            $("#ulasan-wrapper").append(ulasanSlide);
        }

        $("#ulasanForm")[0].reset();
        selectedRating = 0;

        // Hapus text "Belum ada ulasan" kalau ada
        $("#ulasan-wrapper p").remove();
    });
});



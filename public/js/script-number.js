document.addEventListener("DOMContentLoaded", function() {
    console.log("Document ready! JavaScript is working.");

    // Smooth scrolling untuk link navbar
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        if (anchor.getAttribute('href') !== '#') {
            anchor.addEventListener('click', function(event) {
                if (
                    location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                    location.hostname === this.hostname
                ) {
                    event.preventDefault();
                    const target = document.querySelector(this.hash);
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        }
    });

    // Search bar di navbar
    console.log("Attaching event listener to #search-form");
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");

    if (searchForm) {
        console.log("Search form found!");
        if (searchInput) {
            console.log("Search input found!");
        } else {
            console.log("Search input not found!");
        }

        searchForm.addEventListener("submit", function(event) {
            event.preventDefault();
            console.log("Form submitted!");
            let query = searchInput.value.toLowerCase();
            console.log("Search query in navbar:", query);

            if (query.trim() === "") {
                console.log("Query is empty!");
                alert("Silakan masukkan kata kunci pencarian!");
                return;
            }

            // Cari paket tour di Best Vacation Plan Section
            const vacationCards = document.querySelectorAll('#vacation-cards .vacation-card');
            let found = false;

            vacationCards.forEach(card => {
                const location = card.getAttribute('data-location').toLowerCase();
                console.log("Checking location:", location);
                if (location.includes(query)) {
                    card.style.display = 'block';
                    found = true;
                } else {
                    card.style.display = 'none';
                }
            });

            if (!found) {
                alert('No vacation plans found for "' + query + '"');
            } else {
                // Scroll ke Best Vacation Plan Section
                document.getElementById('best-vacation').scrollIntoView({ behavior: 'smooth' });
            }
        });

        // Tambah event listener untuk tombol secara langsung sebagai fallback
        const searchButton = searchForm.querySelector('button[type="submit"]');
        if (searchButton) {
            console.log("Search button found!");
            searchButton.addEventListener("click", function(event) {
                console.log("Search button clicked!");
                searchForm.dispatchEvent(new Event("submit"));
            });
        } else {
            console.log("Search button not found!");
        }
    } else {
        console.log("Search form not found!");
    }

    // Search bar di Find Your Best Destination Section
    console.log("Attaching event listener to .search-destination form");
    const destinationForm = document.querySelector('.search-destination form');
    if (destinationForm) {
        console.log("Destination search form found!");
        destinationForm.addEventListener("submit", function(event) {
            event.preventDefault();
            let query = document.querySelector('.search-destination input').value.toLowerCase();
            console.log("Search query in destination:", query);
            const cards = document.querySelectorAll('.destination-card');
            cards.forEach(card => {
                let destination = card.getAttribute('data-destination').toLowerCase();
                console.log("Checking destination:", destination);
                if (destination.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            let visibleCards = document.querySelectorAll('.destination-card:not([style*="display: none"])').length;
            console.log("Visible cards:", visibleCards);
            if (visibleCards === 0) {
                alert('No destinations found for "' + query + '"');
            }
        });
    } else {
        console.log("Destination search form not found!");
    }

    // Perulangan: Menambahkan Nomor Urut pada Dokumentasi Section
    console.log("Adding numbers to gallery items");
    const galleryItems = document.querySelectorAll('.gallery-number');
    console.log("Gallery items found:", galleryItems.length);
    galleryItems.forEach((item, index) => {
        console.log("Adding number to item", index + 1);
        item.textContent = `Foto ${index + 1}`;
        item.style.display = 'block';
        item.style.fontSize = '1rem';
        item.style.color = '#ff5733';
        item.style.marginBottom = '10px';
    });

    // Manipulasi DOM dan Log: Validasi Formulir dengan Riwayat
    console.log("Attaching event listener to contact form");
    const form = document.getElementById("contactForm");
    const messageDiv = document.getElementById("formMessage");
    let formSubmissions = [];

    if (form) {
        console.log("Contact form found!");
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const name = form.querySelector("input[type='text']").value;
            const email = form.querySelector("input[type='email']").value;
            const message = form.querySelector("textarea").value;

            if (name && email && message) {
                const submission = {
                    name: name,
                    email: email,
                    message: message,
                    timestamp: new Date().toLocaleString(),
                };
                formSubmissions.push(submission);

                console.log("Riwayat Pengiriman Formulir:", formSubmissions);

                messageDiv.style.display = "block";
                messageDiv.textContent = "Terima kasih, " + name + "! Pesan Anda telah dikirim.";
                messageDiv.style.color = "#ff5733";
                form.reset();
            } else {
                alert("Harap isi semua field yang diperlukan!");
                messageDiv.style.display = "block";
                messageDiv.textContent = "Silakan isi semua field!";
                messageDiv.style.color = "#dc3545";
            }

            setTimeout(() => {
                messageDiv.style.display = "none";
            }, 5000);
        });
    } else {
        console.log("Contact form not found!");
    }
});
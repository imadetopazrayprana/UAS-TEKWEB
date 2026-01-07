document.addEventListener("DOMContentLoaded", function () {
    const startDateInput = document.getElementById("startDate");
    const endDateInput = document.getElementById("endDate");
    const selectedStartDate = document.getElementById("selected-start-date");
    const selectedEndDate = document.getElementById("selected-end-date");
    const packageSelect = document.getElementById("package");
    const passengerCountInput = document.getElementById("passengerCount");
    const transportationSelect = document.getElementById("transportation");
    const guideOptions = document.getElementsByName("guide");
    const selectedPackage = document.getElementById("selected-package");
    const packagePrice = document.getElementById("package-price");
    const passengerCount = document.getElementById("passenger-count");
    const selectedTransportation = document.getElementById(
        "selected-transportation"
    );
    const selectedGuide = document.getElementById("selected-guide");
    const guideCost = document.getElementById("guide-cost");
    const totalPrice = document.getElementById("total-price");
    const successMessageElement = document.getElementById("success-message");

    // Fungsi untuk menambahkan 5 hari ke tanggal mulai
    function calculateEndDate(startDate) {
        const date = new Date(startDate);
        date.setDate(date.getDate() + 5); // Tambahkan 5 hari
        const day = String(date.getDate()).padStart(2, "0");
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const year = date.getFullYear();
        return `${year}-${month}-${day}`;
    }

    // Fungsi untuk memperbarui tanggal selesai dan ringkasan
    function updateDates() {
        const startDate = startDateInput.value; // Ambil nilai tanggal mulai
        if (startDate) {
            const endDate = calculateEndDate(startDate); // Hitung tanggal selesai
            endDateInput.value = endDate; // Atur tanggal selesai di input

            // Format tanggal diatur
            const formattedStartDate = startDate.split("-").reverse().join("-");
            const formattedEndDate = endDate.split("-").reverse().join("-");

            // Perbarui ringkasan pesanan
            if (selectedStartDate)
                selectedStartDate.textContent = formattedStartDate;
            if (selectedEndDate) selectedEndDate.textContent = formattedEndDate;
        }
    }

    function updateSummary() {
        const selectedOption =
            packageSelect.options[packageSelect.selectedIndex];
        const packageName = selectedOption ? selectedOption.textContent : "-";
        const price = selectedOption
            ? parseInt(selectedOption.getAttribute("data-price"))
            : 0;
        const passengerCountValue = parseInt(passengerCountInput.value) || 1;
        const transportation =
            transportationSelect.options[transportationSelect.selectedIndex]
                ?.textContent || "-";
        const guideSelected =
            Array.from(guideOptions).find((option) => option.checked)?.value ===
            "yes";
        const guideFee = guideSelected ? 200000 : 0;
        const fullnameSummary = document.getElementById("fullname-summary");
        const emailSummary = document.getElementById("email-summary");
        const phoneSummary = document.getElementById("phone-summary");
        const notesSummary = document.getElementById("notes-summary");

        const fullname = document.getElementById("fullName").value || "-";
        const email = document.getElementById("email").value || "-";
        const phone = document.getElementById("phone").value || "-";
        const notes = document.getElementById("notes").value || "-";

        console.log("Package Name:", packageName);
        console.log("Price:", price);
        console.log("Passenger Count:", passengerCountValue);
        console.log("Guide Selected:", guideSelected);
        console.log("Guide Fee:", guideFee);

        // Update Ringkasan Pesanan
        if (selectedPackage) selectedPackage.textContent = packageName;
        if (packagePrice)
            packagePrice.textContent = `Rp ${price.toLocaleString("id-ID")}`;
        if (passengerCount) passengerCount.textContent = passengerCountValue;
        if (selectedTransportation)
            selectedTransportation.textContent = transportation;
        if (selectedGuide)
            selectedGuide.textContent = guideSelected ? "Ya" : "Tidak";
        if (guideCost)
            guideCost.textContent = `Rp ${guideFee.toLocaleString("id-ID")}`;
        if (fullnameSummary) fullnameSummary.textContent = fullname;
        if (emailSummary) emailSummary.textContent = email;
        if (phoneSummary) phoneSummary.textContent = phone;
        if (notesSummary) notesSummary.textContent = notes;
        if (totalPrice)
            totalPrice.textContent = `Rp ${(
                price * passengerCountValue +
                guideFee
            ).toLocaleString("id-ID")}`;
    }

    // Event listener untuk tanggal mulai
    startDateInput.addEventListener("change", updateDates);

    // Event listener untuk memperbarui ringkasan pesanan
    packageSelect.addEventListener("change", updateSummary);
    passengerCountInput.addEventListener("input", updateSummary);
    transportationSelect.addEventListener("change", updateSummary);
    guideOptions.forEach((option) =>
        option.addEventListener("change", updateSummary)
    );
    document
        .getElementById("fullName")
        .addEventListener("input", updateSummary);
    document.getElementById("email").addEventListener("input", updateSummary);
    document.getElementById("phone").addEventListener("input", updateSummary);
    document.getElementById("notes").addEventListener("input", updateSummary);

    // Atur tanggal default saat halaman dimuat
    const today = new Date().toISOString().split("T")[0];
    startDateInput.value = today;
    updateDates();

    packageSelect.addEventListener("change", updateSummary);
    passengerCountInput.addEventListener("input", updateSummary);
    transportationSelect.addEventListener("change", updateSummary);
    guideOptions.forEach((option) =>
        option.addEventListener("change", updateSummary)
    );

    if (successMessageElement) {
        const successMessage =
            successMessageElement.getAttribute("data-message");
        if (successMessage) {
            const successModal = new bootstrap.Modal(
                document.getElementById("successModal")
            );
            document.querySelector("#successModal .modal-body").textContent =
                successMessage;
            successModal.show();
        }
    }
});

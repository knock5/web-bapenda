document.addEventListener("DOMContentLoaded", function () {
    const transactionIdInput = document.getElementById("transactionId");
    const taxRateInput = parseFloat(document.getElementById("taxRate").value);
    const revenueInput = document.getElementById("revenue");
    const totalTaxInput = document.getElementById("totalTax");
    const selectInput = document.getElementById("paymentMethod");
    const labelVA = document.getElementById("labelVA");
    const nomorVA = document.getElementById("nomorVA");

    function generateTransactionId() {
        return Math.floor(Math.random() * 1000000000);
    }

    function generateVANumber() {
        return Math.floor(Math.random() * 10000000000000);
    }

    selectInput.addEventListener("change", () => {
        if (selectInput.value !== "") {
            nomorVA.textContent = generateVANumber();
            nomorVA.hidden = false;
            labelVA.hidden = false;
        } else {
            nomorVA.hidden = true;
            labelVA.hidden = true;
        }
    });

    function calculateTotalTax() {
        const revenue = parseFloat(revenueInput.value);
        if (isNaN(revenue) || isNaN(taxRateInput)) {
            console.error("Revenue or tax rate is not a number");
            return "Error calculating tax";
        }
        const totalTax = (revenue * taxRateInput) / 100;
        const formattedTotalTax =
            "Rp. " +
            totalTax.toLocaleString("id-ID", {
                maximumFractionDigits: 0,
            });
        return formattedTotalTax;
    }

    // Set values when modal is opened
    document
        .querySelector('[data-bs-target="#paymentModal"]')
        .addEventListener("click", function () {
            transactionIdInput.value = generateTransactionId();
            totalTaxInput.value = calculateTotalTax();
        });
});

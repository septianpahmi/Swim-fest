document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const yearInput = document.getElementById("year");
    const textInput = document.getElementById("name");
    const errorMessages = document.getElementById("errorMessages");

    errorMessages.innerHTML = "";

    let isValid = true;

    const year = yearInput.value.trim();
    if (year.length !== 4 || isNaN(year)) {
        isValid = false;
        const yearError = document.createElement("p");
        yearError.textContent =
            "Tahun harus berupa angka dengan panjang 4 digit.";
        errorMessages.appendChild(yearError);
    }

    const text = textInput.value.trim();
    if (text.length < 5 || text.length > 50) {
        isValid = false;
        const textError = document.createElement("p");
        textError.textContent =
            "Field teks harus memiliki panjang antara 5 dan 50 karakter.";
        errorMessages.appendChild(textError);
    }

    if (isValid) {
        alert("Form submitted successfully!");
        this.submit();
    }
});

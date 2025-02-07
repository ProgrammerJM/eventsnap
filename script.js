// BOOKING //
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("bookingForm");
    const dateField = document.getElementById("photoshoot_date");

    // Disable past dates
    const today = new Date().toISOString().split("T")[0];
    dateField.setAttribute("min", today);

    // Fetch booked dates and disable them in the calendar
    fetch("fetch_booked_dates.php")
        .then(response => response.json())
        .then(bookedDates => {
            dateField.addEventListener("focus", () => {
                let unavailableDates = bookedDates.map(date => new Date(date).toISOString().split("T")[0]);

                dateField.addEventListener("input", () => {
                    if (unavailableDates.includes(dateField.value)) {
                        alert("This date is already booked. Please select another date.");
                        dateField.value = "";  // Clear the input if the date is already booked
                    }
                });
            });
        })
        .catch(error => console.error("Error fetching booked dates:", error));

    // Photoshoot Type & Package Part
    const photoshootTypeSelect = document.querySelector("#photoshoot-type");
    const photoshootPackageSelect = document.querySelector("#photoshoot-package");
    const checkboxes = document.querySelectorAll("input[name='services[]']");
    const totalPriceInput = document.getElementById("total_price");
    const displayTotalPrice = document.getElementById("display_total_price");

    const photoshootTypeInfo = {
        corp: { 1: 5000, 2: 10000, 3: 20000, 4: 30000, 5: 35000, 6: 45000 },
        kiddie: { 7: 3000, 8: 5000, 9: 8000, 10: 12000, 11: 14000, 12: 17000 },
        baptism: { 13: 3000, 14: 5000, 15: 8000, 16: 12000, 17: 14000, 18: 17000 },
        adult: { 19: 5000, 20: 10000, 21: 15000, 22: 25000, 23: 30000, 24: 35000, 25: 45000, 26: 50000, 27: 55000 },
        debut: { 28: 5000, 29: 10000, 30: 15000, 31: 25000, 32: 30000, 33: 35000, 34: 45000, 35: 50000, 36: 55000 },
        civil: { 37: 5000, 38: 10000, 39: 15000, 40: 25000, 41: 30000, 42: 35000, 43: 45000, 44: 50000, 45: 55000 },
        wedding: { 46: 10000, 47: 15000, 48: 20000, 49: 30000, 50: 35000, 51: 40000, 52: 50000, 53: 55000, 54: 60000, 55: 70000, 56: 75000, 57: 80000 }
    };

    let packagePrice = 0;
    let additionalServicesPrice = 0;

    photoshootPackageSelect.disabled = true; // Disable initially

    // Update package price when a package is selected
    photoshootTypeSelect.onchange = (e) => {
        const selectedType = e.target.value;
        photoshootPackageSelect.disabled = !selectedType;
        photoshootPackageSelect.innerHTML = '<option value="">Select a Package</option>';

        if (selectedType && photoshootTypeInfo[selectedType]) {
            const relevantPackages = photoshootTypeInfo[selectedType];
            for (let packageId in relevantPackages) {
                const option = document.createElement('option');
                option.value = packageId;
                option.textContent = `${packageId} - ₱${relevantPackages[packageId]}`;
                option.setAttribute("data-price", relevantPackages[packageId]); // Add data-price attribute
                photoshootPackageSelect.appendChild(option);
            }
        }
    };

    // Update package price when a package is selected
    photoshootPackageSelect.addEventListener("change", function () {
        const selectedOption = this.options[this.selectedIndex];
        packagePrice = parseFloat(selectedOption.getAttribute("data-price")) || 0;
        console.log("Package Price:", packagePrice); // Debugging
        updateTotalPrice();
    });

    // Update additional services price when checkboxes are clicked
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const servicePrice = parseFloat(this.getAttribute("data-price")) || 0;
            if (this.checked) {
                additionalServicesPrice += servicePrice;
            } else {
                additionalServicesPrice -= servicePrice;
            }
            console.log("Additional Services Price:", additionalServicesPrice); // Debugging
            updateTotalPrice();
        });
    });

    // Function to update the total price
    function updateTotalPrice() {
        const totalPrice = packagePrice + additionalServicesPrice;
        totalPriceInput.value = totalPrice;
        displayTotalPrice.textContent = totalPrice.toFixed(2);
        console.log("Total Price:", totalPrice); // Debugging
    }

    // Form validation before submission
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let isValid = true;
        const requiredFields = form.querySelectorAll("input[required], select[required]");

        requiredFields.forEach(field => {
            field.style.border = field.value.trim() ? "1px solid #ccc" : "2px solid red";
            if (!field.value.trim()) isValid = false;
        });

        if (!isValid) {
            alert("Please fill out all required fields.");
            return;
        }

        // Additional validation for email and phone
        const email = form.querySelector("#email").value;
        const phone = form.querySelector("#phone").value;

        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (!validatePhone(phone)) {
            alert("Please enter a valid phone number.");
            return;
        }

        form.submit();
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validatePhone(phone) {
        const regex = /^\d{11}$/; // Adjust regex based on your phone number format
        return regex.test(phone);
    }
});



// INQUIRY //
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("inquiryForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let isValid = true;
        const requiredFields = form.querySelectorAll("input[required], select[required], textarea[required]");

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.border = "2px solid red";
            } else {
                field.style.border = "1px solid #ccc";
            }
        });

        if (!isValid) {
            alert("Please fill out all required fields.");
            return;
        }

        const formData = new FormData(form);

        fetch("submit_inquiry.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())  // Parse JSON response
        .then(data => {
            if (data.status === "success") {
                alert(data.message);  // Show success message
                form.reset();  // Reset the form
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error submitting inquiry:", error);
            alert("An error occurred while submitting your inquiry.");
        });
    });
});

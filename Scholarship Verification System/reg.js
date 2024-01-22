// reg.js

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("registration-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        if (validateForm()) {
            // If the form is valid, you can submit it to the server or perform other actions.
            document.getElementById("registration-result").innerHTML = "Form submitted successfully!";
        }
    });

    function validateForm() {
        var isValid = true;

        // Reset error messages
        var errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach(function(element) {
            element.style.display = "none";
        });

        // Validate user details
        isValid = validateField("userID", "User ID is required.") && isValid;
        isValid = validateField("password", "Password is required.") && isValid;
        isValid = validateField("studentName", "Student Name is required.") && isValid;
        isValid = validateField("stateOfOrigin", "State of Origin is required.") && isValid;
        isValid = validateField("contactEmail", "Contact Email is required.") && isValid;
        isValid = validateField("contactPhone", "Contact Phone is required.") && isValid;

        // Validate college details
        isValid = validateField("collegeName", "College Name is required.") && isValid;
        isValid = validateField("collegeLocation", "College Location is required.") && isValid;
        isValid = validateField("collegeType", "College Type is required.") && isValid;

        // Validate scholarship verification details
        isValid = validateField("aadharNumber", "Aadhar Number is required.") && isValid;
        isValid = validateField("incomeCertificateNumber", "Income Certificate Number is required.") && isValid;
        isValid = validateField("residentialCertificateNumber", "Residential Certificate Number is required.") && isValid;
        isValid = validateField("collegeID", "College ID is required.") && isValid;

        // Validate academic details
        isValid = validateField("currentYear", "Current Academic Year is required.") && isValid;
        isValid = validateField("course", "Course Enrolled is required.") && isValid;
        isValid = validateField("registrationNumber", "College Registration Number is required.") && isValid;

        // Validate financial details
        isValid = validateField("familyIncome", "Family Income is required.") && isValid;
        isValid = validateField("bankAccountNumber", "Bank Account Number is required.") && isValid;
        isValid = validateField("bankBranch", "Bank Branch is required.") && isValid;

        return isValid;
    }

    function validateField(fieldName, errorMessage) {
        var field = document.getElementById(fieldName);
        var errorElement = document.getElementById(fieldName + "-error");

        if (!field.value.trim()) {
            errorElement.style.display = "block";
            errorElement.innerHTML = errorMessage;
            return false;
        } else {
            errorElement.style.display = "none";
            return true;
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add_customer');

    // Field references
    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const password = document.getElementById('password');
    const documentImage = document.getElementById('document_image');
    const expiryDate = document.getElementById('expiry_date');
    const documentTypeRadios = document.getElementsByName('document_type');
    const emergencyContactsContainer = document.getElementById('emergencyContactsContainer');

    // Highlight input field if invalid
    function highlightField(input, isValid) {
        if (!isValid) {
            input.classList.add('border-danger'); // Add red border
        } else {
            input.classList.remove('border-danger'); // Remove red border
        }
    }

    // Validate required fields
    function validateField(input) {
        const isValid = input.value.trim() !== '';
        highlightField(input, isValid);
        return isValid;
    }

    // Validate radio button group
    function validateRadioGroup(radios) {
        let isSelected = Array.from(radios).some(radio => radio.checked);
        const radioWrapper = radios[0].closest('.form-group');
        highlightField(radioWrapper, isSelected);
        return isSelected;
    }

    // Validate email field
    function validateEmail(input) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const isValid = regex.test(input.value.trim());
        highlightField(input, isValid);
        return isValid;
    }

    // Add more emergency contacts
    document.getElementById('addMoreBtn').addEventListener('click', function () {
        let contactForm = document.querySelector('.emergency-contact-group').cloneNode(true);
        contactForm.querySelectorAll('input').forEach(input => input.value = '');
        emergencyContactsContainer.appendChild(contactForm);
        updateRemoveButtons();
    });

    // Remove emergency contact field
    emergencyContactsContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('removeBtn')) {
            event.target.closest('.emergency-contact-group').remove();
            updateRemoveButtons();
        }
    });

    // Validate form on submit
    form.addEventListener('submit', function (event) {
        let isValid = true;

        // Validate individual fields
        isValid &= validateField(firstName);
        isValid &= validateField(lastName);
        isValid &= validateEmail(email);
        isValid &= validateField(password);
        isValid &= validateField(documentImage);
        isValid &= validateField(expiryDate);

        // Validate radio button group
        isValid &= validateRadioGroup(documentTypeRadios);

        // Validate emergency contact fields
        const emergencyContactNames = document.querySelectorAll('input[name="emergency_contact_name[]"]');
        const emergencyContactRelations = document.querySelectorAll('input[name="emergency_contact_relation[]"]');
        const emergencyContactNumbers = document.querySelectorAll('input[name="emergency_contact_number[]"]');

        emergencyContactNames.forEach(input => {
            isValid &= validateField(input);
        });
        emergencyContactRelations.forEach(input => {
            isValid &= validateField(input);
        });
        emergencyContactNumbers.forEach(input => {
            isValid &= validateField(input);
        });

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Update remove button visibility for emergency contacts
    function updateRemoveButtons() {
        const groups = document.querySelectorAll('.emergency-contact-group');
        groups.forEach((group, index) => {
            const removeBtn = group.querySelector('.removeBtn');
            if (index === 0) {
                removeBtn.style.display = 'none'; // Hide remove button for the first group
            } else {
                removeBtn.style.display = 'inline-block'; // Show remove buttons for other groups
            }
        });
    }

    // Initialize the remove buttons visibility on load
    updateRemoveButtons();
});

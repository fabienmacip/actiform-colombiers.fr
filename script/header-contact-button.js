// Header Contact Button JavaScript
// Handles the "Je me lance !" button modal and contact form functionality

// Wait for DOM to be fully loaded before initializing
document.addEventListener('DOMContentLoaded', function() {
    // Check if the contact form elements exist before proceeding
    const modal = document.getElementById('contact-modal');
    const btn = document.getElementById('je-me-lance-btn');
    const span = document.getElementsByClassName('close')[0];
    
    // Only initialize if the contact form elements exist
    if (modal && btn && span) {
        // Open modal
        btn.onclick = function() {
            modal.style.display = 'block';
        }

        // Close modal
        span.onclick = function() {
            modal.style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Form submission
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Check if form is valid before submitting
                const firstName = document.getElementById('firstName').value.trim();
                const lastName = document.getElementById('lastName').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                
                if (firstName.length >= 2 && lastName.length >= 2 && (email || phone)) {
                    // Form is valid, send email and show success message
                    sendContactEmail(firstName, lastName, email, phone);
                    
                    // Show success message in a nice modal
                    showSuccessMessage();
                    
                    // Close modal
                    modal.style.display = 'none';
                    
                    // Reset form
                    this.reset();
                    
                    // Disable submit button after reset
                    updateSubmitButton();
                }
            });
        }

        // Add event listeners for real-time validation
        const firstNameField = document.getElementById('firstName');
        const lastNameField = document.getElementById('lastName');
        const emailField = document.getElementById('email');
        const phoneField = document.getElementById('phone');
        
        if (firstNameField) firstNameField.addEventListener('input', updateSubmitButton);
        if (lastNameField) lastNameField.addEventListener('input', updateSubmitButton);
        if (emailField) emailField.addEventListener('input', updateSubmitButton);
        if (phoneField) phoneField.addEventListener('input', updateSubmitButton);

        // Phone field input restrictions
        if (phoneField) {
            phoneField.addEventListener('keypress', function(e) {
                const char = String.fromCharCode(e.which);
                const currentValue = this.value;
                
                // Allow backspace, delete, tab, escape, enter
                if (e.keyCode === 8 || e.keyCode === 9 || e.keyCode === 27 || e.keyCode === 13) {
                    return;
                }
                
                // Allow plus sign only at the beginning
                if (char === '+' && currentValue.length === 0) {
                    return;
                }
                
                // Only allow numbers
                if (!/[0-9]/.test(char)) {
                    e.preventDefault();
                    return;
                }
                
                // Check length restrictions based on format
                if (currentValue.startsWith('+')) {
                    // International format: + followed by exactly 11 digits
                    const digitsAfterPlus = currentValue.substring(1);
                    if (digitsAfterPlus.length >= 11) {
                        e.preventDefault();
                        return;
                    }
                } else {
                    // Local format: exactly 10 digits
                    if (currentValue.length >= 10) {
                        e.preventDefault();
                        return;
                    }
                }
            });
        }

        // First name and last name input restrictions (letters and spaces only)
        if (firstNameField) {
            firstNameField.addEventListener('keypress', function(e) {
                const char = String.fromCharCode(e.which);
                
                // Allow backspace, delete, tab, escape, enter
                if (e.keyCode === 8 || e.keyCode === 9 || e.keyCode === 27 || e.keyCode === 13) {
                    return;
                }
                
                // Only allow letters and spaces
                if (!/[a-zA-ZÀ-ÿ\s]/.test(char)) {
                    e.preventDefault();
                    return;
                }
            });
        }

        if (lastNameField) {
            lastNameField.addEventListener('keypress', function(e) {
                const char = String.fromCharCode(e.which);
                
                // Allow backspace, delete, tab, escape, enter
                if (e.keyCode === 8 || e.keyCode === 9 || e.keyCode === 27 || e.keyCode === 13) {
                    return;
                }
                
                // Only allow letters and spaces
                if (!/[a-zA-ZÀ-ÿ\s]/.test(char)) {
                    e.preventDefault();
                    return;
                }
            });
        }

        // Initialize submit button state
        updateSubmitButton();
    }
});

// Function to send contact email
function sendContactEmail(firstName, lastName, email, phone) {
    // Create form data for email sending
    const formData = new FormData();
    formData.append('header-contact-form-flag', 'flag');
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('phone', phone);
    
    // Send email via AJAX to avoid page reload
    fetch('vues/toaster/toaster-header-contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Email sent successfully');
    })
    .catch(error => {
        console.error('Error sending email:', error);
    });
}

// Show success message modal
function showSuccessMessage() {
    const successModal = document.createElement('div');
    successModal.className = 'modal success-modal';
    successModal.style.display = 'block';
    
    successModal.innerHTML = `
        <div class="modal-content success-content">
            <div class="success-icon">✓</div>
            <h2>Message envoyé !</h2>
            <p>Merci pour votre message ! Nous vous contacterons bientôt.</p>
            <button class="success-close-btn" onclick="this.parentElement.parentElement.remove()">Fermer</button>
        </div>
    `;
    
    document.body.appendChild(successModal);
    
    // Close success modal when clicking outside
    successModal.onclick = function(event) {
        if (event.target === successModal) {
            successModal.remove();
        }
    };
}

// Real-time form validation
function updateSubmitButton() {
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const submitBtn = document.querySelector('.submit-btn');
    
    // Only proceed if all elements exist
    if (!firstName || !lastName || !email || !phone || !submitBtn) {
        return;
    }
    
    const firstNameValue = firstName.value.trim();
    const lastNameValue = lastName.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();
    
    // Validation rules
    const isFirstNameValid = firstNameValue.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(firstNameValue);
    const isLastNameValid = lastNameValue.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(lastNameValue);
    const isEmailValid = emailValue === '' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);
    const isPhoneValid = phoneValue === '' || (/^[0-9]{10}$/.test(phoneValue) || /^\+[0-9]{11}$/.test(phoneValue));
    
    // Enable submit button only when firstName, lastName, and either email or phone are filled and valid
    const isValid = isFirstNameValid && isLastNameValid && (emailValue || phoneValue) && isEmailValid && isPhoneValid;
    
    submitBtn.disabled = !isValid;
    submitBtn.style.opacity = isValid ? '1' : '0.6';
    submitBtn.style.cursor = isValid ? 'pointer' : 'not-allowed';
    
    // Update field validation indicators
    updateFieldValidation('firstName', firstNameValue, isFirstNameValid);
    updateFieldValidation('lastName', lastNameValue, isLastNameValid);
    updateFieldValidation('email', emailValue, isEmailValid);
    updateFieldValidation('phone', phoneValue, isPhoneValid);
}

// Update field validation visual indicators
function updateFieldValidation(fieldId, value, isValid) {
    const field = document.getElementById(fieldId);
    if (!field) return;
    
    const label = field.previousElementSibling;
    if (!label) return;
    
    if (value === '') {
        // Field is empty - remove validation styling
        field.style.borderColor = '#ddd';
        if (label.querySelector('.validation-message')) {
            label.querySelector('.validation-message').remove();
        }
    } else if (!isValid) {
        // Field has invalid value - show error styling
        field.style.borderColor = '#dc3545';
        if (!label.querySelector('.validation-message')) {
            const message = document.createElement('div');
            message.className = 'validation-message';
            message.style.color = '#dc3545';
            message.style.fontSize = '12px';
            message.style.marginTop = '2px';
            
            if (fieldId === 'firstName' || fieldId === 'lastName') {
                message.textContent = 'Lettres et espaces uniquement, minimum 2 caractères';
            } else if (fieldId === 'email') {
                message.textContent = 'Format email invalide';
            } else if (fieldId === 'phone') {
                message.textContent = 'Format téléphone invalide (10 chiffres ou + suivi de 11 chiffres)';
            }
            
            label.appendChild(message);
        }
    } else {
        // Field is valid - show success styling
        field.style.borderColor = '#28a745';
        if (label.querySelector('.validation-message')) {
            label.querySelector('.validation-message').remove();
        }
    }
} 
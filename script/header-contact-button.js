// Header Contact Button JavaScript
// Handles the "Je me lance !" button modal and contact form functionality
// Uses the same approach as the working decouverte form

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
    }
});

// Function to submit form via AJAX
function submitFormViaAjax(firstName, lastName, email, phone) {
    // Create form data
    const formData = new FormData();
    formData.append('header-contact-form-flag', 'flag');
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('phone', phone);
    
    // Submit via AJAX
    fetch('vues/toaster/toaster-header-contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Form submitted successfully');
        
        // Show success message
        showSuccessMessage();
        
        // Close the contact modal
        const modal = document.getElementById('contact-modal');
        if (modal) {
            modal.style.display = 'none';
        }
        
        // Reset the form
        const form = document.getElementById('formHeaderContact');
        if (form) {
            form.reset();
            updateHeaderContactSubmitButton();
        }
    })
    .catch(error => {
        console.error('Error submitting form:', error);
        alert('Erreur lors de l\'envoi du message. Veuillez réessayer.');
    });
}

// Show success message
function showSuccessMessage() {
    // Create and show the success dialog box
    const successDialog = document.createElement('div');
    successDialog.className = 'modal success-dialog';
    successDialog.style.display = 'block';
    
    successDialog.innerHTML = `
        <div class="modal-content success-dialog-content">
            <div class="success-icon">✓</div>
            <h2>Message envoyé !</h2>
            <p>Merci pour votre message ! Nous vous contacterons bientôt.</p>
            <button class="success-close-btn" onclick="this.parentElement.parentElement.remove()">Fermer</button>
        </div>
    `;
    
    // Add success dialog to page
    document.body.appendChild(successDialog);
    
    // Close success dialog when clicking outside
    successDialog.onclick = function(event) {
        if (event.target === successDialog) {
            successDialog.remove();
        }
    };
}

// Form validation function - same approach as decouverte form
function validFormHeaderContact() {
    let isValid = true;
    
    // Validate first name
    if (!checkHeaderContactFormField('firstName')) {
        isValid = false;
    }
    
    // Validate last name
    if (!checkHeaderContactFormField('lastName')) {
        isValid = false;
    }
    
    // Validate email (optional but must be valid if provided)
    if (!checkHeaderContactFormField('email')) {
        isValid = false;
    }
    
    // Validate phone (optional but must be valid if provided)
    if (!checkHeaderContactFormField('phone')) {
        isValid = false;
    }
    
    // Check if at least one contact method is provided
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    
    if (!email && !phone) {
        // Show error for both fields
        showHeaderContactError('email', 'Email ou téléphone requis');
        showHeaderContactError('phone', 'Email ou téléphone requis');
        isValid = false;
    }
    
    // Update submit button state
    updateHeaderContactSubmitButton();
    
    return isValid;
}

// Check individual form field - same approach as decouverte form
function checkHeaderContactFormField(fieldId) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById('error-' + fieldId);
    
    if (!field || !errorDiv) return false;
    
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';
    
    switch (fieldId) {
        case 'firstName':
            if (value.length < 2) {
                isValid = false;
                errorMessage = 'Prénom : minimum 2 caractères';
            } else if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
                isValid = false;
                errorMessage = 'Lettres et espaces uniquement';
            }
            break;
            
        case 'lastName':
            if (value.length < 2) {
                isValid = false;
                errorMessage = 'Nom : minimum 2 caractères';
            } else if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
                isValid = false;
                errorMessage = 'Lettres et espaces uniquement';
            }
            break;
            
        case 'email':
            if (value !== '') {
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    isValid = false;
                    errorMessage = 'Format email invalide';
                }
            }
            break;
            
        case 'phone':
            if (value !== '') {
                if (!(/^[0-9]{10}$/.test(value) || /^\+[0-9]{11}$/.test(value))) {
                    isValid = false;
                    errorMessage = 'Format téléphone invalide (10 chiffres ou + suivi de 11 chiffres)';
                }
            }
            break;
    }
    
    if (isValid) {
        hideHeaderContactError(fieldId);
        field.style.borderColor = '#28a745';
    } else {
        showHeaderContactError(fieldId, errorMessage);
        field.style.borderColor = '#dc3545';
    }
    
    return isValid;
}

// Show error message
function showHeaderContactError(fieldId, message) {
    const errorDiv = document.getElementById('error-' + fieldId);
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }
}

// Hide error message
function hideHeaderContactError(fieldId) {
    const errorDiv = document.getElementById('error-' + fieldId);
    if (errorDiv) {
        errorDiv.style.display = 'none';
    }
}

// Update submit button state
function updateHeaderContactSubmitButton() {
    const submitBtn = document.getElementById('btn-envoyer-header-contact');
    if (!submitBtn) return;
    
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    
    // Check if required fields are filled and at least one contact method is provided
    const isFirstNameValid = firstName.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(firstName);
    const isLastNameValid = lastName.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(lastName);
    const isEmailValid = email === '' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const isPhoneValid = phone === '' || (/^[0-9]{10}$/.test(phone) || /^\+[0-9]{11}$/.test(phone));
    const hasContactMethod = email !== '' || phone !== '';
    
    const isValid = isFirstNameValid && isLastNameValid && hasContactMethod && isEmailValid && isPhoneValid;
    
    if (isValid) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('btn-inactive');
        submitBtn.classList.add('btn-active');
    } else {
        submitBtn.disabled = true;
        submitBtn.classList.remove('btn-active');
        submitBtn.classList.add('btn-inactive');
    }
}

// Add input restrictions for phone field
document.addEventListener('DOMContentLoaded', function() {
    const phoneField = document.getElementById('phone');
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
    
    // Add input restrictions for name fields
    const firstNameField = document.getElementById('firstName');
    const lastNameField = document.getElementById('lastName');
    
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
    updateHeaderContactSubmitButton();

        // Form submission - simple validation before submit
        const contactForm = document.getElementById('formHeaderContact');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent form from navigating to PHP file
                
                // Check if form is valid before submitting
                const firstName = document.getElementById('firstName').value.trim();
                const lastName = document.getElementById('lastName').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                
                if (firstName.length >= 2 && lastName.length >= 2 && (email || phone)) {
                    // Form is valid, submit via AJAX to stay on same page
                    submitFormViaAjax(firstName, lastName, email, phone);
                } else {
                    // Form is invalid, prevent submission
                    console.log('Form validation failed');
                }
            });
        }
}); 
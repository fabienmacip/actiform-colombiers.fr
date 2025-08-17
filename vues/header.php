<header>
    <div class="logo flex-1 tc">
        <a href="index.php?page=accueil">
            <img 
                id="logo" 
                class="logo-large-screen" 
                src="img/logo/actiform_logo_1276x800.jpg"
                alt="Actiform Colombiers - Logo"
            >
        </a>
        <!--src="img/logo/actiform_logo_1276x800.jpg"-->
    </div>
    
    <!-- Action Button -->
    <div class="action-button-container flex-1 tc">
        <button id="je-me-lance-btn" class="je-me-lance-btn">
            Je me lance !
        </button>
    </div>
    
    <div class="contacts flex-2 flex">
        <div class="flex flex-column gap-15 aic">
            <div class="contacts-phone flex-1 flex aic">
                <div>
                    <a href="tel:0769428066" alt="telephoner">
                        <img
                            id="contacts-phone-img"
                            class="contacts-icon"
                            src="img/icones/phone.svg"
                            alt="telephoner"
                        >
                    </a>
                </div>
                <div>
                  <a href="tel:0467214893" alt="telephoner fixe">&nbsp;04 67 21 48 93</a> <span style="color: var(--main-color-white);">ou</span> 
                </div>
                <div>
                  <a href="tel:0769428066" alt="telephoner mobile">&nbsp;07 69 42 80 66</a>
                </div>
            </div>
            <div class="contacts-mail flex-1 flex aic">
                <div>
                    <a href="mailto:contact@actiform-colombiers.fr">
                        <img
                            id="contacts-mail-img"
                            class="contacts-icon"
                            src="img/icones/mail.svg"
                            alt="mail"
                        >
                    </a>
                </div>
                <div>
                    <a href="mailto:contact@actiform-colombiers.fr">&nbsp;contact@actiform-colombiers.fr</a>
                </div>
            </div>
            <div class="contacts-lieu flex-1 flex aic">
                <div>
                    <a href="https://maps.app.goo.gl/FZkT1CkJRJ3Mkm8MA" target="_blank">
                    <img
                        id="contacts-lieu-img"
                        class="contacts-icon"
                        src="img/icones/map.svg"
                        alt="lieu"
                    >
                    </a>
                </div>
                <div>
                    <a href="https://maps.app.goo.gl/FZkT1CkJRJ3Mkm8MA" target="_blank">
                    &nbsp;Z.A. Viargues&nbsp;
                    </a>
                </div>
                <div>
                    <a href="https://maps.app.goo.gl/FZkT1CkJRJ3Mkm8MA" target="_blank">
                    &nbsp;34 440 COLOMBIERS
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal Dialog -->
<div id="contact-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Contactez-nous</h2>
        <form id="contact-form" class="contact-form">
            <div class="form-group">
                <label for="firstName">Prénom *</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            
            <div class="form-group">
                <label for="lastName">Nom *</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone">
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-btn">Envoyer</button>
            </div>
        </form>
    </div>
</div>

<style>
.action-button-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.je-me-lance-btn {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.je-me-lance-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
    background: linear-gradient(135deg, #0056b3, #004085);
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 500px;
    position: relative;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    position: absolute;
    right: 20px;
    top: 15px;
}

.close:hover,
.close:focus {
    color: #000;
}

.contact-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
}

.form-group input.error {
    border-color: #dc3545;
}

.form-group input.success {
    border-color: #28a745;
}

.validation-message {
    margin-top: 4px;
    font-size: 12px;
    line-height: 1.2;
}

.submit-btn {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.submit-btn:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
}

.submit-btn:disabled {
    background: linear-gradient(135deg, #6c757d, #495057);
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

/* Success Modal Styles */
.success-modal {
    z-index: 1001;
}

.success-content {
    text-align: center;
    max-width: 400px;
}

.success-icon {
    font-size: 48px;
    color: #28a745;
    margin-bottom: 20px;
    background: #d4edda;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    border: 3px solid #28a745;
}

.success-content h2 {
    color: #28a745;
    margin-bottom: 15px;
    font-size: 24px;
}

.success-content p {
    color: #666;
    margin-bottom: 25px;
    font-size: 16px;
    line-height: 1.5;
}

.success-close-btn {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 120px;
}

.success-close-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
    background: linear-gradient(135deg, #20c997, #17a2b8);
}

@media (max-width: 768px) {
    .modal-content {
        margin: 10% auto;
        width: 95%;
        padding: 20px;
    }
    
    .je-me-lance-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
}
</style>

<script>
// Modal functionality
const modal = document.getElementById('contact-modal');
const btn = document.getElementById('je-me-lance-btn');
const span = document.getElementsByClassName('close')[0];

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
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    // Here you can add your form submission logic
    console.log('Form data:', data);
    
    // Show success message in a nice modal
    showSuccessMessage();
    
    // Close modal
    modal.style.display = 'none';
    
    // Reset form
    this.reset();
    
    // Disable submit button after reset
    updateSubmitButton();
});

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
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const submitBtn = document.querySelector('.submit-btn');
    
    // Validation rules
    const isFirstNameValid = firstName.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(firstName);
    const isLastNameValid = lastName.length >= 2 && /^[a-zA-ZÀ-ÿ\s]+$/.test(lastName);
    const isEmailValid = email === '' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const isPhoneValid = phone === '' || (/^[0-9]{10}$/.test(phone) || /^\+[0-9]{11}$/.test(phone));
    
    // Enable submit button only when firstName, lastName, and either email or phone are filled and valid
    const isValid = isFirstNameValid && isLastNameValid && (email || phone) && isEmailValid && isPhoneValid;
    
    submitBtn.disabled = !isValid;
    submitBtn.style.opacity = isValid ? '1' : '0.6';
    submitBtn.style.cursor = isValid ? 'pointer' : 'not-allowed';
    
    // Update field validation indicators
    updateFieldValidation('firstName', firstName, isFirstNameValid);
    updateFieldValidation('lastName', lastName, isLastNameValid);
    updateFieldValidation('email', email, isEmailValid);
    updateFieldValidation('phone', phone, isPhoneValid);
}

// Update field validation visual indicators
function updateFieldValidation(fieldId, value, isValid) {
    const field = document.getElementById(fieldId);
    const label = field.previousElementSibling;
    
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
            } else if (fieldId === 'phone') {
                message.textContent = 'Format téléphone invalide (10 chiffres ou + suivi de 11 chiffres)';
            } else if (fieldId === 'email') {
                message.textContent = 'Format email invalide';
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

// Add event listeners for real-time validation
document.getElementById('firstName').addEventListener('input', updateSubmitButton);
document.getElementById('lastName').addEventListener('input', updateSubmitButton);
document.getElementById('email').addEventListener('input', updateSubmitButton);
document.getElementById('phone').addEventListener('input', updateSubmitButton);

// Phone field input restrictions
document.getElementById('phone').addEventListener('keypress', function(e) {
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

// First name and last name input restrictions (letters and spaces only)
document.getElementById('firstName').addEventListener('keypress', function(e) {
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

document.getElementById('lastName').addEventListener('keypress', function(e) {
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

// Initialize submit button state
document.addEventListener('DOMContentLoaded', function() {
    updateSubmitButton();
});
</script>
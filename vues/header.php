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
        <form id="formHeaderContact" name="formHeaderContact" method="post" onSubmit="validFormHeaderContact()" action="vues/toaster/toaster-header-contact.php">
            <input type="hidden" name="header-contact-form-flag" value="flag">
            <div class="form-group">
                <label for="firstName">Prénom *</label>
                <input type="text" id="firstName" name="firstName" required>
                <div id="error-firstName" class="contact-form-error">Prénom : minimum 2 caractères</div>
            </div>
            
            <div class="form-group">
                <label for="lastName">Nom *</label>
                <input type="text" id="lastName" name="lastName" required>
                <div id="error-lastName" class="contact-form-error">Nom : minimum 2 caractères</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <div id="error-email" class="contact-form-error">Format email invalide</div>
            </div>
            
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="De type 0622334455 ou +33622334455">
                <div id="error-phone" class="contact-form-error">Format téléphone invalide (10 chiffres ou + suivi de 11 chiffres)</div>
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
    background-color: var(--main-color-red);
    border: 2px solid var(--main-color-red);
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.je-me-lance-btn:hover {
    transform: scale(1.05);
    opacity: 0.7;
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

/* Contact Form Error Messages */
.contact-form-error {
    display: none;
    color: #dc3545;
    font-size: 12px;
    margin-top: 2px;
}

/* Contact Form Buttons */
#header-contact-btn {
    margin-top: 20px;
    text-align: center;
}

.shortMailButton {
    margin: 5px;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-inactive {
    opacity: 0.5;
    cursor: not-allowed;
}

.btn-inactive:hover {
    transform: scale(1);
}

/* Asterisk styling */
.asterisque {
    color: #dc3545;
    font-weight: bold;
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

<script src="script/header-contact-button.js"></script>
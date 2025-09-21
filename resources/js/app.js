import './bootstrap';
import IMask from 'imask';

document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('arquivo');
    
    const fileNameDisplay = document.getElementById('file-name');

    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = 'Nenhum arquivo selecionado';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('telefone');
    
    if (phoneInput) {
        const phoneMaskOptions = {
            mask: [
                {
                    mask: '(00) 0000-0000',
                },
                {
                    mask: '(00) 00000-0000',
                }
            ]
        };
        const mask = IMask(phoneInput, phoneMaskOptions);
    }
});
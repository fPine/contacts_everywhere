(() => {
    function mask(obj, func) {
            setTimeout(() => {
                obj.value = func(obj.value);
            }, 1);
        }

        function telephoneMask(value) {
            value = value.replace(/\D/g, "");
            value = value.replace(/^(\d{2})(\d)/, "($1) $2");
            value = value.replace(/(\d{5})(\d)/, "$1-$2");
            return value;
        }

        function cepMask(value) {
            value = value.replace(/\D/g, "");
            value = value.replace(/^(\d{5})(\d)/, "$1-$2");
            return value;
        }

        function applyMask(selector, maskFunction, maxSize) {
            const fields = document.querySelectorAll(selector);
            fields.forEach((field) => {
                field.setAttribute('maxlength', maxSize);
                field.addEventListener('input', () => mask(field, maskFunction));
            });
        }

        function applyAllMasks() {
            applyMask('#form-contact input[name="telefone"]', telephoneMask, 15);
            applyMask('#form-contact input[name="cep"]', cepMask, 9);
        }

        window.addEventListener('load', applyAllMasks);
        window.addEventListener('focus', applyAllMasks);


})();


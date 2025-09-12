const imageForPin = document.querySelectorAll('.js-images-for-pin');

if (imageForPin.length > 0) {
    imageForPin.forEach(input => {
        input.addEventListener('change', event => {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                // ← input の親 label を探す
                const label = event.target.closest('.js-preview-label');
                if (!label) return;

                const preview = label.querySelector('.js-preview-image');
                const imgBox = label.querySelector('.js-preview-box');

                preview.src = e.target.result;
                preview.classList.remove('hidden');
                imgBox.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    });
}
window.addEventListener('load', () => {
    const category = document.querySelector('#category_filter');
    if(!category) return;

    category.addEventListener('change', (e) => {
        const selectedSlug = e.target.value;
        if(selectedSlug === '-1'){
            window.location.replace(`/`);
            return;
        }
        window.location.replace(`/?category=${selectedSlug}`);
    });
});

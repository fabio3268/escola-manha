document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            // Aqui você pode adicionar a lógica para trocar o conteúdo da área administrativa
            console.log(`Clicou em: ${item.textContent}`);
        });
    });
});

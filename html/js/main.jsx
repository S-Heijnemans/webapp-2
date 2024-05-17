const warning = () => {
    const titel = document.querySelector('.titel');
    titel.className = 'warning';
    titel.textContent = 'Pas op! je hebt de titel veranderd';
    console.log(titel.textContent);
}
const yeet = () => {
    const titel = document.querySelector('.titel');
    const bounce = Math.floor(Math.random() * 100);
    titel.style = `margin-top: ${bounce}px`;
}
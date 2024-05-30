const titel = document.querySelector('.titel');
const warning = () => {

    titel.className = 'warning';
    titel.textContent = 'Pas op! je hebt de titel veranderd';
    console.log(titel.textContent);
}
const yeet = () => {
    const bounce = Math.floor(Math.random() * 100);
    titel.style = `margin-top: ${bounce}px`;
}  

const popUpNotifiction = (message, prio) => {
    const notification = document.createElement('div');
    const title = document.createElement('h2');
    notification.classList.add('notification');
    notification.classList.add(prio);
    title.innerHTML = message;
    notification.appendChild(title);
    document.body.appendChild(notification);
}
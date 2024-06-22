// const popUpNotifiction = (message, prio) => {
//     const notification = document.createElement('div');
//     const title = document.createElement('h2');
//     notification.classList.add('notification');
//     notification.classList.add(prio);
//     title.innerHTML = message;
//     notification.appendChild(title);
//     document.body.appendChild(notification);
// }

const today = new Date().toISOString().split("T")[0];
let vertrek;
let terugkomst;

const setDate = () => {
    const vertrekDate = vertrek.value;
    const terugkomstDate = terugkomst.value;
    vertrek.setAttribute("max", terugkomstDate);
    terugkomst.setAttribute("min", vertrekDate);
};

const initializeDate = () => {
    vertrek = document.querySelector("#startdate");
    terugkomst = document.querySelector("#enddate");

    vertrek.addEventListener("change", setDate);
    terugkomst.addEventListener("change", setDate);
    vertrek.setAttribute("min", today);
    vertrek.value = today;
    terugkomst.setAttribute("min", today);
};

initializeDate();

const resetDate = () => {
    initializeDate();
};

function disableSameDestination() {
    var startingLocation = document.getElementById("starting_location");
    var destination = document.getElementById("destination");

    // Enable all options first
    for (var i = 0; i < destination.options.length; i++) {
        destination.options[i].disabled = false;
    }

    // Disable the selected starting location in the destination dropdown
    if (startingLocation.value) {
        for (var j = 0; j < destination.options.length; j++) {
            if (destination.options[j].value === startingLocation.value) {
                destination.options[j].disabled = true;
                break;
            }
        }
    }
}
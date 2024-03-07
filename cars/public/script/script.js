//open Change Date modal, showCar.blade.php
const dialogs = document.querySelectorAll(".changeDateBox");
const buttons = document.querySelectorAll(".showChangeDate");
const closeButtons = document.querySelectorAll(".closeChangeDate");

// "Show the dialog" button opens the dialog modally
buttons.forEach((button, index) => {
    button.addEventListener("click", () => {
        dialogs[index].showModal();
    });
});

// "Close" button closes the dialog
closeButtons.forEach((closeButton, index) => {
    closeButton.addEventListener("click", () => {
        dialogs[index].close();
    });
});

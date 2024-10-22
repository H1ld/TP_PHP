//manage creating new projet pop-up

const addProjectBtn = document.getElementById('add-project-btn');
const addProjectPopup = document.getElementById('add-project-popup');
const closePopup = document.querySelector('.close');

addProjectBtn.addEventListener('click', () => {
    addProjectPopup.style.display = 'flex';
});

closePopup.addEventListener('click', () => {
    addProjectPopup.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === addProjectPopup) {
        addProjectPopup.style.display = 'none';
    }
});
import {
    burgerButtonSelector,
    closeButtonSelector,
    navListSelector,
    navItemSelector,
    openClass,
    actionClass
} from "./settings";

const header = {
    init() {
        this.burgerButtonElement = document.querySelector(burgerButtonSelector);
        this.closeButtonElement = document.querySelector(closeButtonSelector);
        this.navListElement = document.querySelector(navListSelector);
        this.navItemElements = document.querySelectorAll(navItemSelector);
        this.openClass = openClass;
        this.actionClass = actionClass;

        this.openMenu();
        this.closeMenu();
    },

    openMenu() {
        this.burgerButtonElement.addEventListener('click', () => {
            this.burgerButtonElement.setAttribute('aria-expanded', 'true');
            this.navListElement.classList.add(this.openClass);
            this.navItemElements.forEach((item) => {
                item.classList.add(this.actionClass);
            });
        });
    },

    closeMenu() {
        this.closeButtonElement.addEventListener('click', () => {
            this.burgerButtonElement.setAttribute('aria-expanded', 'false');
            this.navListElement.classList.remove(this.openClass);
        });
    }
}

header.init();
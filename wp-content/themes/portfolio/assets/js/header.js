import {settings} from "./settings";

const header = {
    init() {
        this.burgerButtonElement = document.querySelector(settings.burgerButtonSelector);
        this.closeButtonElement = document.querySelector(settings.closeButtonSelector);
        this.navListElement = document.querySelector(settings.navListSelector);
        this.navLinkElements = document.querySelectorAll(settings.navLinkSelector);
        this.openClass = settings.openClass;
        this.actionClass = settings.actionClass;

        this.openMenu();
        this.closeMenu();
    },

    openMenu() {
        this.burgerButtonElement.addEventListener('click', () => {
            this.burgerButtonElement.setAttribute('aria-expanded', 'true');
            this.navListElement.classList.add(this.openClass);
            this.navLinkElements.forEach((link) => {
                link.classList.add(this.actionClass);
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
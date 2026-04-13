const header = {
    init() {
        this.burgerButtonElement = document.querySelector(headerSettings.burgerButtonSelector);
        this.closeButtonElement = document.querySelector(headerSettings.closeButtonSelector);
        this.navListElement = document.querySelector(headerSettings.navListSelector);
        this.navItemElements = document.querySelectorAll(headerSettings.navItemSelector);
        this.openClass = headerSettings.openClass;
        this.actionClass = headerSettings.actionClass;

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
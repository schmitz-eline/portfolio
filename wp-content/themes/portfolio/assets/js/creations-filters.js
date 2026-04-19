import {settings} from "./settings";

const creationsFilters = {
    init() {
        this.filterItemElements = document.querySelectorAll(settings.filterItemSelector);
        this.cardArticleElements = document.querySelectorAll(settings.cardArticleSelector);
        this.urlParams = new URLSearchParams(window.location.search);
        this.initialFilter = this.urlParams.get('filter') || 'all';

        this.applyFilter(this.initialFilter);
        this.handleFilterClicks();
    },

    handleFilterClicks() {
        this.filterItemElements.forEach((filter) => {
            filter.addEventListener('click', (event) => {
                event.preventDefault();

                const selectedFilter = filter.dataset.filter;
                const url = new URL(window.location);

                if (selectedFilter === 'all') {
                    url.searchParams.delete('filter');
                } else {
                    url.searchParams.set('filter', selectedFilter);
                }
                window.history.pushState({}, '', url.href);

                this.applyFilter(selectedFilter);
            });
        });
    },

    applyFilter(selectedFilter) {
        this.filterCards(selectedFilter);
        this.recalcLeftRightAlternation();
    },

    filterCards(selectedFilter) {
        this.filterItemElements.forEach((filter) => {
            const isActive = filter.dataset.filter === selectedFilter;
            filter.classList.toggle(settings.activeFilterClass, isActive);
        });

        this.cardArticleElements.forEach((card) => {
            const type = card.dataset.type;
            const isVisible = selectedFilter === 'all' || selectedFilter === type;

            card.classList.toggle(settings.isVisibleClass, isVisible);
            card.classList.toggle(settings.isHiddenClass, !isVisible);
        });
    },

    recalcLeftRightAlternation() {
        let index = 0;
        this.cardArticleElements.forEach((card) => {
            if (card.classList.contains(settings.isVisibleClass)) {
                index++;
                card.classList.toggle(settings.isEvenClass, index % 2 === 0);
            } else {
                card.classList.remove(settings.isEvenClass);
            }
        });
    }
}

creationsFilters.init();
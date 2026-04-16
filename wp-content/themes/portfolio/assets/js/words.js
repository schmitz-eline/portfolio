import {
    wordsInnerDivSelector,
    wordSpanSelector
} from "./settings";

const wordsSlider = {
    init() {
        this.wordsInnerDivElement = document.querySelector(wordsInnerDivSelector);
        this.wordSpanElements = document.querySelectorAll(wordSpanSelector);
        this.words = [];
        this.index = 0;
        this.delay = 2000;
        this.speed = 400;

        window.addEventListener('load', () => {
            this.wordSpanElements.forEach((wordSpan) => {
                this.words.push(wordSpan);
            });

            this.cloneWords();
            this.start();
        });
    },

    cloneWords() {
        this.firstClone = this.words[0].cloneNode(true);
        this.wordsInnerDivElement.appendChild(this.firstClone);
        this.wordHeight = this.words[0].offsetHeight;
    },

    start() {
        setInterval(() => {
            this.index++;
            this.wordsInnerDivElement.style.transition = `transform ${this.speed}ms ease-in-out`;
            this.wordsInnerDivElement.style.transform = `translateY(-${this.index * this.wordHeight}px)`;

            if (this.index === this.words.length) {
                this.wordsInnerDivElement.addEventListener('transitionend', () => {
                    this.wordsInnerDivElement.style.transition = 'none';
                    this.wordsInnerDivElement.style.transform = 'translateY(0)';
                    this.index = 0;
                    this.wordsInnerDivElement.offsetHeight;
                }, {once: true});
            }
        }, this.delay);
    }
}

wordsSlider.init();
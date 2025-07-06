export default class GSDialog extends HTMLElement {
    constructor() {
        super();
        const shadowRoot = this.attachShadow({ mode: 'open' });
        shadowRoot.innerHTML = `
            <style>
                dialog {
                    border: none;
                    outline: none;
                    width: 80vw;
                    height: 80vh;
                }

                .dialog-content {
                    width: 100%;
                    height: 100%;
                }

                dialog::backdrop {
                    background-color: rgba(0,0,0,0.3);
                    backdrop-filter: blur(3px);
                }
            </style>
            <button type="button">
                <slot name="trigger" />
            </button>
            <dialog>
                <div class="dialog-content">
                    <span data-title></span>
                    <slot />
                </div>
            </dialog>
        `;
    }

    connectedCallback() {
        this.updateContent();
        const button = this.shadowRoot.querySelector('button');
        const dialog = this.shadowRoot.querySelector('dialog');
        button.addEventListener('click', () => {
            dialog.showModal()
            document.body.style.overflow = 'hidden'
        });
        dialog.addEventListener('click', (e) => {
            if (e.target === dialog) {
                dialog.close();
                document.body.style.overflow = ''
            }
        });
    }

    static get observedAttributes() {
        return ['title'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
        this.updateContent();
    }

    updateContent() {
        const title = this.getAttribute('title') || '';
        this.shadowRoot.querySelector('[data-title]').textContent = title;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    customElements.define('gs-dialog', GSDialog);
});

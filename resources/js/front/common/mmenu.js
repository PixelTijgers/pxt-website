// Add DomLoader for Mmenu.
document.addEventListener(
    'DOMContentLoaded', () => {
        new Mmenu('#mobile-menu', {
                'extensions': [
                    'position-right',
                ]
        }, {
            offCanvas: {
                page: {
                    selector: '#page-container',
                }
            }
        });
    }
);

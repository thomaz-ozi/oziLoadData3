
/**
 * ------------------------------------------
 * oziSearch
 * -------------------------------------------
 * Ver: (1.0)
 * 2026-03-11
 * --------------------------------------------
 *
 *
 * data-ozi-search            → define onde buscar
 * data-ozi-search-min        → mínimo de caracteres antes de filtrar
 * data-ozi-search-multi      → true busca multi-palavra
 * data-ozi-search-highlight  → true highlight e/ou define classes do highlight
 */




(function($) {
    // Função para normalizar termos de busca
    function oziSearchNormalizeTerms(terms) {
        return terms.map(term => term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')).join('|');
    }

    // Função para limpar highlights anteriores
    function oziSearchClearHighlights(container) {
        container.find('[__oziSearchMark]').each(function() {
            const $el = $(this);
            $el.html($el.text());
            $el.removeAttr('__oziSearchMark');
        });
    }

    // Função para resolver itens baseado no seletor
    function oziSearchResolveItems($input, rawSelector) {
        let $items = $(rawSelector);
        if ($items.length === 0) {
            $items = $('.' + rawSelector);
        }
        return $items;
    }

    // Função para construir regex
    function oziSearchBuildRegex(pattern) {
        return new RegExp(`(${pattern})`, 'gi');
    }

    // Função para aplicar highlight
    function oziSearchApplyHighlight($element, regex, highlightClass) {
        const walker = document.createTreeWalker(
            $element[0],
            NodeFilter.SHOW_TEXT,
            {
                acceptNode: function(node) {
                    const parent = node.parentElement;
                    if (parent && (parent.tagName === 'SCRIPT' || parent.tagName === 'STYLE' || parent.tagName === 'NOSCRIPT' || parent.tagName === 'TEXTAREA')) {
                        return NodeFilter.FILTER_REJECT;
                    }
                    return NodeFilter.FILTER_ACCEPT;
                }
            }
        );

        const nodes = [];
        let node;
        while (node = walker.nextNode()) {
            nodes.push(node);
        }

        nodes.forEach(textNode => {
            if (textNode.parentElement && !textNode.parentElement.hasAttribute('__oziSearchMark')) {
                const text = textNode.nodeValue;
                const highlighted = text.replace(regex, `<span class="${highlightClass}" __oziSearchMark>$1</span>`);
                if (highlighted !== text) {
                    $(textNode).replaceWith(highlighted);
                }
            }
        });
    }

    $(document).on('input', '[data-ozi-search]', function() {
        const $input = $(this);
        const selector = $input.data('ozi-search');
        const minLength = parseInt($input.data('ozi-search-min')) || 0;
        const multi = $input.data('ozi-search-multi') === 'true';
        const noFilter = $input.data('ozi-search-no-filter') === 'true';
        const highlight = $input.data('ozi-search-highlight');
        const highlightClass = (!highlight || highlight === 'true' || highlight === '1') ? 'bg-dark text-white rounded px-1' : highlight;

        const value = $input.val().trim();
        const $items = oziSearchResolveItems($input, selector);

        // Limpar highlights anteriores
        oziSearchClearHighlights($items);

        if (value.length < minLength || value === '') {
            // Mostrar todos os itens e remover highlights
            $items.show();
            return;
        }

        const terms = multi ? value.split(/\s+/).filter(term => term.length > 0) : [value];
        const pattern = oziSearchNormalizeTerms(terms);
        const regex = oziSearchBuildRegex(pattern);

        if (noFilter) {
            // Apenas highlight, sem filtrar
            $items.each(function() {
                oziSearchApplyHighlight($(this), regex, highlightClass);
            });
        } else {
            // Filtrar e highlight
            $items.each(function() {
                const $item = $(this);
                const text = $item.text();
                if (regex.test(text)) {
                    oziSearchApplyHighlight($item, regex, highlightClass);
                    $item.show();
                } else {
                    $item.hide();
                }
            });
        }
    });
})(jQuery);
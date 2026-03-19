/**
 * ------------------------------------------
 * oziSearch
 * -------------------------------------------
 * Ver: (1.3)
 * 2026-03-18
 * --------------------------------------------
 *
 * data-ozi-search            → seletor ou classe dos itens pesquisáveis
 * data-ozi-search-group      → seletor ou classe dos grupos pais
 * data-ozi-search-min        → mínimo de caracteres para iniciar a busca
 * data-ozi-search-words      → habilita busca por múltiplas palavras
 * data-ozi-search-highlight  → habilita highlight padrão ou recebe classes CSS customizadas
 * data-ozi-search-no-filter  → mantém todos os itens visíveis e apenas destaca os termos encontrados
 */

(function ($) {
    function oziSearchIsTrue(value) {
        return value === true || value === 'true' || value === 1 || value === '1';
    }

    function oziSearchEscapeRegExp(str) {
        return String(str).replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function oziSearchNormalizeTerms(terms) {
        return terms
            .map(term => oziSearchEscapeRegExp(term))
            .sort((a, b) => b.length - a.length)
            .join('|');
    }

    function oziSearchResolveElements(rawSelector) {
        if (!rawSelector) return $();

        let $elements = $(rawSelector);

        if ($elements.length === 0) {
            $elements = $('.' + rawSelector);
        }

        return $elements;
    }

    function oziSearchResolveItems($input) {
        const rawSelector = String($input.data('ozi-search') || '').trim();
        return oziSearchResolveElements(rawSelector);
    }

    function oziSearchResolveGroups($input) {
        const rawSelector = String($input.data('ozi-search-group') || '').trim();
        return oziSearchResolveElements(rawSelector);
    }

    function oziSearchBuildRegex(pattern, globalSearch) {
        return new RegExp(`(${pattern})`, globalSearch ? 'gi' : 'i');
    }

    function oziSearchStoreOriginalHtml($items) {
        $items.each(function () {
            const $item = $(this);

            if ($item.data('__oziSearchOriginalHtml') === undefined) {
                $item.data('__oziSearchOriginalHtml', $item.html());
            }
        });
    }

    function oziSearchClearHighlights($items) {
        $items.each(function () {
            const $item = $(this);
            const originalHtml = $item.data('__oziSearchOriginalHtml');

            if (originalHtml !== undefined) {
                $item.html(originalHtml);
            }
        });
    }

    function oziSearchApplyHighlight($element, regex, highlightClass) {
        const root = $element[0];
        if (!root) return;

        const walker = document.createTreeWalker(
            root,
            NodeFilter.SHOW_TEXT,
            {
                acceptNode: function (node) {
                    const parent = node.parentElement;

                    if (!parent) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    if (
                        parent.tagName === 'SCRIPT' ||
                        parent.tagName === 'STYLE' ||
                        parent.tagName === 'NOSCRIPT' ||
                        parent.tagName === 'TEXTAREA'
                    ) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    if (parent.hasAttribute('__oziSearchMark')) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    if (!node.nodeValue || !node.nodeValue.trim()) {
                        return NodeFilter.FILTER_REJECT;
                    }

                    return NodeFilter.FILTER_ACCEPT;
                }
            }
        );

        const nodes = [];
        let currentNode;

        while ((currentNode = walker.nextNode())) {
            nodes.push(currentNode);
        }

        nodes.forEach(textNode => {
            const text = textNode.nodeValue;

            regex.lastIndex = 0;
            if (!regex.test(text)) return;

            regex.lastIndex = 0;

            const highlightedHtml = text.replace(
                regex,
                `<span __oziSearchMark class="${highlightClass}">$1</span>`
            );

            const temp = document.createElement('span');
            temp.innerHTML = highlightedHtml;

            const fragment = document.createDocumentFragment();
            while (temp.firstChild) {
                fragment.appendChild(temp.firstChild);
            }

            if (textNode.parentNode) {
                textNode.parentNode.replaceChild(fragment, textNode);
            }
        });
    }

    function oziSearchUpdateGroups($groups, $items) {
        if (!$groups.length || !$items.length) return;

        $groups.each(function () {
            const groupEl = this;

            const hasVisibleItems = $items.filter(function () {
                return groupEl.contains(this) && $(this).is(':visible');
            }).length > 0;

            if (hasVisibleItems) {
                $(groupEl).show();
            } else {
                $(groupEl).hide();
            }
        });
    }

    $(document).on('input', '[data-ozi-search]', function () {
        const $input = $(this);

        const minLength = parseInt($input.data('ozi-search-min'), 10) || 0;
        const words = oziSearchIsTrue($input.data('ozi-search-words'));
        const noFilter = oziSearchIsTrue($input.data('ozi-search-no-filter'));
        const highlight = $input.data('ozi-search-highlight');

        const highlightEnabled =
            highlight !== undefined &&
            highlight !== false &&
            highlight !== 'false' &&
            highlight !== 0 &&
            highlight !== '0';

        const highlightClass =
            !highlight || highlight === true || highlight === 'true' || highlight === '1'
                ? 'bg-dark text-white rounded px-1'
                : String(highlight);

        const value = String($input.val() || '').trim();
        const $items = oziSearchResolveItems($input);
        const $groups = oziSearchResolveGroups($input);

        if (!$items.length) return;

        oziSearchStoreOriginalHtml($items);
        oziSearchClearHighlights($items);

        if (value === '' || value.length < minLength) {
            $items.show();
            $groups.show();
            return;
        }

        const terms = words
            ? value.split(/\s+/).filter(Boolean)
            : [value];

        const pattern = oziSearchNormalizeTerms(terms);

        if (!pattern) {
            $items.show();
            $groups.show();
            return;
        }

        const regexTest = oziSearchBuildRegex(pattern, false);
        const regexHighlight = oziSearchBuildRegex(pattern, true);

        if (noFilter) {
            $items.show();
            $groups.show();

            if (highlightEnabled) {
                $items.each(function () {
                    oziSearchApplyHighlight($(this), regexHighlight, highlightClass);
                });
            }

            return;
        }

        $items.each(function () {
            const $item = $(this);
            const text = $item.text();

            if (regexTest.test(text)) {
                $item.show();

                if (highlightEnabled) {
                    oziSearchApplyHighlight($item, regexHighlight, highlightClass);
                }
            } else {
                $item.hide();
            }
        });

        oziSearchUpdateGroups($groups, $items);
    });
})(jQuery);
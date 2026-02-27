## 2026-02-27 - Missing ARIA labels on icon-only buttons in Twig templates
**Learning:** Found that Twig templates like `src/manufacturers.twig` make heavy use of AdminLTE and FontAwesome for UI but frequently omit `aria-label` attributes on icon-only `<button>` and `<a>` elements, rendering them inaccessible to screen readers.
**Action:** Always verify that icon-only interactive elements in Twig templates include descriptive `aria-label` attributes (and optionally `title` attributes for visual tooltips) to improve accessibility and user experience.

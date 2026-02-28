## 2024-03-01 - Form Label Accessibility in Input Groups
**Learning:** AdminLTE/Bootstrap `input-group-text` elements are often implemented as `<span>` tags next to inputs. While visually appearing as labels, they are not read by screen readers as associated with the input.
**Action:** When using `input-group-text`, convert the `<span>` to a `<label>` and explicitly link it to the adjacent input using a `for` attribute that matches the input's `id`. If the input lacks an `id` (like `assets_notes`), add one to complete the association.

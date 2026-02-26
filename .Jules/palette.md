## PALETTE'S JOURNAL

## 2024-05-22 - [Bootstrap 4 Input Group Accessibility]
**Learning:** Bootstrap 4's `input-group-text` inside a `span` or `div` is not automatically associated with the input it describes, unlike a proper `<label>`. This creates accessibility issues for screen reader users who won't know what the input field is for.
**Action:** Replace `span.input-group-text` with `label.input-group-text` and add a `for` attribute pointing to the input's `id`. This maintains the visual styling while providing semantic meaning.

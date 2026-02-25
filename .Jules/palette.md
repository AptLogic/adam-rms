## 2024-05-23 - Accessible Input Groups
**Learning:** Bootstrap input groups often use `span.input-group-text` for visual labels, which is inaccessible. Changing `span` to `label` with a `for` attribute maintains the layout while providing a proper accessible name.
**Action:** Inspect all `input-group-text` elements and convert to `label` where appropriate.

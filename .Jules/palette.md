## 2024-05-22 - Improving Form Accessibility in Twig Templates
**Learning:** Bootstrap input groups often use `span.input-group-text` as visual labels. Changing these to `label.input-group-text` with a `for` attribute is a valid and safe way to improve accessibility without breaking the layout.
**Action:** When auditing forms, check input groups for missing label associations and use `label.input-group-text` as a direct fix.

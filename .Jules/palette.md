## 2024-05-22 - Input Group Accessibility
**Learning:** Bootstrap input groups often use `span.input-group-text` for visual labels, which lacks semantic association with the input.
**Action:** When auditing forms, check input groups and convert `span.input-group-text` to `label.input-group-text` with a `for` attribute.

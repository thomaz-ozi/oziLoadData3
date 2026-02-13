
# oziLoadData v3.x

JavaScript utility for sending data via **fetch**, **page redirect**, or **window opening**, with automatic field collection, HTML5 validation, and dynamic response rendering.

Compatible with legacy versions (`ld`) and optimized for the new standard (`zld`).

---

## 📌 Overview

`oziLoadData` allows you to:

- Collect inputs without requiring a `<form>`
- Validate required fields (`required`)
- Send data using `fetch`, `window`, or `page`
- Render responses into a target container
- Work with Select2 and CKEditor
- Block submission when validation fails

---

## 📦 Requirements

- HTML5  
- JavaScript  
- jQuery 3.x or higher  
- Bootstrap 4 or 5  
- Modern browsers (Chrome, Firefox, Edge, Opera)

---

## 🔹 Usage Options

---

### 1️⃣HTML (`data-zld-*`) — **OFFICIAL STANDARD**

```html
<button
  type="button"
  data-zld-url="./form-content.php"
  data-zld-destiny-id="DestinyForm"
  data-zld-catch-group-id="actionForm-z2"
  class="btn btn-primary">
  Submit
</button>
```

✔ Preferred approach
✔ Better separation between HTML and JavaScript

---
### 2️⃣ JavaScript (CURRENT)

```js
oziLoadData({
  zldUrl: './form-content.php',
  zldDestinyId: 'DestinyForm',
  zldCatchGroupId: ['actionFormz2'],
  zldCatchItemName: 'teste:555',
});
```

✔ Recommended JavaScript usage

---




### 3️⃣ JavaScript (LEGACY – compatible)

```js
oziLoadData({
  ldUrl: './form-content.php',
  ldDestinyId: 'DestinyForm',
  ldCatchGroupId: ['actionForm2'],
  ldCatchItemName: 'teste:555',
});
````

⚠️ Compatible for maintenance only
✔ Not recommended for new projects

## 🔹 Group Data Collection

No `<form>` tag is required.

```html
<div id="actionForm">
  <input type="text" name="firstName" required>
  <input type="text" name="lastName">
</div>
```

```html
<button
  data-zld-url="./data-form"
  data-zld-destiny-id="destinyForm"
  data-zld-catch-group-id="actionForm">
  Save
</button>
```

### Multiple Groups

```html
data-zld-catch-group-id="['actionFormA','actionFormB']"
```

---

## 🔹 Individual Field Collection by `name`

### Single field

```html
<input type="text" name="token">
```

```html
data-zld-catch-item-name="token"
```

### Multiple fields

```html
data-zld-catch-item-name="['token','id']"
```

### Fixed value

```html
data-zld-catch-item-name="token:123"
```

---

## 🔹 Submission Modes

### Fetch (default)

```html
data-zld-mode="fetch"
```

### New window

```html
data-zld-mode="window"
```

### Page redirect

```html
data-zld-mode="page"
data-zld-mode-page-method="POST"
data-zld-mode-page-target="_self"
```

---

## 🔹 Validation (OFFICIAL BEHAVIOR)

* Based on HTML5 (`required`)
* CSS classes applied automatically:

    * valid → `is-valid`
    * invalid → `is-invalid`
* If validation fails:

    * submission is cancelled
    * fetch does not execute
    * redirect does not occur
    * button is re-enabled

---

## 🔹 Supported Fields

* input (text, email, radio, checkbox, file)
* select (single and multiple)
* textarea
* Select2 (4.x)
* CKEditor (4.x and 5.x)

---

## 🔹 Global Configuration

```js
oziLoadDataConf({
  zldProgressBarGlobalOption: true,
  zldProgressBarGlobalClass: 'progress-bar-global',
  zldResponseValidClass: 'is-valid',
  zldResponseInvalidClass: 'is-invalid',
});
```

---

## 🔹 Function Return

```js
const result = oziLoadData({...});

result.perm === 0 // success
result.perm > 0   // validation error
```

---

## 🚨 Breaking Changes v3.x

* `data-zld-group-id` removed
* `data-zld-way` removed
* IDs with `#` are no longer accepted
* validation now blocks submission
* official prefix is now `zld`

---

## 👤 Author

**Thomaz Ozi**

---

## 🙌 Acknowledgements

Thanks to the encouragement of friends and colleagues, this tool has been shared and improved over the years.

Luis Guilherme
Ovaldo
Otavio
Deyvidi
Caio

```
```


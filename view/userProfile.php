<?php

include('../partials-front/menu.php');
session_start();
$user = $_SESSION['user'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inline Profile Edit</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .field-wrapper {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 8px;
      margin-left: 50px;
    }

    .editable-input {
      border: none;
      background: transparent;
      outline: none;
      font-size: 1rem;
      font-family: inherit;
      width: auto;
    }
    .editable-input[readonly] {
      cursor: default;
    }
    .editable-input:focus {
      border-bottom: 1px solid #aaa;
    }

    .edit-icon {
      color: #888;
      cursor: pointer;
      font-size: 0.9rem;
    }
    .edit-icon:hover {
      color: #000;
    }

    .error-msg {
      display: block;
      color: red;
      font-size: 0.85rem;
      margin-top: 2px;
    }

    #showMsg {
      margin-top: 10px;
      font-weight: bold;
      color: green;
    }

    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
    }

    #save-pic-btn {
      margin-top: 8px;
      display: none;
    }
    #save-pic-btn button {
      background: #4CAF50;
      color: #fff;
      border: none;
      padding: 0.4rem 0.8rem;
      font-size: 0.9rem;
      border-radius: 6px;
      cursor: pointer;
    }
    #save-pic-btn button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>

  <form id="profile-form" enctype="multipart/form-data">
    <!-- Username -->
    <div class="field-wrapper">
      <input type="text" id="name-edit" name="username" value="<?= $user['username']; ?>" class="editable-input" readonly>
      <i class="fa fa-pen edit-icon" id="edit-name-icon" title="Click to edit"></i>
    </div>
    <span id="name-error" class="error-msg"></span>

    <!-- Email -->
    <div class="field-wrapper">
      <input type="email" id="email-edit" name="email" value="<?= $user['email']; ?>" class="editable-input" readonly>
      <i class="fa fa-pen edit-icon" id="edit-email-icon" title="Click to edit"></i>
    </div>
    <span id="email-error" class="error-msg"></span>

    <!-- Profile Picture -->
    <div class="field-wrapper">
      <label for="profile-pic">
        <img src="<?= $user['image'] ?? '../pic1.jpg'; ?>" alt="Profile Picture" id="profile-preview" class="profile-pic">
      </label>
      <input type="file" id="profile-pic" name="profile-pic" accept="image/*" style="display:none;">
    </div>
    <span id="image-error" class="error-msg"></span>
    <div id="save-pic-btn">
      <button type="submit"><i class="fa fa-save"></i> Save Picture</button>
    </div>
  </form>

  <div id="showMsg"></div>

   <h2>Purchase History</h2>

    <table class="purchase-history-table">
        <tr>
            <th>Order Id</th>
            <th>Date</th>
            <th>Items</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
        <tr>
            <td>1</td>
            <td>12.08.25</td>
            <td>Fish Chawmin</td>
            <td>Delivered</td>
            <td>$50</td>
        </tr>
    </table>

  <script>
    const nameInput = document.getElementById("name-edit");
    const emailInput = document.getElementById("email-edit");
    const editNameIcon = document.getElementById("edit-name-icon");
    const editEmailIcon = document.getElementById("edit-email-icon");
    const profileInput = document.getElementById("profile-pic");
    const preview = document.getElementById("profile-preview");
    const savePicBtn = document.getElementById("save-pic-btn");

    const nameError = document.getElementById("name-error");
    const emailError = document.getElementById("email-error");
    const imageError = document.getElementById("image-error");
    const msgBox = document.getElementById("showMsg");

    let originalName = nameInput.value.trim();
    let originalEmail = emailInput.value.trim();

    // --- Enable editing on icon click ---
    editNameIcon.addEventListener("click", () => {
      nameInput.removeAttribute("readonly");
      nameInput.focus();
    });
    editEmailIcon.addEventListener("click", () => {
      emailInput.removeAttribute("readonly");
      emailInput.focus();
    });

    // --- Auto-save helper ---
    async function autoSave(field, value, errorBox, originalRef, inputEl) {
      const formData = new FormData();
      formData.append(field, value);

      try {
        const res = await fetch("../controller/userInfoEditController.php", {
          method: "POST",
          body: formData
        });
        const data = await res.json();

        if (data.success) {
          errorBox.innerText = "";
         // msgBox.innerText = data.message;
          if (field === "username") originalName = value;
          if (field === "email") originalEmail = value;
        } else if (data.errors) {
          errorBox.innerText = data.errors[field] ?? `Invalid ${field}`;
          inputEl.value = originalRef; // revert
        } else {
          msgBox.innerText = "Internal Error. Try Again!";
          inputEl.value = originalRef;
        }
      } catch (err) {
        console.error(err);
        msgBox.innerText = "Network Error!";
        inputEl.value = originalRef; // revert
      }
    }

    // --- Blur event auto-save ---
    nameInput.addEventListener("blur", () => {
      nameInput.setAttribute("readonly", true);
      const newName = nameInput.value.trim();
      if (newName !== originalName) {
        autoSave("username", newName, nameError, originalName, nameInput);
      }
    });

    emailInput.addEventListener("blur", () => {
      emailInput.setAttribute("readonly", true);
      const newEmail = emailInput.value.trim();
      if (newEmail !== originalEmail) {
        autoSave("email", newEmail, emailError, originalEmail, emailInput);
      }
    });

    // --- Profile picture preview & save ---
    profileInput.addEventListener("change", (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
          preview.src = event.target.result;
        };
        reader.readAsDataURL(file);
        savePicBtn.style.display = "block";
      }
    });

    // Save picture on form submit
    document.getElementById("profile-form").addEventListener("submit", async function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      try {
        const res = await fetch("userInfoEditController.php", {
          method: "POST",
          body: formData
        });
        const data = await res.json();

        if (data.success) {
          imageError.innerText = "";
          msgBox.innerText = data.message;
          savePicBtn.style.display = "none";
        } else if (data.errors) {
          imageError.innerText = data.errors.image ?? "Invalid image";
        } else {
          msgBox.innerText = "Internal Error. Try Again!";
        }
      } catch (err) {
        console.error(err);
        msgBox.innerText = "Network Error!";
      }
    });
  </script>

</body>
</html>
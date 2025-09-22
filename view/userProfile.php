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
  <link rel="stylesheet" href="../css/profile.css">

</head>
<body>

<div class="profile-info">
  <!-- Username -->
   <div class="info">

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

   </div>
 
  <form id="profile-form" enctype="multipart/form-data">
    <!-- Profile Picture -->
    <div class="field-wrapper">
      <label for="profile-pic">
        <img src="<?php echo !empty($user['photo']) ? '../' . htmlspecialchars($user['photo']) : '../pic1.jpg'; ?>" 
             alt="Profile Picture" 
             id="profile-preview" 
             class="profile-pic">
      </label>
      <input type="file" id="profile-pic" name="profile-pic" accept="image/*" style="display:none;">
    </div>
    <span id="image-error" class="error-msg"></span>
    <div id="save-pic-btn">
      <button type="submit"><i class="fa fa-save"></i> Save Picture</button>
      <button type="button" id="cancel-pic-btn"><i class="fa fa-times"></i> Cancel</button>
    </div>
  </form>

  <div id="showMsg"></div>
</div>

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
      <td>Fish Chowmein</td>
      <td>Delivered</td>
      <td>$50</td>
    </tr>
    <tr>
      <td>2</td>
      <td>15.08.25</td>
      <td>Chicken Ramen</td>
      <td>Pending</td>
      <td>$70</td>
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
    const cancelPicBtn = document.getElementById("cancel-pic-btn");

    const nameError = document.getElementById("name-error");
    const emailError = document.getElementById("email-error");
    const imageError = document.getElementById("image-error");
    const msgBox = document.getElementById("showMsg");

    let originalName = nameInput.value.trim();
    let originalEmail = emailInput.value.trim();
    let originalPhoto = preview.src;

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
          if (field === "username") originalName = value;
          if (field === "email") originalEmail = value;
        } else if (data.errors) {
          showError(errorBox, data.errors[field] ?? `Invalid ${field}`);
          inputEl.value = originalRef; // revert
        } else {
          showMessage(msgBox, "Internal Error. Try Again!");
          inputEl.value = originalRef;
        }
      } catch (err) {
        console.error(err);
        showMessage(msgBox, "Network Error!");
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

    // Cancel picture change
    cancelPicBtn.addEventListener("click", () => {
      preview.src = originalPhoto;
      profileInput.value = "";
      savePicBtn.style.display = "none";
      imageError.innerText = "";
    });

    // Save picture on form submit
    document.getElementById("profile-form").addEventListener("submit", async function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      try {
        const res = await fetch("../controller/userInfoEditController.php", {
          method: "POST",
          body: formData
        });
        const data = await res.json();

        if (data.success) {
          imageError.innerText = "";
          savePicBtn.style.display = "none";
          originalPhoto = preview.src; // update reference
        } else if (data.errors) {
         showError(imageError, data.errors.image ?? "Invalid image");
        } else {
          showMessage(msgBox, "Internal Error. Try Again!");
        }
      } catch (err) {
        console.error(err);
       showMessage(msgBox, "Network Error!");
      }
    });

    function showError(errorBox, message, duration = 4000) {
  errorBox.innerText = message;
  if (message) {
    setTimeout(() => {
      errorBox.innerText = "";
    }, duration);
  }
}

function showMessage(msgBox, message, duration = 4000) {
  msgBox.innerText = message;
  if (message) {
    setTimeout(() => {
      msgBox.innerText = "";
    }, duration);
  }
}
  </script>
</body>
</html>
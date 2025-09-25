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

<div class="mid">
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

   <!-- Filter Section -->
<div class="filter">
  <!-- Search Box -->
  <div class="search">
    <input type="text" id="search-box" placeholder="Search by item, order ID, or date..." onkeyup="searchOrders(this.value)">
    <button id="search-btn"><i class="fa fa-search"></i></button>
  </div>

  <!-- Filter Dropdown -->
  <div class="filter-options">
    <select id="filter-status" onchange="showFilteredOrder(this.value)">
    <option value="All">All Status</option>
      <option value="Ordered">Ordered</option>
      <option value="Delivered">Delivered</option>
      <option value="Cancelled">Cancelled</option>
      <option value="In Progress">In Progress</option>
    </select>
  </div>
</div>
</div>
  <h2>Purchase History</h2>
 <table class="purchase-history-table" id="history-table">
  <tr>
    <th>Order Id</th>
    <th>Date</th>
    <th>Items</th>
    <th>Status</th>
    <th>Total</th>
    <th>Action</th>
  </tr>
</table>
<script>
function showFilteredOrder(str) {
  console.log('filtered order called', str);

  if (str === "") {
    document.getElementById("history-table").innerHTML = "";
    return;
  }

  // Save filter in URL
  const params = new URLSearchParams(window.location.search);
  params.set("filter", str);
  history.replaceState(null, "", "?" + params.toString());

  if (str === "All") {
    loadOrders();
    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      try {
        const orders = JSON.parse(this.responseText);
        loadFilterOrders(orders);
        viewButtonSetup();
      } catch (err) {
        console.error("Failed to parse JSON:", err);
      }
    }
  };
  xmlhttp.open("GET", "../controller/orderFilterController.php?q=" + encodeURIComponent(str), true);
  xmlhttp.send();
}

function searchOrders(searchTerm) {
  console.log('search orders called', searchTerm);

  if (searchTerm === "") {
    loadOrders();
    return;
  }

  const params = new URLSearchParams(window.location.search);
  params.set("search", searchTerm);
  history.replaceState(null, "", "?" + params.toString());

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      try {
        const orders = JSON.parse(this.responseText);
        loadFilterOrders(orders);
        viewButtonSetup();
      } catch (err) {
        console.error("Failed to parse JSON:", err);
      }
    }
  };
  xmlhttp.open("GET", "../controller/orderSearchController.php?search=" + encodeURIComponent(searchTerm), true);
  xmlhttp.send();
}

function loadFilterOrders(orders) {
  const table = document.getElementById("history-table");
  table.innerHTML = `
    <tr>
      <th>Order Id</th>
      <th>Date</th>
      <th>Food</th>
      <th>Status</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  `;

  if (!orders || orders.length === 0) {
    table.innerHTML += "<tr><td colspan='6' style='text-align:center;'>No purchase history found</td></tr>";
    return;
  }

  orders.forEach(order => {
    table.innerHTML += `
      <tr>
        <td>${order.id}</td>
        <td>${order.order_date}</td>
        <td>${order.food}</td>
        <td>${order.status}</td>
        <td>$${order.total}</td>
        <td>
          <button class="view-btn" 
                  data-order-id="${order.id}" 
                  style="width: 80px; height:30px; background-color: green; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            View
          </button>
        </td>
      </tr>
    `;
  });
}
</script>
<script>
  async function loadOrders() {
    const res = await fetch("../controller/userOrderController.php");
    const orders = await res.json();

    const table = document.getElementById("history-table");
    // Clear existing table content first
    table.innerHTML = `
      <tr>
        <th>Order Id</th>
        <th>Date</th>
        <th>Items</th>
        <th>Status</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    `;
    
    if (orders.length === 0) {
      table.innerHTML += "<tr><td colspan='6' style='text-align:center;'>No purchase history found</td></tr>";
    } else {
      orders.forEach(order => {
        table.innerHTML += `
          <tr>
            <td>${order.id}</td>
            <td>${order.order_date}</td>
            <td>${order.food}</td>
            <td>${order.status}</td>
            <td>$${order.total}</td>
            <td><button class="view-btn" data-order-id="${order.id}" style="width: 80px; height:30px; background-color:green; color: #fff; border: none; border-radius: 4px; cursor: pointer;">View</button></td>
          </tr>
        `;
      });

      
       viewButtonSetup();
    }
  }
  // Add event listeners to all "View" buttons
  function viewButtonSetup(){
    const viewButtons = document.querySelectorAll(".view-btn");
      viewButtons.forEach(button => {
        button.addEventListener("click", (event) => {
          const orderId = event.target.getAttribute("data-order-id");
          console.log(orderId);
          viewOrderDetails(orderId);  
        });
      });
  }
  // Function to fetch order details by order ID
async function viewOrderDetails(orderId) {
  const url = `../controller/userOrderDetailsController.php?order_id=${orderId}`;
  
  try {
    const res = await fetch(url, {
      method: 'GET',
    });

    if (res.ok) {
      const orderDetails = await res.json();

      if (orderDetails.success) {
        console.log(orderDetails.data); 
           window.location.href = "userOrderDetails.php";
      } else {
        console.error("No order found:", orderDetails.message);
      }
    } else {
      console.error("Failed to fetch order details");
    }
  } catch (err) {
    console.error("Error:", err);
  }
}
// loadOrders();
</script>

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
document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const savedFilter = params.get("filter");
  const savedSearch = params.get("search");

  if (savedSearch) {
    // Restore previous search
    const searchBox = document.getElementById("search-box");
    if (searchBox) {
      searchBox.value = savedSearch;
    }
    searchOrders(savedSearch);
  } else if (savedFilter && savedFilter !== "All") {
    // Restore previous filter
    showFilteredOrder(savedFilter);

    // Update dropdown UI
    const dropdown = document.getElementById("filter-status");
    if (dropdown) {
      dropdown.value = savedFilter;
    }
  } else {
    // Default: load all orders
    loadOrders();
  }
});

  </script>
</body>
</html>

<?php

include("../partials-front/footer.php");

?>
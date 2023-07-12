document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("item-form").addEventListener("submit", function (e) {
    e.preventDefault();
    var itemInput = document.getElementById("item-input");
    var item = itemInput.value.trim();

    if (item !== "") {
      addItem(item);
      itemInput.value = "";
    }
  });
  document
    .getElementById("del-item-form")
    .addEventListener("submit", function (e) {
      e.preventDefault();
      var itemId = document.getElementById("delete");
      var itemIddel = itemId.value.trim();

      if (itemIddel !== "") {
        delItem(itemIddel);
      }
    });
  function addItem(item) {
    var dataobj = "item=" + encodeURIComponent(item);
    $.ajax({
      url: "/add-item",
      method: "POST",
      data: dataobj,
      success: function (response) {
        updateItemList();
      },
      error: function (error) {
        console.log("No error");
      },
    });
  }
  function delItem(item) {
    var dataobj = "item=" + encodeURIComponent(item);
    $.ajax({
      url: "/del-item",
      method: "POST",
      data: dataobj,
      success: function (response) {
        updateItemList();
      },
      error: function (error) {
        console.log("No error");
      },
    });
  }
  function updateItemList() {
    $.get("/get-items", function (data) {
      renderItems(data);
    })
      .done(function () {
        console.log("Items retrieved successfully");
      })
      .fail(function (error) {
        console.error("Error getting items:", error);
      });
  }

  function renderItems(items) {
    var itemList = document.getElementById("item-list");
    itemList.innerHTML = "";
    itemsjson = JSON.parse(items);
    itemsjson.forEach(function (item) {
      var listItem = document.createElement("li");
      listItem.innerHTML = `
          <span class="item-name">${item.name}</span>
          <form action="/item/delete" method="post" id="del-item-form">
              <input type="hidden" name="delete" id="delete" value="${item.id}">
              <button type="submit" class="delete-btn">Delete</button>
          </form>
          <form action="/item/edit" method="post">
              <input type="hidden" name="editItemId" value="${item.id}">
              <input type="text" name="newItemName"  value="${item.name}" required>
              <button type="submit" class="edit-btn">Save</button>
          </form>
      `;

      itemList.appendChild(listItem);
    });
  }
});

// Initial load
updateItemList();

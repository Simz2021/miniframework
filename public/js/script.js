document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("item-form").addEventListener("submit", function (e) {
    e.preventDefault();
    var itemInput = document.getElementById("item-input");
    var item = itemInput.value.trim();
    console.log(item);
    if (item !== "") {
      addItem(item);
      itemInput.value = "";
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
          <span>${item.name}</span>
          <form action="/item/delete" method="post">
              <input type="hidden" name="delete" value="${item.id}">
              <button type="submit">Delete</button>
          </form>
          <form action="/item/edit" method="post">
              <input type="hidden" name="editItemId" value="${item.id}">
              <input type="text" name="newItemName" value="${item.name}" required>
              <button type="submit">Save</button>
          </form>
      `;

      itemList.appendChild(listItem);
    });
  }

  // Initial load
  updateItemList();
});

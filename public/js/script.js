console.log("This is the script");
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('item-form').addEventListener('submit', function(e) {
      e.preventDefault();
      var itemInput = document.getElementById('item-input');
      var item = itemInput.value.trim();
  
      if (item !== '') {
        addItem(item);
        itemInput.value = '';
      }
    });
  
    function addItem(item) {
      fetch('/add-item', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ item: item }),
      })
        .then(function(response) {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Error adding item: ' + response.status);
          }
        })
        .then(function(data) {
          console.log('Item added:', data);
          updateItemList(); // Refresh the item list
        })
        .catch(function(error) {
          console.error(error);
        });
    }
  
    function updateItemList() {
      fetch('/get-items')
        .then(function(response) {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error('Error getting items: ' + response.status);
          }
        })
        .then(function(data) {
          renderItems(data.items);
        })
        .catch(function(error) {
          console.error(error);
        });
    }
  
    function renderItems(items) {
      var itemList = document.getElementById('item-list');
      itemList.innerHTML = '';
  
      items.forEach(function(item) {
        var listItem = document.createElement('li');
        listItem.textContent = item.name;
        itemList.appendChild(listItem);
      });
    }
  
    // Initial load
    updateItemList();
  });
  
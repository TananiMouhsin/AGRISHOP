// JavaScript code (in your_script_file.js or inline)
document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll(".sidebar a");
    const contentDivs = document.querySelectorAll(".content");
  
    sidebarLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.preventDefault();
        const contentId = link.getAttribute("data-content");
  
        // Hide all content divs
        contentDivs.forEach((div) => {
          div.style.display = "none";
        });
  
        // Show the selected content div
        document.getElementById(contentId).style.display = "block";
      });
    });
    const logoutLink = document.querySelector(".logout-link");
    logoutLink.addEventListener("click", () => {
      // Perform logout logic here, e.g., redirect to the logout page or clear session storage, etc.
      window.location.href = "login.html"; // Replace "logout.html" with the actual logout URL
    });
  
  });
  
  const subcategories = {
                  fruits: ['Vegetables', 'Grains', 'Herbs', 'Nuts', 'Spices'],
                  'dairy-eggs': ['Milk', 'Cheese', 'Butter', 'Yogurt', 'Eggs'],
                  'meat-poultry': ['Beef', 'Chicken', 'Lamb', 'Pork', 'Turkey'],
                  'farm-supplies': ['Seeds', 'Fertilizers', 'Irrigation Systems', 'Farm Machinery', 'Gardening Tools', 'Pest Control Products'],
                  'value-added': ['Honey', 'Jams and Preserves', 'Pickles', 'Sausages and Charcuterie', 'Baked Goods'],
              };
      
              function updateSubcategories() {
                  const mainCategorySelect = document.getElementById('main-category');
                  const subCategorySelect = document.getElementById('sub-category');
                  const selectedMainCategory = mainCategorySelect.value;
      
                  // Clear existing options
                  subCategorySelect.innerHTML = '<option value="">--Select Subcategory--</option>';
      
                  // Add subcategory options based on the selected main category
                  if (selectedMainCategory && subcategories[selectedMainCategory]) {
                      subcategories[selectedMainCategory].forEach((subcategory) => {
                          const option = document.createElement('option');
                          option.textContent = subcategory;
                          option.value = subcategory.toLowerCase().replace(/ /g, '-');
                          subCategorySelect.appendChild(option);
                      });
                  }
              }


 let img1, img2, img3;
    let uploadedImages = 0;

    function dropHandler(event) {
      event.preventDefault();
      if (event.dataTransfer.items) {
        const imageFiles = [];
        for (let i = 0; i < event.dataTransfer.items.length; i++) {
          if (event.dataTransfer.items[i].kind === 'file') {
            const file = event.dataTransfer.items[i].getAsFile();
            if (file && file.type.startsWith('image/')) {
              imageFiles.push(file);
            }
          }
        }

        if (uploadedImages + imageFiles.length <= 3) {
          for (let i = 0; i < imageFiles.length; i++) {
            const file = imageFiles[i];
            const fileName = file.name;
            switch (uploadedImages + i + 1) {
              case 1:
                img1 = fileName;
                break;
              case 2:
                img2 = fileName;
                break;
              case 3:
                img3 = fileName;
                break;
            }

            displayImageName(fileName);
          }

          uploadedImages += imageFiles.length;
          document.getElementById('dropArea').innerText = `Drop ${3 - uploadedImages} more image(s)`;
        } else {
          document.getElementById('dropArea').innerText = `You can only upload ${3 - uploadedImages} more image(s)`;
        }
      }
    }

    function dragOverHandler(event) {
      event.preventDefault();
    }

    function displayImageName(fileName) {
      const listItem = document.createElement('li');
      listItem.textContent = fileName;
      document.getElementById('imageNames').appendChild(listItem);
    }

    function addProduct() {
      // ... Your existing addProduct code ...
  
      // Set the hidden input values with the image variables
      document.getElementById('img1').value = img1;
      document.getElementById('img2').value = img2;
      document.getElementById('img3').value = img3;
  
      // Submit the form to the PHP script
      document.getElementById('productForm').submit();
  }















// let img1 = "", img2 = "", img3 = "";
// let uploadedImages = 0;

// function dropHandler(event) {
//     event.preventDefault();
//     if (event.dataTransfer.items) {
//         const imageFiles = [];
//         for (let i = 0; i < event.dataTransfer.items.length; i++) {
//             if (event.dataTransfer.items[i].kind === 'file') {
//                 const file = event.dataTransfer.items[i].getAsFile();
//                 if (file && file.type.startsWith('image/')) {
//                     imageFiles.push(file);
//                 }
//             }
//         }

//         if (uploadedImages + imageFiles.length <= 3) {
//             for (let i = 0; i < imageFiles.length; i++) {
//                 const file = imageFiles[i];
//                 const fileName = file.name;
//                 switch (uploadedImages + i + 1) {
//                     case 1:
//                         img1 = fileName;
//                         break;
//                     case 2:
//                         img2 = fileName;
//                         break;
//                     case 3:
//                         img3 = fileName;
//                         break;
//                 }

//                 displayImageName(fileName);
//             }

//             uploadedImages += imageFiles.length;
//             document.getElementById('dropArea').innerText = `Drop ${3 - uploadedImages} more image(s)`;
//         } else {
//             document.getElementById('dropArea').innerText = `You can only upload ${3 - uploadedImages} more image(s)`;
//         }
//     }
// }

// function dragOverHandler(event) {
//     event.preventDefault();
// }

// function displayImageName(fileName) {
//     const listItem = document.createElement('li');
//     listItem.textContent = fileName;
//     document.getElementById('imageNames').appendChild(listItem);
// }

// function addProduct() {
//     // Set the hidden input values with the image variables
//     document.getElementById('img1').value = img1;
//     document.getElementById('img2').value = img2;
//     document.getElementById('img3').value = img3;

//     // Submit the form
//     document.getElementById('productForm').submit();
// }





  document.addEventListener('DOMContentLoaded', () => {
    const menuHamburger = document.querySelector(".hb");
    const navLinks = document.querySelector(".navlinks");
  
    menuHamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
  });
  



//   let img1 = "", img2 = "", img3 = "";
//   let uploadedImages = 0;

//   function dropHandler(event) {
//       event.preventDefault();
//       if (event.dataTransfer.items) {
//           const imageFiles = [];
//           for (let i = 0; i < event.dataTransfer.items.length; i++) {
//               if (event.dataTransfer.items[i].kind === 'file') {
//                   const file = event.dataTransfer.items[i].getAsFile();
//                   if (file && file.type.startsWith('image/')) {
//                       imageFiles.push(file);
//                   }
//               }
//           }

//           if (uploadedImages + imageFiles.length <= 3) {
//               for (let i = 0; i < imageFiles.length; i++) {
//                   const file = imageFiles[i];
//                   const fileName = file.name;
//                   switch (uploadedImages + i + 1) {
//                       case 1:
//                           img1 = fileName;
//                           break;
//                       case 2:
//                           img2 = fileName;
//                           break;
//                       case 3:
//                           img3 = fileName;
//                           break;
//                   }

//                   displayImageName(fileName);
//               }

//               uploadedImages += imageFiles.length;
//               document.getElementById('dropArea').innerText = `Drop ${3 - uploadedImages} more image(s)`;
//           } else {
//               document.getElementById('dropArea').innerText = `You can only upload ${3 - uploadedImages} more image(s)`;
//           }
//       }
//   }

//   function dragOverHandler(event) {
//       event.preventDefault();
//   }

//   function displayImageName(fileName) {
//       const listItem = document.createElement('li');
//       listItem.textContent = fileName;
//       document.getElementById('imageNames').appendChild(listItem);
//   }

//   function addProduct() {
//       // Set the hidden input values with the image filenames
//       document.getElementById('img1').value = img1;
//       document.getElementById('img2').value = img2;
//       document.getElementById('img3').value = img3;

//       // Submit the form
//       document.getElementById('productForm').submit();
//   }







//   var myDropzone = new Dropzone("#myDropzone", {
//     url: "upload.php",
//     paramName: "file[]", // Use "file[]" to match the PHP code
//     maxFiles: 3,
//     acceptedFiles: 'image/*',
// });






























    
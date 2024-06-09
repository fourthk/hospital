let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 100) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
})

// Pharmacy Javascript
// Pagination Logic navigation
const pageSize = 10;
let rows;
let totalPages;
let currentPage = 1;

function showPage(page) {
  const start = (page - 1) * pageSize;
  const end = start + pageSize;
  rows.forEach((row, index) => {
    if (index >= start && index < end) {
      row.style.display = "table-row";
    } else {
      row.style.display = "none";
    }
  });
}

function updatePagination() {
  rows = document.querySelectorAll("tbody tr");
  totalPages = Math.ceil(rows.length / pageSize);

  const paginationContainer = document.querySelector(".pagination");
  paginationContainer.innerHTML = ""; // Clear existing pagination buttons

  for (let i = 1; i <= totalPages; i++) {
    const button = document.createElement("button");
    button.innerText = i;
    button.addEventListener("click", () => {
      currentPage = i;
      showPage(currentPage);
      highlightButton(i);
    });
    paginationContainer.appendChild(button);
  }

  const prevButton = document.createElement("button");
  prevButton.innerText = "Prev";
  prevButton.addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--;
      showPage(currentPage);
      highlightButton(currentPage);
    }
  });
  paginationContainer.insertBefore(prevButton, paginationContainer.firstChild);

  const nextButton = document.createElement("button");
  nextButton.innerText = "Next";
  nextButton.addEventListener("click", () => {
    if (currentPage < totalPages) {
      currentPage++;
      showPage(currentPage);
      highlightButton(currentPage);
    }
  });
  paginationContainer.appendChild(nextButton);

  highlightButton(currentPage); // Highlight current page button
}

function highlightButton(page) {
  const buttons = document.querySelectorAll(".pagination button");
  buttons.forEach((button) => {
    button.classList.remove("active");
    if (parseInt(button.innerText) === page) {
      button.classList.add("active");
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Memanggil updatePagination() dan showPage() setelah halaman dimuat
  updatePagination();
  showPage(currentPage);

  const searchForm = document.querySelector("form");
  const searchInput = document.getElementById("searchInput");

  searchForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const searchTerm = searchInput.value.toLowerCase();
    const filteredRows = Array.from(rows).filter((row) => {
      const category = row
        .querySelector("td:first-child")
        .textContent.toLowerCase();
      const name = row
        .querySelector("td:nth-child(2)")
        .textContent.toLowerCase();
      return category.includes(searchTerm) || name.includes(searchTerm);
    });

    rows.forEach((row) => {
      if (filteredRows.includes(row)) {
        row.style.display = "table-row";
      } else {
        row.style.display = "none";
      }
    });

    currentPage = 1; // Reset to first page after search
    updatePagination();
  });

  searchInput.addEventListener("input", function () {
    if (this.value === "") {
      rows.forEach((row) => {
        row.style.display = "table-row";
      });
      currentPage = 1; // Reset to first page after clearing search input
      updatePagination();
    }
  });
});
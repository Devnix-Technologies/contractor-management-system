// DARK MODE
function toggleTheme(){
    document.body.classList.toggle("dark");
  }
  
  /* SEARCH + HIGHLIGHT */
  const searchInput = document.getElementById("search");
  
  if (searchInput) {
    searchInput.addEventListener("keyup", function () {
      const value = this.value.toLowerCase();
      const rows = document.querySelectorAll("#table tr");
  
      rows.forEach(row => {
        const nameCell = row.querySelector("td:first-child");
        if (!nameCell) return;
  
        const originalText = nameCell.getAttribute("data-original") || nameCell.innerText;
        nameCell.setAttribute("data-original", originalText);
  
        if (originalText.toLowerCase().includes(value)) {
          row.style.display = "";
          if (value !== "") {
            const regex = new RegExp(`(${value})`, "gi");
            nameCell.innerHTML = originalText.replace(
              regex,
              `<span class="highlight">$1</span>`
            );
          } else {
            nameCell.innerHTML = originalText;
          }
        } else {
          row.style.display = "none";
        }
      });
    });
  }
  
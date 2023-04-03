var filterBtn = document.getElementById("filter-btn");
var filterPopover = document.getElementById("filter-popover");

filterBtn.addEventListener("click", function() {
  filterPopover.style.display = (filterPopover.style.display === "block") ? "none" : "block";
});

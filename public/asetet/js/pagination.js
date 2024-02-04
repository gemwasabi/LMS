$(document).ready(function () {
  const table = $("table");
  const rowsPerPage = 5;
  const pagination = $("#pagination");

  function initTable() {
    const totalRows = table.find("tbody tr").length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    showPage(1);

    generatePaginationLinks(totalPages);
  }

  function showPage(pageNumber) {
    const start = (pageNumber - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    table.find("tbody tr").hide().slice(start, end).show();
  }

  function generatePaginationLinks(totalPages) {
    pagination.empty();

    for (let i = 1; i <= totalPages; i++) {
      const link = $("<a>", { href: "#", text: i });
      link.click(function (event) {
        event.preventDefault();
        showPage(i);
        updateActiveLink(i);
      });

      pagination.append(link);
    }

    updateActiveLink(1);
  }

  function updateActiveLink(activePage) {
    pagination.find("a").removeClass("active");
    pagination.find("a:contains(" + activePage + ")").addClass("active");
  }

  initTable();
});

<script>
    const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

    const comparer = (idx, asc) => (a, b) => ((v1, v2) => v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 :
        v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));


    document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
        const table = th.closest('table');
        Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
            .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
            .forEach(tr => table.appendChild(tr));
    })));


    function filterTable() {
        const titleInput = document.getElementById("searchTitle").value.toLowerCase();
        const dateInput = document.getElementById("searchDate").value;
        const table = document.getElementById("examTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const titleCell = rows[i].getElementsByTagName("td")[1];
            const dateCell = rows[i].getElementsByTagName("td")[0];
            const titleMatch = titleCell.textContent.toLowerCase().includes(titleInput);
            const dateMatch = dateInput ? dateCell.textContent === dateInput : true;

            if (titleMatch && dateMatch) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
</script>

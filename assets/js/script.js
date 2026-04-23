document.addEventListener("DOMContentLoaded", function () {

    const search = document.getElementById("search");
    const filter = document.getElementById("categoryFilter");

    function filtrer() {
        let s = search.value.toLowerCase();
        let f = filter.value;

        document.querySelectorAll("tbody tr").forEach(row => {
            let text = row.textContent.toLowerCase();
            let cat = row.querySelector(".categorie").textContent;

            let ok = text.includes(s) && (f === "" || cat === f);
            row.style.display = ok ? "" : "none";
        });
    }

    search.addEventListener("keyup", filtrer);
    filter.addEventListener("change", filtrer);
});
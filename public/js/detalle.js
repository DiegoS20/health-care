document.addEventListener("DOMContentLoaded", function () {
    const addRecetaBtn = document.getElementById("add-receta");
    const recetasContainer = document.getElementById("recetas-container");
    const recetaTemplate = document.getElementById("receta-template");
    addRecetaBtn.addEventListener("click", function () {
        const recetaClone = recetaTemplate.cloneNode(true);
        recetaClone.style.display = "inherit";
        recetasContainer.append(recetaClone);

        const selectElems = document.querySelectorAll("select");
        M.FormSelect.init(selectElems, {});
    });
});

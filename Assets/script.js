document.querySelectorAll(".btn-fav").forEach(btn => {
    btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("data-id")
        fetch(`/favoritar/${id}`);
        if (btn.querySelector("i").innerHTML === "favorite") {
            btn.querySelector("i").innerHTML = "favorite_border";
        } else {
            btn.querySelector("i").innerHTML = "favorite";
        };
    });
});
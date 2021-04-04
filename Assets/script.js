document.querySelectorAll(".btn-fav").forEach(btn => {
    btn.addEventListener("click", (e) => {
        fetch("/favoritar");
        if (btn.querySelector("i").innerHTML === "favorite") {
            btn.querySelector("i").innerHTML = "favorite_border";
        } else {
            btn.querySelector("i").innerHTML = "favorite";
        };
    });
});
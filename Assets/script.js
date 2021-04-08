document.querySelectorAll(".btn-fav").forEach(btn => {
    btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("data-id");
        fetch(`/favoritar/${id}`)
        .then(response => response.json())
        .then(response => {
            if(response.success == "ok") {
                if (btn.querySelector("i").innerHTML === "favorite") {
                    btn.querySelector("i").innerHTML = "favorite_border";
                } else {
                    btn.querySelector("i").innerHTML = "favorite";
                };
            }
        })
        .catch(err => {
            M.toast({
                html: 'Erro ao favoritar'
            })
        })

    });
});

document.querySelectorAll(".btn-delete").forEach(btn => {
    btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("data-id")
        const requestConfig = { method: "DELETE", headers: new Headers() }
        fetch(`/filmes/${id}`, requestConfig)
        .then(response => response.json())
        .then(response => {
            if(response.success == "ok") {
               const card = btn.closest(".col")
               card.classList.add("fadeOut")
               setTimeout(() => card.remove(), 1000)
            }
        })
        .catch(err => {
            M.toast({
                html: 'Erro ao Deletar'
            })
        })

    });
});
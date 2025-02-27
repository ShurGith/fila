document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll(".favorite-btn"),
		containsString = (obj, str) => {
			return Object.values(obj).some(value =>
				typeof value === 'string' && value.includes(str)
			);
		};
	console.log(containsString);
	btnsFav.forEach((btnFav) => {
		btnFav.addEventListener("click", function () {
			const productId = this.getAttribute("data-id"),
				contador = document.querySelector(".contador"),
				divFavorites = document.getElementById("div-favorites")
			
			fetch(`/favorites/toggle/${productId}`, {
				method: "POST",
				headers: {
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
					"Content-Type": "application/json"
				}
			})
				.then(response => response.json())
				.then(data => {
					if (containsString(data.favorites, productId)) {
						this.querySelector('svg').classList.add('text-green-500')
						contador.innerText = (+contador.innerText) + 1
					} else {
						this.querySelector('svg').classList.remove('text-green-500')
						contador.innerText = (+contador.innerText) - 1
					}
					if (contador.innerText === "0") {
						divFavorites.classList.add('hidden');
					} else {
						divFavorites.classList.remove('hidden');
					}
					//}
				});
		});
	})
})

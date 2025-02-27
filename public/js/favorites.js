document.addEventListener('DOMContentLoaded', () => {
	const btnsFav = document.querySelectorAll(".favorite-btn")
//	console.log(+contador.innerText)
	const containsString = (obj, str) => {
		return Object.values(obj).some(value =>
			typeof value === 'string' && value.includes(str)
		)
	};
	btnsFav.forEach((btnFav) => {
	btnFav.addEventListener("click", function () {
		const productId = this.getAttribute("data-id");
		const contador = document.querySelector(".contador")
	
		fetch(`/favorites/toggle/${productId}`, {
			method: "POST",
			headers: {
				"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
				"Content-Type": "application/json"
			}
		})
			.then(response => response.json())
			.then(data => {
				//	console.log(containsString(data.favorites, productId))
				if (containsString(data.favorites, productId)) {
					this.querySelector('svg').classList.add('text-green-500')
					contador.innerText = (+contador.innerText)+1
				} else {
					this.querySelector('svg').classList.remove('text-green-500')
					contador.innerText = (+contador.innerText)-1
				}
			});
	});
	})
})

document.addEventListener('DOMContentLoaded', () => {
	const botones = document.querySelectorAll('[aria-controls = disclosure-1]'),
		divs = document.querySelectorAll('#disclosure'),
		imagPal = document.querySelector('#img-ppal'),
		imagenes = document.querySelectorAll('[img-role = img-slider]')
	botones.forEach((boton, index) => {
		boton.addEventListener('click', () => {
			boton.classList.toggle('bg-indigo-50')
			divs[index].classList.toggle('hidden')
			let spans = boton.querySelectorAll('span')
			let svgs = boton.querySelectorAll('svg')
			spans.forEach(span => span.classList.toggle('text-indigo-600'))
			svgs.forEach(svg => svg.classList.toggle('hidden'))
		})
	})
	
	function clickClassImg(img) {
		imagenes.forEach((imag) => {
			elem = imag.parentElement.previousElementSibling
			if (elem)
				elem.classList.add('ring-transparent')
			img.parentElement.previousElementSibling.classList.remove('ring-transparent')
			const srcTumb = img.src
			const srcPal = imagPal.src
			imagPal.src = srcTumb
			img.src = srcPal
		})
	}
	
	imagenes.forEach(img => {
		img.addEventListener('click', function () {
			clickClassImg(this)
		})
	})
})
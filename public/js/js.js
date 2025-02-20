document.addEventListener('DOMContentLoaded', () => {
	const menu = document.getElementById('mainmenu');
	const imagmenu = document.getElementById('user-menu-button');
	imagmenu.addEventListener('click', () => {
		menu.classList.toggle('opacity-0');
		menu.classList.toggle('scale-95');
	})
})
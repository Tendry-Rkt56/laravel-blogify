const sidebar = document.querySelector('.navbars')
const menuIcon = document.getElementById('menu-icon')

menuIcon.addEventListener('click', () => {
     menuIcon.classList.toggle('bx-x')
     sidebar.classList.toggle('active')
})

      // FORMULAIRE DE CONTACT

      let modal = document.getElementById('myModal')

      if (modal) {
        let btn = document.querySelectorAll('.modal-js')
      
        btn.forEach(function(item) {
          item.addEventListener('click', () => {
            modal.style.display = 'block'
          })
        })
      }
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none'
    }
}

       // MENU BURGER

//   toggleMenu()

// récupérez le bouton du menu hamburger et la liste des liens
const menuBtn = document.querySelector('.menu-toggle')
const menu = document.querySelector('.open_nav')

// quand l'utilisateur clique sur le bouton, la liste des liens s'ouvre ou se ferme
menuBtn.addEventListener('click', function() {
  menu.classList.toggle('open')
  menuBtn.classList.toggle('open-nav')
})


// fermeture du menu burger

function toggleMenu () {  
    const navbar = document.querySelector('.main-navigation')
    const burger = document.querySelector('.menu-toggle')
    
    burger.addEventListener('click', () => {    
      navbar.classList.toggle('closing')
    })
  }
  toggleMenu()


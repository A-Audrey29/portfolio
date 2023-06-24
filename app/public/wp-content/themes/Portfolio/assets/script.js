// // ouverture d'un projet

// Sélectionner la lightbox et le bouton de fermeture
let lightboxModal = document.querySelector('.modal');
let btnCloseLightbox = document.querySelector('.close');
const lightbox = document.querySelector('.modal');
let listOfInfo = [];

// Fonction pour ouvrir la lightbox

document.querySelectorAll('.projet-link').forEach((photo) => {
    photo.addEventListener('click', function(e) {
        let modal = document.querySelector('.modal');
        // let selectedImage = e.target.closest('.galerie-img').querySelector('#img-fullscreen');
        let modalImage = modal.querySelector('.wp-block-omage img');

        // modalImage.src = selectedImage.src;
        // modalImage.alt = selectedImage.alt;
        modal.style.display = 'block';
        modal.classList.add('active');    
    })
})

document.querySelectorAll('.galerie-img-info').forEach((galerieImg) => {
        //récupérer les infos de la photo
        const title = galerieImg.querySelector('.galerie-title').textContent;
        const categorie = galerieImg.querySelector('.galerie-cat').textContent;
        const annee = galerieImg.getAttribute('data-date');

        listOfInfo.push(
            {
                title: title,
                categorie: categorie,
                annee: annee
            }
        );
})


// Fonction pour fermer la lightbox

function closeLightbox() {
    lightboxModal.style.display = 'none';
}
btnCloseLightbox.addEventListener('click', closeLightbox);


// récupération des informations (titre, catégorie, année) de la photo
  var listOfIconFullScreen = document.querySelectorAll('.icon-fullscreen');

  // Lorsque l'un des boutons est cliqué
  listOfIconFullScreen.forEach(function(button, position) {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      // Enregistrer l'index du bouton cliqué pour la navigation
      const title = listOfInfo[position].title;
      const categorie = listOfInfo[position].categorie;
      const annee = listOfInfo[position].annee;

      lightbox.querySelector('.lightbox-titre').textContent = title;
      lightbox.querySelector('.lightbox-cat').textContent = categorie;
      lightbox.querySelector('.lightbox-annee').textContent = annee;

      lightbox.setAttribute('data-current-index', position);

    });
  });

// // navigation des flèches 
// lightbox.querySelector('.lightbox-prev').addEventListener('click', function(e) {
//     e.stopPropagation(); // Empêche la propagation de l'événement pour éviter la fermeture de la lightbox
//     // parseInt permet de recuperer une chaine de caractères en entier 
//     var currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
//     var previousButton = listOfIconFullScreen[currentIndex - 1];
//     if (previousButton) {
//       previousButton.click();
//       lightbox.setAttribute('data-current-index', currentIndex - 1);
//     }
//   });

//   lightbox.querySelector('.lightbox-next').addEventListener('click', function(e) {
//     e.stopPropagation(); // Empêche la propagation de l'événement pour éviter la fermeture de la lightbox

//     var currentIndex = parseInt(lightbox.getAttribute('data-current-index'));
//     var nextButton = listOfIconFullScreen[currentIndex + 1];
//     if (nextButton) {
//       nextButton.click();
//       lightbox.setAttribute('data-current-index', currentIndex + 1);
//     }
//   });


// jQuery(document).ready(function($) {
//   $(".projet-link a").click(function(event) {
//       event.preventDefault();
//       console.log("Link clicked");
//       console.log($(".projet-popup a"));
//       $("#myModal").show();
//   });
//   $(".close").click(function(event) {
//       event.preventDefault();
//       console.log("Close clicked");
//       console.log($(".myModal"));
//       $(".myModal").hide();
//   });
// });

// // Select the link element
// let link = document.querySelector('.projet-link');

// // Add event listener to the click of the link
// link.addEventListener('click', (e) => {
//   e.preventDefault(); // Prevent the default behavior of the link

//   // Get the URL of the link
//   let url = link.getAttribute('href');

//   // Open the link content in a modal
//   let modal = document.getElementById('myModal');
//   let modalContent = modal.querySelector('.projet-info');
//   modalContent.innerHTML = ''; // Clear the modal content
//   let iframe = document.createElement('iframe');
//   iframe.setAttribute('src', url);
//   modalContent.appendChild(iframe);
//   modal.classList.add('show');
// });

// // Add event listener to the click of the close button
// let closeBtn = document.querySelector('.close');
// closeBtn.addEventListener('click', () => {
//   let modal = document.getElementById('myModal');
//   modal.classList.remove('show');
// });

// // Add event listener to the click of the overlay
// let overlay = document.querySelector('.customize-support');
// overlay.addEventListener('click', () => {
//   let modal = document.getElementById('projet-modal');
//   modal.classList.remove('show');
// });


// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.querySelectorAll(".photo-link")

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal
// btn.onclick = function() {
//   pre
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }











// jQuery(document).ready(function($) {

//   jQuery(document).ready(function($) {
//     $(".wp-block-image a").click(function(event) {
//       event.preventDefault();
//       var articleURL = $(this).attr("href");
//       var target = $(this).data("target") + articleURL;
//       $(target).addClass('projet-popup-container');
  
//       // Code pour ouvrir la lightbox avec l'article cible
//       // Remplacez ce code par la logique spécifique à votre lightbox
  
//       // console.log(articleURL);
//     });
//   });
  
//   // $(".wp-block-img img").click(function(event) {
//   //   event.preventDefault();
//   //   var target = $(this).data("target");
//   //   $(target).fadeIn();
//   //   $(target).css("background-color", "rgba(0, 0, 0, 0.8)");
//   // });
// // });


// // let popup = document.getElementById('projet-popup')

// // if (popup) {
// //   let btn = document.querySelectorAll('.photo')

// //   btn.forEach(function(item) {
// //     item.addEventListener('click', () => {
// //       modal.style.display = 'block'
// //       // let input = document.querySelector('#wpforms-61-field_3')
// //       // let referenceText = document.querySelector('#reference').textContent
// //       // input.value = referenceText
// //     })
// //   })
// // }

// // jQuery(document).ready(function($) {
// //   // Ciblez les liens vers les articles
// //   $('a.article-popup-link').click(function(e) {
// //       e.preventDefault();

// //       // Récupérez l'URL de l'article à charger
// //       var postURL = $(this).attr('href');

// //       // Chargez le contenu de l'article en utilisant AJAX
// //       $.ajax({
// //           url: postURL,
// //           success: function(data) {
// //               // Créez une fenêtre modale (pop-up)
// //               var popup = $('<div id="article-popup"></div>').append(data);

// //               // Affichez la fenêtre modale
// //               $('body').append(popup);
// //           }
// //       });
// //   });

// //   // Fermez la fenêtre modale lors du clic sur un élément avec la classe "close-popup"
// //   $(document).on('click', '.close-popup', function() {
// //       $('#article-popup').remove();
// //   });
// // });

// // // Sélectionner la lightbox et le bouton de fermeture
// // let popupProjet = document.querySelector('.projet-popup-container');
// // let btnCloseLightbox = document.querySelector('.popup-close');
// // const popup= document.querySelector('.projet-popup-container');
// // let listOfInfo = [];

// // // Fonction pour ouvrir la lightbox

// // document.querySelectorAll('.photo').forEach((icon) => {
// //     icon.addEventListener('click', function(e) {
// //       let popupProjet = document.querySelector('.projet-popup-container');

// //         let selectedImage = e.target.closest('.galerie-img').querySelector('#img-fullscreen');
// //         let modalImage = modal.querySelector('.lightbox-container img');

// //         modalImage.src = selectedImage.src;
// //         modalImage.alt = selectedImage.alt;
// //         modal.style.display = 'block';
// //         modal.classList.add('active');    
// //     })
// // })



// // class popup {
// //   static init(){
// // const links = document.querySelectorAll('.wp-block-image a').forEach(link => link.addEventListener('click', e =>{
// //   e.preventDefault()
// //   new popup(e.currentTarget.getAttribute('href'))
// // }))

// //   }
// // }

// // document.querySelectorAll('.wp-block-image a').forEach((event) => {
// //   event.addEventListener('click', function(e) {
// //       let popup = document.querySelector('.projet-popup');
// //       let selectedImage = e.target.closest('.galerie-img').querySelector('.wp-block-image a');
     
  
// //      popup.style.display = 'block';
// //      popup.classList.add('active');    
// //   })
// // })


// // 					$('.wp-block-image a').on('click', function() {
// // 						$(this).parent().closest('.projet-popup').hide();
// // 					});
				
// // jQuery(document).ready(function($) {
         

// //             // required elements
// //             var imgPopup = $('.projet-popup');
// //             var imgCont  = $('.projet-link');
// //             var popupImage = $('.img-wp-block-image img');
// //             var closeBtn = $('.close-btn');
          
// //             // handle events
// //             imgCont.on('click', function() {
// //               var img_src = $(this).children('img').attr('src');
// //               imgPopup.children('img').attr('src', img_src);
// //               imgPopup.addClass('opened');
// //             });
          
// //             $(imgPopup, closeBtn).on('click', function() {
// //               imgPopup.removeClass('opened');
// //               imgPopup.children('img').attr('src', '');
// //             });
          
// //             popupImage.on('click', function(e) {
// //               e.stopPropagation();
// //             });
            
// //           });


//    // FORMULAIRE DE CONTACT

// //    let modal = document.getElementById('projet-popup')

// //    if (modal) {
// //      let btn = document.querySelectorAll('.wp-block-image img')
   
// //      btn.forEach(function(item) {
// //        item.addEventListener('click', () => {
// //          modal.style.display = 'block'
// //         //  let input = document.querySelector('#wpforms-61-field_3')
// //         //  let referenceText = document.querySelector('#reference').textContent
// //         //  input.value = referenceText
// //        })
// //      })
// //    }
// // // When the user clicks anywhere outside of the modal, close it
// // window.onclick = function(event) {
// //  if (event.target == modal) {
// //      modal.style.display = 'none'
// //  }

// //  // Fermeture de la modale lors du clic sur la croix
// // span.onclick = function() {
// //   modal.style.display = "none";
// // }
// // }

// // Fonction pour ouvrir la lightbox

// document.querySelectorAll('wp-block-image img').forEach((photo) => {
//   photo.addEventListener('click', function(e) {
//       let modal = document.querySelector('.projet-popup');
//       let selectedImage = e.target.closest('.galerie-img').querySelector('#img-fullscreen');
//       let modalImage = modal.querySelector('.lightbox-container img');

//       modalImage.src = selectedImage.src;
//       modalImage.alt = selectedImage.alt;
//       modal.style.display = 'block';
//       modal.classList.add('active');    
//   })
// })
$(document).ready(function(){
    $('.menu-toggle').on('click',function(){
 $('.nav').toggleClass('showing');
 $('.nav .un').toggleClass('showing');
    });
 });
 $('.post-wrapper').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  })

 
  ClassicEditor.create( document.querySelector( '#x' ), {
         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
         heading: {
             options: [
                 { 
                   model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'
                 },
                 { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                 { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
             ]
         }
     } )
     .catch( error => {
         console.log( error );
     } );
 
     

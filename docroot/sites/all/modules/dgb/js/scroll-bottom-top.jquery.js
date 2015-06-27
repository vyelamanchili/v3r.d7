/* $Id:*/

Drupal.behaviors.DGBJumper = function (context) {
 var jColor = $('td a').css('color');
 $('.jump-pointer').css({color: jColor});

 $('#jump-to-below').click(function() {
  goToJump('#table-below-jump');
 });
 $('#jump-to-top').click(function() {
  goToJump('#table-top-jump');
 });

 function goToJump(id){
  $('html, body').animate({scrollTop: $(id).offset().top}, 'slow');
 }
}

function main(){

}
$(document).ready(main);

$('.banner').hide();
$('.banner').fadeIn(2000);

$('.navigation').hide();
$('.navigation').fadeIn(2000);

$('.product').on('click', function(){
	$('.product-onclick').toggle(1000);
	$('.product').toggleClass('active');
});

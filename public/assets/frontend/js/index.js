
let menuBtn = document.querySelector('.menu-btn');
let menu = document.querySelector('.menu');
let body = document.querySelector('body');
let openMenu = false;
menuBtn.addEventListener('click', function(){
	menu.classList.toggle('active');
  console.log("scroll off")
  if(!openMenu){
    scrollOff();
    openMenu = true;
  } else{
    scrollOn();
    openMenu = false;
  }
    menuBtn.classList.toggle('active');
})

let openModal = document.querySelector(".openModalButton");
let closeModal = document.querySelector(".close");
let Modal = document.querySelector(".modal");
openModal.addEventListener("click", function () {
  Modal.classList.add("modalTarget");
  scrollOff();
});
closeModal.addEventListener("click", function () {
  Modal.classList.remove("modalTarget");
  scrollOn();
});
Modal.addEventListener("click", function (e) {
  if (e.target == Modal) {
    Modal.classList.remove("modalTarget");
    scrollOn();
  }
});

function scrollOff() {
  var scrollTop = $("html").scrollTop() ? $("html").scrollTop() : $("body").scrollTop(); // Works for Chrome, Firefox, IE...
  $("html").addClass("noscroll").css("top", -scrollTop);
}
function scrollOn() {
  var scrollTop = parseInt($("html").css("top"));
  $("html").removeClass("noscroll");
  $("html,body").scrollTop(-scrollTop);
}

$(document).ready(function(){
	$("#headerNav").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
});
 
$(document).ready(function(){
	$("#burgerNav").on("click","a", function (event) {
		event.preventDefault();
    menu.classList.toggle('active');
    menuBtn.classList.toggle('active');
openMenu = false;
    scrollOn();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
});

$(document).ready(function(){
	$("#footerNav").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
});
var PageLoaded = false;

setTimeout(PageLoader, 500);

function PageLoader() {
  if (!PageLoaded) {
    console.log("loader");
    document.documentElement.style.backgroundSize = "1000px";
  }
}

window.onload = function () {
  PageLoaded = true;
  document.documentElement.style.backgroundImage = "none";
  document.getElementById("content-load").style.display = "block";
  console.log("push");
}; 




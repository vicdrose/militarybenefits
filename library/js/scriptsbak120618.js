jQuery(document).ready(function($) {
	// Put all your regular jQuery in here.

	console.log('Bones ahoy!');

	// initiate slick slider on the homepage:
	jQuery('.homepage-carousel').slick({
		dots           : true,
		arrows         : true,
		autoplay       : true,
		fade           : true,
		speed          : 300,
		pauseOnHover   : false,
		infinite       : true,
		slidesToShow   : 1,
		adaptiveHeight : true,
		cssEase        : 'linear',
		centerMode : true,
		waitForAnimate : true
	});

	$("#searchglass").click(function(){

  //$("#dropdownsearch").slideToggle();
  //$("#dropdownsearch").toggle();
  $("#dropdownsearch").slideToggle();

});

$("#searchglass").hover(function(){
    $(this).css("color", "black");
    }, function(){
    $(this).css("color", "#254479");
});

var page = 0;


$(window).scroll(function() {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
      if(page == myContent.length)page=0; //page++;
      //add from javascript array
      //$("body").append('<div style="height: 200px;background-color: green;border-bottom: 1px black solid;"></div>');
      $(".infinite").append(myContent[page]);
      console.log(myContent);
      page++;
      //console.log(++page);

      
    }
});

});

var night = 1;
//var nav = responsiveNav(".nav-collapse");

function nightmode(){
 night *= -1; 
  if(night == 1){
    document.getElementById("page").style.backgroundColor = "black";
    document.getElementById("page").style.color = "white";
  }
  else if(night==-1){
    document.getElementById("page").style.backgroundColor = "white";
    document.getElementById("page").style.color = "black";
  }
  
}




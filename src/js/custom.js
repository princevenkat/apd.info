

jQuery("document").ready(function($){
  // Sticky Nav Fucntion
	var nav = $('nav');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 136) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});


  // Loadmore Fucntion
  $("#list").loadMore({
        selector: 'li',
        loadBtn: '#btn',
        limit: 3,
        load: 3,
        animate: true,
        animateIn: 'fadeInUp'
  });


  // Archive Fucntion
    $.fn.extend({
      treed: function (o) {
        
        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';
        
        if (typeof o != 'undefined'){
          if (typeof o.openedClass != 'undefined'){
          openedClass = o.openedClass;
          }
          if (typeof o.closedClass != 'undefined'){
          closedClass = o.closedClass;
          }
        };
        
          //initialize each of the top levels
          var tree = $(this);
          tree.addClass("tree");
          tree.find('li').has("ul").each(function () {
              var branch = $(this); //li with children ul
              branch.prepend("<i class='indicator fa " + closedClass + "'></i>");
              branch.addClass('branch');
              branch.on('click', function (e) {
                  if (this == e.target) {
                      var icon = $(this).children('i:first');
                      icon.toggleClass(openedClass + " " + closedClass);
                      $(this).children().children().toggle();
                  }
              })
              branch.children().children().toggle();
          });
          //fire event from the dynamically added icon
        tree.find('.branch .indicator').each(function(){
          $(this).on('click', function () {
              $(this).closest('li').click();
          });
        });
          //fire event to open branch if the li contains an anchor instead of text
          tree.find('.branch>a').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
          //fire event to open branch if the li contains a button instead of text
          tree.find('.branch>button').each(function () {
              $(this).on('click', function (e) {
                  $(this).closest('li').click();
                  e.preventDefault();
              });
          });
      }
  });

  //Initialization of treeviews
  $('#tree1').treed({openedClass:'fa-folder-open', closedClass:'fa-folder'});
  $('#tree2').treed({openedClass:'fa-folder-open', closedClass:'fa-folder'});

});

/*
$(window).onload(function() {
  //window.onload = function(){
    var imgs = document.getElementsByTagName('img');
    for( i=0; i<imgs.length; i++){if (window.CP.shouldStopExecution(1)){break;}
         imgEl = imgs[i];
         rgb = getAverageRGB(imgEl);
        imgEl.parentNode.style.backgroundColor = 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')';
        //imgEl.parentNode.style.color = 'rgb('+(255-rgb.r)+','+(255-rgb.g)+','+(255-rgb.b)+')';
    }
    window.CP.exitedLoop(1);

    function getAverageRGB(imgEl) {

        var blockSize = 5, // only visit every 5 pixels
            defaultRGB = {r:255,g:255,b:255}, // for non-supporting envs
            canvas = document.createElement('canvas'),
            context = canvas.getContext && canvas.getContext('2d'),
            data, width, height,
            i = -4,
            length,
            rgb = {r:0,g:0,b:0},
            count = 0;

        if (!context) {
            return defaultRGB;
        }

        height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
        width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;

        context.drawImage(imgEl, 0, 0);

        try {
            data = context.getImageData(0, 0, width, height);
        } catch(e) {
            return defaultRGB;
        }

        length = data.data.length;

        while ( (i += blockSize * 4) < length ) {if (window.CP.shouldStopExecution(2)){break;}
            ++count;
            rgb.r += data.data[i];
            rgb.g += data.data[i+1];
            rgb.b += data.data[i+2];
        }
window.CP.exitedLoop(2);


        // ~~ used to floor values
        rgb.r = ~~(rgb.r/count);
        rgb.g = ~~(rgb.g/count);
        rgb.b = ~~(rgb.b/count);

        return rgb;
    }
//}
});

*/

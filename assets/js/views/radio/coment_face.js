(function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $("#contacto").click(function () {
        $('html,body').animate({
            scrollTop: $("#pie2").offset().top
        }, 1000);
    });
    
    $("#nosotros").click(function () {
      $('html,body').animate({
          scrollTop: $("#pie1").offset().top
      }, 1000);
    });

 

 
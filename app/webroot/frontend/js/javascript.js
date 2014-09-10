/**
 * Created by Duong Tien on 8/25/14.
 */
$(document).ready(function(){
    $('.bxslider').bxSlider({
        auto: true,
        pager: false
    });
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '594339744008616',
            xfbml      : true,
            version    : 'v2.0'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

//    $('.login-facebook').click(function(){
//        login();
//        return false;
//    });

    function logout(){

    }

})
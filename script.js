var app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});


function slideLeft() {
    var elem = document.getElementById("animation");
    var elem2 = document.getElementById("animation2");
    var signUpTxt = document.getElementById("signUpTxt");
    var logInTxt = document.getElementById("logInTxt");
    var loginForm = document.getElementById("loginForm");
    var signupForm = document.getElementById("signupForm");
    var pos = 0;
    var fullOpacity = 100;
    var noOpacity = 0;
    var id = setInterval(frame, 1);
    function frame() {
        if (pos == -240) {
            clearInterval(id);
        } else {
            pos--;
            fullOpacity--;
            noOpacity++;
            elem.style.left = 2 * pos + 'px';
            elem2.style.left = 2 * pos + 'px';
            signUpTxt.style.opacity = fullOpacity + '%';
            logInTxt.style.opacity = noOpacity + '%';
            loginForm.style.opacity = fullOpacity + '%';
            signupForm.style.opacity = noOpacity + '%';
            elem2.style.display = "inline-block";
            logInTxt.style.display = "inline-block";
            signUpTxt.style.display = "inline-block";
        }
    }
}

function slideRight() {
    var elem = document.getElementById("animation");
    var elem2 = document.getElementById("animation2");
    var signUpTxt = document.getElementById("signUpTxt");
    var logInTxt = document.getElementById("logInTxt");
    var loginForm = document.getElementById("loginForm");
    var pos = -240;
    var fullOpacity = 100;
    var noOpacity = 0;
    var id = setInterval(frame, 1);
    function frame() {
        if (pos == -6) {
            clearInterval(id);
        } else {
            pos++;
            fullOpacity--;
            noOpacity++;
            elem.style.left = 2 * pos + 'px';
            elem2.style.left = 2 * pos + 'px';
            signUpTxt.style.opacity = noOpacity + '%';
            logInTxt.style.opacity = fullOpacity + '%';
            loginForm.style.opacity = noOpacity + '%';
            signupForm.style.opacity = fullOpacity + '%';
            signUpTxt.style.display = "inline-block";
            logInTxt.style.display = "inline-block";

        }
    }
}


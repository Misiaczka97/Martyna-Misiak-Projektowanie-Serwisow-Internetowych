
const run = () => {
    load_site();
    sign_in();
    sign_up();
    premium();
    burger();
    back();
    navbar();
    login();
    register();
    login_text();
    search_element();
    search();
    // rand_ad();
    ret();
}

const rand_ad = () =>{
    let ad_vertical_right = document.querySelectorAll('.ad_vertical_right');
    let ad_vertical_left = document.querySelectorAll('.ad_vertical_right');
    let ad_horizontal = document.querySelectorAll('.ad_horizontal');
    // let ad_vertical = ad_vertical_left.concat(ad_vertical_right);

    if(ad_horizontal){
        ad_horizontal.forEach(function(x){
            x.innerHTML = "<img src='"+Math.floor(Math.random() * 10)+"'>";
        })
    }

    if(ad_vertical_right){
        ad_vertical_right.forEach(function(y){
            y.innerHTML = "<img src='"+Math.floor(Math.random() * 10)+"'>";
        })
    }

    if(ad_vertical_left){
        ad_vertical_right.forEach(function(y){
            y.innerHTML = "<img src='"+Math.floor(Math.random() * 10)+"'>";
        })
    }


}

const search = () => {
    let search = document.querySelector('#submit_search');

    if(search){
        search.addEventListener('click', function(){
            let value_search = document.querySelector('#nyg').value;
            let sort = document.querySelector('#najnowsze');

            xhr("POST", "main.php", "type=search&value="+value_search+"&sort="+sort.checked);
        })
    }
}

const search_element = () => {
    let search_element = document.querySelector('#search');

    if(search_element){
        search_element.addEventListener('click', function(){
            xhr("POST", "main.php", "type=search_element");

        })
    }
}

const login_text = () =>{
    let login_div = document.querySelector('#login_popup');
    var cookies = document.cookie;

    if(login_div && cookies.indexOf("email" + "=") !== -1){
        login_div.innerText = getCookieValue("email");
    }
}

const getCookieValue = (cookieName) =>{
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    
    for (var i = 0; i < cookieArray.length; i++) {
      var cookie = cookieArray[i];
      while (cookie.charAt(0) == ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) == 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
    return null; // Zwraca null, jeśli ciasteczko o danej nazwie nie istnieje
  }

const register = () =>{
    let register = document.querySelector('#submit_button');
    if(register){
        register.addEventListener('click', function(){
            let email = document.querySelector('#email').value;
            let password1 = document.querySelector('#password1').value;
            let password2 = document.querySelector('#password2').value;
            let error_div = document.querySelector('#error');
            let checkbox = document.querySelector('#terms');
            if (!email.includes('@')){
                error_div.innerText = "Email niepoprawny";
                return 1;
            }
            if (password1 != password2) {
                error_div.innerText = "Hasła nie są takie same";
                return 1;
            }
            if (password1.length < 8){
                error_div.innerText = "Hasła musi się składać z co najmniej 8 znaków";
                return 1;
            }
            if (checkbox.checked != 1){
                error_div.innerText = "Musisz zaakceptować regulamin";
                return 1;
            }
            xhr("POST", "main.php", "type=register&email="+email+"&password="+password1);
        });
    }
}

const login = () =>{
    let login = document.querySelector('#login_button');
    if(login){
        login.addEventListener('click', function(){
            let email = document.querySelector('#login').value;
            let password = document.querySelector('#password').value;
            xhr("POST", "main.php", "type=login&email="+email+"&password="+password)
        });
    }
}

const sign_in = () =>{
    let button1 = document.querySelector('#login_popup');
    if(button1){
        button1.addEventListener('click', function(){
            xhr("POST", "main.php", "type=signin");
        });
    }
}

const sign_up = () =>{
    let button2 = document.querySelector('#register_button');
    if (button2){
        button2.addEventListener('click', function(){
            xhr("POST", "main.php", "type=signup");
        });
    }
}

const ret = () =>{
    let buttonret = document.querySelector('#return');
    if(buttonret){
        buttonret.addEventListener('click', function(){
            xhr("POST", "main.php", "type=return");
        });
    }
}

const premium = () => {
    let button3 = document.querySelector('#premium');
    if(button3){
        button3.addEventListener('click', function(){
            xhr("POST", "main.php", "type=premium");
        });
    }
}

const burger = () => {
    let button4 = document.querySelector('#settings');
    if(button4){
        button4.addEventListener('click', function(){
            xhr("POST", "main.php", "type=burger");
        });
    }
}

const back = () => {
    let back = document.querySelector('#darker_background');
    if(back){
        back.addEventListener('click', function(){
            xhr("POST", "main.php", "type=");
        });
    }
}

const navbar = () => {
    let navbar = document.querySelectorAll('.category');
    if (navbar){
        navbar.forEach(function(nav){
            nav.addEventListener('click', function(){
                xhr("POST", "main.php", "like="+nav.innerText);
            })
        })
    }
}

const load_site = () =>{
    let news_div = document.querySelectorAll('.tile');

    news_div.forEach(function(element) {
        element.addEventListener('click', function() {
          xhr("POST", "main.php", "type=content&"+"id="+element.getAttribute("value"));
        });
    });
}


const xhr = (method, url, data) => {
    let content = document.querySelector('html')
    var xhr = new XMLHttpRequest();
    console.log(data);

    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            let result = xhr.responseText;
            // console.log(result);
            content.innerHTML = result;
            run();
        }
    }

    xhr.send(data);

    // location.reload();
    console.log('Sending');

    // location.reload();
}


document.addEventListener('DOMContentLoaded', () => {
    run();
    // xhr("POST", "http://127.0.0.1/patryk_rafa24_%231/patryk%20dodatek%20login%20i%20kategorie/main.php", "load=1");
});









// ||przykład||
// document.addEventListener("click", 
// function(e) {
//      switch(e.target.ClassName){
//      case 'kategorie':
//         function efeff(){

//             dadwdaad
//             dadwdaada
//             w
//         };
//         break;
//     case 'kategorie':
//         console.log('kategorie');
//         break;
    
//     }});

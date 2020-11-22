//async function request(){
//    const answer = await fetch('api/?method=...');
//    const result = await answer.json();
//    return result;
//}
//
//const data = await request();

var registrationButton = document.getElementById('registration');
var login1 = document.getElementById('login1');
var password1 = document.getElementById('password1');
var nickname1 = document.getElementById('nickname1');

var loginButton = document.getElementById('logining');
var login2 = document.getElementById('login2');
var password2 = document.getElementById('password2');


registrationButton.addEventListener('click',()=>{
    const promise = registration(login1.value,password1.value,nickname1.value);
    promise.then(onDataReceived);
});

loginButton.addEventListener('click',()=>{
    const promise = login(login2.value, password2.value);
    promise.then(onDataReceived);
})


function onDataReceived(data){
    console.log(data);
}

//fetch('api',{method:'login', login:'vasya',password:'123'});

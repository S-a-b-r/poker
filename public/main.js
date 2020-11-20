//async function request(){
//    const answer = await fetch('api/?method=...');
//    const result = await answer.json();
//    return result;
//}
//
//const data = await request();
var loginButton = document.getElementById('start');
loginButton.addEventListener('click',registration);


console.log(1);
function getName(){
    $.ajax('http://localhost/api/index.php?method=getname',{
        success: function(data){
            console.log(data);
        }
    });
}
function registration(){
    var login = document.getElementById('logining').value;
    var password = document.getElementById('password').value;
    var nickname = document.getElementById('nickname').value;
    $.ajax('http://localhost/api/index.php?method=registration&login='+login+'&password='+password+'&nickname='+nickname,{
        success: function(data){
            console.log(data);
        }
    })
}
console.log(2);
//fetch('api',{method:'login', login:'vasya',password:'123'});

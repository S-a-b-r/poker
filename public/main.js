//async function request(){
//    const answer = await fetch('api/?method=...');
//    const result = await answer.json();
//    return result;
//}
//
//const data = await request();
let token = document.cookie;
i = 0;
while(i != 100){
    if(token[i] == ';'){
        token = token.slice(6,i);
    }
    else{
        i++;
    }
}
if(token == document.cookie){
    token = token.slice(6, 10000)
}
console.log(token);

var registrationButton = document.getElementById('registration');
var login1 = document.getElementById('login1');
var password1 = document.getElementById('password1');
var nickname1 = document.getElementById('nickname1');

var loginButton = document.getElementById('logining');
var login2 = document.getElementById('login2');
var password2 = document.getElementById('password2');

var printTablesButton = document.getElementById('printTables');

var createTableButton = document.getElementById('createTable');
var nameTable = document.getElementById('nameTable');
var quantPlayers = document.getElementById('quantityPlayers');
var rates = document.getElementById('rates');
var passwordTable = document.getElementById('passwordTable');

var idTableForDelete = document.getElementById('idTableForDelete');
var deleteTableButton = document.getElementById('deleteTable');

var idTableForGet = document.getElementById('idTableForGet');
var getTableButton = document.getElementById('getTable');

var logoutButton = document.getElementById('logout');

var idTableForConnect = document.getElementById('idTableForConnect');
var connectToTableButton = document.getElementById('connectToTable');

var disconnectFromTableButton = document.getElementById('disconnectFromTable');

var money = document.getElementById('money');
var transferToMoneyButton = document.getElementById('transferToMoneyButton');

var moneyToBank = document.getElementById('moneyToBank');
var transferToBankButton = document.getElementById('transferToBankButton');

var checkCombinationButton = document.getElementById('checkCombination');

var getCookieButton = document.getElementById('getCookie');

var tableForGame = document.getElementById('idTableForGame');
var buttonStartGame = document.getElementById('buttonStartGame');

var getGameId = document.getElementById('getGame');
var getGameButton = document.getElementById('getGameButton');
var foldButton = document.getElementById('foldButton');
var checkButton = document.getElementById('checkButton');
var raiseButton = document.getElementById('raiseButton');
var sumRaise = document.getElementById('sumRaise');
var callButton = document.getElementById('callButton');

callButton.addEventListener('click',()=>{
    const promise = call(getGameId.value);
    promise.then(onDataReceived);
})


raiseButton.addEventListener('click',()=>{
    const promise = raise(getGameId.value, sumRaise.value);
    promise.then(onDataReceived);
})

checkButton.addEventListener('click',()=>{
    const promise = check(getGameId.value);
    promise.then(onDataReceived);
})

foldButton.addEventListener('click', ()=>{
    const promise = fold(getGameId.value);
    promise.then(onDataReceived);
})

getGameButton.addEventListener('click',()=>{
    const promise = getGame(getGameId.value);
    promise.then(onDataReceived);
})

buttonStartGame.addEventListener('click',()=>{
    const promise = startGame(tableForGame.value);
    promise.then(onDataReceived);
})

getCookieButton.addEventListener('click',()=>{
    console.log(document.cookie);
})

checkCombinationButton.addEventListener('click',()=>{
    const promise = checkCombination();
    promise.then(onDataReceived);
})

transferToBankButton.addEventListener('click',()=>{
    const promise = transferToBank(token,moneyToBank.value);
    promise.then(onDataReceived);
})

transferToMoneyButton.addEventListener('click', ()=>{
    const promise = transferToMoney(token, money.value);
    promise.then(onDataReceived);
})

disconnectFromTableButton.addEventListener('click', ()=>{
    const promise = disconnectFromTable(token, idTableForConnect.value);
    promise.then(onDataReceived);
})

connectToTableButton.addEventListener('click',()=>{
    const promise = connectToTable(token, idTableForConnect.value);
    promise.then(onDataReceived);
})


registrationButton.addEventListener('click',()=>{
    const promise = registration(login1.value,password1.value,nickname1.value);
    promise.then(onDataReceived);
});

loginButton.addEventListener('click',()=>{
    const promise = login(login2.value, password2.value);
    promise.then(onDataReceived);
})

logoutButton.addEventListener('click',()=>{
    const promise = logout(token);
    promise.then(onDataReceived);
})

printTablesButton.addEventListener('click',()=>{
    const promise = getAllTables();
    promise.then(onDataReceived);
})

createTableButton.addEventListener('click',()=>{
    const promise = createTable(token, nameTable.value, quantPlayers.value, rates.value, passwordTable.value);
    promise.then(onDataReceived);
})

getTableButton.addEventListener('click',()=>{
    const promise = getTableById(idTableForGet.value);
    promise.then(onDataReceived);
})

deleteTableButton.addEventListener('click',()=>{
    const promise = deleteTableById(idTableForDelete.value);
    promise.then(onDataReceived);
})

function onDataReceived(data){
    console.log(data);
}

//fetch('api',{method:'login', login:'vasya',password:'123'});

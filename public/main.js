//async function request(){
//    const answer = await fetch('api/?method=...');
//    const result = await answer.json();
//    return result;
//}
//
//const data = await request();
token = 'aa19504346a17cd6064ae2b6a3952fe6';

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
var transferButton = document.getElementById('transferButton');

transferButton.addEventListener('click', ()=>{
    const promise = transferMoney(token, money.value);
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

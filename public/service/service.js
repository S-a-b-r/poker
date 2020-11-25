function registration(login,password,nickname){
    const promise = axios.post('http://localhost/api/index.php?method=registration&login='+login+'&password='+password+'&nickname='+nickname);
    return promise.then((response) =>{
        return response.data;
    });
}

function login(login,password){
    const promise = axios.get('http://localhost/api/index.php?method=login&login='+login+'&password='+password);
    return promise.then((response) =>{
        return response.data;
    });
}

function getUserByToken(token){
    const promise = axios.get('http://localhost/api/index.php?method=getuserbytoken&token='+token);
    return promise.then((response) =>{
        return response.data;
    });
}

function getAllTables(){
    const promise = axios.get('http://localhost/api/index.php?method=getalltables');
    return promise.then((response) =>{
        return response.data;
    });
}

function createTable(token, name, quantPlayers, rates, password){
    const promise = axios.post('http://localhost/api/index.php?method=createtable&token=' + token + '&name=' + name + '&quantplayers=' + quantPlayers + '&rates=' + rates + '&password=' + password);
    return promise.then((response) =>{
        return response.data;
    });
}

function getName(){
    const promise = axios.get('http://localhost/api/index.php?method=getname');
    return promise.then((response) =>{
        return response.data
    });
}

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
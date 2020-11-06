async function request(){
    const answer = await fetch('api/?method=...');
    const result = await answer.json();
    return result;
}

const data = await request();

fetch('api',{method:'login', login:'vasya',password:'123'});

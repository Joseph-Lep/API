const res = await fetch("http://localhost:8000");
// Je lance une requette vers localhost:8000
const users = await res.json();
// Je transforme ma string json obtenue en tableau
console.log(users);
const usersDiv = document.querySelector('#users');

users.forEach((u) => {
    const p = document.createElement('p');
    p.innerText = `${u.name} ${u.firstname}`;
    usersDiv.appendChild(p);
});
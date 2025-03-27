let car = document.getElementById("car");
let posX = 960, posY = 100;
let step = 10; // 每次移动 10px

document.addEventListener("keydown", (event) => {
    let key = event.key.toLowerCase();
    switch (key) {
        case "w": posY -= step; break;
        case "s": posY += step; break;
        case "a": posX -= step; break;
        case "d": posX += step; break;
    }
    car.style.left = posX + "px";
    car.style.top = posY + "px";
});
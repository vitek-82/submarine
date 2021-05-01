<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>

body {
    margin: 0;
    padding: 0;
    overflow: hidden;
}

#area {
    position: fixed;
    width: 100%;
    height: 100%;
}

#sky {
    position: fixed;
    background: url(/images/sky.jpg) no-repeat;
    background-size: cover;
    width: inherit;
}

#ocean {
    position: fixed;
    background-image: url(/images/water.jpg);
    background-size: cover;
    width: inherit;
}

#submarine {
    position: fixed;
    transition: transform 0.5s linear;
}

.submarinemove {
    animation: submove 1s linear infinite;
}

@keyframes submove {
    0%{transform: rotateX(0deg);}
    50%{transform: rotateX(-15deg);}
    100%{transform: rotateX(0deg);}
}

#gun {
    position: absolute;
    left: 20px;
    top: 0px;
}

#light {
    position: absolute;
    border: 1px dashed rgba(158, 153, 0, 0.57);
    height: 360px;
    top: -360px;
}

#airblock {
    position: absolute;
    overflow: hidden;
    width: 3px;
    height: 15px;
    border: 1px solid #232323;
    top: -8px;
    left: -5px;
}

#airamount {
    background: green;
    position: absolute;
    width: inherit;
    height: 15px;
    top: 0px;
}

.sootsubmarine {
    height: 50px;
    width: 5px;
    position: absolute;
    background-image: url(/images/bomb.png);
    background-size: cover;
}

.sootsubmarine > div {
    position: absolute;
    width: 1px;
    height: 1px;
    left: 2px;
}

.ship {
    position: fixed;
    background-size: contain;
}

.shipimg {
	position: absolute;
}

.shipshoot {
    position: absolute;
    width: 6px;
    height: 11px;
    background: linear-gradient(to left, #000 -16%, #888 60%, #000);
    border-radius: 0px 0px 3px 3px;
    border: 1px solid #2F2F2F;
    box-sizing: border-box;
}

.eee {
	position: absolute;
	left: 0px;
	top: 10px;
	width: 10px;
	height: 10px;
	background: red;	
}

#gameover {
    position: fixed;
    background: rgba(197, 0, 0, 0.42);
    box-shadow: inset 0px 0px 6px #808080;
    color: #fff;
    font-size: 1.5em;
    border-radius: 16px;
    top: 20px;
    left: 40%;
    cursor: pointer;
    text-align: center;
    transition: all 0.1s linear;
}

#gameover:hover {
    background: rgba(197, 0, 0, 0.62);
}

#gameover>ul {
    list-style: none;
    padding: 0 30px;
}

#controling {
    position: fixed;
    left: 0px;
    border-bottom: 1px solid #D2B3B6;
    color: #D2B3B6;
    background: rgba(0, 0, 0, 0.49);
    margin: 2px;
    padding: 0px 5px;
}



.detonation {
    position: absolute;
    width: 100px;
    height: 100px;
    background-image: url(/images/detonation.png);
    background-position: 0px 0px;
    transition: opacity 0.2s linear;
}
	</style>

</head>

<body>


<script>
 'use strict';


// class DetonationShip{

// 	constructor(l){

// 		this.stop = null;
// 		this.arr = [[500,0],[400,0],[300,0],[200,0],[100,0],[499,204],[401,204],[303,204],[203,204],[102,204],[495,104],[397,104],[301,104],[204,104],[104,105]];

// 		this.e = document.createElement('div');
// 		this.e.className = 'detonation';
// 		this.e.style.left = l - 10 + 'px';
// 		this.e.style.top = innerHeight/2 - 98 + 'px';
// 		game.startGame.area.appendChild(this.e);

// 	};

// 	detonation(){
// 		let i = 0;
// 		this.stop = setInterval(()=>{

// 			if(i < 15){
// 				this.e.style.backgroundPosition = this.arr[i][0] + 'px ' + this.arr[i][1] + 'px';
// 				i++;
// 			}
// 			else{
// 				clearInterval(this.stop);
// 				this.e.style.opacity = 0;
// 				i = 0;
// 				setTimeout(()=>{this.e.remove(), delete this;}, 250);
// 			};

// 		}, 35);
// 	};
// };

class DetonationShip{

	constructor(l){

		this.arr = [[500,0],[400,0],[300,0],[200,0],[100,0],[499,204],[401,204],[303,204],[203,204],[102,204],[495,104],[397,104],[301,104],[204,104],[104,105]];

		this.e = document.createElement('div');
		this.e.className = 'detonation';
		this.e.style.left = l - 10 + 'px';
		this.e.style.top = innerHeight/2 - 98 + 'px';
		game.startGame.area.appendChild(this.e);
		this.stop = true;
		this.i = 0;
		this.delay = false;

	};

	detonation(){
		
		if(this.delay = !this.delay){
			
			if(this.i < 15){
				this.e.style.backgroundPosition = this.arr[this.i][0] + 'px ' + this.arr[this.i][1] + 'px';
				this.i++;
			}
			else{
				this.stop = false;
				clearInterval(this.stop);
				this.e.style.opacity = 0;
				this.i = 0;
				setTimeout(()=>{this.e.remove(), delete this;}, 250);
			};
		};

	};
};


class PlayingArea{
	constructor(){

		this.area = document.createElement('div');
		this.sky = document.createElement('div');
		this.ocean = document.createElement('div');
		this.controling = document.createElement('div');
		this.gameOver = document.createElement('div');

		this.gameOver.onclick = function(){location.href = '/';};

		this.area.id = 'area';
		this.sky.id = 'sky';
		this.ocean.id = 'ocean';
		this.controling.id = 'controling';
		this.controling.textContent = 'mouse move - rotate gun; mouse click - fire; arrow keys - move submarine';
		this.gameOver.id = 'gameover';


		this.area.appendChild(this.sky);
		this.area.appendChild(this.ocean);
		this.area.appendChild(this.controling);
		this.area.appendChild(this.gameOver);
		document.body.appendChild(this.area);

		// this.oceanHeight = parseInt(document.documentElement.clientHeight);

		this.sky.style.height = innerHeight/2 + 'px';
		this.ocean.style.height = innerHeight/2 + 'px';
		this.ocean.style.top = innerHeight/2 + 'px';
		this.gameOver.style.display = 'none';
		// this.gameOver.style.width = 300 + 'px';
		// this.gameOver.style.left = innerWidth/2 - parseInt(getComputedStyle(this.gameOver).width/2) + 'px';
		this.gameOver.innerHTML = '<ul><li><span></span></li><li><p>GAME OVER</p></li><li><p>NEW GAME!</p></li></ul>';
	};
};


class Submarine{

	constructor(){

		// this.stopGunRotation = null;

		this.r = 0;

		this.submarine = document.createElement('div');
		this.submarineImg = document.createElement('img');
		this.submarineGun = document.createElement('div');
		this.submarineLight = document.createElement('div');
		this.submarineAirBlock = document.createElement('div');
		this.submarineAirAmount = document.createElement('div');

		this.submarine.id = 'submarine';
		this.submarineImg.src = '/images/submarine.png';
		this.submarineImg.setAttribute('width', '100');
		this.submarineImg.className = 'submarinemove';
		this.submarineGun.id = 'gun';
		// this.submarineGun.style.transform = 'transform: rotate(0deg)';
		this.submarineLight.id = 'light';
		this.submarineAirBlock.id = 'airblock';
		this.submarineAirAmount.id = 'airamount';

		this.airAmountHeight = 15;
		this.airAmountTop = 0;
		this.airAmountDate = null;//
		this.airAmountColor = ['green', 'green', '#4CAF50', '#4CAF50', '#8BC34A', '#8BC34A', '#CDDC39', '#CDDC39', '#FFC107', '#FFC107', '#FF5722', '#FF5722', 'red', 'red', 'red'];

		this.submarineDie = false;

		this.submarineAirBlock.appendChild(this.submarineAirAmount);
		this.submarineGun.appendChild(this.submarineLight);
		this.submarineGun.appendChild(this.submarineLight);
		this.submarine.appendChild(this.submarineImg);
		this.submarine.appendChild(this.submarineGun);
		this.submarine.appendChild(this.submarineAirBlock);
		document.querySelector('#ocean').appendChild(this.submarine);

		this.computedStyle = getComputedStyle(this.submarine);
		this.submarineHeight = parseInt(this.computedStyle.height);
		this.submarineWidth = parseInt(this.computedStyle.width);
		this.submarineLeft = innerWidth/2;
		this.submarineStartTop = parseInt(innerHeight/2) - this.submarineHeight + 10;
		this.submarineTop = this.submarineStartTop;


		this.submarine.style.top = this.submarineTop + 'px';
		this.submarine.style.left = this.submarineLeft + 'px';


		this.directionGun = null;

		this.directionSubmarine = 0;
		this.driveSubmarine = false;

		this.submarineSurfacing = true;
		this.rotateGunEvent = {'x': 10, 'clientY':10};

	};

	die(causeOfDeath){

		// document.body.onkeydown = function(){return false;};
		// document.body.onkeyup = function(){return false;};
		
		document.body.onmousemove = ()=>{return false;};
		document.body.onclick = ()=>{return false;};

		document.body.onkeydown = (e)=>{

			switch(e.which){
				case 37: return false; break;
				case 39: return false; break;
				case 38: return false; break;
				case 40: return false; break;
			};

		};

		document.body.onkeyup = (e)=>{
			switch(e.which){
				case 37: return false; break;
				case 39: return false; break;
				case 38: return false; break;
				case 40: return false; break;
			};

		};
		this.submarineDie = true;

		this.submarine.remove();
		delete this.submarine;

		for(let d in game.shipsCoords){
			clearInterval(game.shipsCoords[d].shipStop);
			game.shipsCoords[d].ship.remove();
			delete game.shipsCoords[d];
		};
		game.startGame.gameOver.querySelector('span').textContent = causeOfDeath;
		game.startGame.gameOver.style.display = 'block';
	};

	amountMinus(){

		if(new Date() - this.airAmountDate >= 1000){
			this.airAmountPlus = false;
			this.airAmountDate = new Date();

				this.submarineAirAmount.style.height = --this.airAmountHeight + 'px';
				this.submarineAirAmount.style.top = ++this.airAmountTop + 'px';
				this.submarineAirAmount.style.background = this.airAmountColor[this.airAmountTop];

				this.amountMinus();
		};
	};

	amountPlus(){

		if(new Date() - this.airAmountDate >= 200){

			this.airAmountDate = new Date();

			if(this.submarineTop == this.submarineStartTop){

				this.submarineAirAmount.style.height = ++this.airAmountHeight + 'px';
				this.submarineAirAmount.style.top = --this.airAmountTop + 'px';
				this.submarineAirAmount.style.background = this.airAmountColor[this.airAmountTop];

				this.amountPlus();
			};
		};
	};
	
	moveGun(){

		let styleSubmarineGun = this.submarineGun.getBoundingClientRect();

		let xSubmarineGun = styleSubmarineGun.left;
		let ySubmarineGun = styleSubmarineGun.top;

		let x = this.rotateGunEvent.x - xSubmarineGun; // прилеж. катет
		let y = this.rotateGunEvent.y - ySubmarineGun; // противолеж. катет


		let a = Math.sqrt(x*x + y*y);
		let corner = Math.tan(y/a);

		if(x < 0){corner = 3.1416-corner};

		if(corner*100*0.572958+90 > 80 && corner*100*0.572958+90 < 280){}
		else{this.r = corner*100*0.572958+90;};

		this.submarineGun.style.transform = 'rotate(' + this.r + 'deg)';
	};

	moveSubmarine(){

		switch(this.directionSubmarine){
			case 1: this.submarine.style.transform = 'rotate(-3deg)';
					this.submarine.style.left = --this.submarineLeft + 'px';
					break;

			case 2: this.submarine.style.transform = 'rotate(3deg)';
					this.submarine.style.left = ++this.submarineLeft + 'px';
					break;

			case 3: 
					this.submarine.style.transform = 'rotate(-5deg)';
					if(this.submarineSurfacing){
						if(this.submarineTop == this.submarineStartTop){
							this.submarineSurfacing = false;
							this.airAmountMove = true;
							if(this.airAmountMove){
								this.airAmountMove = false;
								this.amountPlus();
							};

						}
						else{this.submarine.style.top = --this.submarineTop + 'px';
						};
					};
					break;

			case 4: this.submarine.style.transform = 'rotate(5deg)';
					this.submarineSurfacing = true;
					if(this.airAmountMove){
						this.airAmountMove = true;
						this.amountMinus();
					}

					this.submarine.style.top = ++this.submarineTop + 'px';
					break;
		};
	};

	resetTransform(){this.submarine.style.transform = '';};


	driving(){
		document.body.onmousemove = (e)=>{this.rotateGunEvent = {'x': e.clientX, 'y': e.clientY};};
		document.body.onclick = (e)=>{new ShootSubmarine();};

		document.body.onkeydown = (e)=>{

			switch(e.which){
				case 37: this.directionSubmarine = 1; this.driveSubmarine = true; break;
				case 39: this.directionSubmarine = 2; this.driveSubmarine = true; break;
				case 38: this.directionSubmarine = 3; this.driveSubmarine = true; break;
				case 40: this.directionSubmarine = 4; this.driveSubmarine = true; break;
			};

		};

		document.body.onkeyup = (e)=>{
			switch(e.which){
				case 37: this.driveSubmarine = false; this.resetTransform(); break;
				case 39: this.driveSubmarine = false; this.resetTransform(); break;
				case 38: this.driveSubmarine = false; this.resetTransform(); break;
				case 40: this.driveSubmarine = false; this.resetTransform(); break;
			};

		};
	};

};


class ShootSubmarine{
	constructor(){
			new Audio('/audio/1.mp3').play();
			this.defence = new Audio('/audio/defence.mp3');
			this.cancelAnimationShoot = null;
			this.cornerRad = 0.0175;
			this.skyTop = -50;
			this.skyBottom = parseInt(innerHeight/2);
			this.shoot = document.createElement('div');
			this.shootHead = document.createElement('div');
			let gunBounding = game.startSubmarine.submarineGun.getBoundingClientRect();
			this.shoot.className = 'sootsubmarine';
			this.shoot.appendChild(this.shootHead);
			this.shootX = gunBounding.left;
			this.shootY = gunBounding.top - 25;
			this.shoot.style.left = this.shootX + 'px';
			this.shoot.style.top = this.shootY + 'px';
			this.shoot.style.transform = 'rotate(' + game.startSubmarine.r + 'deg)';
			this.r = game.startSubmarine.r;
			game.startGame.area.appendChild(this.shoot);
			this.go();
	};


	go(){

			let x = Math.sin(this.r*this.cornerRad)*2;
			let y = Math.cos(this.r*this.cornerRad)*2;

			let bounding = this.shootHead.getBoundingClientRect();

			if(parseInt(bounding.top) <= this.skyBottom && parseInt(bounding.top) >= this.skyBottom - 2){

				for(let i in game.shipsCoords){
					if(bounding.left > game.shipsCoords[i].left && bounding.left < game.shipsCoords[i].left + game.shipsCoords[i].width-3){// если ракета попала в корабль...

							cancelAnimationFrame(this.cancelAnimationShoot);
							this.shoot.remove();
							delete this;
							this.defence.play();
							game.detonationShip = new DetonationShip(game.shipsCoords[i].left);

							clearInterval(game.shipsCoords[i].shipStop);
							game.shipsCoords[i].ship.remove();
							clearTimeout(game.shipsCoords[i].shootStop);
							delete game.shipsCoords[i];
							return;
					};
				};
			};

			if(parseInt(bounding.top) < this.skyTop){
				cancelAnimationFrame(this.cancelAnimationShoot);
				this.shoot.remove();
			}
			else{
				this.shootX+=x;
				this.shootY-=y;

				this.shoot.style.left = this.shootX + 'px';
				this.shoot.style.top = this.shootY + 'px';

				this.cancelAnimationShoot = requestAnimationFrame(this.go.bind(this));
			};
	};
};


class Ship{
	constructor(s, speed){
		
		this.shipStop = null;
		this.shootStop = null;
	
		this.speed = speed;
		this.width = 90;
		this.height = 27;

		this.ship = document.createElement('div');
		this.ship.className = 'ship';

		this.shipImg = new Image(this.width, this.height);
		this.shipImg.className = 'shipimg';
		this.shipImg.src = '/images/ship' + (parseInt(Math.random()*2)+1) + '.png';
		this.shipImg.onload = ()=>{this.ship.appendChild(this.shipImg);};
		
		this.shipExitSide = s;

		if(this.shipExitSide){this.ship.style.transform = 'rotateY(180deg)';};

		this.leftEnd = this.shipExitSide?-this.width:innerWidth;
		this.left = this.shipExitSide?innerWidth:-this.width;
		this.top = innerHeight/2 - this.height + 4;
		
		this.ship.style.top = this.top + 'px';
		this.ship.style.width = this.width + 'px';
		this.ship.style.height = this.height + 'px';
		this.ship.style.left = this.left + 'px';

		this.shootTop = null;
		game.startGame.area.appendChild(this.ship);
		
	};


	shipGoRight(){
		this.shoot();
		let shipN = game.shipNumber++;

		this.shipStop = setInterval(()=>{
			if(this.left >= this.leftEnd){
				clearInterval(this.shipStop);
				this.ship.remove();
				delete game.shipsCoords[shipN];
				delete this;
			}
			else{

				if(this.left + this.width > game.startSubmarine.submarineLeft && this.left < game.startSubmarine.submarineLeft + game.startSubmarine.submarineWidth){
					if(game.startSubmarine.submarineTop < this.top +  this.height){
						cancelAnimationFrame(stop); // останавливаем подлодку
						game.startSubmarine.die('Collision with a ship!');
					};
				};

				game.shipsCoords[shipN] = this;
				this.ship.style.left = this.left++ + 'px';
			};
		}, this.speed);
		
	};

	shipGoLeft(){
		this.shoot();
		let shipN = game.shipNumber++;

		this.shipStop = setInterval(()=>{
			if(this.left <= this.leftEnd){
				clearInterval(this.shipStop);
				this.ship.remove();
				delete game.shipsCoords[shipN];
				delete this;
			}
			else{
				if(this.left + this.width > game.startSubmarine.submarineLeft && this.left < game.startSubmarine.submarineLeft + game.startSubmarine.submarineWidth){
					if(game.startSubmarine.submarineTop < this.top +  this.height){
						cancelAnimationFrame(stop); // останавливаем подлодку
						game.startSubmarine.die('Collision with a ship!');
					};
				};
				game.shipsCoords[shipN] = this;
				this.ship.style.left = this.left-- + 'px';
			};
		}, this.speed);
		
	};

	shoot(){
		
		let delay = parseInt((Math.random()*4000)) + 1000;

		let q = ()=>{
			if(game.startSubmarine.submarineDie) return false;
			this.shootStop = setTimeout(()=>{
				if(this.shipExitSide?this.left > this.leftEnd:this.left < this.leftEnd){
					new ShipShoot(this.left + this.width/2).shootMove();
					delay = parseInt((Math.random()*3000)) + 500;
					q();
				};
			}, delay);
		};
		q();
	};
};


class ShipShoot{
	constructor(l){
		this.shootStop = null;
		this.shoot = document.createElement('div');
		this.shoot.className = 'shipshoot';
		this.shootLeft = l;
		this.shootTop = game.startSubmarine.submarineStartTop + 7;
		this.shoot.style.left = this.shootLeft + 'px';
		this.shoot.style.top = this.shootTop + 'px';
		game.startGame.area.appendChild(this.shoot);
		
	};

	shootMove(){
		this.shootStop = setInterval(()=>{
			if(this.shootTop < innerHeight){// если не упала на дно
				this.shoot.style.top = this.shootTop++ + 'px';
				if(game.startSubmarine.submarineDie) return false;
				if(this.shootTop > game.startSubmarine.submarineTop && this.shootTop < game.startSubmarine.submarineTop + game.startSubmarine.submarineHeight){// если столкновение по оси Y проверяем ось X
					if(this.shootLeft > game.startSubmarine.submarineLeft && this.shootLeft < game.startSubmarine.submarineLeft + game.startSubmarine.submarineWidth){// если столкновение по оси X
						clearInterval(this.shootStop);
						this.shoot.remove();

						game.startSubmarine.die('Submarine destroyed by mine!');
					}
				};
			}
			else{clearInterval(this.shootStop); this.shoot.remove();};
		}, 20);
	};
};


class NewGame{
	constructor(){
		this.startGame = new PlayingArea();
		this.startSubmarine = new Submarine();
		this.startSubmarine.driving();
		this.shipsCoords = {};
		this.shipNumber = 0;
		this.ships = 0;
		this.stopStart = null;
		this.detonationShip = false;
		this.start();
	};

	start(){
		let shipExitSide = parseInt(Math.random()*2);
		let speed = parseInt(Math.random()*20) + 10;
		let t = parseInt(Math.random()*4000) + 2500;

		this.stopStart = setTimeout(()=>{
			if(this.ships != 0){
				if(this.startSubmarine.submarineDie){clearTimeout(this.stopStart); return false;};
				shipExitSide?new Ship(shipExitSide, speed).shipGoLeft():new Ship(shipExitSide, speed).shipGoRight();
				this.ships--;
				this.start();
			};
		}, t);
	};
};


let game = new NewGame();
let stop = null;
stop = requestAnimationFrame(render);

function render(){

	game.startSubmarine.moveGun();

	if(game.detonationShip.stop){game.detonationShip.detonation();};

	if(game.startSubmarine.driveSubmarine){game.startSubmarine.moveSubmarine();};

	if(game.startSubmarine.submarineTop > game.startSubmarine.submarineStartTop){
		if(game.startSubmarine.airAmountHeight > 0){
			game.startSubmarine.amountMinus();
		}
		else{
			game.startSubmarine.die('ran out of air!');
			
		};
	}
	else{
		if(game.startSubmarine.airAmountHeight != 15){
			game.startSubmarine.amountPlus();
		};
	};


	stop = requestAnimationFrame(render);
};

















</script>







</body>
</html>
'use strict';

var cardsArray = [{
  'name': 'shell',
  'img': 'app/Public/uploads/anne.jpg'
}, {
  'name': 'star',
  'img': 'app/Public/uploads/javier.jpg'
}, {
  'name': 'bobomb',
  'img': 'app/Public/uploads/adele.jpg'
}, {
  'name': 'mario',
  'img': 'app/Public/uploads/sonya.jpg'
}, {
  'name': 'luigi',
  'img': 'app/Public/uploads/gege.jpg'
}, {
  'name': 'peach',
  'img': 'app/Public/uploads/heidi.jpg'
}, {
  'name': '1up',
  'img': 'app/Public/uploads/moi.jpg'
}, {
  'name': 'mushroom',
  'img': 'app/Public/uploads/mamatte.jpg'
}, {
  'name': 'thwomp',
  'img': 'app/Public/uploads/pierre.jpg'
}, {
  'name': 'bulletbill',
  'img': 'app/Public/uploads/mama.jpg'
}, {
  'name': 'coin',
  'img': 'app/Public/uploads/sabiche.jpg'
}, {
  'name': 'goomba',
  'img': 'app/Public/uploads/ln.jpg'
}];

var gameGrid = cardsArray.concat(cardsArray).sort(function () {
  return 0.5 - Math.random();
});

var firstGuess = '';
var secondGuess = '';
var count = 0;
var previousTarget = null;
var delay = 1200;

var game = document.getElementById('game');
var grid = document.createElement('section');
grid.setAttribute('class', 'grid');
game.appendChild(grid);

gameGrid.forEach(function (item) {
  var name = item.name,
      img = item.img;


  var card = document.createElement('div');
  card.classList.add('card');
  card.dataset.name = name;

  var front = document.createElement('div');
  front.classList.add('front');

  var back = document.createElement('div');
  back.classList.add('back');
  back.style.backgroundImage = 'url(' + img + ')';

  grid.appendChild(card);
  card.appendChild(front);
  card.appendChild(back);
});

var match = function match() {
  var selected = document.querySelectorAll('.selected');
  selected.forEach(function (card) {
    card.classList.add('match');
  });
};

var resetGuesses = function resetGuesses() {
  firstGuess = '';
  secondGuess = '';
  count = 0;
  previousTarget = null;

  var selected = document.querySelectorAll('.selected');
  selected.forEach(function (card) {
    card.classList.remove('selected');
  });
};

grid.addEventListener('click', function (event) {

  var clicked = event.target;

  if (clicked.nodeName === 'SECTION' || clicked === previousTarget || clicked.parentNode.classList.contains('selected') || clicked.parentNode.classList.contains('match')) {
    return;
  }

  if (count < 2) {
    count++;
    if (count === 1) {
      firstGuess = clicked.parentNode.dataset.name;
      console.log(firstGuess);
      clicked.parentNode.classList.add('selected');
    } else {
      secondGuess = clicked.parentNode.dataset.name;
      console.log(secondGuess);
      clicked.parentNode.classList.add('selected');
    }

    if (firstGuess && secondGuess) {
      if (firstGuess === secondGuess) {
        setTimeout(match, delay);
      }
      setTimeout(resetGuesses, delay);
    }
    previousTarget = clicked;
  }
});

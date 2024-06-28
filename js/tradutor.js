// const nome = document.getElementById('username');


// var elderArray = [
//     { rune: 'ᚠ', letters: ['f']  },
//     { rune: 'ᚢ', letters: ['u', 'ø', 'ü', 'v']  },
//     { rune: 'ᚦ', letters: ['þ', 'ð']  },
//     { rune: 'ᚨ', letters: ['a'] },
//     { rune: 'ᚱ', letters: ['r', 'ʀ']  },
//     { rune: 'ᚲ', letters: ['k', 'c', 'q']  },
//     { rune: 'ᚷ', letters: ['g']  },
//     { rune: 'ᚹ', letters: ['w']},
//     { rune: 'ᚺ', letters: ['h']  },
//     { rune: 'ᚾ', letters: ['n']  },
//     { rune: 'ᛁ', letters: ['i', 'y']  },
//     { rune: 'ᛃ', letters: ['j']  },
//     { rune: 'ᛈ', letters: ['p']  },
//     { rune: 'ᛇ', letters: ['ï', 'æ']  },
//     { rune: 'ᛉ', letters: ['z', 'š', 'ž']  },
//     { rune: 'ᛊ', letters: ['s']  },
//     { rune: 'ᛏ', letters: ['t']  },
//     { rune: 'ᛒ', letters: ['b'] },
//     { rune: 'ᛖ', letters: ['e']  },
//     { rune: 'ᛗ', letters: ['m']  },
//     { rune: 'ᛚ', letters: ['l']  },
//     { rune: 'ᛜ', letters: ['ŋ']  },
//     { rune: 'ᛞ', letters: ['d']  },
//     { rune: 'ᛟ', letters: ['o', 'œ']  },
//     //Special cases
//     { rune: '×', letters: ['\'', ':']},
//     { rune: 'ᛟ', letters: ['ö']},
//     { rune: 'ᛟᚨ', letters: ['õ']},
//     { rune: 'ᛖ', letters: ['ä']},
//   ];

//     var youngerArray = [
//     { rune: 'ᚠ', letters: ['f']},
//     { rune: 'ᚢ', letters: ['u', 'v', 'w', 'ø', 'ü']},
//     { rune: 'ᚦ', letters: ['þ', 'ð']  },
//     { rune: 'ᚬ', letters: ['o', 'ą', 'æ', 'œ']},
//     { rune: 'ᚱ', letters: ['r']  },
//     { rune: 'ᚴ', letters: ['g', 'k', 'c', 'q']},
//     { rune: 'ᚼ', letters: ['h']},
//     { rune: 'ᚾ', letters: ['n']},
//     { rune: 'ᛁ', letters: ['i', 'y', 'e', 'j']},
//     { rune: 'ᛅ', letters: ['a', 'ä']},
//     { rune: 'ᛦ', letters: ['ʀ']},
//     { rune: 'ᛋ', letters: ['s', 'x', 'ž', 'š', 'z']},
//     { rune: 'ᛏ', letters: ['t', 'd']},
//     { rune: 'ᛒ', letters: ['p', 'b']},
//     { rune: 'ᛘ', letters: ['m']},
//     { rune: 'ᛚ', letters: ['l']},
//     //Special cases
//     { rune: 'ᚾᚴ', letters: ['ŋ']},
//     { rune: '×', letters: ['\'', ':']},
//     { rune: 'ᚬ', letters: ['ö']},
//     { rune: 'ᛁᛅ', letters: ['õ']},
//     { rune: 'ᛅ', letters: ['ä']},
//   ];

//     var shortTwigArray = [
//     { rune: 'ᚠ', letters: ['f']},
//     { rune: 'ᚢ', letters: ['u', 'v', 'w', 'ø', 'ü']},
//     { rune: 'ᚦ', letters: ['þ', 'ð']  },
//     { rune: 'ᚭ', letters: ['o', 'ą', 'æ', 'œ']},
//     { rune: 'ᚱ', letters: ['r']  },
//     { rune: 'ᚴ', letters: ['g', 'k', 'c', 'q']},
//     { rune: 'ᚽ', letters: ['h']},
//     { rune: 'ᚿ', letters: ['n']},
//     { rune: 'ᛁ', letters: ['i', 'y', 'e', 'j']},
//     { rune: 'ᛆ', letters: ['a', 'ä']},
//     { rune: 'ᛧ', letters: ['ʀ']},
//     { rune: 'ᛌ', letters: ['s', 'x', 'ž', 'š', 'z']},
//     { rune: 'ᛐ', letters: ['t', 'd']},
//     { rune: 'ᛓ', letters: ['p', 'b']},
//     { rune: 'ᛙ', letters: ['m']},
//     { rune: 'ᛚ', letters: ['l']},
//     //Special cases
//     { rune: 'ᚿᚴ', letters: ['ŋ']},
//     { rune: '×', letters: ['\'', ':']},
//     { rune: 'ᚭ', letters: ['ö']},
//     { rune: 'ᛁᛆ', letters: ['õ']},
//     { rune: 'ᛆ', letters: ['ä']},
//   ];

//    var noTwigArray = [
//     { rune: 'ᛙ', letters: ['f']},
//     { rune: '╮', letters: ['u', 'v', 'w', 'ø', 'ü']},
//     { rune: 'ו', letters: ['þ', 'ð']  },
//     { rune: 'ˎ', letters: ['o', 'ą', 'æ', 'œ', 'õ']},
//     { rune: '◟', letters: ['r']  },
//     { rune: 'ᛍ', letters: ['g', 'k', 'c', 'q']},
//     { rune: 'ᚽ', letters: ['h']},
//     { rune: '⸜', letters: ['n']},
//     { rune: 'ᛁ', letters: ['i', 'y', 'e', 'j']},
//     { rune: '⸝', letters: ['a', 'ä']},
//     { rune: '⡄', letters: ['ʀ']},
//     { rune: '╵', letters: ['s', 'x', 'ž', 'š', 'z']},
//     { rune: '⸍', letters: ['t', 'd']},
//     { rune: 'ި', letters: ['p', 'b']},
//     { rune: '⠃', letters: ['m']},
//     { rune: '⸌', letters: ['l']},
//     //Special cases
//     { rune: '×', letters: ['\'', ':']},
//   ];

//   var angloArray = [
//     { rune: 'ᚠ',letters: ['f', 'v'] },
//     { rune: 'ᚢ',letters: ['u', 'ü'] },
//     { rune: 'ᚦ',letters: ['þ', 'ð'] },
//     { rune: 'ᚩ',letters: ['o'] },
//     { rune: 'ᚱ',letters: ['r', 'ʀ']},
//     { rune: 'ᚳ',letters: ['c', 'k', 'q'] },
//     { rune: 'ᚷ',letters: ['g'] },
//     { rune: 'ᚹ', letters: ['w'] },
//     { rune: 'ᚻ',letters: ['h'] },
//     { rune: 'ᚾ',letters: ['n'] },
//     { rune: 'ᛁ',letters: ['i', 'y'] },
//     { rune: 'ᛄ',letters: ['j'] },
//     { rune: 'ᛇ', letters: ['ï', 'æ', 'ȝ']  },
//     { rune: 'ᛈ', letters: ['p']  },
//     { rune: 'ᛘ', letters: ['m']},
//     { rune: 'ᛋ',letters: ['s', 'x', 'š', 'ž', 'z'] },
//     { rune: 'ᛏ',letters: ['t'] },
//     { rune: 'ᛒ',letters: ['b'] },
//     { rune: 'ᛖ',letters: ['e'] },
//     { rune: 'ᛗ',letters: ['m'] },
//     { rune: 'ᛚ',letters: ['l'] },
//     { rune: 'ᛝ', letters: ['ŋ'] },
//     { rune: 'ᛟ', letters: ['o', 'œ']  },
//     { rune: 'ᛞ',letters: ['d'] },
//     { rune: 'ᚪ',letters: ['a'] },
//     { rune: 'ᚨ', letters: ['a', 'æ'] },
//     { rune: 'ᚣ',letters: ['y'] },
//     { rune: 'ᛡ',letters: ['ö', 'õ'] },
//     { rune: 'ᛠ',letters: ['ä'] },
//     //Special cases
//     { rune: 'ᚾᚴ', letters: ['ŋ']},
//     { rune: '×', letters: ['\'', ':']},
//   ];

//   var medievalArray = [
//     { rune: 'ᛆ',letters: ['a', 'ä'] },
//     { rune: 'ᛒ',letters: ['b'] },
//     { rune: 'ᛌ',letters: ['c'] },
//     { rune: 'ᛑ',letters: ['d'] },
//     { rune: 'ᚦ',letters: ['th'] },
//     { rune: 'ᛂ',letters: ['e'] },
//     { rune: 'ᚠ',letters: ['f'] },
//     { rune: 'ᚵ',letters: ['g'] },
//     { rune: 'ᛡ',letters: ['h'] },
//     { rune: 'ᛁ',letters: ['i', 'j'] },
//     { rune: 'ᚴ',letters: ['k', 'q'] },
//     { rune: 'ᛚ',letters: ['l'] },
//     { rune: 'ᛉ',letters: ['m'] },
//     { rune: 'ᚿ',letters: ['n'] },
//     { rune: 'ᚮ',letters: ['o', 'ö', 'õ'] },
//     { rune: 'ᛔ',letters: ['p'] },
//     { rune: 'ᚱ',letters: ['r'] },
//     { rune: 'ᛍ',letters: ['s'] },
//     { rune: 'ᛐ',letters: ['t'] },
//     { rune: 'ᚢ',letters: ['u'] },
//     { rune: 'ᚡ',letters: ['v', 'w'] },
//     { rune: 'ᚤ',letters: ['y', 'ü'] },
//     { rune: 'ᛅ',letters: ['æ'] },
//     { rune: 'ᚯ',letters: ['ø'] },
//     { rune: 'ᛜ',letters: ['ng', 'ŋ'] },
    
//     { rune: '×', letters: ['\'', ':']},
//     { rune: 'ᚴᛍ',letters: ['x'] },
//   ];

//     nome.ready(function(){
//   	createRuneButtons();
//     ('#nome').trigger('#username');
//   });

//   nome.on('#username', '#nome', function(){
//   	var inputArray = replaceSpelling($(this).val()).split('');
      
//     if(!window.location.href.includes('valhyr.com')){
//       $(':header', 'div', 'p').html(text);
//       inputArray = text.split('');
//     }
      
//     var elder = "";
//     var younger = "";
//     var shorttwig = "";
//     var notwig = "";
//     var anglo = "";
//     var medieval = "";
    
//     for(var i = 0; i < inputArray.length; i++)
//     {
//       	var letter = inputArray[i].toLowerCase();
// 		elder += getRunes(letter, elderArray);
// 		younger += getRunes(letter, youngerArray);
// 		shorttwig += getRunes(letter, shortTwigArray);
// 		notwig += getRunes(letter, noTwigArray);
// 		anglo += getRunes(letter, angloArray);
//         medieval += getRunes(letter, medievalArray);
//     }
    
//     $('#elder').html(elder);
//     $('#younger').html(younger);
//     $('#shorttwig').html(shorttwig);
//     $('#notwig').html(notwig);
//     $('#anglo').html(anglo);
//     $('#medieval').html(medieval);
//   });
  
//   function getRunes(letter, array){
//     try{
//   		return array.filter(a => a.letters.some(b => b == letter))[0].rune;
//     }
//     catch(e){
//     //   return `<span style="color: red">${letter.toUpperCase()}</span>`;  
//     }
//   }
  
//   function replaceSpelling(username){
//     username = username.replace(/th/g, 'þ');
//     username = username.replace(/x/g, 'ks');
//     username = username.replace(/ae/g, 'æ');
//     username = username.replace(/ia/g, 'õ');
//     username = username.replace(/io/g, 'ö');
//     username = username.replace(/ea/g, 'ä');
//     //username = username.replace(/r /g, 'ʀ ');
//     username = username.replace(/ng/g, 'ŋ');
//     var lastChar = username[username.length - 1];
//     if(lastChar === 'r') username = username.replace(/.$/,"ʀ");
    
//   	return username;
//   }
  
//   function createRuneButtons(){
//     var elderRunes = elderArray.map(a => a.rune);
//     var lineCount = 0;
    
// //     for(var i = 0; i < 24;i++){      
// //       $('#ElderRuneKeyboard').append(`<a class="btn rune-btn">${elderArray[i].rune}</a>`);
// //     }

// //     for(var i = 0; i < 16; i++){      
// //       $('#YoungerRuneKeyboard').append(`<a class="btn rune-btn">${youngerArray[i].rune}</a>`);
// //     }

// //     for(var i = 0; i < 16; i++){      
// //       $('#ShorttwigRuneKeyboard').append(`<a class="btn rune-btn">${youngerArray[i].rune}</a>`);
// //     }
    

// //     for(var i = 0; i < 16; i++){      
// //       $('#NotwigRuneKeyboard').append(`<a class="btn rune-btn">${youngerArray[i].rune}</a>`);
// //     }
    
// //     for(var i = 0; i < 25; i++){      
// //       $('#MedievalRuneKeyboard').append(`<a class="btn rune-btn">${medievalArray[i].rune}</a>`);
// //     }

// //     for(var i = 0; i < 29; i++){      
// //       $('#AngloRuneKeyboard').append(`<a class="btn rune-btn">${angloArray[i].rune}</a>`);
// //     }
// //   }
//   }
// document.getElementById('Runas').addEventListener('click', () => {

//     document.getElementById('Runas').on('click', '.rune-btn', function(){
//         var rune = $(this).text();
//         var text = $('#ConvertToText').val();
//         if(rune.toLowerCase() == 'space') rune = ' ';
        
//         $('#ConvertToText').val(text + rune).trigger('input');
//     })
    
//     document.getElementById('Runas').on('input', '#ConvertToText', function(){
//         var text = $(this).val().split('');
//         var translatedText = "";
        
//         for(var i = 0; i < text.length; i++){
//             var letter = `<span style="color: red">${text[i]}</span>`;
//             var match = elderArray.filter(a => a.rune == text[i])[0];
//             if(match != null) letter = match.letters[0];
            
//             translatedText += letter;
//         }
        
//         $('#ConvertToTextResult').html(translatedText);
//     })
// });


var nome = document.getElementById('nome');
var letras = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
var runas = ['ᚨ','ᛒ','ᚲ','ᛞ','ᛖ','ᚠ','ᚷ','ᚺ','ᛁ','ᛃ','ᚲ','ᛚ','ᛗ','ᚾ','ᛟ','ᛈ','ᚲ','ᚱ','ᛊ','ᛏ','ᚢ','ᚢ','ᚹ','ᚲᛊ','ᛁ','ᛉ'];
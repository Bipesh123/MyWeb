function Navies_bays(comment){
      train_samples = {
        'pos' : [
          'I love this',
          'I like this',
          'awesome',
          'affordable ',
          'afford',
          'nice ',
          'Genuine',
          'wonderful',
          'high quality',
          'excellent',
          'resonable price',
          'satisfactory',
          'good excellent',
          'great for the',
          'very good quality though',
          'highly recommend for any one who has a bluetooth',
          'i bought this to use with my kindle fire and absolutely loved',
          'i have yet to run this new battery below two bars and three days without',
          'owned this phone for months now and can say that the best mobile phone',
          'this product is ideal for people like me whose ears are very',
          'it has kept up very',
          'it has a great camera thats and the pics are nice and clear with great picture',
          'good protection and does not make phone too',
          'everything about it is fine and reasonable for the price',
          'this device is great in several',
          'this is a great little',
          'well arrived on and works as',
          'this phone works',
          'definitely a',
          'the price was very good and with the free shipping and all it was a good',
          'this phone is slim and light and the display is',
          'great fast',
          'absolutely',
          'the keyboard is a nice compromise between a full qwerty and the basic cell phone number',
          'it is very comfortable on the',
          'it has been a winner for',
          'i am very pleased with my',
          'gets the job',
          'it is so small and you even realize that it is there after a while of getting used to',
          'very good stuff for the',
          'i got this phone on reccomendation from a relative and glad i',
          'i had absolutely no problem with this headset linking to my device',
          'this item is fantastic and works',
          'and i just love the',
          'the look of it is very sharp and the screen is nice and with great',
          'super phone on a great',
          'the sound quality is good and functionality is',
          'great very impressed',
          'had this for nearly years and it has worked great for',
          'i would highly recommend',
          'the range is very been able to roam around my house with the phone in the living room with no quality',
          'great price',
          'lightweight and great',
          'these are certainly very comfortable and functionality is',
          'one of my favorite purchases',
          'excellent wallet type phone',
          'good product incredible',
          'battery life is real',
          'this one works and was priced',
          'i received it quickly and it works'
          
        ],
        'neg' : [
          'I hate this ',
          'I bad this',
          'fake phone',
          'Not affordable',
          'worst it',
          'waste time',
          'low quality',
          'unsatisfactory',
          'No value for money',
          'needless to i wasted my',
          'what a waste of money and',
          'the design is very as the ear is not very comfortable at',
          'i bought it for my mother and she had a problem with the',
          'this is a simple little phone to but the breakage is',
          'poor talk time',
          'worthless',
          'i was not impressed by this',
          'disappointed with',
          'buy a different phone but not',
          'do not buy for advertised for',
          'i purchased this and within days it was no longer',
          'not a good',
          'the battery runs down',
          'this item worked but it broke after months of',
          'dont waste your',
          'very disappointed with my',
          'buyer you could flush money right down the',
          'a huge design flaw not using it which i think is the',
          'i got this phone around the end of may and completely unhappy with',
          'could not get strong enough',
          'it did not work in my cell phone plug i am very up set with the',
          'thank you for wasting my',
          'i recently had problems where i could not stay connected for more than minutes before being',
          'the replacement died in a few',
          'i have had problems wit hit dropping signal and',
          'battery lasts only a few',
          'if you hate avoid this phone by all',
          'i did not bother contacting the company for few dollar product but i learned the lesson that i should not have bought this form online',
          'i also like the it felt like it would crack with',
          'worst phone',
          'what a big waste of',
          'waste your on this',
          'do not make the same mistake as',
          'the phone was unusable and was not',
          'poor quality and',
          'waste your',
          'i wasted my little money with this',
          'do not purchase this',
          'battery life still not long enough in device',
          'they do not care about the consumer one',
          'i want my money',
          'i ordered this items first and was unhappy with it',
          'the ngage is still lacking in',
          'rip over charge',
          'a piece of junk that broke after being on my phone for',
          'worst customer',
          'bad way too',
          'the worst phone ever only had it for a few',
          'same problem as others have',
          'what a disappointment',
          'after a year the battery went completely dead on my'

        ]
      }


      test_samples = [comment]

        var probdist = baez.train(train_samples);

        test_samples.forEach(function(sample){
          var scores = baez.guess(sample)
       
          // $('body').append('<p>'+sample+'<br\> neg:'+scores.neg+' pos:'+scores.pos+'</p>')
       
        });

    if (scores.pos>scores.neg){
           return ("Postitive Comment")
          }
          else{
            return ("Negative Comment");
          }
}
function Navies(){
  var x=document.forms['mycomment']['comment'].value;
  var result=document.forms['mycomment']['sentiment'].value;

var result=Navies_bays(x);
alert(result);

document.forms['mycomment']['sentiment'].value=result;
}
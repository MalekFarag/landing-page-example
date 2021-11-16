const vm = new Vue({

    data:{
      isBurger: true,
      isLightbox: true,
      isService: true,
      thumbnail: '',
      desc: ''
    },

    methods:{
      toggleBurger: function(){
        this.isBurger = !this.isBurger;
        this.isService = true;
      },
      openLightbox: function(){
        this.isLightbox = !this.isLightbox;
        //reference lightbox image + desc
        
        this.thumbnail = event.target.style.backgroundImage;
        let dtext = event.target.querySelector('.hidden').innerHTML;
        this.desc = dtext;
      },
      closeLightbox: function(){
        this.isLightbox = !this.isLightbox;
      },

      openService: function(){
        this.isService = false;
        
      },
      closeService: function(){
        this.isService = true;
        
      },
      toggleService: function(){
        this.isService = !this.isService;
      },
      switchService: function(){
        const iconList = document.querySelectorAll('.iconDiv'),
              serviceList = document.querySelectorAll('.info');

        serviceList.forEach(service => service.classList.remove('showServe'));
        // serviceList.forEach(service => service.style.transform = 'translateX(0)');
        iconList.forEach(icon => icon.classList.remove('hov'));
        

        let i = event.target.id;
        // let perc = -i * 100;
        let targetItem = serviceList[i -1];

        
        iconList[i -1].classList.add('hov');


        targetItem.classList.add('showServe');
        // targetItem.style.transform = "translateX(" + perc + '%' + ")";
      }
    },
  }).$mount("#app");


  //scroll
function scroll(){
let x = '#x' + this.id;
let target = document.querySelector(x);

target.scrollIntoView({
    behavior: "smooth", 
    block: "start", 
    inline: "center"})
}

document.querySelectorAll('.scroll').forEach(link => {
link.addEventListener('click', scroll);
});

//gsap hero anim

gsap.to(".hex1", {duration: .7, y: -25, ease: "power1", yoyo: true, delay: .5, repeat: 9999});
gsap.to(".hex2", {duration: .7, y: -25, ease: "power1", yoyo: true, delay: .75, repeat: 9999});
gsap.to(".hex3", {duration: .7, y: -25, ease: "power1", yoyo: true, delay: .95, repeat: 9999});


//waypoints
let options = document.querySelectorAll('.serviceOp');
let workImgs = document.querySelectorAll('.workList .img');
let workText = document.querySelectorAll('.workList .text');
var waypoint = new Waypoint({
element: document.querySelector('.waypoint'),
handler: function(direction) {
console.log('waypoint hit');
  options.forEach(op => op.classList.add('on'));
  workImgs.forEach(img => img.classList.add('on'));
  workText.forEach(txt => txt.classList.add('on'));
}
})


//waypoints landing page

let resulth5 = document.querySelectorAll('.result .info');
let resultsvg = document.querySelectorAll('.result .img');
let lImg = document.querySelector('.resultsDiv .largeImg');

const counters = document.querySelectorAll('.counter'),
      speed   = 450;

var waypoint = new Waypoint({
element: document.querySelector('.waypoint2'),
handler: function(direction) {
  console.log('waypoint hit');
  resulth5.forEach(hh => hh.classList.add('on'));
  resultsvg.forEach(svg => svg.classList.add('on'));
  lImg.classList.add('lon');

  counters.forEach(counter => {
    const updateCounter = () =>{
      const target = +counter.getAttribute('data-target'),
            count  = +counter.innerText,
            inc = target / speed;

            if(count < target) {
              counter.innerText = Math.ceil(count + inc);
              setTimeout(updateCounter, 1);
            }else{
              count.innerText = target;
            }
    }

    updateCounter();
  })
  
}
})


let pointsLand = document.querySelectorAll('.landHero .point');
let scrollNow = document.querySelector('.scrollNow');

window.addEventListener('load', function(){
    pointsLand.forEach(hh => hh.classList.add('on'));
    scrollNow.classList.add('on');
})



      


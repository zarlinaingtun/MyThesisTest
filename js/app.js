// start navbar
const navbuttons=document.querySelector('.navbuttons');
const navbar=document.querySelector('.navbar');

// console.log(navbuttons);
navbuttons.addEventListener('click',()=>navbuttons.classList.toggle('changes'));

console.log(navbar);
window.addEventListener('scroll',()=>{
    const scrollY=window.scrollY;
    if(scrollY>0){
        navbar.classList.add('navmenus');
    }
    else{
        navbar.classList.remove('navmenus');
    }
    
});

// end navbar
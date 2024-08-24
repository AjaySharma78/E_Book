let userBox = document.querySelector('.user_infos');
let navbars = document.querySelector('.navbar');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
};
document.querySelector('#navbar').onclick = () =>{
   navbars.classList.toggle('active');
};

window.onscroll = () =>{
  
   userBox.classList.remove('active');
   navbars.classList.remove('active');

   if(window.scrollY >=0){
      document.querySelector('.user_infos').classList.remove('active');
      document.querySelector('.navbar').classList.remove('active');
      document.querySelector('.messagees').remove();

   }else{
      document.querySelector('.user_infos').classList.add('active');
      document.querySelector('.navbar').classList.add('active');
   }
};

if(window.history.replaceState){
   window.history.replaceState(null,null,window.location.href);
};

var preloader = document.getElementById('loading');

function my(){
   preloader.style.display="none";
}
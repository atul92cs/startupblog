const current=document.querySelector('#current');
const imgs=document.querySelector('.imgs');
const images=document.querySelectorAll('.imgs img');

const opactiy=0.6;

imgs.addEventListener('click',imgClick);

function imgClick(e)
{

  images.forEach(image=>{image.style.opacity=1;});
  current.src=e.target.src;

  e.target.style.opacity=opactiy;

}
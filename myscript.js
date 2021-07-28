let root = document.documentElement;
var el =document.querySelectorAll('.colors ul li');
root.style.setProperty('--mycolor',localStorage.getItem('pagecolor'));
for(var i =0 ; i<el.length; i++){
    el[i].addEventListener('click',function(){
        root.style.setProperty('--mycolor',this.getAttribute('data-color'));

        localStorage.setItem('pagecolor',this.getAttribute('data-color'));
    },false);
    
};

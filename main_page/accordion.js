
document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('.logout_switch').addEventListener('click',function(){
        this.classList.toggle('active');
        document.querySelector('.logout_contents').classList.toggle('active');
    })
});
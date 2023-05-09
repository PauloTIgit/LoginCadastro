const botao_dia_noite = document.getElementById('dia_noite');
const tela = document.getElementById('tela');
const iconDia = document.getElementById('icon_dia');
const iconNoite = document.getElementById('icon_noite');

botao_dia_noite.addEventListener('click', function(){
    botao_dia_noite.classList.toggle('fa-toggle-off');
    botao_dia_noite.classList.toggle('fa-toggle-on');
    tela.classList.toggle('noite');
    iconDia.classList.toggle('icon_dia');
    iconNoite.classList.toggle('icon_noite');
});

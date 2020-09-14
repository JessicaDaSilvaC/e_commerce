const lieu_achat=document.querySelector('#lieu');
lieu_achat.addEventListener('change',function(){
        switch(lieu_achat.value){
            case "direct":
                var direct=document.querySelector('.direct');
                var label_direct=document.querySelector('.label_direct');
                direct.classList.remove('d-none')
                label_direct.classList.remove('d-none')
                break;
            case "e-commerce":
                var direct=document.querySelector('.direct');
                var label_direct=document.querySelector('.label_direct');
                var label_e_commerce=document.querySelector('.label_e_commerce');
                var e_commerce=document.querySelector('.e-commerce');
                direct.classList.add('d-none')
                label_direct.classList.add('d-none')
                label_e_commerce.classList.remove('d-none')
                e_commerce.classList.remove('d-none')
                break;
        }    
})

const Modal = {
     
    open(){

        document.querySelector('.modal-overlay')
        .classList.add('active')
    },
    close(){
        document.querySelector('.modal-overlay')
        .classList.remove('active')
    },
    
}

var xmlhttp = getXmlHttpRequest();

function getXmlHttpRequest(){
    
    if(window.XMLHttpRequest){
        return new XMLHttpRequest();

    }else if(window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");

    }
}
function changeURL (url){
    
    xmlhttp.open("POST",url,true);
    xmlhttp.onreadystatechange = function(){

        if(xmlhttp.readyState==4){
            document.getElementById("space").innerHTML = xmlhttp.response;
        
        }

    }
    xmlhttp.send(null);
}
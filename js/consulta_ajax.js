function mostrarInfo(cod){

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            $("#container").css("background","none");
            document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }else{
            document.getElementById("datos").innerHTML="<img src=\"img/ajax-loader.gif\" /> <span>Cargando...</span>";
        }
    };

    result_fb = cod.search('fb');
    result_tw = cod.search('tw');
    //console.log(result);

    if ((result_fb == -1) && (result_tw == -1)){
        //console.log("instagram");
        xmlhttp.open("POST","proceso_instag.php",true);
    }else if (result_tw == -1) {
        //console.log("facebook");
        xmlhttp.open("POST","proceso_fb.php",true);
    }else{
        //console.log("twitter");
        xmlhttp.open("POST","proceso_tw.php",true);
    }
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("link_marca="+cod);

}

function mostrarCompetencial(cod){

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            $("#container").css("background","none");
            document.getElementById("sortable").innerHTML=xmlhttp.responseText;

        }else{
            document.getElementById("sortable").innerHTML="<img src=\"img/ajax-loader.gif\" /> <span>Cargando...</span>";
        }
    };

    xmlhttp.open("POST","proceso_comp.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("link_marca="+cod);


}
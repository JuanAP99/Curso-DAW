function loadXMLDoc(filename, callback) {
    let xhttp;
    if (window.XMLHttpRequest) {
      xhttp = new XMLHttpRequest();
    }
    else { // código de IE5 and IE6
      xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function (){
      if (xhttp.readyState === XMLHttpRequest.DONE) {
        if (xhttp.status === 200) {
          callback(xhttp.responseXML);
          // callback(xhttp.responseText); // si el fichero es de texto
        } else {
          console.log("Hubo un error con la petición.");
        }
      }	
    };
    xhttp.open("GET", "mixml.xml", true); //true = asíncrona, //false = síncrona
    xhttp.send();
  }
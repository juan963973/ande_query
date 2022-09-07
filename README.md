# ANDE Query V1.3.5

~~~
Puede levantar este código en un servidor que corra php y no hace falta ninguna configuración adicional.
Use directamente los metodos proporcionados de la Clase AndeController en el archivo index.php colocando su NIS.
~~~

## Metodos
- renderPdfInHtml(): Descarga el archivo pdf y retorna en un embed html.

- hasDebt(): Retorna boleano true, si tiene deuda y false en caso de que no tenga.
 
- getHeader(): Recupera datos importantes de cabecera con varios detalles.
  
- getLastInvoice(): Consultar ultima factura, sin descargar archivo.
 
- getInvoices(5): Consultar varias facturas, sin descargar archivo. 

  ` Obs: El parametro es opcional, en este caso trae 5 facturas pero si no envia, por defecto trae 15. `
  
- getNameFilePdf(): Descarga el archivo pdf y retorna el nombre del archivo.
    
- getHistorial(): Retorna el historial la ANDE usa para graficar el consumo en los años.


## Attribución

Este código fue realizado por Juan Alfonso (Agosto del 2022).

juanx.alfonso@gmail.com

https://www.facebook.com/juanx.alfonso

Puede Forkear el proyecto y mejorarlo, agradecería mucho poder recibir sus colaboraciones en el código y compartir conocimiento!!

Espero que esto le sea de utilidad!



function confirmar(evt)
{
	if confirm("El registro seleccionado será eliminado, ¿continuar?");
	{
		return ture;
	}else
	{
		evt.preventDefault();
	}

	
	let aeliminar = document.querySelectorAll("vinculotabla");
	//detecta cada vez que se da click en la opción eliminar para preguntar la confirmación.
	for(var i=0;i<aeliminar.length;i++)
	{
		aeliminar[i].addEventListener('click', confirmar);
	}
}
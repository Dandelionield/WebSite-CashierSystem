
update.get("1.4.7", (q) =>{
	
	console.log(q);
	
	q.setImg("http://localhost/WebSite-CashierSystem/styles/imagenes/downloads/s6.png");
	
	q.edit();
	
	/*const dd = q.getDate();
	const mm = q.getMonth() + 1;
	const yyyy = q.getDate();
	
	q.sentence("UPDATE `"+row+"` SET date = `STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyyy+"', '%d-%m-%Y')`, description = `"+this._description+"`, Link = `"+this._Link+"`, img = `"+this._img+"` WHERE ID = `"+this._ID+"`", (q) => {
		
		
		
	});//*/
	
	console.log(q);
	
});
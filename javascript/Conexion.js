
class Conexion{
	
    constructor(url){
		
        this.url = url;
		
    }

    // Método para ejecutar consultas SQL
    query(wd, callback){
		
        // Realizar una solicitud POST al script PHP con la consulta SQL
        fetch(this.url,{
			
            method: 'POST',
            headers: {
				
                'Content-Type': 'application/x-www-form-urlencoded'
				
            },
			
            body: 'query=' + encodeURIComponent(wd)
			
        }).then(response => response.json()).then(data =>{
			
            // Llamar al callback con los datos devueltos por el script PHP
            callback(data);
			
        }).catch(error => {
			
            //console.error('Error:', error);
			
        });
		
    }

    // Método para ejecutar consultas SQL y obtener los resultados en un vector
	sentence(wd, callback){
		
        this.query(wd, function(data){
			
            // Convertir los resultados a un vector de filas
            let rows = [];
			
            if (data && data.length>0){
				
                for (let i=0; i<data.length; i++){
					
                    rows.push(Object.values(data[i]));
					
                }
				
            }
            // Llamar al callback con el vector de filas
            callback(rows);
			
        });
		
    }

}

// Exportar la clase Conexion
//export default Conexion;

/*const MySQL = require('mysql');

class Conexion{

	constructor(Host, User, Password, DataBase){
		
		this._cn = MySQL.createConnection({
			
			host: Host,
			user: User,
			password: Password,
			database: DataBase
			
		});
		
		this._cn.connect((e) =>{
		
			if (e) throw e
		
		});
		
	}
	
	query(wd){
		
		this._cn.query(wd, (e, script)=>{
			
			if (e) throw e
			
		});
		
	}

	sentence(wd, callback){
		
		this._cn.query(wd, (e, script) =>{
			
			if (e) throw e;
			
			callback(script);
			
		});
	}
	
	end(){
		
		this._cn.end();
		
	}

}

module.exports = Conexion;//*/

//const Conexion = require('./Conexion.js');
//import Conexion from './Conexion.js';

const row = "download";
const In = "http://localhost/WebSite-CashierSystem/php/Conexion.php";
const Out = "http://localhost/WebSite-CashierSystem/php/outConexion.php";

class update extends Conexion {

	constructor(ID, date, description, Link, img) {

		super(In, Out);

		//super('localhost', 'root', '', 'proyecto');

		this._ID = ID;
		this._date = date;
		this._description = description;
		this._Link = Link;
		this._img = img;

	}

	static get(ID, callback) {

		const cn = new Conexion(In, Out);

		cn.sentence("SELECT * FROM `" + row + "` WHERE ID = '" + ID + "'", (q) => {

			const p = new update(q[0][0], new Date(q[0][1]), q[0][2], q[0][3], q[0][4]);
			//cn.end();
			callback(p);

		});

	}//*/

	static getAll(callback) {

		const cn = new Conexion(In, Out);

		cn.sentence("SELECT * FROM `" + row + "`", (q) => {

			let p = [];

			for (let i = 0; i < q.length; i++) {

				let r = q[i];

				p.push(new update(r[0], new Date(r[1]), r[2], r[3], r[4]));

			}

			//cn.end();

			callback(p);

		});

	}

	getID() {

		return this._ID;

	}

	getDate() {

		return this._date;

	}

	getDescription() {

		return this._description;

	}

	getLink() {

		return this._Link;

	}
	
	getImg() {

		return this._img;

	}
	
	setDate(date){
		
		this._date = date;
		
	}
	
	setDescription(description) {

		this._description = description;

	}

	setLink(Link) {

		this._Link = Link;

	}
	
	setImg(img){
		
		this._img = img;
		
	}
	
	edit(){
		
		const dd = this._date.getDate();
		const mm = this._date.getMonth() + 1;
		const yyyy = this._date.getDate();
		
		this.query("UPDATE `"+row+"` SET `date` = 'STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyyy+"', '%d-%m-%Y')', `description` = '"+this._description+"', `Link` = '"+this._Link+"', `img` = '"+this._img+"' WHERE ID = '"+this._ID+"'");
		
	}
	
	set(){
		
		const dd = this._date.getDate();
		const mm = this._date.getMonth() + 1;
		const yyyy = this._date.getDate();
		
		this.query("INSERT INTO `"+row+"`(`ID`, `date`, `description`, `Link`, `img`) VALUES ('"+this._ID+"', STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyy+"', '%d-%m-%Y'), '"+this._description+"', '"+this._Link+"', '"+this._img+"')");
		
	}
	
	remove(){
		
		this.query("DELETE FROM `"+row+"` WHERE ID = '"+this._ID+"'");
		
	}
	
	/*async edit(){
		
        try{
			
			const dd = this._date.getDate();
			const mm = this._date.getMonth() + 1;
			const yyyy = this._date.getDate();
			
			await this.query("UPDATE `"+row+"` SET date = `STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyyy+"', '%d-%m-%Y')`, description = `"+this._description+"`, Link = `"+this._Link+"`, img = `"+this._img+"` WHERE ID = `"+this._ID+"`");
			
		}catch (e){
			
			console.log(e);
			
		}
		
    }
	
	async set(){
		
        try{
			
			const dd = this._date.getDate();
			const mm = this._date.getMonth() + 1;
			const yyyy = this._date.getDate();
			
			await this.query("INSERT INTO `"+row+"`(`ID`, `date`, `description`, `Link`, `img`) VALUES ('"+this._ID+"', STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyy+"', '%d-%m-%Y'), '"+this._description+"', '"+this._Link+"', '"+this._img+"')");
           
        }catch (e){
			
            console.error(error);
			
        }
    }
	
	async remove(){
		
        try{
			
            await this.query("DELETE FROM `"+row+"` WHERE ID = '"+this._ID+"'");
			
        }catch (e){
			
            console.error(e);
			
        }
    }//*/

	/*length(){
		
		return this.sentence('SELECT * from download').lenght;
		
	}//*/

	toString() {

		return "{" + this._ID + ", " + this._date + ", " + this._description + ", " + this._Link + ", "+ this._img +"}";

	}

}

//module.exports = { update };

//export default Conexion;
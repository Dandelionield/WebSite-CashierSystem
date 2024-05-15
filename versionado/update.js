
//const Conexion = require('./Conexion.js');
//import Conexion from './Conexion.js';

const row = "download";

class update extends Conexion {

	constructor(ID, date, description, Link) {

		super('http://localhost/versionado/Conexion.php');

		//super('localhost', 'root', '', 'proyecto');

		this._ID = ID;
		this._date = date;
		this._description = description;
		this._Link = Link;

	}

	static get(ID, callback) {

		const cn = new Conexion('http://localhost/versionado/Conexion.php');

		cn.sentence("SELECT * FROM `" + row + "` WHERE ID = '" + ID + "'", (q) => {

			const p = new update(q[0][0], new Date(q[0][1]), q[0][2], q[0][3]);
			//cn.end();
			callback(p);

		});

	}//*/

	static getAll(callback) {

		const cn = new Conexion('http://localhost/versionado/Conexion.php');

		cn.sentence("SELECT * FROM `" + row + "`", (q) => {

			let p = [];

			for (let i = 0; i < q.length; i++) {

				let r = q[i];

				p.push(new update(r[0], new Date(r[1]), r[2], r[3]));

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

	/*set(){
		
		const dd = this._date.getDate();
		const mm = this._date.getMonth() + 1;
		const yyyy = this._date.getDate();
		
		this.query("INSERT INTO `"+row+"`(`ID`, `date`, `description`, `Link`) VALUES ('"+this._ID+"', STR_TO_DATE('"+(dd<10 ? "0"+dd : dd+"")+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+yyy+"', '%d-%m-%Y'), '"+this._description+"', '"+this._Link+"')");
		
	}
	
	remove(){
		
		this.query("DELETE FROM `"+row+"` WHERE ID = '"+this._ID+"'");
		
	}//*/

	setDescription(description) {

		this._description = description;

	}

	setLink(Link) {

		this._Link = Link;

	}

	/*length(){
		
		return this.sentence('SELECT * from download').lenght;
		
	}//*/

	toString() {

		return "{" + this._ID + ", " + this._date + ", " + this._description + ", " + this._Link + "}";

	}

}

//module.exports = { update };

//export default Conexion;
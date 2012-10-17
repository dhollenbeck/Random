<?php
/*
Usage:
echo Random::lastname(); //Johnson
echo Random::firstname(); //Mary
echo Random::array(array('Dr', 'Mr')); //Mr
*/
Class Random {
	private static $states = array();
	private static $letters = array();
	private static $digits = array(0,1,2,3,4,5,6,7,8,9);
	private static $vowels = array();
	private static $constants = array();

	private static $lastnames = array('Smith', 'johnson', 'Williams', 'Jones', 'Garcia', 'Brown', 'Davis', 'Miller', 'Rodriguez', 'Martinez', 'Gonzalez', 'Wilson', 'Nguyen', 'Moore', 'Garza', 'Taylor', 'Thomas', 'Hernandez', 'Lopez', 'MARTIN', 'Anderson', 'White', 'Thompson', 'Perez', 'Lee', 'Walker', 'Harris', 'Ramirez', 'Jackson', 'Flores', 'CLARK', 'Lewis', 'Hill', 'Robinson', 'Scott', 'King', 'Wright', 'Allen', 'Roberts', 'Adams', 'Sanchez', 'Young', 'Baker', 'Evans', 'Cook', 'Parker', 'Green', 'Turner', 'Hall', 'Edwards', 'Campbell', 'Tran', 'Carter', 'Collins', 'Morris', 'Stewart', 'Torres', 'Cantu', 'Henderson', 'Nelson', 'Villarreal', 'Ward', 'Morgan', 'Rogers', 'Phillips', 'Reed', 'Mitchell', 'Alexander', 'Wood', 'PATEL', 'Cox', 'Gutierrez', 'Castillo', 'Watson', 'Gomez', 'Bailey', 'Price', 'Trevino', 'Gonzales', 'Bell', 'Brooks', 'Pena', 'Hamilton', 'Sanders', 'West', 'Butler', 'Powell', 'Salinas', 'Reyes', 'McDonald', 'James', 'Kim', 'Griffin', 'Ortiz', 'Moreno', 'Foster', 'Rivera', 'Murphy', 'Diaz', 'Sullivan', 'Long', 'Russell', 'Cooper', 'Cole', 'Gray', 'Howard', 'Graham', 'Bennett', 'Ross', 'Perry', 'Ramos', 'Harrison', 'Alvarez', 'Jenkins', 'Simpson', 'Kelly', 'Crawford', 'Patterson', 'Garrett', 'Stephens', 'Peterson', 'Ray', 'Simmons', 'myers', 'Wallace', 'Ruiz', 'KENNEDY', 'Robertson', 'Richardson', 'Jordan', 'Porter', 'Le', 'ellis', 'Hughes', 'Barnes', 'Coleman', 'Freeman', 'Hicks', 'Morales', 'fisher', 'Wang', 'Salazar', 'Webb', 'Black', 'Ferguson', 'Vasquez', 'Shaw', 'Duncan', 'Guerra', 'Ford', 'Cunningham', 'Warren', 'Henry', 'Mendoza', 'Wells', 'Armstrong', 'Elliott', 'Reynolds', 'Stone', 'Burns', 'Weaver', 'Herrera', 'boyd', 'Dunn', 'Gibson', 'Chapman', 'Mills', 'Washington', 'Rose', 'CHAVEZ', 'Munoz', 'Hunt', 'George', 'Meyer', 'Mason', 'ARNOLD', 'Williamson', 'Fernandez', 'Hart', 'Willis', 'Murray', 'Cruz', 'Johnston', 'Kelley', 'Montgomery', 'Pham', 'Owens', 'Berry', 'Marshall', 'Guerrero', 'Spencer', 'Nichols', 'Wade', 'Medina', 'hayes', 'Fuller', 'Palmer', 'Shelton', 'Morrison', 'CARROLL', 'Tucker', 'Gardner', 'Fox', 'Chen', 'Carpenter', 'Schmidt', 'Grant', 'Saenz', 'Aguilar', 'Woods', 'Cortez', 'Barrera', 'Payne', 'Lane', 'Jennings', 'Matthews', 'Andrews', 'Daniel', 'Bradley', 'Perkins', 'Bryant', 'Holland', 'Lawson', 'Alvarado', 'Stanley', 'Vela', 'Reeves', 'Franklin', 'Lozano', 'watkins', 'Contreras', 'Rice', 'Fowler', 'Welch', 'Molina', 'Pierce', 'Rios', 'Larson', 'Maldonado', 'Valdez', 'Holmes', 'Cavazos', 'Hale', 'Hunter', 'Austin', 'McDaniel', 'Riley', 'Olson', 'Hudson', 'Sims', 'Li', 'Hoffman', 'Castro', 'Carr', 'Holt', 'Peters', 'Jacobs', 'Gilbert', 'Stevens', 'harper', 'Caldwell', 'Soto', 'Carlson', 'May', 'Hinojosa', 'Wolf', 'Howell', 'Richards', 'Sharp', 'Newman', 'Oliver', 'Wagner', 'Delgado', 'Lindsey', 'McGee', 'Navarro', 'Dixon', 'Daniels', 'Gordon', 'Vargas', 'Parsons', 'Hawkins', 'Day', 'Horton', 'Gill', 'Gregory', 'McCoy', 'Dominguez', 'Harvey', 'roberson', 'Snyder', 'Longoria', 'Liu', 'Bates', 'Lambert', 'Tate', 'Sandoval', 'Pearson', 'Bass', 'Burton', 'Park', 'Leal', 'BURKE', 'Greer', 'Barton', 'Zhang', 'Greene', 'Guzman', 'Beck', 'Chandler', 'Knight', 'Parks', 'Dean', 'Reyna', 'Silva', 'douglas', 'Barber', 'Solis', 'Schneider', 'Barron', 'Hoang', 'Chapa', 'Mendez', 'Lawrence', 'ROBBINS', 'Luna', 'Owen', 'Baldwin', 'Byrd', 'Sutton', 'Brewer', 'Manning', 'Elizondo', 'Hodges', 'Fields', 'Moran', 'Chambers', 'Vu', 'Mueller', 'Copeland', 'Cardenas', 'Vaughn', 'Graves', 'Neal', 'Malone', 'Jimenez', 'LYNCH', 'Galvan', 'Frazier', 'Steele', 'BISHOP', 'Barnett', 'Lucas', 'Campos', 'Schroeder', 'Rhodes', 'Ryan', 'Fleming', 'Maxwell', 'Davidson', 'Schultz', 'Love', 'Curtis', 'Acosta', 'Thornton', 'Barker', 'Griffith', 'Rodgers', 'Moss', 'Craig', 'Rangel', 'Norris', 'Chang', 'Cummings', 'Fletcher', 'Harrington', 'Deleon', 'Hampton', 'McClure', 'Alaniz', 'Burnett', 'Ball', 'Collier', 'Page', 'Lyons', 'Garner', 'JOSEPH', 'Hansen', 'castaneda', 'Nash', 'Carson', 'Becker', 'Paul', 'pruitt', 'Leonard', 'Wyatt', 'Hardy', 'Barrett', 'Boone', 'Morrow', 'henson', 'Wong', 'Lin', 'Bui', 'Sherman', 'Hopkins', 'Vaughan', 'Cochran', 'Lara ', 'Truong', 'Ybarra', 'Terry', 'Mann', 'Hanson', 'Little', 'Mcguire', 'Bryan', 'Ayala', 'Carrillo', 'Broussard', 'BRADFORD', 'Romero', 'Davila', 'Vo', 'Wheeler', 'Walters', 'Brock', 'LANDRY', 'Estrada', 'Farmer', 'Buchanan', 'Ingram', 'Dickson', 'Pratt', 'Yates', 'Cross', 'Yang', 'De La Garza', 'Mayfield', 'Wall', 'Ellison', 'Zamora', 'Harmon', 'Harrell', 'Duke', 'Knox', 'Simon', 'Cano ', 'Goodwin', 'Juarez', 'Wu', 'Grimes', 'Watts', 'Stokes', 'Reid', 'Aguirre', 'lowe', 'Wilkins', 'Blair', 'Phan', 'Bush', 'GOODMAN', 'Francis', 'Mathew', 'Terrell', 'Cobb', 'Hood', 'Ramsey', 'Swanson', 'Hubbard', 'Richard', 'Ochoa', 'Sparks', 'McKinney', 'Massey', 'Bruce', 'Allison', 'Salas', 'Huynh', 'Bowen', 'Huang', 'Weber', 'Marquez', 'Atkinson', 'Calderon', 'Mathews', 'Dennis', 'McLaughlin', 'Morton', 'Bowman', 'Higgins', 'Jensen', 'Todd', 'Cannon', 'Potter', 'Shah', 'Crow', 'Haynes', 'Espinoza', 'Skinner');


	public static function lastname() {
		return static::pick(static::$lastnames);
	}
	public static function firstname() {

	}
	public static function address1(){

	}
	public static function address2(){

	}
	public static function city(){

	}
	public static function state(){
		return static::pick(static::$states);
	}
	public static function zip(){
		return static::digits(5);
	}
	public static function digits($size) {
		$digits = '';
		for($i = 1;$i<=$size;$i++){
			$digits .= static::pick(static::$digits);
		}
		return $digits;
	}
	public static function pick($array){
		return $array[rand(0, sizeof($array)-1)];
	}
}
echo Random::digits(10);
?>
function information (state) {

	if (state == keralam) {

		document.getElementById('result').innerHTML = "Expected Seat Projection is LDF:6, UDF:14";

	} else if (state == tamilnadu) {

		document.getElementById('result').innerHTML = "Expected Seat Projection is DMK:29, AIDMK:4, INC:6";
	}

	return false;
}

function information_of_kerala () {

	information (keralam);

	return false;
}

function information_of_tamilnadu () {

	information (tamilnadu);

	return false;
}


document.getElementById('keralam').addEventListener('click', information_of_kerala);


document.getElementById('tamilnadu').addEventListener('click', information_of_tamilnadu);

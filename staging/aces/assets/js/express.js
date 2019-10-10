/*		MDResult_Zip and Address are used to assign the returned search elements 
 * 		to local storage for the client
 * 
 */

function MDResult_Zip(PostalCode, City, State) {
	this.PostalCode = PostalCode;
	this.city = City;
	this.state = State;
}

function MDResult_Address(AddressLine1, City, State, PostalCode, SuiteName, suiteCount) {
	this.line1 = AddressLine1;
	this.city = City;
	this.state = State;
	this.PostalCode = PostalCode;
	this.SuiteName = SuiteName;
	this.Count = suiteCount;
}
/*
function MDResult_Address(AddressLine1, City, State, PostalCode, SuiteName, SuiteRange, suiteCount) {
	this.line1 = AddressLine1;
	this.city = City;
	this.state = State;
	this.PostalCode = PostalCode;
	this.SuiteName = SuiteName;
	this.SuiteRange = SuiteRange;
	this.Count = suiteCount;
}
*/




/*
 * 		MDConnectZip is provided for use in "Fielded" address queries.  A fielded query
 * 		is optimized by supplying the individual address elements of city, state and zip along 
 * 		with the address line data.  MDConnectZip is called using a input representing the zip5
 * 
 *  	The returned data includes a city name, state abbreviation and the full zip5.
 *  	The developer can use these values in a subsequent call to MDConnectAddress. 
 */

function MDExpressPostalCode(input) {

	var mdconnectzip = this;
	// Load properties for containing your license key/token
	var properties = new MDConnect_Properties();

	// Here we use the JSON get method to query ExpressEntry with zip code input
	// from the user
	$.getJSON(properties.url + "jsonp/ExpressPostalCode?callback=?", {
		"format" : "jsonp",
		"id" : properties.clientid,
		"postalcode" : input.value
	}, function(data) {
		// allocate an array to store the results of the query
		mdconnectzip.output = new Array();
		// 
		if (data.Results.length > 0) {
			var i = 0;
			// load the individual results into the array
			$.each(data.Results, function(nkey, nval) {
				var resultZip = new MDResult_Zip(nval.Address.PostalCode,
						nval.Address.City, nval.Address.State);
				mdconnectzip.output[i] = resultZip;
				i = i + 1;
			});
		}
		// display "no results" when none are returned from the query request
		else if (data.Results.length == 0) {
			mdconnectzip.output[0] = "no results";
		}
		// call your zip code display function with the results of the query
		popZip(mdconnectzip.output);
	});

}

/*
 * 		MDExpressAddress returns full address data.  In this example the function is called 
 * 		using a known zip5, city and state (typically found by using the MDConnectZip function)
 */


function MDExpressAddress(input, inputZip, inputCity, inputState) {

	var mdconnectaddress = this;

	// Load properties for containing your license key/token
	var properties = new MDConnect_Properties();

	// Here we use the JSON get method to query ExpressEntry with address input
	// from the form

	$.getJSON(properties.url + "jsonp/ExpressAddress?callback=?", {
		"format" : "jsonp",
		"id" : properties.clientid,
		"postalcode" : inputZip.value,
		"city" : inputCity.value,
		"state" : inputState.value,
		"line1" : input.value,
		"maxrecords" : "10"
	}, function(data) {
		// allocate an array to hold the results from the query
		mdconnectaddress.output = new Array();
		
		if (data.Results.length > 0) {

			// populate the array of results by looping through results of the
			// query
			var i = 0;
			$.each(data.Results, function(nkey, nval) {
				var resultAddress = new MDResult_Address(
						nval.Address.AddressLine1,
						nval.Address.City,
						nval.Address.State,
						nval.Address.PostalCode,
						nval.Address.SuiteName,
					//	nval.Address.SuiteRange,
						nval.Address.SuiteCount);
				mdconnectaddress.output[i] = resultAddress;

				i = i + 1;
			});

			// added semicolon after toUpperCase to satisfy compiler ???
			mdconnectaddress.output.sort(sort_by('line1', false, function(a){return a.toUpperCase();} ));
		} 
		
		else if (data.Results.length == 0) {
			// provide feedback if no results are returned from the query
			mdconnectaddress.output[0] = "no results";
		}
		// pass the results to the function that will display them to the
		// user/client
		popAddress(mdconnectaddress.output);
	});

}

/*
 * The Free Form search allows the caller to search for addresses in an unstructured 
 * manner.  The underlying search will take place across all of the address fields.
 * The search attempts to refine results by assuming the first term entered is a 
 * house number
 */

function MDExpressFreeForm(input) {
	var mdconnectaddress = this;

	var properties = new MDConnect_Properties();
	$.getJSON(properties.url + "jsonp/ExpressFreeForm?callback=?", {
		"format" : "jsonp",
		"id" : properties.clientid,
		"FF" : input.value,
		"maxrecords" : "10"
	}, function(data) {
		mdconnectaddress.output = new Array();
		if (data.Results.length > 0) {
			var i = 0;
			$.each(data.Results, function(nkey, nval) {

				var resultAddress = new MDResult_Address(
						nval.Address.AddressLine1,
						nval.Address.City,
						nval.Address.State,
						nval.Address.PostalCode,
						nval.Address.SuiteName,
					//	nval.Address.SuiteRange,
						nval.Address.SuiteCount);
				mdconnectaddress.output[i] = resultAddress;

				i = i + 1;
			});
		} else if (data.Results.length == 0) {
			mdconnectaddress.output[0] = "no results";
		}
		popAddress(mdconnectaddress.output);
	});
}

/*
 * this function is used to help sort an array of javascript objects
*/

// added semicolon after x[field] and the last curly brace in the return function

function sort_by(field, reverse, primer){
   var key = function (x) {return primer ? primer(x[field]) : x[field]; };

   return function (a,b) {
	  var A = key(a), B = key(b);
	  return ( (A < B) ? -1 : ((A > B) ? 1 : 0) ) * [-1,1][+!reverse];                  
   };
}




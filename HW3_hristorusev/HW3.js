/*EX1*/
var a_number = 5;
var b_string = 'Hristo';
var c_boolean = true;
var d_undefined
var e_array = [3,4,5,67,3];
var f_null = null;
var g_object = {name:'Hristo Rusev', age:24};

/*EX2*/
console.log(typeof a_number);
console.log(typeof b_string);
console.log(typeof c_boolean);
console.log(typeof d_undefined);
console.log(typeof e_array);
console.log(typeof f_null);
console.log(typeof g_object);


/*EX3*/
console.log('The result for typeof a null variable is an ' + typeof f_null);
console.log('The result for typeof an undefined variable is an ' + typeof d_undefined);

/*EX4*/
var first_number = 10;
var second_number = 40;
console.log(first_number + second_number);
console.log(first_number - second_number);
console.log(first_number * second_number);
console.log(first_number / second_number);

 var  dog = 
 	{
 	legs: 4,
 	furColor:'black',
 	bark: function() { console.log('bau-bau')}
 	};

dog.bark();

var random_number = Math.random();
console.log(random_number);

var car_names_array = ['BWM','OPEL','FORD','FIAT'];
console.log(car_names_array);

function multiplication(first_param, second_param)
	{
		return first_param*second_param;
	}

console.log(multiplication(first_number,second_number));
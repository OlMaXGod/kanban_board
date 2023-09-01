import {loadingProjects, loadingRoles} from './functions/main.js'

let roleDefault = 3;

$(document).ready(function(){

	var datepickerFrom = new Datepicker('#datepickerfrom');
	var datepickerTo = new Datepicker('#datepickerto');
	
	loadingProjects();
	loadingRoles();
});